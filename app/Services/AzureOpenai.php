<?php

namespace App\Services;

use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Http;
use App\Models\ExtensionSetting;
use Illuminate\Http\Request;
use GuzzleHttp\Client;
use App\Models\ChatConversation;
use App\Models\ChatHistory;
use App\Models\Chat;
use App\Models\AzureModel;
use App\Models\Content;
use Exception;
use Illuminate\Support\Facades\Log;

class AzureOpenai
{

    private $client;
    private $conversation_id;
    private $chat_id;
    private $prompt;
    private $text = "";
    private $input_tokens = 0;
    private $output_tokens = 0;
    private $max_words;
    private $temperature;

    public function __construct($conversation_id, $chat_id, $prompt, $max_words = null, $temperature = null)
    {
        $this->conversation_id = $conversation_id;
        $this->chat_id = $chat_id;
        $this->prompt = $prompt;
    }

    public function processStream($callback)
    {
        try {
            $chat_conversation = ChatConversation::where('conversation_id', $this->conversation_id)->first();  
            $chat_message = ChatHistory::where('id', $this->chat_id)->first();
            $main_chat = Chat::where('chat_code', $chat_conversation->chat_code)->first();

            // Prepare messages
            $messages = $this->prepareMessages($main_chat);

            $extension = ExtensionSetting::first();
            $model = AzureModel::where('model', $chat_message->model)->first();

            $endpoint = $extension->azure_openai_endpoint;
            $deployment = ($model) ? $model->deployment_name : 'gpt-4o';
            $api_version = '2025-01-01-preview';

            // Create Azure OpenAI client
            $client = new \GuzzleHttp\Client([
                'base_uri' => $endpoint,
                'headers' => [
                    'api-key' => $extension->azure_openai_key,
                    'Content-Type' => 'application/json',
                ]
            ]);

            // Prepare request body
            $request_body = [
                'messages' => $messages,
                'temperature' => 0.9,
                'frequency_penalty' => 0,
                'presence_penalty' => 0,
                'stream' => true,
            ];

            // Make streaming request
            $response = $client->post("/openai/deployments/{$deployment}/chat/completions?api-version={$api_version}", [
                'json' => $request_body,
                'stream' => true,
            ]);

            // Get the stream
            $stream = $response->getBody();
            $buffer = '';

            // Process the streaming response
            while (!$stream->eof()) {
                
                if (connection_aborted()) {
                    break;
                }

                $line = $stream->read(1024);

                // Process the chunk
                $chunks = explode("\n", $buffer . $line);
                $buffer = array_pop($chunks); // Keep incomplete chunk in buffer

                foreach ($chunks as $chunk) {
                    if (empty(trim($chunk))) {
                        continue;
                    }

                    // Remove "data: " prefix if present
                    if (str_starts_with($chunk, 'data: ')) {
                        $chunk = substr($chunk, 6);
                    }

                    if ($chunk === '[DONE]') {
                        continue;
                    }

                    try {
                        $data = json_decode($chunk, true);
         
                        if (isset($data['choices'][0]['delta']['content'])) {
                            $content = $data['choices'][0]['delta']['content'];
                            $this->text .= $content;

                            // Clean content for streaming
                            $clean = str_replace(["\r\n", "\r", "\n"], "<br/>", $content);

                            if (connection_aborted()) {
                                break;
                            }
    
                            $callback($clean);

                        }


                    } catch (\Exception $e) {
                        Log::error('Azure JSON decode error: ' . $e->getMessage());
                        continue;
                    }
                }
            }

            // Send completion signal
            $callback('[DONE]');


            // Update database
            $this->updateDatabase($chat_message, $chat_conversation, $messages);

        } catch (Exception $e) {
            Log::error("Azure Openai Error", [
                'message' => $e->getMessage(),
                'trace' => $e->getTraceAsString()
            ]);

            $errorMessage = $this->formatErrorMessage($e->getMessage());
            $callback('Azure OpenAI API Notification: <span class="font-weight-bold">' . htmlspecialchars($errorMessage) . '</span>');
            $callback('[DONE]');
        }
    }


    public function processTemplateStream($callback)
    {
        try {

            if ( (int)$this->chat_id > 1 ) {
                $this->prompt .='. Create seperate distinct ' . $this->chat_id . ' results.';
            }

            $content = Content::where('id', $this->conversation_id)->first();     
           

            // Add current prompt
            $messages[] = [
                'role' => 'user',
                'content' => $this->prompt
            ];


            $extension = ExtensionSetting::first();
            $model = AzureModel::where('model', $content->model)->first();

            $endpoint = $extension->azure_openai_endpoint;
            $deployment = ($model) ? $model->deployment_name : 'gpt-4o';
            $api_version = '2025-01-01-preview';

            // Create Azure OpenAI client
            $client = new \GuzzleHttp\Client([
                'base_uri' => $endpoint,
                'headers' => [
                    'api-key' => $extension->azure_openai_key,
                    'Content-Type' => 'application/json',
                ]
            ]);

            // Prepare request body
            $request_body = [
                'messages' => $messages,
                'temperature' => 0.9,
                'frequency_penalty' => 0,
                'presence_penalty' => 0,
                'stream' => true,
            ];

            // Make streaming request
            $response = $client->post("/openai/deployments/{$deployment}/chat/completions?api-version={$api_version}", [
                'json' => $request_body,
                'stream' => true,
            ]);

            // Get the stream
            $stream = $response->getBody();
            $buffer = '';

            // Process the streaming response
            while (!$stream->eof()) {
                
                if (connection_aborted()) {
                    break;
                }

                $line = $stream->read(1024);

                // Process the chunk
                $chunks = explode("\n", $buffer . $line);
                $buffer = array_pop($chunks); // Keep incomplete chunk in buffer

                foreach ($chunks as $chunk) {
                    if (empty(trim($chunk))) {
                        continue;
                    }

                    // Remove "data: " prefix if present
                    if (str_starts_with($chunk, 'data: ')) {
                        $chunk = substr($chunk, 6);
                    }

                    if ($chunk === '[DONE]') {
                        continue;
                    }

                    try {
                        $data = json_decode($chunk, true);
         
                        if (isset($data['choices'][0]['delta']['content'])) {
                            $content = $data['choices'][0]['delta']['content'];
                            $this->text .= $content;

                            // Clean content for streaming
                            $clean = str_replace(["\r\n", "\r", "\n"], "<br/>", $content);

                            if (connection_aborted()) {
                                break;
                            }
    
                            $callback($clean);

                        }


                    } catch (\Exception $e) {
                        Log::error('Azure JSON decode error: ' . $e->getMessage());
                        continue;
                    }
                }
            }

            // Send completion signal
            $callback('[DONE]');


            // Update database
            $this->updateTemplateDatabase($content->model, $messages);

        } catch (Exception $e) {
            Log::error("Azure Openai Error", [
                'message' => $e->getMessage(),
                'trace' => $e->getTraceAsString()
            ]);

            $errorMessage = $this->formatErrorMessage($e->getMessage());
            $callback('Azure OpenAI API Notification: <span class="font-weight-bold">' . htmlspecialchars($errorMessage) . '</span>');
            $callback('[DONE]');
        }
    }


