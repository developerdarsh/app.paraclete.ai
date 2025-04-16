<?php

namespace App\Services;

use Aws\BedrockRuntime\BedrockRuntimeClient;
use App\Models\ChatConversation;
use App\Models\ChatHistory;
use App\Models\Chat;
use App\Models\Content;
use App\Models\ExtensionSetting;
use App\Services\HelperService;
use Exception;
use Illuminate\Support\Facades\Log;

class AmazonBedrock
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

        $extension = ExtensionSetting::first();
        
        $this->client = new BedrockRuntimeClient([
            'version' => 'latest',
            'region'  => $extension->amazon_bedrock_region,
            'credentials' => [
                'key'    => $extension->amazon_bedrock_access_key,
                'secret' => $extension->amazon_bedrock_secret_key,
            ]
        ]);
    }

    public function processStream($callback)
    {
        try {
            $chat_conversation = ChatConversation::where('conversation_id', $this->conversation_id)->first();  
            $chat_message = ChatHistory::where('id', $this->chat_id)->first();
            $main_chat = Chat::where('chat_code', $chat_conversation->chat_code)->first();

            // Prepare messages
            $messages = $this->prepareMessages($main_chat);

            // Prepare request body
            $request_body = [
                'messages' => $messages,
                'inferenceConfig' => [
                    'maxTokens' => 4096,
                    'temperature' => 0.7,
                    'topP' => 0.9,
                    'topK' => 50
                ]
            ];

            // Get streaming response
            $result = $this->client->invokeModelWithResponseStream([
                'modelId' => $chat_message->model,
                'contentType' => 'application/json',
                'accept' => 'application/json',
                'body' => json_encode($request_body)
            ]);

            // Get the stream
            $stream = $result->get('body');

            // Process the streaming response
            foreach ($stream as $event) {
    
                if ($event) {
                    $chunk = json_decode($event['chunk']['bytes'], true);
                 
                    // Nova-specific response handling
                    if (isset($chunk['contentBlockDelta']['delta']['text'])) {
                        $raw = $chunk['contentBlockDelta']['delta']['text'];
                        $clean = str_replace(["\r\n", "\r", "\n"], "<br/>", $raw);
                        $this->text .= $raw;

                        if (connection_aborted()) {
                            break;
                        }

                        $callback($clean);
                    }

                    // Handle Nova-specific token usage
                    if (isset($chunk['metadata'])) {
                        $this->input_tokens = $chunk['metadata']['usage']['inputTokens'] ?? 0;
                        $this->output_tokens = $chunk['metadata']['usage']['outputTokens'] ?? 0;
                    }
                }
            }

            // Send completion signal
            $callback('[DONE]');


            // Update database
            $this->updateDatabase($chat_message, $chat_conversation);

        } catch (Exception $e) {
            Log::error("Bedrock Nova Error", [
                'message' => $e->getMessage(),
                'trace' => $e->getTraceAsString()
            ]);

            $errorMessage = $this->formatErrorMessage($e->getMessage());
            $callback('Amazon Nova API Notification: <span class="font-weight-bold">' . htmlspecialchars($errorMessage) . '</span>');
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
            $model = $content->model;         
           

            // Add current prompt
            $messages[] = [
                'role' => 'user',
                'content' => [
                    [
                        'text' => $this->prompt
                    ]
                ]
            ];


            // Prepare request body
            $request_body = [
                'messages' => $messages,
                'inferenceConfig' => [
                    'maxTokens' => 4096,
                    'temperature' => 0.7,
                    'topP' => 0.9,
                    'topK' => 50
                ]
            ];

            // Get streaming response
            $result = $this->client->invokeModelWithResponseStream([
                'modelId' => $model,
                'contentType' => 'application/json',
                'accept' => 'application/json',
                'body' => json_encode($request_body)
            ]);

            // Get the stream
            $stream = $result->get('body');

            // Process the streaming response
            foreach ($stream as $event) {
    
                if ($event) {
                    $chunk = json_decode($event['chunk']['bytes'], true);
                 
                    // Nova-specific response handling
                    if (isset($chunk['contentBlockDelta']['delta']['text'])) {
                        $raw = $chunk['contentBlockDelta']['delta']['text'];
                        $clean = str_replace(["\r\n", "\r", "\n"], "<br/>", $raw);
                        $this->text .= $raw;

                        if (connection_aborted()) {
                            break;
                        }

                        $callback($clean);
                    }

                    // Handle Nova-specific token usage
                    if (isset($chunk['metadata'])) {
                        $this->input_tokens = $chunk['metadata']['usage']['inputTokens'] ?? 0;
                        $this->output_tokens = $chunk['metadata']['usage']['outputTokens'] ?? 0;
                    }
                }
            }

            // Send completion signal
            $callback('[DONE]');


            // Update database
            $this->updateTemplateDatabase($model);

        } catch (Exception $e) {
            Log::error("Bedrock Nova Error", [
                'message' => $e->getMessage(),
                'trace' => $e->getTraceAsString()
            ]);

            $errorMessage = $this->formatErrorMessage($e->getMessage());
            $callback('Amazon Nova API Notification: <span class="font-weight-bold">' . htmlspecialchars($errorMessage) . '</span>');
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
            'content' => [
                [
                    'text' => $main_chat->prompt
                ]
            ]
        ];

        foreach ($chat_messages as $chat) {
            if (!empty($chat->prompt)) {
                $messages[] = [
                    'role' => 'user',
                    'content' => [
                        [
                            'text' => $chat->prompt
                        ]
                    ]
                ];
            }
            if (!empty($chat->response)) {
                $messages[] = [
                    'role' => 'assistant',
                    'content' => [
                        [
                            'text' => $chat->response
                        ]
                    ]
                ];
            }
        }

        // Add current prompt
        $messages[] = [
            'role' => 'user',
            'content' => [
                [
                    'text' => $this->prompt
                ]
            ]
        ];

        return $messages;
    }

    private function updateDatabase($chat_message, $chat_conversation)
    {
        if (!empty($this->text)) {
            $words = str_word_count($this->text);

            HelperService::updateBalance($words, $chat_message->model, $this->input_tokens, $this->output_tokens); 
            // Update chat history
            $current_chat = ChatHistory::where('id', $this->chat_id)->first();
            if ($current_chat) {
                $current_chat->update([
                    'response' => $this->text,
                    'words' => $words,
                    'input_tokens' => $this->input_tokens,
                    'output_tokens' => $this->output_tokens
                ]);
            }

            // Update conversation
            if ($chat_conversation) {
                $chat_conversation->increment('words', $words);
                $chat_conversation->increment('messages');
            }
        }
    }

    private function updateTemplateDatabase($model)
    {
        if (!empty($this->text)) {
            $words = str_word_count($this->text);

            HelperService::updateBalance($words, $model, $this->input_tokens, $this->output_tokens); 
  
            $content = Content::where('id', $this->conversation_id)->first(); 
            $content->result_text = $this->text;
            $content->input_tokens = $this->input_tokens;
            $content->output_tokens = $this->output_tokens;
            $content->words = $words;
            $content->save();
        }
    }


    private function formatErrorMessage($message)
    {
        if (strpos($message, 'AccessDeniedException') !== false) {
            return 'Access denied. Please check your AWS credentials and Bedrock permissions.';
        } elseif (strpos($message, 'ValidationException') !== false) {
            return 'Invalid request format for Nova model.';
        } elseif (strpos($message, 'ThrottlingException') !== false) {
            return 'Request rate exceeded. Please try again later.';
        } else {
            return 'Unexpected Nova model issue. Please try again later.';
        }
        return $message;
    }
    
}
