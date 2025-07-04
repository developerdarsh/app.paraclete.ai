
<?php $__env->startSection('css'); ?>
	<!-- Sweet Alert CSS -->
	<link href="<?php echo e(URL::asset('plugins/sweetalert/sweetalert2.min.css')); ?>" rel="stylesheet" />
	<link href="<?php echo e(URL::asset('plugins/highlight/highlight.dark.min.css')); ?>" rel="stylesheet" />
    <!-- Slick CSS -->
    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.css"/>
    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick-theme.css"/>

    <style>
        .app-content .side-app {
              padding: 60px 20px 0 !important;
              max-width: 100% !important;
        }
        .avatars-video-content h5,
        .create-avatars h5 {
            color: #000000;
            font-size: 24px;
            line-hight: 32px;
            font-weight: 600;
        }
        
        .create-avatar-card {
            border: 2px dashed #666;
            background-color: transparent;
            border-radius: 8px;
            padding: 30px 20px;
            text-align: center;
            cursor: pointer;
            transition: all 0.3s ease;
            margin-bottom: 30px;
        }
        
        .create-avatar-card:hover {
            border-color: #007bff;
            background-color: rgba(0, 123, 255, 0.1);
        }
        
        .create-avatar-card i {
            font-size: 2rem;
            margin-bottom: 10px;
            color: #888;
        }
        
        .avatar-grid {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(140px, 1fr));
            gap: 15px;
            padding: 20px;
        }
        
        .avatar-grid .avatar-card {
            position: relative;
            border-radius: 8px;
            overflow: hidden;
            cursor: pointer;
            transition: transform 0.2s ease;
            aspect-ratio: 3/4;
        }
        
        .avatar-grid .avatar-card:hover {
            transform: scale(1.05);
        }
        
      .avatar-grid .avatar-card img {
            width: 100%;
            height: 100%;
            object-fit: cover;
        }
        
       .avatar-grid .avatar-favorite {
            position: absolute;
            top: 8px;
            right: 8px;
            background: rgba(0, 0, 0, 0.7);
            border-radius: 50%;
            width: 28px;
            height: 28px;
            display: flex;
            align-items: center;
            justify-content: center;
            cursor: pointer;
        }
        
        .avatar-grid .avatar-favorite i {
            color: #ffd700;
            font-size: 14px;
        }
        
        .script-panel {
            min-height: 100vh;
            border-left: 1px solid #afafaf;
        }
        
        .script-tabs {
            padding: 20px 20px 0;
        }
        
        .script-content .nav-pills .nav-link {
            color: #888;
            background-color: transparent;
            border: 1px solid #555;
            border-radius: 8px;
            margin-right: 6px;
            padding: 10px 12px;
            transition: all 0.3s ease;
            font-size: 14px;
        }
        
         .script-content .nav-pills .nav-link:hover {
            color: #ffffff;
            background-color: #404040;
            border-color: #666;
        }
        
         .script-content .nav-pills .nav-link.active {
            color: #ffffff;
            background: linear-gradient(45deg, #6366f1, #8b5cf6);
            border-color: transparent;
        }
        
        .upload-area {
            border-color: #555 !important;
            transition: all 0.3s ease;
            cursor: pointer;
        }
        .upload-area .btn:focus {
            box-shadow: none;
        }
        
        .upload-area:hover {
            border-color: #007bff !important;
            background-color: rgba(0, 123, 255, 0.1);
        }
        
        .audio-preview {
            border: 1px solid #e5e5e5;
            background-color: rgba(0, 123, 255, 0.1);
        }
        
        .form-range {
            accent-color: #6366f1;
        }
        
        .script-content {
            padding: 20px;
        }
        
        .script-content .form-control, .form-select {
            border: 1px solid #afafaf;
            color: #000000;
            border-radius: 8px;
        }
        
        .form-control:focus, .form-select:focus {
            border-color: #007bff;
            box-shadow: 0 0 0 0.2rem rgba(0, 123, 255, 0.25);
        }
        
        .form-control::placeholder {
            color: #888;
        }
        
        .btn-primary {
            background: linear-gradient(45deg, #6366f1, #8b5cf6);
            border: none;
            border-radius: 8px;
            padding: 16px 30px !important;
            font-weight: 600;
            transition: all 0.3s ease;
        }
        
        .btn-primary:hover {
            transform: translateY(-2px);
            box-shadow: 0 8px 20px rgba(99, 102, 241, 0.3);
        }
        
        .filter-controls {
            padding: 20px;
            border-bottom: 1px solid #404040;
        }
        
        .filter-controls .btn {
            background-color: transparent;
            border: 1px solid #555;
            color: #888;
            margin-right: 10px;
            border-radius: 6px;
        }
        
        .filter-controls .btn:hover {
            background-color: #404040;
            color: #ffffff;
        }
        
        .character-count {
            font-size: 12px;
            color: #888;
            margin-top: 5px;
        }
        
        .avatars-video-content {
            overflow-y: auto;
            max-height: 100vh;
        }
        
        .section-header {
            border-bottom: 1px solid #d3ccff;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }
        
        .section-header h4 {
            margin: 0;
            font-weight: 600;
        }
        
        .header-controls {
            display: flex;
            gap: 15px;
            align-items: center;
            margin-bottom: 15px;
        }
        
        .header-controls a {
            color: #888;
            text-decoration: none;
            font-size: 14px;
        }

        .avatar-card.selected {
            border: 3px solid #007bff;  /* Blue border or choose any color */
            border-radius: 8px;
            box-shadow: 0 0 8px rgba(0, 123, 255, 0.5);
        }
        .preview-video {
            position: relative;
            margin: 60px 20px;
        }
        .preview-card {
            position: relative;
            border-radius: 8px;
            overflow: hidden;
            cursor: pointer;
            transition: transform 0.2s ease;
                margin-bottom: 20px;
        }
         .button--back {
            background-color: #404040;
            color: #ffffff;
            margin-right: 16px;
        }
        .button--back:hover {
            color: #ffffff;
        }
        .button__icon {
            margin-right: 6px;
        }

        
       #generateModal .video-preview {
            width: 100%;
            aspect-ratio: 9/16;
            background: #404040;
            border-radius: 8px;
            margin-bottom: 1.5rem;
            position: relative;
            overflow: hidden;
        }
        
        #generateModal .video-preview img {
            width: 100%;
            height: 100%;
            object-fit: cover;
        }
        
        #generateModal .watermark {
            position: absolute;
            bottom: 10px;
            left: 10px;
            background: rgba(0, 0, 0, 0.7);
            color: white;
            padding: 4px 8px;
            border-radius: 4px;
            font-size: 0.8rem;
            font-weight: 500;
        }
        
       #generateModal .form-label {
            color: #e0e0e0;
            font-weight: 500;
            margin-bottom: 0.5rem;
        }
        
       #generateModal .form-control {
            background-color: #404040;
            border: 1px solid #555;
            border-radius: 8px;
            color: white;
            padding: 0.75rem;
            margin-bottom: 1rem;
        }
        
       #generateModal .form-control:focus {
            background-color: #404040;
            border-color: #6c5ce7;
            color: white;
            box-shadow: 0 0 0 0.2rem rgba(108, 92, 231, 0.25);
        }
        
       #generateModal .btn-group {
            width: 100%;
            margin-bottom: 1rem;
            gap: 15px;
        }
        
       #generateModal .btn-toggle {
            background-color: #404040;
            border: 1px solid #555;
            color: #ccc;
            padding: 0.75rem;
            border-radius: 8px;
            font-weight: 500;
        }
        
        #generateModal .btn-toggle.active {
            background-color: #6c5ce7;
            border-color: #6c5ce7;
            color: white;
        }
        
       #generateModal .btn-toggle:hover {
            background-color: #555;
            border-color: #666;
            color: white;
        }
        
       #generateModal .btn-toggle.active:hover {
            background-color: #5a4ed1;
        }
        
       #generateModal .premium-badge {
            background-color: #ffd700;
            color: #000;
            font-size: 0.75rem;
            padding: 2px 6px;
            border-radius: 4px;
            margin-left: 0.5rem;
            font-weight: 600;
        }
        
       #generateModal .btn-export {
            background-color: #6c5ce7;
            border: none;
            color: white;
            padding: 0.75rem;
            border-radius: 8px;
            font-weight: 600;
            width: 100%;
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 0.5rem;
        }
        
       #generateModal .btn-export:hover {
            background-color: #5a4ed1;
        }
        
       #generateModal .credit-info {
            font-size: 0.9rem;
            color: #ccc;
        }

     </style>

 <?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>

