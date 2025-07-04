  @extends('layouts.app')
  @section('css')
  
  <!-- Sweet Alert CSS -->
  <link href="{{URL::asset('plugins/sweetalert/sweetalert2.min.css')}}" rel="stylesheet" />
  <link href="{{URL::asset('plugins/highlight/highlight.dark.min.css')}}" rel="stylesheet" />
  <!-- Slick CSS -->
  <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.css" />
  <link rel="stylesheet" type="text/css"
    href="https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick-theme.css" />

    <style>
        .app-content .side-app {
            max-width: 100% !important;
        }
        .all-product-template {
            position: relative;
            margin: 40px 0;
        }
      .header-section {
            padding: 20px 0 10px;
            border-bottom: 1px solid #cfcfcf;
        }
        .header-section .btn-outline-light {
            color: #6e6e6e;
            border-color: #6e6e6e;
        }
        .header-section h2 {
             font-size: 16px;
             line-height: 24px;
        }
        .filter-tabs {
            margin: 20px 0;
        }
        
        .filter-tabs .nav-pills .nav-link {
                background: #edebff;
            border: none;
            color: #000000;
            border-radius: 6px;
            padding: 8px 16px;
            margin: 2px;
            font-size: 14px;
            transition: all 0.2s;
        }
        
        .filter-tabs .nav-pills .nav-link.active {
            background-color: #4f46e5;
            color: white;
        }
        
        .filter-tabs .nav-pills .nav-link:hover {
            color: #fff;
            background-color: #3a3a3a;
        }
        
        .avatar-grid {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(130px, 1fr));
            gap: 15px;
            padding: 20px 0;
        }
        
        .avatar-card {
            background-color: #2a2a2a;
            border-radius: 12px;
            overflow: hidden;
            cursor: pointer;
            transition: all 0.3s ease;
            border: 2px solid transparent;
            position: relative;
        }
        
        .avatar-card:hover {
            transform: translateY(-2px);
            border-color: #4f46e5;
            box-shadow: 0 8px 25px rgba(79, 70, 229, 0.3);
        }
        
        .avatar-card.selected {
            border-color: #4f46e5;
            box-shadow: 0 0 20px rgba(79, 70, 229, 0.5);
        }
        
        .avatar-image {
            width: 100%;
            height: 260px;
            object-fit: cover;
            background-color: #3a3a3a;
        }
        
        .upload-card {
            background: linear-gradient(135deg, #4f46e5, #7c3aed);
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            height: 260px;
            border-radius: 12px;
            cursor: pointer;
            transition: all 0.3s ease;
            color: #ffffff;
        }
        
        .upload-card:hover {
            transform: translateY(-2px);
            box-shadow: 0 8px 25px rgba(79, 70, 229, 0.4);
        }
        
        .sidebar {
                border: 1px dashed #533afd;
              background-color: rgba(83, 58, 253, 0.1);
            border-radius: 12px;
            padding: 20px;
            height: fit-content;
            position: sticky;
            top: 90px;
        }
        
       .sidebar .preview-image {
            width: 100%;
            height: 420px;
            object-fit: cover;
            border-radius: 8px;
            background-color: #3a3a3a;
        }
        
        .sidebar .btn-primary {
            background-color: #4f46e5;
            border-color: #4f46e5;
            border-radius: 8px;
            padding: 12px 24px;
            font-weight: 500;
        }
        
       .sidebar.btn-primary:hover {
            background-color: #4338ca;
            border-color: #4338ca;
        }
        
       .control-icons {
            position: absolute;
            bottom: 10px;
            right: 10px;
            display: flex;
            gap: 8px;
        }
        .sidebar .btn-check:focus+.btn, 
        .sidebar .btn:focus {
            outline: 0;
            box-shadow: none;
        }
        .control-icon {
            background-color: rgba(0, 0, 0, 0.7);
            color: white;
            border: none;
            border-radius: 50%;
            width: 30px;
            height: 30px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 12px;
        }
        
        .premium-badge {
            position: absolute;
            top: 8px;
            right: 8px;
            background-color: #f59e0b;
            color: white;
            border-radius: 4px;
            padding: 2px 6px;
            font-size: 10px;
            font-weight: bold;
        }
        .upload-product {
            width: 100%;
            height: 80px;
            padding: 15px;
            background: #533afd;
            border-radius: 12px;
            color: #ffffff;
            text-align: center;
            display: flex;
            align-items: center;
            justify-content: center;
        }
        .border-top textarea.form-control {
            background: transparent;
            color: #222222;
            border-color: #bdbdbd;
            border-radius: 6px;
            font-size: 14px;
        }
         .sidebar .btn-primary {
            font-size: 12px;
            padding: 10px 15px;
        }

        .css-oat1va {
             height: fit-content;
            position: sticky;
              top: 40%;
             transform: translateY(-50%);
            display: flex;
            -webkit-box-align: center;
            align-items: center;
            -webkit-box-pack: center;
            justify-content: center;
            width: 100%;
            flex-direction: column;
            gap: 24px;
        }
        .css-7tgloy {
            display: grid;
            gap: 12px;
            grid-template-columns: repeat(2, minmax(0px, 1fr));
        }
        .css-1lvyju6 {
            box-shadow: 1px 2px 20px #eeeeee;
            border: 1px solid #eeeeee;
            display: flex;
            width: 80px;
            height: 80px;
            background: rgb(255, 255, 255);
            border-radius: 8px;
            overflow: hidden;
            cursor: pointer;
        }
        .css-18nqvg3 {
            object-fit: contain;
            width: 100%;
            height: 100%;
        }
        #avatar-gallery .col-lg-6 {
              padding: 0 5px;
        }
        #avatar-gallery .avatar-card {
               background-color: rgba(83, 58, 253, 0.1);
            border: 1px solid rgba(255, 255, 255, 0.2);
            border-radius: 20px;
            padding: 10px;
            transition: transform 0.3s ease, box-shadow 0.3s ease;
        }
        
        #avatar-gallery .avatar-image {
            width: 100%;
            height: 300px;
            object-fit: cover;
            border-radius: 15px;
            position: relative;
        }
        
        #avatar-gallery .product-overlay {
            position: absolute;
            bottom: 10px;
            right: 10px;
            background: rgba(255, 255, 255, 0.9);
            padding: 5px 10px;
            border-radius: 10px;
            font-size: 12px;
            font-weight: bold;
            color: #333;
        }
        
        #avatar-gallery .avatar-title {
            color: white;
            font-weight: 600;
            margin-top: 15px;
            text-align: center;
        }
        
        #avatar-gallery .btn-custom {
               background: linear-gradient(135deg, #4f46e5, #7c3aed);
            border: none;
            border-radius: 25px;
            padding: 10px 10px;
            color: white;
            font-weight: 500;
            transition: all 0.3s ease;
                font-size: 14px;
        }
        
       #avatar-gallery .btn-custom:hover {
            transform: translateY(-2px);
            color: white;
        }
        
        #avatar-gallery .btn-export {
            background: linear-gradient(45deg, #4ecdc4, #44a08d);
            border: none;
            border-radius: 25px;
            padding: 12px 30px;
            color: white;
            font-weight: 600;
            transition: all 0.3s ease;
            box-shadow: 0 4px 15px rgba(78, 205, 196, 0.3);
        }
        
        #avatar-gallery .btn-export:hover {
            transform: translateY(-2px);
            box-shadow: 0 6px 20px rgba(78, 205, 196, 0.4);
            color: white;
        }
        
        #avatar-gallery .play-btn {
               position: absolute;
                top: 50%;
                left: 50%;
                transform: translate(-50%, -50%);
                background: #533afd;
                border: none;
                border-radius: 50%;
                width: 40px;
                height: 40px;
                font-size: 14px;
                color: #ffffff;
                box-shadow: 0 4px 15px rgba(0, 0, 0, 0.2);
                transition: all 0.3s ease;
        }
        #avatar-gallery .avatar-card .avatar-header {
           display: flex;
            align-items: center;
            justify-content: space-between;
            padding-bottom: 4px;
        }    
        #avatar-gallery .play-btn:hover {
            background: white;
            color: #533afd;
            transform: translate(-50%, -50%) scale(1.1);
        }
        
       #avatar-gallery .avatar-container {
            position: relative;
            overflow: hidden;
            border-radius: 15px;
        }
        
       #avatar-gallery .main-title {
            color: white;
            text-align: center;
            margin-bottom: 40px;
            font-weight: 700;
            text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.3);
        }
        
       .avatar-container .avatar-video {
            width: 100%;
            height: 300px;
            object-fit: cover;
            object-position: bottom;
        }
        .modal-header .btn-close {
          opacity: 1;
        }
        .modal-body p {
             font-size: 14px;
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
    </style>

     @endsection

     @section('content')

    <div class="all-product-template">
        <div class="container-fluid">
          <div class="back-btn my-2">
                <a href="https://staging.paraclete.ai/public/app/user/ai-avatar" class="btn button--back">
               <i class="fas fa-arrow-left button__icon"></i>Back
        </a>
          </div>
            <div class="row">
                <!-- Main Content -->
                <div class="col-lg-6">
                    <div class="header-section">
                        <div class="d-flex justify-content-between align-items-center">
                            <h2 class="mb-0">Choose an Avatar Template</h2>
                            <div class="d-flex gap-2">
                                <button class="btn btn-outline-light btn-sm">
                                    <i class="fas fa-filter"></i> Filter
                                </button>
                                <button class="btn btn-outline-light btn-sm">
                                    <i class="fas fa-heart"></i>
                                </button>
                            </div>
                        </div>
                    </div>

                    <!-- Filter Tabs -->
                    <div class="filter-tabs">
                          <ul class="nav nav-pills flex-wrap" id="filterTabs">
                            {{-- "All" button --}}
                            <li class="nav-item">
                                <button class="nav-link active" onclick="selectCategory('all')">All</button>
                            </li>

                            {{-- Dynamic Category Buttons --}}
                            @foreach ($categories['result'] as $category)
                                <li class="nav-item">
                                    <button class="nav-link" 
                                   onclick="selectCategory('{{ $category['categoryId'] }}')">
                                        {{ $category['categoryName'] }}
                                    </button>
                                </li>
                            @endforeach
                        </ul>
                    </div>

                    <!-- Avatar Grid -->
                    <div class="avatar-grid" id="avatarGrid">
                        <!-- Upload Card -->
                        <div class="upload-card" data-bs-toggle="tooltip" title="Use My Photo">
                            <i class="fas fa-plus fa-2x mb-2"></i>
                            <span class="small">Use My Photo</span>
                        </div>

                        <!-- Avatar Templates -->
                        <!-- Avatar Cards -->
                        @foreach ($product_avatar_temp['result']['data'] as $avatar)
                            <div class="avatar-card" 
                                data-avatar="{{ $avatar['avatarId'] }}"
                                data-category="{{ collect($avatar['avatarCategoryList'])->pluck('categoryName')->implode(' ') ?: 'general all' }}">
                                
                                @if ($avatar['minSubsType'] !== 'starter')
                                    <div class="premium-badge">VIP</div>
                                @endif

                                <img src="{{ trim($avatar['avatarImagePath']) }}" alt="Avatar" class="avatar-image">

                                <div class="control-icons">
                                    <button class="control-icon" title="Camera"><i class="fa-regular fa-star"></i></button>
                                    <button class="control-icon" title="Refresh"><i class="fas fa-redo"></i></button>
                                </div>
                            </div>
                        @endforeach
                    </div>
                    
                        <button id="loadMoreBtn" class="btn btn-primary">Load More</button>
                </div>

                <!-- Sidebar -->
                <div class="col-lg-3">
                    <div class="sidebar">
                        <img src="https://images.unsplash.com/photo-1438761681033-6461ffad8d80?w=300&h=300&fit=crop&crop=face" alt="Selected Avatar" class="preview-image mb-3">
                        <input type="hidden" id="selectedAvatarId" name="avatarId" />
                        <input type="hidden" id="selectedCategoryId" name="categoryId" />

                        <div class="upload-product mb-3" id="uploadProductBtn" style="cursor:pointer;">
                            <i class="fas fa-upload me-2"></i>
                            <span>Upload Product Image</span>
                        </div>
                        <input type="file" id="productImageInput" accept="image/*" style="display:none;">

                        <button class="btn btn-link text-decoration-none p-0 mb-3" data-bs-toggle="collapse" data-bs-target="#moreOptions">
                            <i class="fas fa-chevron-down me-2"></i>
                            More Options
                        </button>

                        <div class="collapse" id="moreOptions">
                            <div class="border-top pt-3 mb-3">
                              <h5>Tell the AI how to blend the product with the model</h5>
                                <textarea class="form-control" placeholder="Replace the item in the scene of Image 1 with the item from Image 2. Keep the person's composition and position from Image 1 unchanged, and adjust the hand gesture to fit the size and appearance of the new item. The item must be exactly the same as in Image 2." maxlength="5000" rows="10" ></textarea>
                            </div>
                            <div class="mb-3">
                                <h5>Manual Mode</h5>
                                <p class="text-muted">In manual mode, you can precisely control the size, angle, and dimensions of the synthesized product by manually adjusting the product's layer</p>
                            </div>
                        </div>

                        <button class="btn btn-primary w-100" id="generateBtn">Generate</button>
                    </div>
                </div>

                <div class="col-lg-3 d-none response-result">
                  <div class="d-none">
                    <div class="css-oat1va">
                        <div class="css-7tgloy">
                        <div class="css-1lvyju6">
                            <img src="https://d1735p3aqhycef.cloudfront.net/aigc-web/public/product-avatar/product_samples/product_sample_01.png" class="chakra-image css-18nqvg3">
                        </div>
                        <div class="css-1lvyju6">
                            <img src="https://d1735p3aqhycef.cloudfront.net/aigc-web/public/product-avatar/product_samples/product_sample_02.png" class="chakra-image css-18nqvg3">
                        </div>
                        <div class="css-1lvyju6">
                            <img src="https://d1735p3aqhycef.cloudfront.net/aigc-web/public/product-avatar/product_samples/product_sample_03.png" class="chakra-image css-18nqvg3">
                        </div>
                        <div class="css-1lvyju6">
                            <img src="https://d1735p3aqhycef.cloudfront.net/aigc-web/public/product-avatar/product_samples/product_sample_04.png" class="chakra-image css-18nqvg3">
                        </div>
                      </div>
                      <p class="chakra-text css-13sga99">Click to Try Samples</p></div>
                </div>

                 <div id="avatar-gallery" class="row">
                    <!-- Avatar Card 1 -->
                    <div class="col-lg-6 mb-4">
                        <div class="avatar-card">
                            <div class="avatar-header">
                                <div class="">
                                    <i class="fa-regular fa-image"></i> Image
                                </div>
                                <div class="action-btn">
                                    <button class="btn btn-link p-1" type="button" data-bs-toggle="dropdown" aria-expanded="false" style="color: #1e1e2d;width: 35px; height: 35px;">
                                        <i class="fas fa-ellipsis-v"></i>
                                    </button>
                                    <ul class="dropdown-menu dropdown-menu-end border-none bg-dark" style="background: rgba(42, 42, 42, 0.95) !important; backdrop-filter: blur(10px); border-radius: 10px; min-width: 160px;">
                                        <li><a class="dropdown-item text-white d-flex align-items-center gap-2 py-2" href="#" data-bs-toggle="modal" data-bs-target="#viewInputModal">
                                            <i class="fas fa-eye"></i>View Inputs
                                        </a></li>
                                        <li><a class="dropdown-item text-white d-flex align-items-center gap-2 py-2" href="#" onclick="downloadAvatar()">
                                            <i class="fas fa-download"></i>Download
                                        </a></li>
                                        <li><a class="dropdown-item text-white d-flex align-items-center gap-2 py-2" href="#" onclick="giveFeedback()">
                                            <i class="fas fa-comment"></i>Feedback
                                        </a></li>
                                        <li><hr class="dropdown-divider"></li>
                                        <li><a class="dropdown-item d-flex align-items-center text-white gap-2 py-2" href="#" onclick="deleteAvatar()">
                                            <i class="fas fa-trash"></i>Delete
                                        </a></li>
                                    </ul>
                                </div>
                             </div>
                            <div class="avatar-container">
                               <img src="{{ trim($avatar['avatarImagePath']) }}" alt="Avatar" class="avatar-image"> 
                            </div>
                            <div class="text-center mt-3">
                                <button class="btn btn-custom" data-bs-toggle="modal" data-bs-target="#createAvatarModal">
                                    <i class="fas fa-plus me-2"></i>Create Avatar
                                </button>
                            </div>
                        </div>
                    </div>
                    
                    <!-- Avatar Card 3 with Video -->
                    <div class="col-lg-6 mb-4">
                        <div class="avatar-card">
                           <div class="avatar-header">
                                <div class="">
                                    <i class="fa-regular fa-video"></i> Avatar
                                </div>
                                <div class="action-btn">
                                    <button class="btn btn-link p-1" type="button" data-bs-toggle="dropdown" aria-expanded="false" style="color: #1e1e2d;width: 35px; height: 35px;">
                                        <i class="fas fa-ellipsis-v"></i>
                                    </button>
                                   <ul class="dropdown-menu dropdown-menu-end border-none bg-dark" style="background: rgba(42, 42, 42, 0.95) !important; backdrop-filter: blur(10px); border-radius: 10px; min-width: 160px;">
                                        <li><a class="dropdown-item text-white d-flex align-items-center gap-2 py-2" href="#">
                                            <i class="fas fa-eye"></i>View Inputs
                                        </a></li>
                                        <li><a class="dropdown-item text-white d-flex align-items-center gap-2 py-2" href="#" onclick="downloadAvatar()">
                                            <i class="fas fa-download"></i>Download
                                        </a></li>
                                        <li><a class="dropdown-item text-white d-flex align-items-center gap-2 py-2" href="#" onclick="giveFeedback()">
                                            <i class="fas fa-comment"></i>Feedback
                                        </a></li>
                                         <li><a class="dropdown-item text-white d-flex align-items-center gap-2 py-2" href="#" onclick="giveFeedback()">
                                            <i class="fa-regular fa-arrows-rotate"></i> Regenerate
                                        </a></li>
                                        
                                        <li><hr class="dropdown-divider"></li>
                                        <li><a class="dropdown-item text-white d-flex align-items-center gap-2 py-2" href="#" onclick="deleteAvatar()">
                                            <i class="fas fa-trash"></i>Delete
                                        </a></li>
                                    </ul>
                                </div>
                             </div>
                            <div class="avatar-container" data-bs-toggle="modal" data-bs-target="#videoPreviewModal">
                               <video class="avatar-video" autoplay muted loop playsinline>
                                    <source src="{{ URL::asset('img/ai-avtar/analyzed_video.mp4') }}" type="video/mp4">
                                    Your browser does not support the video tag.
                                </video>

                                <button class="play-btn">
                                    <i class="fas fa-play"></i>
                                </button>
                            </div>
                            <div class="text-center mt-3">
                                <button class="btn btn-custom">
                                    <i class="fas fa-video me-2"></i>Use My Script
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
                      
                </div>
            </div>
        </div>
    </div>

    <!-- View Input Modal -->
    <div class="modal fade" id="viewInputModal" tabindex="-1" aria-labelledby="createAvatarModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg modal-dialog-centered">
            <div class="modal-content bg-dark text-white border-0" style="border-radius: 20px; background: #1a1a1a !important;">
                <div class="modal-header mt-2 pb-2">
                    <h5 class="modal-title text-white fw-bold" id="createAvatarModalLabel">View Inputs</h5>
                    <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body p-4">
                    <div class="row">
                        <!-- Image Upload Section -->
                        <div class="col-md-4 col-6 mb-4">
                            <div class="image-upload-container position-relative" style="height: 400px; border-radius: 15px; overflow: hidden; background: #2a2a2a;">
                                <img id="avatarPreview" src="{{ trim($avatar['avatarImagePath']) }}" 
                                     class="w-100 h-100" style="object-fit: cover; cursor: pointer;">
                             
                                <!-- Download Button -->
                                <div class="position-absolute" style="bottom: 20px; left: 20px; z-index: 10;">
                                    <button class="btn btn-outline-light btn-sm rounded-pill" style="width: 40px; height: 40px;">
                                        <i class="fas fa-download"></i>
                                    </button>
                                </div>
                            </div>
                             <p class="text-white mt-2">Product Image</p>
                        </div>
                         <div class="col-md-4 col-6 mb-4">
                            <div class="image-upload-container position-relative" style="height: 400px; border-radius: 15px; overflow: hidden; background: #2a2a2a;">
                                <img id="avatarPreview" src="{{ trim($avatar['avatarImagePath']) }}" 
                                     class="w-100 h-100" style="object-fit: cover; cursor: pointer;">
                            
                                <!-- Download Button -->
                                <div class="position-absolute" style="bottom: 20px; left: 20px; z-index: 10;">
                                    <button class="btn btn-outline-light btn-sm rounded-pill" style="width: 40px; height: 40px;">
                                        <i class="fas fa-download"></i>
                                    </button>
                                </div>
                            </div>
                               <p class="text-white mt-2">Product Image</p>
                        </div>
                         <div class="col-md-4 col-6 mb-4">
                            <div class="image-upload-container position-relative" style="height: 400px; border-radius: 15px; overflow: hidden; background: #2a2a2a;">
                                <img id="avatarPreview" src="{{ trim($avatar['avatarImagePath']) }}" 
                                     class="w-100 h-100" style="object-fit: cover; cursor: pointer;">
                              
                                <!-- Download Button -->
                                <div class="position-absolute" style="bottom: 20px; left: 20px; z-index: 10;">
                                    <button class="btn btn-outline-light btn-sm rounded-pill" style="width: 40px; height: 40px;">
                                        <i class="fas fa-download"></i>
                                    </button>
                                </div> 
                             </div>
                              <p class="text-white mt-2">Product Image</p>
                        </div>
                       
                    </div>
                </div>
            </div>
        </div>
    </div>

  <!-- Video Preview Modal -->
    <div class="modal fade" id="videoPreviewModal" tabindex="-1" aria-labelledby="videoPreviewModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg modal-dialog-centered">
            <div class="modal-content bg-dark text-white border-0" style="border-radius: 20px; background: #1a1a1a !important;">
                <div class="modal-header mt-2 pb-2">
                    <h5 class="modal-title text-white fw-bold" id="videoPreviewModalLabel">Preview Video</h5>
                    <div class="d-flex align-items-center gap-3">
                        <a class="d-flex align-items-center gap-2 text-white">
                            <i class="fas fa-eye"></i>
                            <span>View Inputs</span>
                        </a>
                        <a class="d-flex align-items-center gap-2 text-white">
                            <i class="fas fa-comment"></i>
                            <span>Feedback</span>
                        </a>
                        <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                </div>
                <div class="modal-body p-4 text-center">
                    <!-- Video Container -->
                    <div class="video-container position-relative mx-auto mb-4" style="max-width: 400px; border-radius: 15px; overflow: hidden; background: #2a2a2a;">
                        <video id="avatarVideo" class="w-100" style="height: 500px; object-fit: cover;" poster="data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='400' height='500' viewBox='0 0 400 500'%3E%3Crect width='400' height='500' fill='%23333'/%3E%3Ctext x='200' y='230' font-family='Arial' font-size='18' fill='%23666' text-anchor='middle' dy='0.3em'%3EAvatar Video%3C/text%3E%3Ctext x='200' y='270' font-family='Arial' font-size='14' fill='%23888' text-anchor='middle' dy='0.3em'%3EWith Shout Product%3C/text%3E%3C/svg%3E">
                            <source src="#" type="video/mp4">
                            Your browser does not support the video tag.
                        </video>
                        
                        <!-- Shout Product in Video -->
                        <div class="position-absolute" style="top: 50%; left: 50%; transform: translate(-50%, -50%); z-index: 5; pointer-events: none;">
                             <video class="avatar-video" autoplay muted loop playsinline>
                                    <source src="{{ URL::asset('img/ai-avtar/analyzed_video.mp4') }}" type="video/mp4">
                                    Your browser does not support the video tag.
                                </video>
                        </div>
                    </div>
                    
                    <!-- Generation Status -->
                    <div class="mb-4">
                        <div class="d-flex align-items-center justify-content-center gap-2 mb-2">
                            <div class="spinner-border spinner-border-sm text-primary" role="status" style="width: 20px; height: 20px;">
                                <span class="visually-hidden">Loading...</span>
                            </div>
                            <span class="text-muted">Generating lip sync...</span>
                            <span class="text-white fw-bold">99%</span>
                        </div>
                       <!-- <div class="progress" style="height: 6px; background: #2a2a2a;">
                            <div class="progress-bar bg-primary" role="progressbar" style="width: 99%;" id="generationProgress"></div>
                        </div>
                        -->
                    </div>
                    
                    <!-- Action Buttons -->
                    <div class="d-flex gap-3 justify-content-center">
                        <button class="btn btn-outline-light px-4 py-2" onclick="regenerateVideo()" style="border-radius: 10px;">
                            <i class="fas fa-redo me-2"></i>Regenerate
                        </button>
                        <button class="btn btn-primary px-4 py-2" onclick="useMyScript()" style="background: linear-gradient(135deg, #667eea 0%, #764ba2 100%); border: none; border-radius: 10px;">
                            <i class="fas fa-script me-2"></i>Use My Script
                        </button>
                    </div>
                    
                    <!-- Additional Info -->
                    <div class="mt-3">
                        <small class="text-muted">
                            <i class="fas fa-info-circle me-1"></i>
                            Video generation is almost complete. You can regenerate or use your custom script.
                        </small>
                    </div>
                </div>
            </div>
        </div>
    </div>

   <!-- Create Avatar Modal -->
    <div class="modal fade" id="createAvatarModal" tabindex="-1" aria-labelledby="createAvatarModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg modal-dialog-centered">
            <div class="modal-content bg-dark text-white border-0" style="border-radius: 20px; background: #1a1a1a !important;">
                <div class="modal-header mt-2 pb-2">
                    <h5 class="modal-title text-white fw-bold" id="createAvatarModalLabel">Create Avatar</h5>
                    <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body p-4">
                    <div class="row">
                        <!-- Image Upload Section -->
                        <div class="col-md-6 mb-4">
                            <div class="image-upload-container position-relative" style="height: 400px; border-radius: 15px; overflow: hidden; background: #2a2a2a;">
                                <img id="avatarPreview" src="{{ trim($avatar['avatarImagePath']) }}" 
                                     class="w-100 h-100" style="object-fit: cover; cursor: pointer;" onclick="document.getElementById('imageUpload').click()">
                                
                                <!-- Download Button -->
                                <div class="position-absolute" style="bottom: 20px; left: 20px; z-index: 10;">
                                    <button class="btn btn-outline-light btn-sm rounded-pill" style="width: 40px; height: 40px;">
                                        <i class="fas fa-download"></i>
                                    </button>
                                </div>
                                
                                <input type="file" id="imageUpload" accept="image/*" style="display: none;" onchange="previewImage(this)">
                            </div>
                        </div>
                        
                        <!-- Controls Section -->
                        <div class="col-md-6">
                            <!-- Avatar Action Mode -->
                            <div class="mb-4">
                                <h6 class="text-white mb-3 fw-semibold">Avatar Action Mode</h6>
                                <div class="d-flex flex-column gap-2">
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="avatarMode" id="avatarLite" value="lite" checked>
                                        <label class="form-check-label text-white" for="avatarLite">
                                            Avatar 1(Lite)
                                        </label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="avatarMode" id="avatarPro" value="pro">
                                        <label class="form-check-label text-white" for="avatarPro">
                                            Avatar 1(Pro)
                                        </label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="avatarMode" id="avatar2" value="avatar2">
                                        <label class="form-check-label text-white d-flex align-items-center" for="avatar2">
                                            <span class="me-2">👑 Avatar 2</span>
                                            <span class="badge bg-danger rounded-pill" style="font-size: 10px;">New</span>
                                        </label>
                                    </div>
                                </div>
                            </div>
                            
                            <!-- Voiceover Section -->
                            <div class="mb-4">
                                <h6 class="text-white mb-3 fw-semibold">Voiceover</h6>
                                <div class="dropdown">
                                    <button class="btn btn-outline-secondary dropdown-toggle w-100 text-start d-flex align-items-center justify-content-between" 
                                            type="button" id="voiceoverDropdown" data-bs-toggle="dropdown" aria-expanded="false"
                                            style="background: #2a2a2a; border: 1px solid #444; color: white; padding: 12px 16px; border-radius: 8px;">
                                        <div class="d-flex align-items-center">
                                            <span class="me-2">🇺🇸</span>
                                            <span>Lyra</span>
                                        </div>
                                        <i class="fas fa-chevron-down"></i>
                                    </button>
                                </div>
                            </div>
                            
                            <!-- Create Button -->
                            <div class="d-grid">
                                <button class="btn btn-primary btn-lg fw-semibold d-flex align-items-center justify-content-center gap-2" 
                                        onclick="createVideoAvatar()" 
                                        style="background: linear-gradient(135deg, #667eea 0%, #764ba2 100%); border: none; padding: 15px; border-radius: 12px; font-size: 16px;">
                                    <span>Create a Video Avatar</span>
                                    <span class="badge bg-warning text-dark rounded-pill" style="font-size: 12px;">⚡ 2.5</span>
                                </button>
                            </div>
                            
                            <!-- Additional Info -->
                            <div class="mt-3">
                                <small class="text-muted">
                                    <i class="fas fa-info-circle me-1"></i>
                                    Your avatar will be generated using AI technology. Processing time: 2-5 minutes.
                                </small>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

     @endsection

     @section('js')

    <!-- jQuery -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <script src="{{URL::asset('plugins/sweetalert/sweetalert2.all.min.js')}}"></script>
    <script src="{{URL::asset('plugins/pdf/html2canvas.min.js')}}"></script>
    <script src="{{URL::asset('plugins/pdf/jspdf.umd.min.js')}}"></script>
    <script src="{{URL::asset('plugins/highlight/highlight.min.js')}}"></script>
    <script src="{{URL::asset('plugins/highlight/showdown.min.js')}}"></script>
    <script src="{{theme_url('js/export-chat.js')}}"></script>
    
     <script>
        // Initialize tooltips
        var tooltipTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]'));
        var tooltipList = tooltipTriggerList.map(function (tooltipTriggerEl) {
            return new bootstrap.Tooltip(tooltipTriggerEl);
        });
        document.addEventListener('DOMContentLoaded', () => {
            const urlParams = new URLSearchParams(window.location.search);
            const avatarId = urlParams.get('avatarId');
            const avatarImage = urlParams.get('image');

            if (avatarId && avatarImage) {
                // Set preview image
                document.querySelector('.preview-image').src = avatarImage;

                // Also store the selected avatarId in the hidden input (if used)
                const hiddenInput = document.getElementById('selectedAvatarId');
                if (hiddenInput) hiddenInput.value = avatarId;
            }
        });
        // Handle filter tab clicks
        document.querySelectorAll('.filter-tabs .nav-link').forEach(link => {
            link.addEventListener('click', function(e) {
                e.preventDefault();
                
                // Remove active class from all links
                document.querySelectorAll('.filter-tabs .nav-link').forEach(l => l.classList.remove('active'));
                
                // Add active class to clicked link
                this.classList.add('active');
                
                // Get filter category
                const filterCategory = this.getAttribute('data-filter');
                
                // Filter avatar cards
                filterAvatarCards(filterCategory);
            });
        });

        // Filter avatar cards function
        function filterAvatarCards(category) {
            const avatarCards = document.querySelectorAll('.avatar-card');
            
            avatarCards.forEach(card => {
                const cardCategories = card.getAttribute('data-category');
                
                if (category === 'all' || (cardCategories && cardCategories.includes(category))) {
                    card.style.display = 'block';
                    card.style.opacity = '0';
                    card.style.transform = 'translateY(20px)';
                    
                    // Animate in
                    setTimeout(() => {
                        card.style.transition = 'all 0.3s ease';
                        card.style.opacity = '1';
                        card.style.transform = 'translateY(0)';
                    }, 50);
                } else {
                    card.style.transition = 'all 0.2s ease';
                    card.style.opacity = '0';
                    card.style.transform = 'translateY(-20px)';
                    
                    // Hide after animation
                    setTimeout(() => {
                        card.style.display = 'none';
                    }, 200);
                }
            });
            
            // Clear any existing selection when filtering
            document.querySelectorAll('.avatar-card').forEach(c => c.classList.remove('selected'));
        }

        // Handle upload card click
        document.querySelector('.upload-card').addEventListener('click', function() {
            const input = document.createElement('input');
            input.type = 'file';
            input.accept = 'image/*';
            input.onchange = function(e) {
                const file = e.target.files[0];
                if (file) {
                    const reader = new FileReader();
                    reader.onload = function(e) {
                        document.querySelector('.preview-image').src = e.target.result;
                        
                        // Remove selected class from all avatar cards
                        document.querySelectorAll('.avatar-card').forEach(c => c.classList.remove('selected'));
                    };
                    reader.readAsDataURL(file);
                }
            };
            input.click();
        });
        
        let pageNo = 1;
        let selectedCategory = 'all';
        let isLoading = false;

        const avatarGrid = document.getElementById('avatarGrid');
        const loadMoreBtn = document.getElementById('loadMoreBtn');

        // Load avatars function
        function loadAvatars(categoryId = selectedCategory, page = pageNo) {
            if (isLoading) return;
            isLoading = true;

            let urlTemplate = `{{ route('category.products', ['categoryId' => 'REPLACE', 'pageNo' => 'PAGE']) }}`;
            const url = urlTemplate.replace('REPLACE', categoryId).replace('PAGE', page);

            fetch(url)
                .then(res => res.json())
                .then(data => {
                    console.log(data);
                    const totalItems = data.result.total;
                    const currentPage = data.result.pageNo;
                    const pageSize = data.result.pageSize;
                    const totalPages = Math.ceil(totalItems / pageSize);

                    data.result.data.forEach(avatar => {
                        const div = document.createElement('div');
                        div.className = 'avatar-card mb-3';
                        div.setAttribute('data-avatar', avatar.avatarId);

                        const categoryList = avatar.avatarCategoryList?.map(cat => cat.categoryName).join(' ') || 'general all';
                        div.setAttribute('data-category', categoryList);

                        div.innerHTML = `
                            ${avatar.minSubsType !== 'starter' ? '<div class="premium-badge">VIP</div>' : ''}
                            <img src="${avatar.avatarImagePath.trim()}" class="avatar-image" alt="Avatar">
                            <div class="control-icons">
                                <button class="control-icon" title="Camera"><i class="fa-regular fa-star"></i></button>
                                <button class="control-icon" title="Refresh"><i class="fas fa-redo"></i></button>
                            </div>
                        `;
                        avatarGrid.appendChild(div);
                    });

                    // Hide Load More if fewer than 20 items or if this is last page
                    if (currentPage >= totalPages) {
                        loadMoreBtn.style.display = 'none';
                    } else {
                        loadMoreBtn.style.display = 'inline-block';
                    }
                    isLoading = false;
                })
                .catch(error => {
                    console.error(error);
                    loadMoreBtn.style.display = 'none'; // Hide on error
                    isLoading = false;
                });
        }

        // Category selection
        function selectCategory(categoryId) {
            selectedCategory = categoryId;
            pageNo = 1;
            avatarGrid.innerHTML = ''; // Clear old avatars
            loadAvatars(selectedCategory, pageNo); // Load new category
        }

        // Load More button
        loadMoreBtn.addEventListener('click', () => {
            pageNo++;
            loadAvatars(selectedCategory, pageNo);
        });

        // On page load
        loadAvatars(selectedCategory, pageNo);

        document.addEventListener('click', function (e) {
            if (e.target.closest('.avatar-card')) {
                const card = e.target.closest('.avatar-card');

                // Highlight selected card
                document.querySelectorAll('.avatar-card').forEach(c => c.classList.remove('selected'));
                card.classList.add('selected');

                // Update preview image
                const img = card.querySelector('img');
                if (img) {
                    document.querySelector('.preview-image').src = img.src;
                }

                // Set hidden inputs
                document.getElementById('selectedAvatarId').value = card.getAttribute('data-avatar');
                document.getElementById('selectedCategoryId').value = card.getAttribute('data-category') || '';
            }
        });
        let uploadedProductImageFileId = null;
        document.getElementById('generateBtn').addEventListener('click', function () {
            const avatarId = document.getElementById('selectedAvatarId').value;
            const categoryId = document.getElementById('selectedCategoryId').value;
            const prompt = document.querySelector('#moreOptions textarea').value || 'Default AI prompt...';

            if (!avatarId) {
                alert('Please select an avatar first.');
                return;
            }

            const payload = {
                avatarId: avatarId,
                categoryId: categoryId
            };

            fetch('{{ route("avatar.generate.template") }}', { 
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': '{{ csrf_token() }}'
                },
                body: JSON.stringify({
                    avatarId: avatarId,
                    productImageFileId: uploadedProductImageFileId,
                    imageEditPrompt: prompt,
                    productSize: "2",
                    noticeUrl: ""
                }) 
            })
            .then(res => res.json())
            .then(response => {
                console.log(response.result.taskId);
                pollForVideo(response.result.taskId);
                // Optionally update UI or redirect
            })
            .catch(err => console.error(err));
        });

        function pollForVideo(taskId) {
           
            const interval = setInterval(() => {
                fetch("{{ route('check.video.status', ':taskId') }}".replace(':taskId', taskId))
                    .then(response => response.json())
                    .then(data => {
                        console.log(data.result.outputVideoUrl);
                    })
                    .catch(error => console.error(error));
            }, 5000); // poll every 5 seconds
        }

        document.getElementById('uploadProductBtn').addEventListener('click', function () {
            document.getElementById('productImageInput').click();
        });

        document.getElementById('productImageInput').addEventListener('change', function (e) {
            const file = e.target.files[0];
            if (file) {
                uploadProductImageToServer(file);
            }
        });

        function uploadProductImageToServer(file) {
            const formData = new FormData();
            formData.append('file', file);

            fetch('{{ route("product.image.upload") }}', {
                method: 'POST',
                headers: {
                    'X-CSRF-TOKEN': '{{ csrf_token() }}'
                },
                body: formData
            })
            .then(res => res.json())
            .then(data => {
                console.log('Uploaded →', data);
                const productImageFileId = data.fileId; // Or data.url, depending on your API
                uploadedProductImageFileId = data.fileId; // ✅ Store for Generate button
                // callTopviewGenerateAPI(productImageFileId);
            })
            .catch(err => {
                console.error(err);
                alert('Failed to upload image.');
            });
        }


    </script>

    
    @endsection