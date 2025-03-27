@extends('layouts.app')
@section('css')
    <style>
        body {
            font-family: Arial, sans-serif;
            background: #f5f5f5;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
        }

        .chat-container {
            width: 900px;
            max-width: 980px;
            background: white;
            border-radius: 10px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
            overflow: hidden;
            display: flex;
            flex-direction: column;
            margin-top: 0px;
        }

        .chat-box {
            width : 900px;
            height: 500px;
            overflow-y: auto;
            padding: 15px;
            display: flex;
            flex-direction: column;
            gap: 10px;
            background: #fff;
        }

        .message {
            padding: 12px 15px;
            border-radius: 18px;
            max-width: 75%;
            font-size: 15px;
            line-height: 1.4;
            word-wrap: break-word;
        }

        .user-message {
            background: #007bff;
            color: white;
            align-self: flex-end;
        }

        .bot-message {
            background: #f1f1f1;
            color: black;
            align-self: flex-start;
        }

        .input-box {
            display: flex;
            padding: 10px;
            background: white;
            border-top: 1px solid #ddd;
        }

        .input-box input {
            flex: 1;
            padding: 12px;
            border: 1px solid #ddd;
            border-radius: 20px;
            outline: none;
        }

        .input-box button {
            padding: 12px 15px;
            background: #8d18cc;
            color: white;
            border: none;
            cursor: pointer;
            border-radius: 20px;
            margin-left: 8px;
            transition: background 0.2s ease-in-out;
        }

        .input-box button:hover {
            background: #0056b3;
        }

        .chat-list {
            padding: 10px;
            border-bottom: 1px solid #ddd;
            cursor: pointer;
            transition: background 0.2s;
        }

        .chat-list:hover {
            background: #f0f0f0;
        }

        #conversation-sidebar {
            width: 250px;
            background: #f5f5f5;
            padding: 10px;
            position: fixed;
            left: 0;
            top: 50px; /* Adjust based on layout */
            height: 100%;
            overflow-y: auto;
        }

        #new-conversation-btn {
            width: 100%;
            margin-bottom: 10px;
        }
        .chat-main-newcontainer {
            position: relative;
            margin-top: 160px;
        }
        #chat-sidebar {
            border: 1px solid rgba(219, 226, 235, .4901960784);
            position: sticky;
            top: 6rem;
            padding: 20px;
        }
        .conversation-card {
            display: flex;
            justify-content: space-between;
            align-items: center;
            flex-direction: column;
            padding: 10px;
            margin-bottom: 5px;
            border: 1px solid #ddd;
            border-radius: 5px;
            background: #f9f9f9;
            cursor: pointer;
            transition: 0.3s;
        }

        .conversation-card:hover {
            background: #eee;
        }

        .conversation-card.active {
            background: #cfe2ff !important; /* Light blue */
            border: 1px solid #007bff;
        }
        .conversation-info {
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .conversation-title {
            font-weight: bold;
        }

        .edit-btn {
            color: #007bff;
        }

        .delete-btn {
            color: #dc3545;
        }

        .message-count {
            font-size: 12px;
            color: #666;
            margin-top: 5px;
        }

       .hidden {
            display: none;
        }

        .mic {
            background: #28a745;
            color: white;
            border: none;
            padding: 8px 12px;
            border-radius: 50%;
            font-size: 18px;
            cursor: pointer;
            position: relative;
            overflow: hidden;
        }

        .mic:hover {
            background: #218838;
        }

        /* Mic button animation (Waves) */
        @keyframes mic-waves {
            0% { box-shadow: 0 0 0 0 rgba(40, 167, 69, 0.7); }
            100% { box-shadow: 0 0 0 15px rgba(40, 167, 69, 0); }
        }

        .mic.recording {
            animation: mic-waves 1.2s infinite;
        }

        /* Stop button styles */
        .input-box .stop-btn {
            background: #d9534f;
            color: white;
            border: none;
            padding: 8px 12px;
            border-radius: 50%;
            font-size: 18px;
            cursor: pointer;
        }

        .input-box .stop-btn:hover {
            background: #c9302c;
        }

       .modal-overlay {
            display: none; /* Ensures modal is hidden initially */
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: rgba(0, 0, 0, 0.5);
            display: flex;
            justify-content: center;
            align-items: center;
            z-index: 9999;
        }

        .modal-content {
            background: white;
            padding: 20px;
            border-radius: 8px;
            width: 350px;
            text-align: center;
            box-shadow: 0px 4px 10px rgba(0, 0, 0, 0.2);
        }

        /* Hide modal on load */
        .hidden {
            display: none;
        }


        .modal-actions {
            margin-top: 15px;
        }

        .btn {
            padding: 8px 12px;
            margin: 5px;
        }


    </style>
@endsection

@section('content')
    <div class="chat-main-newcontainer">
        <div class="container">
            <div class="row">
                <div class="col-md-3">
                    <div id="chat-sidebar">
                        <button class="btn btn-primary ripple pt-1 pb-1 pl-4 pr-4 mt-3" onclick="startNewConversation()">+ New Conversation</button>
                        <ul id="conversation-list">
                            @foreach($conversations as $conv)
                                <li id="conv-{{ $conv->id }}" class="conversation-card {{ $conversation->id == $conv->id ? 'active' : '' }}" onclick="loadConversation({{ $conv->id }})" data-id="{{ $conv->id }}">
                                    <div class="conversation-info">
                                        <span id="conversation-title-{{ $conv->id }}">{{ $conv->title }}</span>
                                        <div class="conversation-actions">
                                            <button class="btn btn-sm edit-btn" onclick="event.stopPropagation(); editConversation({{ $conv->id }} , '{{$conv->title}}')">
                                                <i class="fa fa-pencil"></i>
                                            </button>

                                            <button class="btn btn-sm delete-btn" onclick="event.stopPropagation(); deleteConversation({{ $conv->id }})">
                                                <i class="fa fa-trash"></i>
                                            </button>
                                        </div>
                                    </div>
                                    <small class="message-count">({{ $conv->messages->count() }} messages)</small>
                                </li>
                            @endforeach
                        </ul>
                    </div>
                </div>
                <div class="col-md-9">
                    <div class="chat-container">
                        <div class="mb-3">
                            <label for="model" class="form-label">Select Model:</label>
                            <select id="model" class="form-select">
                                @foreach($models as $model)
                                    <option value="{{ $model['id'] }}">{{ $model['id'] }}</option>
                                @endforeach
                            </select>
                        </div>
                        <!-- Chat Messages -->
                        <div class="chat-box" id="chat-box">
                                @foreach($messages as $chat)
                                    <div class="message user-message">{{ $chat->message }}</div>
                                    <div class="message bot-message"><span id="response-{{ $chat->id }}">{{ $chat->response }}</span>
                                        <button class="btn btn-sm" onclick="speakText('response-{{ $chat->id }}')">🔊</button>
                                        <button class="btn btn-sm" onclick="copyToClipboard('response-{{ $chat->id }}')">📋</button>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                        <div class="input-box">
                            <input type="text" id="user-input" placeholder="Type a message..." />
                            <button onclick="sendMessage()">Send</button>
                            <button id="mic-btn" class="mic">
                                <i class="fa fa-microphone"></i>
                            </button>
                            <button id="stop-btn" class="stop-btn hidden">
                                <i class="fa fa-stop"></i>
                            </button>
                        </div>
                        <audio id="audioPlayer" controls style="visibility:hidden"></audio>
                        <input type="hidden" id="isAudioSearch" value="0">
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Edit Conversation Modal -->
    <div id="editConversationModal" class="modal-overlay hidden">
        <div class="modal-content">
            <h4>Edit Conversation Title</h4>
            <input type="text" id="conversationTitle" class="form-control" placeholder="Enter new title">
            <div class="modal-actions">
                <button class="btn btn-primary" onclick="saveConversationTitle()">Save</button>
                <button class="btn btn-secondary" onclick="$('#editConversationModal').hide()">Cancel</button>
            </div>
        </div>
    </div>

@endsection

@section('js')
<script>
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    let activeConversationId =  $(".conversation-card.active").data("id"); // Store the current conversation ID
    const domainUrl = window.location.origin;
    let conversationId;
    let audioPlayer = document.getElementById("audioPlayer");

    function startNewConversation() {
        $.post('/app/user/chat/new-conversation', function(response) {
            activeConversationId = response.conversation_id;
            conversationTitle = response.conversation_title;
            $('#chat-box').html(''); // Clear chat box
            $(".conversation-card").removeClass("active");
            $("#conversation-list").append(`
                <li id="conv-${activeConversationId}" class="conversation-card active" onclick="loadConversation(${activeConversationId})">
                    <div class="conversation-info">
                    <span class="conversation-title-${activeConversationId}">${new Date().toISOString().split('T')[0]}</span>
                    <div class="conversation-actions">
                        <button class="btn btn-sm edit-btn" onclick="event.stopPropagation(); editConversation(${activeConversationId} , ${conversationTitle})">
                            <i class="fa fa-pencil"></i>
                        </button>
                        <button class="btn btn-sm delete-btn" onclick="event.stopPropagation(); deleteConversation(${activeConversationId})">
                            <i class="fa fa-trash"></i>
                        </button>
                    </div>
                    </div>
                </li>
            `);
        });
        loadConversation(activeConversationId);
    }

    function loadConversation(conversationId) {
        activeConversationId = conversationId;

        $.get(`/app/user/chat/messages/${conversationId}`, function(response) {
            let messages = response.messages; // Extract the messages array

            if (!Array.isArray(messages)) {
                console.error("Expected an array, received:", messages);
                return;
            }

            $('#chat-box').html(''); // Clear previous messages

            messages.forEach(msg => {
                $('#chat-box').append(`<div class="message user-message">${msg.message}</div>`);
                $('#chat-box').append(`<div class="message bot-message">
                <span id="response-${msg.id}">${msg.response}</span>
                <button class="btn btn-sm" onclick="speakText('response-${msg.id}')">🔊</button>
                <button class="btn btn-sm" onclick="copyToClipboard('response-${msg.id}')">📋</button>
                </div>`);
            });

            // Highlight the active conversation
            $(".conversation-card").removeClass("active");
            $("#conv-" + activeConversationId).addClass("active");

            // Update message count
            $("#conv-" + conversationId).find(".message-count").text(`(${response.messageCount} messages)`);
        }).fail(function(error) {
            console.error("Error loading messages:", error);
        });
    }

    function editConversation(id, title) {
        conversationId = id;
        console.log(title);
        $('#conversationTitle').val(title);
        $('#editConversationModal').removeClass('hidden').show(); // Show modal
    }

    function closeModal() {
        $('#editConversationModal').addClass('hidden').hide(); // Hide modal
    }

    function saveConversationTitle() {
        let newTitle = $('#conversationTitle').val().trim(); // Get new title from input
        
        if (!newTitle) {
            alert("Title cannot be empty!");
            return;
        }

        $.ajax({
            url: '/app/user/update-conversation-title',
            type: 'POST',
            data: {
                id: conversationId,
                title: newTitle,
                _token: $('meta[name="csrf-token"]').attr('content')
            },
            success: function(response) {
                $('#conversation-title-' + conversationId).text(newTitle); // Update title in UI
                $('#editConversationModal').hide(); // Close modal
            },
            error: function(error) {
                console.error("Error updating title:", error);
            }
        });
    }

    function deleteConversation(conversationId) {
        if (!confirm("Are you sure you want to delete this conversation?")) return;

        $.ajax({
            url: `/app/user/conversation/${conversationId}`,
            type: "POST",
            data: {
                _method: "DELETE",
                _token: "{{ csrf_token() }}"
            },
            success: function(response) {
                if (response.success) {
                    $("#conv-" + conversationId).fadeOut(300, function () {
                        $(this).remove();
                    });
                    $("#chat-box").html(""); // Clear chat box
                } else {
                    alert("Failed to delete the conversation.");
                }
            }
        });
    }

    function sendMessage() {
        var userMessage = $('#user-input').val().trim();
        var userModel = $('#model').val();
        if (!userMessage) return;

        // Append user message to chat box
        $('#chat-box').append('<div class="message user-message">' + userMessage + '</div>');
        $('#user-input').val('');
        $('#chat-box').scrollTop($('#chat-box')[0].scrollHeight);

        // Create a bot message container
        let responseId = 'response-' + Date.now();

        // var responseContainer = $('<div class="message bot-message"></div>');
        var responseContainer = $(`
            <div class="message bot-message">
                <span id="${responseId}" class="response-text"></span>
                <button class="btn btn-sm" onclick="speakText('${responseId}')">🔊</button>
                <button class="btn btn-sm" onclick="copyToClipboard('${responseId}')">📋</button>
            </div>
        `);
        $('#chat-box').append(responseContainer);

        fetch('/app/user/chat/stream', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            body: JSON.stringify({ message: userMessage, model: userModel, conversation_id: activeConversationId}),
        })
        .then(response => {
            const reader = response.body.getReader();
            const decoder = new TextDecoder();
            let fullResponseText = '';

            function readStream() {
                return reader.read().then(({ done, value }) => {
                    if (done) {
                        if ($('#isAudioSearch').val() == '1' && fullResponseText.trim() !== '') {
                            convertTextToSpeech(fullResponseText, 1);
                        }
                        return;
                    }
                    const chunk = decoder.decode(value, { stream: true });

                    chunk.split("\n").forEach(line => {
                        if (line.startsWith("data:")) {
                            try {
                                let jsonData = JSON.parse(line.replace("data: ", "").trim());
                                if (jsonData.content) {
                                    // responseContainer.append(document.createTextNode(jsonData.content));
                                    $(`#${responseId}`).append(document.createTextNode(jsonData.content));
                                    fullResponseText += jsonData.content;       
                                }
                            } catch (error) {
                                console.error("Error parsing chunk:", error);
                            }
                        }
                    });
                    $('#chat-box').scrollTop($('#chat-box')[0].scrollHeight);
                    return readStream();
                });
            }
            return readStream(); 
        })
        .catch(error => console.error('Error:', error));
    }

    function convertTextToSpeech(text, code){
		$.get('{{ route("convert-text-to-audio") }}', { text: text, voiceCode: code })
		.done(function (voices) {
			$('#audioPlayer').css('visibility','inherit');  
			const audioUrl = domainUrl + voices.result_url;
			const audioPlayer = document.getElementById('audioPlayer');
			audioPlayer.src = audioUrl;
			audioPlayer.play();
            $('#isAudioSearch').val(0);
		})
		.fail(function (error) {
			console.error('Error fetching voices:', error);
		});
	}

    document.addEventListener("DOMContentLoaded", function () {
        let recognition = new (window.SpeechRecognition || window.webkitSpeechRecognition)();
        recognition.lang = 'en-US';
        recognition.interimResults = false;

        let micBtn = document.getElementById('mic-btn');
        let stopBtn = document.getElementById('stop-btn');
        let userInput = document.getElementById('user-input');

        // Start Recording
        micBtn.addEventListener('click', function () {
            $('#isAudioSearch').val(1);
            recognition.start();
            // micBtn.classList.add('hidden'); // Hide mic
            stopBtn.classList.remove('hidden'); // Show stop
            micBtn.classList.add('recording'); // Add animation
        });

        // Stop Recording
        stopBtn.addEventListener('click', function () {
            recognition.stop();
            stopBtn.classList.add('hidden'); // Hide stop
            // micBtn.classList.remove('hidden'); // Show mic
            micBtn.classList.remove('recording'); // Remove animation
        });

        // Handle speech result
        recognition.onresult = function (event) {
            let transcript = event.results[0][0].transcript;
            userInput.value = transcript; // Set text input
            sendMessage(); 
        };

        // Handle errors
        recognition.onerror = function (event) {
            console.error("Speech recognition error:", event.error);
            stopBtn.classList.add('hidden'); // Hide stop
            // micBtn.classList.remove('hidden'); // Show mic
            micBtn.classList.remove('recording'); // Remove animation
        };
    });

    // Speak Text Function
    function speakText(elementId) {
        let text = document.getElementById(elementId).innerText; // Directly get text from span
        let speech = new SpeechSynthesisUtterance(text);
        speech.lang = "en-US"; // Adjust language if needed
        speech.rate = 1; // Speech speed
        speech.pitch = 1; // Voice pitch
        speechSynthesis.speak(speech);
    }

    // Copy to Clipboard Function
    function copyToClipboard(elementId) {
        let text = document.getElementById(elementId).innerText; // Directly get text from span
        navigator.clipboard.writeText(text).then(() => {
            alert("Copied to clipboard!");
        }).catch(err => {
            console.error("Failed to copy:", err);
        });
    }
</script>
@endsection