<div class="container-fluid">
  <div class="back-btn mb-3">
                <a href="https://staging.paraclete.ai/public/app/user/ai-avatar" class="btn button--back">
               <i class="fas fa-arrow-left button__icon"></i>Back
        </a>
        </div>
        <div class="row">
            <!-- Main Content -->
            <div class="col-md-9">
                <div class="create-avatars">
                <h5>My Avatar</h5>
                <div class="create-avatar-card">
                    <i class="fas fa-plus"></i>
                    <div>
                        <strong>Create Your</strong><br>
                        <strong>Avatar</strong>
                    </div>
                </div>
            </div>
              <div class="avatars-video-content">
               
                  <div class="section-header">
                   <h5>Public Avatar</h5>
                    <div class="header-controls">
                        <a href="#"><i class="far fa-star"></i> Favorite Avatars</a>
                        <a href="#"><i class="fas fa-filter"></i> Filter</a>
                    </div>
                </div>
                
                    <!-- Avatar cards with sample images -->
                    <div class="avatar-grid" id="avatarGrid">
                        <?php $__currentLoopData = $avatars['result']['data']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $avatar): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <a class="avatar-card" data-id="<?php echo e($avatar['aiavatarId']); ?>">
                                <img src="<?php echo e($avatar['coverUrl']); ?>" alt="<?php echo e($avatar['aiavatarName']); ?>" class="img-fluid rounded" />

                                <div class="avatar-favorite">
                                    <i class="fas fa-crown"></i>
                                </div>
                            </a>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </div>
                    <div class="text-center my-3">
                        <button class="btn btn-primary" id="loadMoreBtn">Load More</button>
                    </div>
                </div>
            </div>
            
            <!-- Right Sidebar - Script Panel -->
            <div class="col-md-3 script-panel">
                <div class="script-tabs">
                    <h4>Script</h4>
                </div>
                
                <div class="script-content">
                    <!-- Bootstrap Tabs -->
                    <ul class="nav nav-pills mb-4" id="audioTabs" role="tablist">
                        <li class="nav-item" role="presentation">
                            <button class="nav-link active" id="text-to-audio-tab" data-bs-toggle="pill" data-bs-target="#text-to-audio" type="button" role="tab">
                                <i class="fas fa-keyboard me-2"></i>Text to audio
                            </button>
                        </li>
                        <li class="nav-item" role="presentation">
                            <button class="nav-link" id="import-audio-tab" data-bs-toggle="pill" data-bs-target="#import-audio" type="button" role="tab">
                                <i class="fas fa-upload me-2"></i>Import audio
                            </button>
                        </li>
                    </ul>
                    
                    <!-- Tab Content -->
                    <div class="tab-content" id="audioTabsContent">
                        <!-- Text to Audio Tab -->
                        <div class="tab-pane fade show active" id="text-to-audio" role="tabpanel">
                            <div class="mb-4">
                                <textarea 
                                    class="form-control" 
                                    rows="12" 
                                    placeholder="Enter the text that needs AI dubbing here..."
                                    id="scriptText"
                                    maxlength="4000"
                                ></textarea>
                                <div class="character-count">
                                    <span id="charCount">0</span>/4000
                                </div>
                            </div>
                           <div class="mb-4">
                                <label class="form-label">AI Voice</label>
                                <select class="form-select" name="ai_voice" id="ai_voice">
                                    <?php $__currentLoopData = $voices; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $voice): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <option value="<?php echo e($voice['voiceId']); ?>">
                                            <?php echo e($voice['voiceName']); ?>

                                        </option>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </select>
                            </div>
                        </div>
                        
                        <!-- Import Audio Tab -->
                        <div class="tab-pane fade" id="import-audio" role="tabpanel">
                            <div class="mb-4">
                                <label class="form-label">Upload Audio File</label>
                                <div class="upload-area p-4 border border-2 border-dashed rounded text-center">
                                    <i class="fas fa-cloud-upload-alt fa-3x mb-3 text-muted"></i>
                                    <p class="mb-2">Drag and drop your audio file here</p>
                                    <p class="text-muted small mb-3">Supported formats: MP3, WAV, M4A (Max 10MB)</p>
                                    <input type="file" class="form-control d-none" id="audioFile" accept=".mp3,.wav,.m4a">
                                    <button class="btn" onclick="document.getElementById('audioFile').click()">
                                        <i class="fas fa-folder-open me-2"></i>Browse Files
                                    </button>
                                </div>
                            </div>
                            
                            <div class="mb-4">
                                <label class="form-label">Audio Preview</label>
                                <div class="audio-preview p-3 rounded">
                                    <div class="d-flex align-items-center">
                                        <i class="fas fa-music me-3 text-muted"></i>
                                        <div class="flex-grow-1">
                                            <div class="text-muted small">No audio file selected</div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            
                        </div>
                    </div>
                    
                    <!-- Common Controls -->
                    <div class="mb-4">
                        <label class="form-label">Subtitle Style</label>
                        <a href="#" class="btn btn-outline-primary" data-bs-toggle="modal" data-bs-target="#subtitleModal">
                           <svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" fill="#000000" viewBox="0 0 24 24" focusable="false" class="chakra-icon css-1w11yih"><path fill="#000000" d="M12 2c5.5 0 10 4.5 10 10s-4.5 10-10 10S2 17.5 2 12 6.5 2 12 2m0 2c-1.9 0-3.6.6-4.9 1.7l11.2 11.2c1-1.4 1.7-3.1 1.7-4.9 0-4.4-3.6-8-8-8m4.9 14.3L5.7 7.1C4.6 8.4 4 10.1 4 12c0 4.4 3.6 8 8 8 1.9 0 3.6-.6 4.9-1.7"></path></svg>
                        </a>
                    </div>
                    
                    <button class="btn btn-primary w-100 mb-3" id="generateButton" data-bs-toggle="modal" data-bs-target="#generateModal">
                        <i class="fas fa-play me-2"></i>
                        Generate 
                        <span class="badge bg-light text-dark ms-2">1 ⚡</span>
                    </button>

                </div>
            </div>
        </div>
    </div>
