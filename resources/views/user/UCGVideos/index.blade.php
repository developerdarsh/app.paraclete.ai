@extends('layouts.app')

@section('css')
<style>
.select2-container--default .select2-selection--single .select2-selection__arrow b {
    margin-top: 5px !important;
}
.select2-container .select2-selection--single {
    height: auto !important;
}
.select2-selection__rendered span {
        display: flex;
    align-items: center;
}
</style>
<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
@endsection

@section('content') 
<div class="container">
    <h1>AI UGC Video Generator</h1>

    {{-- Creator Dropdown --}}

    {{-- Title Input --}}
    <div class="form-group">
        <label for="title">Enter Title</label>
        <input type="text" id="title" class="form-control" placeholder="Enter the video title here...">
    </div>

    <div class="form-group">
        <label for="creatorName">Select Avtar</label>
        <select id="creatorName" class="form-control">
            @foreach ($avtarlist as $avtar)
                <option value="{{ $avtar['avatar_id'] }}" data-image="{{$avtar['preview_image_url']}}"> {{ $avtar['avatar_name'] }}</option>
            @endforeach
        </select>
    </div>
    <div class="form-group">
        <label for="voiceName">Select Voice</label>
        <select id="voiceName" class="form-control">
            @foreach ($voicelist as $voice)
                <option value="{{ $voice['voice_id'] }}"> {{ $voice['name'] }}</option>
            @endforeach
        </select>
    </div>

    {{-- Script Input --}}
    <div class="form-group">
        <label for="script">Enter Script</label>
        <textarea id="script" class="form-control" rows="4" placeholder="Enter the video script here..."></textarea>
    </div>
    
    </Br>
    {{-- Generate Button --}}
    <button id="generateButton" class="btn btn-primary">Generate Video</button>
    
    {{-- Result Section --}}
    <div id="resultSection" style="display:none;">
        <h2>Generated Video</h2>
        <video id="videoPlayer" controls width="600" height="400">
            <source id="videoSource" src="" type="video/mp4">
            Your browser does not support the video tag.
        </video>
    </div>
    <div>
    </Br>
    </div>
    <h2>Video Operations</h2>

    <table class="table">
        <thead>
            <tr>
                <th>Title</th>
                <th>Operation ID</th>
                <th>Creator</th>
                <th>Status</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach($videoOperations as $operation)
            <tr>
                <td>{{ $operation->title }}</td>
                <td>{{ $operation->operation_id }}</td>
                <td>{{ $operation->creator }}</td>
                <td id="status-{{ $operation->id }}">{{ $operation->status }}</td>
                <td>
                    <button class="btn btn-primary check-status" data-operation-id="{{ $operation->operation_id }}" data-row-id="{{ $operation->id }}">Check</button>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>

    {{-- Pagination links --}}
    {{ $videoOperations->links() }}
    <div>
    </Br>
    </div>
    <div id="translation-section">
        <h3>Translate Video</h3>

        <!-- Dropdown to select video operation -->
        <label for="video-select">Select Video Operation:</label>
        <select id="video-select" class="form-control">
            <option value="">-- Select a video operation (optional) --</option>
            @foreach($allOperations as $operation)
                <option value="{{ $operation->operation_id }}">{{ $operation->title }}</option>
            @endforeach
        </select>

        <!-- Manual URL input -->
        <label for="manual-url">Or Enter Video URL:</label>
        <input type="text" id="manual-url" class="form-control" placeholder="Enter video URL">

        <div class="row">
            <!-- Source Language Dropdown -->
            <div class="col-md-6">
                <label for="source-lang">Source Language:</label>
                <select id="source-lang" class="form-control">
                    <option value="">-- Select Source Language --</option>
                    @foreach($supportLangArray['supportedLanguages'] as $lang)
                        <option value="{{ $lang }}">{{ $lang }}</option>
                    @endforeach
                </select>
            </div>

            <!-- Target Language Dropdown -->
            <div class="col-md-6">
                <label for="target-lang">Target Language:</label>
                <select id="target-lang" class="form-control">
                    <option value="">-- Select Target Language --</option>
                    @foreach($supportLangArray['supportedLanguages'] as $lang)
                        <option value="{{ $lang }}">{{ $lang }}</option>
                    @endforeach
                </select>
            </div>
        </div>


        <!-- Convert Button -->
        <button id="translate-btn" class="btn btn-secondary mt-3">Convert</button>
    </div>

    {{-- Error Alert --}}
    <div id="errorAlert" class="alert alert-danger" style="display:none;"></div>
    </Br>
</div>

@endsection

