<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Auth;
use App\Models\Conversation;
use App\Models\Message;

class DeepSeekController extends Controller
{
    public function index()
    {
        $user = Auth::user();

        $conversations = Conversation::where('user_id', $user->id)->withCount('messages')->latest()->get();
        $conversation = $conversations->first();
        if (!$conversation) {
            $conversation = Conversation::create([
                'user_id' => $user->id,
                'title' => now()->format('Y-m-d') // Default title as today's date
            ]);
        }
        $messages = $conversation->messages()->get(); 
        $response = Http::withHeaders([
            'Authorization' => 'Bearer ' . env('DEEPSEEK_API_KEY'),
            'Accept' => 'application/json',
        ])->get(env('DEEPSEEK_API_URL') . '/models');

        $models = $response->json()['data'] ?? [];

        return view('user.deepseek.chat', compact('models', 'conversations', 'conversation', 'messages'));

    }
 
    public function stream(Request $request)
    {
        $user = Auth::user();
        $message = $request->input('message');
        $selectedModel = $request->input('model');
        $conversation_id = $request->input('conversation_id');
        $botResponse = "";
       
        return response()->stream(function () use ($user, $message, $selectedModel, &$botResponse, $conversation_id) {
            $curl = curl_init();
            curl_setopt_array($curl, [
                CURLOPT_URL => 'https://api.deepseek.com/chat/completions',
                CURLOPT_RETURNTRANSFER => true,
                CURLOPT_ENCODING => '',
                CURLOPT_MAXREDIRS => 10,
                CURLOPT_TIMEOUT => 0,
                CURLOPT_FOLLOWLOCATION => true,
                CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
                CURLOPT_CUSTOMREQUEST => 'POST',
                CURLOPT_POSTFIELDS => json_encode([
                    "messages" => [
                        ["content" => "You are a helpful assistant", "role" => "system"],
                        ["content" => $message, "role" => "user"],
                    ],
                    "model" => $selectedModel,
                    "max_tokens" => 512,
                    "stream" => true,
                ]),
                CURLOPT_HTTPHEADER => [
                    'Content-Type: application/json',
                    'Accept: application/json',
                    'Authorization: Bearer ' . env('DEEPSEEK_API_KEY')
                ],
            ]);

            curl_setopt($curl, CURLOPT_WRITEFUNCTION, function ($curl, $chunk) use (&$botResponse) {
                $lines = explode("\n", trim($chunk));
                foreach ($lines as $line) {
                    $line = trim($line);
                    if (strpos($line, "data:") === 0) {
                        $jsonData = json_decode(substr($line, 5), true);
                        if (isset($jsonData['choices'][0]['delta']['content'])) {
                            $content = $jsonData['choices'][0]['delta']['content'];
                            echo "data: " . json_encode(["content" => $content]) . "\n\n";
                            ob_flush();
                            flush();
                            $botResponse .= $content;
                        }
                    }
                }
                return strlen($chunk);
            });

            curl_exec($curl);
            curl_close($curl);

            // Store chat history after streaming is complete
            Message::create([
                'conversation_id' => $conversation_id,
                'sender' => 'bot',
                'model' => $selectedModel,
                'message' => $message,
                'response' => $botResponse,
            ]);

        }, 200, [
            'Cache-Control' => 'no-cache',
            'X-Accel-Buffering' => 'no',
            'Connection' => 'keep-alive',
        ]);
    }
    
    public function startNewConversation()
    {
        $conversation = Conversation::create([
            'user_id' => Auth::id(),
            'title' => now()->format('Y-m-d'), // Set the title as today's date
        ]);

        return response()->json(['conversation_id' => $conversation->id , 'conversation_title' => $conversation->title ]);
    }

    public function getMessages(Conversation $conversation)
    {
        $messages = Message::where('conversation_id', $conversation->id)->get();
    
        return response()->json([
            'messages' => $messages,
            'messageCount' => $messages->count()
        ]);

    }

    public function destroy($id)
    {
        $conversation = Conversation::where('id', $id)->where('user_id', Auth::id())->first();

        if ($conversation) {
            $conversation->delete();
            return back()->with('success', 'Conversation deleted successfully.');
        }

        return back()->with('error', 'Conversation not found.');
    }

    public function updateTitle(Request $request)
    {
        $request->validate([
            'id' => 'required|exists:conversations,id',
            'title' => 'required|string|max:255',
        ]);

        $conversation = Conversation::findOrFail($request->id);
        $conversation->title = $request->title;
        $conversation->save();

        return response()->json(['success' => true, 'message' => 'Title updated successfully']);
    }

}