<div id="loader" style="display:none;">Loading video, please wait...</div>

<div class"preview-video">
   <div class="row">
      <div class="col-lg-2 col-md-6">
        <div class="preview-card">
        <video id="previewVideo" controls style="display:none; width: 100%; max-width: 600px;">
            <source id="videoSource" src="" type="video/mp4">
            Your browser does not support the video tag.
        </video>
        </div>
        </div>
    </div>
</div>

<!-- Generate Modal  -->
  <div class="modal fade" id="generateModal" tabindex="-1" aria-labelledby="createAvatarModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg modal-dialog-centered">
            <div class="modal-content bg-dark text-white border-0" style="border-radius: 20px; background: #1a1a1a !important;">
                <div class="modal-header mt-2 pb-2">
                    <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body p-4">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="video-preview">
                                <img src="<?php echo e($avatar['coverUrl']); ?>" alt="<?php echo e($avatar['aiavatarName']); ?>" class="img-fluid rounded" />
                                <div class="watermark">AI AVATAR</div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label class="form-label">Filename</label>
                                <input type="text" class="form-control" value="Untitled video" id="filename">
                            </div>
                            
                            <div class="mb-3">
                                <label class="form-label">Resolution</label>
                                <div class="btn-group" role="group">
                                    <button type="button" class="btn btn-toggle active" onclick="toggleResolution(this)">720P</button>
                                    <button type="button" class="btn btn-toggle" onclick="toggleResolution(this)">
                                        1080P <span class="premium-badge">👑</span>
                                    </button>
                                </div>
                            </div>
                            
                            <div class="mb-3">
                                <label class="form-label">AI Avatar Watermark</label>
                                <div class="btn-group" role="group">
                                    <button type="button" class="btn btn-toggle active" onclick="toggleWatermark(this)">On</button>
                                    <button type="button" class="btn btn-toggle" onclick="toggleWatermark(this)">
                                        Off <span class="premium-badge">👑</span>
                                    </button>
                                </div>
                            </div>
                            
                            <button type="button" class="btn btn-export" onclick="exportVideo()">
                                Export <span class="credit-info">💰 1</span>
                            </button>
                        </div>
                </div>
            </div>
        </div>
    </div>