@section('js')
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
<script>
    $(document).ready(function () {
        function formatOption(option) {
            if (!option.id) {
            return option.text; // Default placeholder
            }
            const image = $(option.element).data('image');
            return $(`<span><img src="${image}" style="width: 40px;height: 40px;margin-right: 5px;margin-bottom: 5px;object-fit: contain;" />${option.text}</span>`);
        }

        $('#creatorName').select2({
            templateResult: formatOption,
            templateSelection: formatOption,
        });
    });
    $('#generateButton').on('click', function() {
        let creatorName = $('#creatorName').val();
        let script = $('#script').val();
        let title = $('#title').val();
        let voiceName=$('#voiceName').val();
        if (!script) {
            alert('Please enter a script.');
            return;
        }

        let data = {
            creatorName: creatorName,
            script: script,
            title: title,
            voiceName:voiceName
        };

        // Call the submit API via AJAX
        $.ajax({
            url: '{{ url("/user/video/generate") }}',
            method: 'POST',
            headers: {
                'X-CSRF-TOKEN': '{{ csrf_token() }}'
            },
            data: data,
            beforeSend: function() {
                // Display loader and message before the request starts
                $('body').append(`
                    <div id="loader" style="position:fixed;top:50%;left:50%;transform:translate(-50%, -50%);">
                        <p>Video is being processed...</p>
                        <div class="spinner-border" role="status">
                            <span class="visually-hidden">Loading...</span>
                        </div>
                    </div>
                `);
            },
            success: function(result) {
                console.log(result);
                if (result.operationId) {
                    setTimeout(function() {
                        // Hide the loader after 30 seconds
                        $('#loader').remove();

                        // Start polling for video status
                        pollVideo(result.operationId); 
                    }, 1000); // 30 seconds delay

                    // Append new row to the table dynamically
                    let newRow = `
                        <tr>
                            <td>${result.title}</td>
                            <td>${result.operationId}</td>
                            <td>${result.creator}</td>
                            <td id="status-${result.id}">QUEUED</td>
                            <td>
                                <button class="btn btn-primary check-status" data-operation-id="${result.operationId}" data-row-id="${result.video_operation_id}">Check</button>
                            </td>
                        </tr>`;
                    
                    // Insert new row at the beginning of the table body
                    $('table tbody').prepend(newRow);

                } else {
                    showError('Video generation failed.');
                    $('#loader').remove();
                }
            },
            error: function(xhr, status, error) {
                showError('Error occurred: ' + error);
                $('#loader').remove();
            }
        });
    });

    // Polling function to check video generation status
    function pollVideo(operationId) {
        $.ajax({
            url: '{{ url("/user/video/poll") }}',
            method: 'POST',
            headers: {
                'X-CSRF-TOKEN': '{{ csrf_token() }}'
            },
            data: {
                operationId: operationId
            },
            success: function(response) {
                if (response.status === 'DONE') {
                    $('#status-' + response.video_operation_id).text('DONE');
                    // Show the video section and load the video
                    $('#resultSection').show();
                    $('#videoSource').attr('src', response.videoUrl);
                    $('#videoPlayer')[0].load();
                } else {
                    $('#status-' + response.video_operation_id).text(response.status);
                    // setTimeout(function() {
                    //     pollVideo(operationId);
                    // }, 5000);
                }
            },
            error: function(xhr, status, error) {
                showError('Error occurred: ' + error);
            }
        });
    }

    // Show error message
    function showError(message) {
        $('#errorAlert').show().text(message);
    }   

    $('.check-status').on('click', function() {
        
        let operationId = $(this).data('operation-id');
        let rowId = $(this).data('row-id');
        
        $.ajax({
            url: '{{ url("/user/video/poll") }}',
            method: 'POST',
            data: {
                operationId: operationId,
                _token: '{{ csrf_token() }}'
            },
            success: function(response) {
                if (response.status === 'DONE') {
                    $('#status-' + response.video_operation_id).text('DONE');
                    $('#resultSection').show();
                    $('#videoSource').attr('src', response.videoUrl);
                    $('#videoPlayer')[0].load();
                } else {
                    $('#status-' + response.video_operation_id).text(response.status);
                }
            },
            error: function() {
                alert('Error occurred while checking the status.');
            }
        });
    });

    $('#translate-btn').on('click', function() {
        let operationId = $('#video-select').val();    // Get selected video operation
        let manualUrl = $('#manual-url').val();        // Get manually entered URL
        let sourceLang = $('#source-lang').val();      // Get source language
        let targetLang = $('#target-lang').val();      // Get target language

        // Validate inputs
        if (!operationId && !manualUrl) {
            alert('Please select a video operation or enter a video URL.');
            return;
        }

        if (!sourceLang || !targetLang) {
            alert('Please select both source and target languages.');
            return;
        }

        // Prepare data
        let data = {
            sourceLang: sourceLang,
            targetLang: targetLang
        };

        if (operationId) {
            data.operationId = operationId;
        } else {
            data.manualUrl = manualUrl;
        }

        // AJAX request to initiate translation
        $.ajax({
            url: '/translate-video',  // Change to your route
            method: 'POST',
            headers: {
                'X-CSRF-TOKEN': '{{ csrf_token() }}'
            },
            data: data,
            success: function(response) {
                alert('Translation started. Please check back later.');
            },
            error: function(xhr, status, error) {
                alert('Translation failed: ' + error);
            }
        });
    });

</script>
@endsection