    private function prepareMessages($main_chat)
    {
        $chat_messages = ChatHistory::where('conversation_id', $this->conversation_id)
            ->orderBy('created_at', 'desc')
            ->take(3)
            ->get()
            ->reverse();
        
        $messages = [];

        $messages[] = [
            'role' => 'user',
            'content' => $main_chat->prompt
        ];

        foreach ($chat_messages as $chat) {
            if (!empty($chat->prompt)) {
                $messages[] = [
                    'role' => 'user',
                    'content' => $chat->prompt
                ];
            }
            if (!empty($chat->response)) {
                $messages[] = [
                    'role' => 'assistant',
                    'content' => $chat->response
                ];
            }
        }

        // Add current prompt
        $messages[] = [
            'role' => 'user',
            'content' => $this->prompt
        ];

        return $messages;
    }


    private function updateDatabase($chat_message, $chat_conversation, $messages)
    {

        if (!empty($this->text)) {
            $words = str_word_count($this->text);

            $tokens = $this->estimateTokenUsage($messages, $this->text);

            HelperService::updateBalance($words, $chat_message->model, $tokens['prompt_tokens'], $tokens['completion_tokens']); 
            // Update chat history
            $current_chat = ChatHistory::where('id', $this->chat_id)->first();
            if ($current_chat) {
                $current_chat->update([
                    'response' => $this->text,
                    'words' => $words,
                    'input_tokens' => $tokens['prompt_tokens'],
                    'output_tokens' => $tokens['completion_tokens']
                ]);
            }

            // Update conversation
            if ($chat_conversation) {
                $chat_conversation->increment('words', $words);
                $chat_conversation->increment('messages');
            }
        }
    }


    private function updateTemplateDatabase($model, $messages)
    {
        if (!empty($this->text)) {
            $words = str_word_count($this->text);

            $tokens = $this->estimateTokenUsage($messages, $this->text);

            HelperService::updateBalance($words, $model, $tokens['prompt_tokens'], $tokens['completion_tokens']); 
  
            $content = Content::where('id', $this->conversation_id)->first(); 
            $content->result_text = $this->text;
            $content->input_tokens = $tokens['prompt_tokens'];
            $content->output_tokens = $tokens['completion_tokens'];
            $content->words = $words;
            $content->save();
        }
    }


    private function formatErrorMessage($message)
    {
        if (strpos($message, 'AccessDeniedException') !== false) {
            return 'Access denied. Please check your AWS credentials and Bedrock permissions.';
        } elseif (strpos($message, 'ValidationException') !== false) {
            return 'Invalid request format for Azure model.';
        } elseif (strpos($message, 'ThrottlingException') !== false) {
            return 'Request rate exceeded. Please try again later.';
        } else {
            return 'Model deployment not found. Please contact support.';
        }
        return $message;
    }


    /**
     * Estimate token count for text using a simple approximation
     * 
     * @param string $text The text to count tokens for
     * @return int Estimated token count
     */
    private function estimateTokenCount($text) {
        // Simple approximation: 1 token ≈ 4 characters or 0.75 words
        // This is a rough estimate and will vary by model and content
        $charCount = mb_strlen($text);
        $wordCount = count(preg_split('/\s+/', trim($text)));
        
        // Average of character-based and word-based estimates
        $charBasedEstimate = $charCount / 4;
        $wordBasedEstimate = $wordCount / 0.75;
        
        return (int)round(($charBasedEstimate + $wordBasedEstimate) / 2);
    }


    /**
     * Estimate token usage for a set of messages
     * 
     * @param array $messages Array of message objects
     * @param string $generatedText The text generated by the model
     * @return array Token usage estimates
     */
    private function estimateTokenUsage($messages, $generatedText) {

        $promptText = '';
        foreach ($messages as $message) {
            $promptText .= $message['content'] . "\n";
        }
        
        $promptTokens = $this->estimateTokenCount($promptText);
        $completionTokens = $this->estimateTokenCount($generatedText);
        
        return [
            'prompt_tokens' => $promptTokens,
            'completion_tokens' => $completionTokens,
        ];
    }
    
}