<a href="#" id="downloadBtn" style="display:none;" class="btn btn-primary" download>Download Video</a>
<!-- Subtitle Style Modal -->
<div class="modal fade" id="subtitleModal" tabindex="-1" aria-labelledby="subtitleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg modal-dialog-scrollable">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Subtitle Style</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      
      <div class="modal-body">
        <div class="row g-2">
            <?php $__currentLoopData = $captions['result']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $caption): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <div class="col-3">
                    <div class="border p-1 rounded text-center caption-item" 
                         data-caption-id="<?php echo e($caption['captionId']); ?>" 
                         style="cursor: pointer;">
                        <img src="<?php echo e($caption['thumbnail']); ?>" alt="Caption Thumbnail" class="img-fluid rounded">
                    </div>
                </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </div>
      </div>
      
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
        <button type="button" class="btn btn-primary" id="confirmCaption">Confirm</button>
      </div>
    </div>
  </div>
</div>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('js'); ?>

<!-- jQuery -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<script src="<?php echo e(URL::asset('plugins/sweetalert/sweetalert2.all.min.js')); ?>"></script>
<script src="<?php echo e(URL::asset('plugins/pdf/html2canvas.min.js')); ?>"></script>
<script src="<?php echo e(URL::asset('plugins/pdf/jspdf.umd.min.js')); ?>"></script>
<script src="<?php echo e(URL::asset('plugins/highlight/highlight.min.js')); ?>"></script>
<script src="<?php echo e(URL::asset('plugins/highlight/showdown.min.js')); ?>"></script>
<script src="<?php echo e(theme_url('js/export-chat.js')); ?>"></script>

