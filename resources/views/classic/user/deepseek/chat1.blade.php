@extends('layouts.app')
@section('css')
<style>
        .chat-container {
            max-width: 600px;
            margin: auto;
            padding: 20px;
        }
        .chat-box {
            height: 400px;
            overflow-y: auto;
            border: 1px solid #ddd;
            padding: 10px;
            border-radius: 5px;
            background: #f9f9f9;
        }
        .user-message {
            background: #007bff;
            color: white;
            padding: 8px;
            border-radius: 5px;
            margin-bottom: 5px;
            text-align: right;
        }
        .ai-message {
            background: #ddd;
            color: black;
            padding: 8px;
            border-radius: 5px;
            margin-bottom: 5px;
            text-align: left;
        }
    </style>
@endsection
@section('content')
   <div class="container mt-4">
    <h2 class="text-center">DeepSeek AI Chat</h2>
    
    <div class="chat-container">
        <div class="mb-3">
            <label for="model" class="form-label">Select Model:</label>
            <select id="model" class="form-select">
                @foreach($models as $model)
                    <option value="{{ $model['id'] }}">{{ $model['id'] }}</option>
                @endforeach
            </select>
        </div>

        <div class="chat-box" id="chat-box" >
            <!-- Chat messages will appear here -->
        </div>

        <div class="mt-3">
            <input type="text" id="user-message" class="form-control" placeholder="Type a message...">
            <button id="send-message" class="btn btn-primary mt-2">Send</button>
        </div>
    </div>
</div>
@endsection

@section('js')
    <script>
        $(document).ready(function() {
            function startStreaming(prompt) {
    if (!prompt.trim()) return;

    $('#chat-box').append(`<div class="user-message">${prompt}</div>`);
    $('#user-message').val('');

    let aiMessageContainer = $('<div class="ai-message"></div>');
    $('#chat-box').append(aiMessageContainer);

    let eventSource = new EventSource(`/app/user/deepseek/fim?prompt=${encodeURIComponent(prompt)}`);

    eventSource.onmessage = function (event) {
        if (event.data === "[DONE]") {
            eventSource.close();
            return;
        }

        try {
            let data = JSON.parse(event.data);
            if (data.content) {
                aiMessageContainer.append(data.content); // Append new chunk only
                $('#chat-box').scrollTop($('#chat-box')[0].scrollHeight);
            }
        } catch (e) {
            console.error('Error parsing SSE:', e);
        }
    };

    eventSource.onerror = function () {
        console.error("Streaming connection closed. Retrying...");
        eventSource.close();
        setTimeout(() => startStreaming(prompt), 2000);
    };
}

$('#send-message').click(function () {
    let prompt = $('#user-message').val();
    startStreaming(prompt);
});

        });

    </script>
@endsection