<script>
        // Character counter
        const scriptText = document.getElementById('scriptText');
        const charCount = document.getElementById('charCount');
        
        scriptText.addEventListener('input', function() {
            charCount.textContent = this.value.length;
        });
        
        // Generate button animation
        document.querySelector('.btn-primary').addEventListener('click', function() {
            this.innerHTML = '<i class="fas fa-spinner fa-spin me-2"></i>Generating...';
            this.disabled = true;
            
            setTimeout(() => {
                this.innerHTML = '<i class="fas fa-play me-2"></i>Generate <span class="badge bg-light text-dark ms-2">1 ⚡</span>';
                this.disabled = false;
            }, 3000);
        });
        
        // Avatar selection
        document.querySelectorAll('.avatar-card').forEach(card => {
            card.addEventListener('click', function() {
                document.querySelectorAll('.avatar-card').forEach(c => c.classList.remove('selected'));
                this.classList.add('selected');
            });
        });
        
        // File upload handling
        document.getElementById('audioFile').addEventListener('change', function(e) {
            const file = e.target.files[0];
            if (file) {
                const preview = document.querySelector('.audio-preview .flex-grow-1 .text-muted');
                preview.innerHTML = `
                    <div class="text-dark">${file.name}</div>
                    <div class="small text-muted">${(file.size / (1024 * 1024)).toFixed(2)} MB</div>
                `;
                
                // Add audio element for preview
                const audioElement = document.createElement('audio');
                audioElement.src = URL.createObjectURL(file);
                audioElement.controls = true;
                audioElement.className = 'w-100 mt-2';
                audioElement.style.height = '40px';
                
                const existingAudio = document.querySelector('.audio-preview audio');
                if (existingAudio) {
                    existingAudio.remove();
                }
                
                document.querySelector('.audio-preview').appendChild(audioElement);
            }
        });
        
        // Drag and drop functionality
        const uploadArea = document.querySelector('.upload-area');
        
        ['dragenter', 'dragover', 'dragleave', 'drop'].forEach(eventName => {
            uploadArea.addEventListener(eventName, preventDefaults, false);
        });
        
        function preventDefaults(e) {
            e.preventDefault();
            e.stopPropagation();
        }
        
        ['dragenter', 'dragover'].forEach(eventName => {
            uploadArea.addEventListener(eventName, highlight, false);
        });
        
        ['dragleave', 'drop'].forEach(eventName => {
            uploadArea.addEventListener(eventName, unhighlight, false);
        });
        
        function highlight(e) {
            uploadArea.style.borderColor = '#007bff';
            uploadArea.style.backgroundColor = 'rgba(0, 123, 255, 0.1)';
        }
        
        function unhighlight(e) {
            uploadArea.style.borderColor = '#555';
            uploadArea.style.backgroundColor = '#333';
        }
        
        uploadArea.addEventListener('drop', handleDrop, false);
        
        function handleDrop(e) {
            const dt = e.dataTransfer;
            const files = dt.files;
            
            if (files.length > 0) {
                document.getElementById('audioFile').files = files;
                const event = new Event('change', { bubbles: true });
                document.getElementById('audioFile').dispatchEvent(event);
            }
        }
        let currentPage = 1;
        const pageSize = 20;
        let totalPages = null;

    function loadAvatars(page = 1) {
        $.ajax({
            url: '<?php echo e(route('aiavatar.list')); ?>',
            data: { pageNo: page, pageSize: pageSize },
            type: 'GET',
            success: function(response) {
                if (response?.result?.data?.length) {
                    response.result.data.forEach(avatar => {
                        $('#avatarGrid').append(`
                            <a href="#" class="avatar-card" data-id="${avatar.aiavatarId}">
                                <img src="${avatar.coverUrl}" alt="${avatar.aiavatarName}" class="img-fluid rounded" />
                                <div class="avatar-favorite"><i class="fas fa-crown"></i></div>
                            </a>
                        `);
                    });
                    const total = response.result.total;
                    totalPages = Math.ceil(total / pageSize);

                    if (currentPage >= totalPages) {
                        $('#loadMoreBtn').hide();
                    }
                } else {
                    $('#loadMoreBtn').hide();
                }
            },
            error: function() {
                alert('Error loading avatars.');
            }
        });
    }

    // Load first page on document ready
    $(document).ready(function() {
        // loadAvatars(currentPage);

        $('#loadMoreBtn').click(function() {
            currentPage++;
            loadAvatars(currentPage);
        });
    });

    $('#generateButton').on('click', function(e) {
        e.preventDefault();

        let aiAvatarId = $('.avatar-card.selected').data('id'); // selected avatar
        let voiceoverId = $('#ai_voice').val(); // selected voice
        let ttsText = $('#scriptText').val(); // text entered

        if(!aiAvatarId || !voiceoverId || !ttsText) {
        console.log(aiAvatarId + voiceoverId + ttsText); // Should print the selected avatarId in console
            alert('Please select avatar, voice and enter text.');
            return;
        }

        $.ajax({
            url: "<?php echo e(route('generate.avatar.video')); ?>", // Define route below
            type: 'POST',
            data: {
                aiAvatarId: aiAvatarId,
                voiceoverId: voiceoverId,
                ttsText: ttsText,
            },
            headers: {
                'X-CSRF-TOKEN': '<?php echo e(csrf_token()); ?>'
            },
            success: function(response) {
                pollForVideo(response.result.taskId);
            },
            error: function(err) {
                console.log(err);
                alert('Error generating video.');
            }
        });
    });
    function pollForVideo(taskId) {
        const loader = document.getElementById('loader');
        const previewVideo = document.getElementById('previewVideo');
        const videoSource = document.getElementById('videoSource');
        const downloadBtn = document.getElementById('downloadBtn');

        loader.style.display = 'block';
        previewVideo.style.display = 'none';
        downloadBtn.style.display = 'none';

        const interval = setInterval(() => {
            fetch("<?php echo e(route('check.video.status', ':taskId')); ?>".replace(':taskId', taskId))
                .then(response => response.json())
                .then(data => {
                    if (data.result && data.result.status === 'success' && data.result.outputVideoUrl) {
                        clearInterval(interval);

                        const videoUrl = data.result.outputVideoUrl;
                        loader.style.display = 'none';

                        videoSource.src = videoUrl;
                        previewVideo.load();
                        previewVideo.style.display = 'block';

                        // Set download button
                        downloadBtn.href = videoUrl;
                        downloadBtn.style.display = 'inline-block';
                    }
                })
                .catch(error => console.error(error));
        }, 5000); // poll every 5 seconds
    }
    let selectedCaptionId = null;

    document.querySelectorAll('.caption-item').forEach(item => {
        item.addEventListener('click', function() {
            document.querySelectorAll('.caption-item').forEach(i => i.classList.remove('border-primary'));
            this.classList.add('border-primary');
            selectedCaptionId = this.getAttribute('data-caption-id');
        });
    });

    document.getElementById('confirmCaption').addEventListener('click', function() {
        if (selectedCaptionId) {
            console.log('Selected Caption ID:', selectedCaptionId);
            // Set to hidden input field or use for next API request
            // Example: document.getElementById('captionInput').value = selectedCaptionId;
            // Close modal
            const modal = bootstrap.Modal.getInstance(document.getElementById('subtitleModal'));
            modal.hide();
        } else {
            alert('Please select a subtitle style.');
        }
    });
    </script>

   <script>
        function toggleResolution(button) {
            // Remove active class from all resolution buttons
            const resolutionButtons = button.parentElement.querySelectorAll('.btn-toggle');
            resolutionButtons.forEach(btn => btn.classList.remove('active'));
            
            // Add active class to clicked button
            button.classList.add('active');
        }
        
        function toggleWatermark(button) {
            // Remove active class from all watermark buttons
            const watermarkButtons = button.parentElement.querySelectorAll('.btn-toggle');
            watermarkButtons.forEach(btn => btn.classList.remove('active'));
            
            // Add active class to clicked button
            button.classList.add('active');
            
            // Show/hide watermark in preview
            const watermark = document.querySelector('.watermark');
            if (button.textContent.includes('Off')) {
                watermark.style.display = 'none';
            } else {
                watermark.style.display = 'block';
            }
        }
        
        function exportVideo() {
            const filename = document.getElementById('filename').value;
            const activeResolution = document.querySelector('.btn-toggle.active').textContent.includes('720P') ? '720P' : '1080P';
            const watermarkOn = document.querySelector('.watermark').style.display !== 'none';
            
            alert(`Exporting video:\nFilename: ${filename}\nResolution: ${activeResolution}\nWatermark: ${watermarkOn ? 'On' : 'Off'}`);
        }
    </script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/customer/www/staging.paraclete.ai/public_html/resources/views/classic/user/topview/avatar-video-creation.blade.php ENDPATH**/ ?>