@extends('layouts.app')
@section('css')
	<!-- Sweet Alert CSS -->
	<link href="{{URL::asset('plugins/sweetalert/sweetalert2.min.css')}}" rel="stylesheet" />
	<link href="{{URL::asset('plugins/highlight/highlight.dark.min.css')}}" rel="stylesheet" />
    <!-- Slick CSS -->
    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.css"/>
    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick-theme.css"/>
  
	<style>

     @import url('https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css');
 .app-content .side-app {
        padding: 20px 0 0;
        max-width: 1600px !important;
    }
    .sidebar {
        background: rgba(245, 249, 252, 0.1);
        backdrop-filter: blur(10px);
        border-right: 1px solid rgba(245, 249, 252, 0.2);
        height: 100vh;
        position: fixed;
        width: 250px;
        padding: 30px 0;
    }

       .sidebar .logo {
            display: flex;
            align-items: center;
            padding: 0 20px 30px;
            font-size: 20px;
            font-weight: bold;
        }

       .sidebar .logo::before {
            content: '';
            width: 25px;
            height: 25px;
            background: linear-gradient(45deg, #533afd, #6c5ce7);
            border-radius: 4px;
            margin-right: 10px;
            display: flex;
            align-items: center;
            justify-content: center;
        }

       .sidebar .navbar .nav-item {
            padding: 12px 20px;
            display: flex;
            align-items: center;
            cursor: pointer;
            transition: all 0.3s ease;
            margin: 5px 10px;
            border-radius: 8px;
            width: 100%;
        }
        .sidebar .navbar .nav-item a { 
            font-size: 14px;
            line-height: 18px
        }
         .sidebar .navbar .nav-item.active {
             background: #301fd5;
         }
          .sidebar .navbar .nav-item:hover a,
          .sidebar .navbar .nav-item.active a {
             color: #ffffff;
         }

        .sidebar .navbar .nav-item:hover {
            background: #301fd5;
        }

         .sidebar .navbar .nav-item i {
            width: 20px;
        }

        .sidebar .nav-section {
            margin-top: 30px;
            padding: 0 20px;
            font-size: 12px;
            color: #888;
            margin-bottom: 10px;
        }

        .topview-content {
            margin-left: 250px;
            padding: 30px;
        }

        .header-section {
            text-align: center;
            margin-bottom: 40px;
            background: linear-gradient(135deg, #533afd 0%, #3d28e6 50%, #2a1acc 100%);
            padding: 40px;
            border-radius: 20px;
        }

        .header-title {
            font-size: 2.5rem;
            font-weight: 600;
            margin-bottom: 30px;
            background: linear-gradient(135deg, #f5f9fc, #ffffff);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
        }

        .url-input-section {
            display: flex;
            justify-content: center;
            align-items: center;
            gap: 15px;
            margin-bottom: 20px;
        }

        .url-input-section .url-input {
            background: rgba(245, 249, 252, 0.1);
            border: 1px solid rgba(245, 249, 252, 0.3);
            border-radius: 50px;
            padding: 15px 25px;
            color: white;
            width: 400px;
            backdrop-filter: blur(10px);
        }

       .url-input-section .url-input::placeholder {
            color: rgba(245, 249, 252, 0.7);
        }

       .url-input-section .btn-sample {
            background: rgba(138, 43, 226, 0.3);
            border: 1px solid rgba(138, 43, 226, 0.5);
            color: white;
            padding: 12px 25px;
            border-radius: 25px;
            text-decoration: none;
            transition: all 0.3s ease;
        }

       .url-input-section .btn-sample:hover {
            background: rgba(138, 43, 226, 0.5);
            color: white;
        }

       .url-input-section .btn-create {
            background: linear-gradient(135deg, #533afd 0%, #6c5ce7 100%);
            border: none;
            color: white;
            padding: 15px 30px;
            border-radius: 25px;
            font-weight: 600;
            transition: all 0.3s ease;
        }

        .url-input-section .btn-create:hover {
            transform: translateY(-2px);
            box-shadow: 0 5px 15px rgba(83, 58, 253, 0.4);
        }

       .url-input-section .btn-upload {
            background: rgba(245, 249, 252, 0.1);
            border: 1px solid rgba(245, 249, 252, 0.3);
            color: white;
            padding: 15px 30px;
            border-radius: 25px;
            backdrop-filter: blur(10px);
            transition: all 0.3s ease;
        }

       .url-input-section .btn-upload:hover {
            background: rgba(245, 249, 252, 0.2);
            color: white;
        }

       .ai-tools-section .section-title {
            font-size: 1.5rem;
            font-weight: 600;
            margin-bottom: 15px;
        }

        .tools-grid {
            margin-bottom: 50px;
        }

        .tools-slider .tool-card {
            background: rgba(245, 249, 252, 0.08);
            backdrop-filter: blur(10px);
            border: 1px solid rgba(245, 249, 252, 1);
            border-radius: 15px;
            padding: 20px;
            transition: all 0.3s ease;
            cursor: pointer;
            position: relative;
            overflow: hidden;
        }

       .tools-slider .tool-card:hover {
            transform: translateY(-5px);
            background: rgba(245, 249, 252, 0.15);
            box-shadow: 0 10px 30px rgba(83, 58, 253, 0.2);
        }

       .tools-slider .tool-preview {
            width: 100%;
            height: 150px;
            background: linear-gradient(135deg, #533afd 0%, #6c5ce7 100%);
            border-radius: 10px;
            margin-bottom: 15px;
            display: flex;
            align-items: center;
            justify-content: center;
            position: relative;
            overflow: hidden;
        }

       .tools-slider .tool-preview img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            border-radius: 10px;
        }

      .tools-slider .tool-title {
            font-size: 1.1rem;
            font-weight: 600;
            margin-bottom: 8px;
        }

       .tools-slider .tool-description {
            font-size: 0.9rem;
            color: #444444;
            line-height: 1.4;
        }

       .tools-slider .free-badge {
            position: absolute;
            top: 15px;
            right: 15px;
            background: #533afd;
            color: #f5f9fc;
            padding: 4px 12px;
            border-radius: 15px;
            font-size: 0.8rem;
            font-weight: 600;
            z-index: 1;
        }

        .templates-section {
            margin-top: 50px;
        }

        .templates-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 15px;
        }
        .templates-header .section-title {
            font-size: 24px;
            line-height: 24px;
            font-weight: 600;
        }
        .view-all {
            color: #000;
            text-decoration: none;
            font-size: 0.9rem;
        }

        .view-all:hover {
            color: #222;
        }

       .templates-slider .template-card {
            position: relative;
            margin: 0 10px;
        }

        /* .template-card:hover {
            transform: translateY(-3px);
            box-shadow: 0 8px 25px rgba(83, 58, 253, 0.25);
        } */

       .templates-slider .template-preview:hover {
            transform: translateY(-1px);
            box-shadow: 0 8px 15px rgba(83, 58, 253, 0.15);
        }

        .template-preview {
            width: 100%;
            height: 360px;
            background: linear-gradient(135deg, #533afd 0%, #6c5ce7 100%);
            position: relative;
            overflow: hidden;
             background: rgba(245, 249, 252, 0.08);
            border-radius: 12px;
            overflow: hidden;
            transition: all 0.3s ease;
        }
        @media (max-width: 1540px) {
            .template-preview {
                width: 100%;
                height: 280px;
            }
        }

        .template-preview img {
            width: 100%;
            height: 100%;
            object-fit: cover;
        }

       .template-preview  .crown-icon {
            position: absolute;
            top: 10px;
            right: 10px;
            color: #533afd;
            font-size: 20px;
        }

       .tools-slider .tool-card {
           margin: 0 10px;
        }
        .slick-prev::before,
        .slick-next::before {
            display: none;
        }
        .slick-prev,
        .slick-next {
            position: absolute;
            top: 50%;
            transform: translateY(-50%);
            z-index: 10;
            width: 40px;
            height: 40px;
            background-color: #5a43f7;
            border-radius: 50%;
            cursor: pointer;
            border: none;
            outline: none;
        }

        .slick-prev::after,
        .slick-next::after {
        font-family: "Font Awesome 5 Free";
        font-weight: 900;
        font-size: 16px;
        color: #fff;
        display: block;
        text-align: center;
        line-height: 40px;
        }

        /* Left arrow: fa-chevron-left */
        .slick-prev {
        left: -25px;
        }
        .slick-prev::after {
        content: "\f104";
        }

        /* Right arrow: fa-chevron-right */
        .slick-next {
        right: -25px;
        }
        .slick-next::after {
        content: "\f105";
        }
        .slick-prev:hover, 
         .slick-prev:focus, 
          .slick-next:hover, 
           .slick-next:focus {
            color: #ffffff;
            outline: none;
            background: #000000;
        }

    .css-1oi6e1a {
        position: absolute;
        top: 6px;
        left: 6px;
        width: 32px;
        height: 18px;
        line-height: 16px;
        text-align: center;
        border-radius: 6px;
        border: 1px solid rgb(255, 255, 255);
        font-size: 10px;
        font-weight: 500;
        backdrop-filter: blur(3px);
        color: rgb(255, 255, 255);
        background: var(--chakra-colors-transparent)
    transparent;
    }
    .css-nbqrex {
        position: absolute;
        top: 6px;
        right: 6px;
        width: 20px;
        height: 20px;
    }

.projects-grid {
    display: flex;
    gap: 24px;
    flex-wrap: wrap;
}
.projects-grid .project-item {
    width: 240px;
    flex-shrink: 0;
}
.projects-grid .project-card {
    background-color: #1a1a1a;
    border: 1px solid #ffffff;
    border-radius: 12px;
    overflow: hidden;
    width: 100%;
    height: 280px;
    position: relative;
}
.projects-grid .project-thumbnail {
    width: 100%;
    height: auto;
    object-fit: cover;
    position: relative;
}
.project-thumbnail .video-img {
    width: 100%;
    height: 200px;
    object-fit: cover;
    object-position: center;
}
.projects-grid .project-type-badge {
    position: absolute;
    top: 12px;
    left: 12px;
    padding: 6px 12px;
    border-radius: 6px;
    font-size: 12px;
    font-weight: 600;
    text-transform: none;
    z-index: 10;
}
.projects-grid .avatar-video {
    background-color: #2196F3;
    color: white;
}
.projects-grid .hover-overlay {
    position: absolute;
    top: 0;
    left: 0;
    right: 0;
    bottom: 0;
    background: rgba(0, 0, 0, 0.6);
    display: flex
;
    align-items: center;
    justify-content: center;
    opacity: 0;
    transition: opacity 0.3s ease;
    z-index: 5;
}
.projects-grid .watch-btn {
    background: rgba(0, 0, 0, 0.8);
    border: 1px solid #404040;
    color: white;
    padding: 8px 16px;
    border-radius: 6px;
    font-size: 14px;
    font-weight: 500;
    display: flex
;
    align-items: center;
    gap: 8px;
    cursor: pointer;
    transition: all 0.3s ease;
}
.projects-grid .project-info {
    padding: 16px;
    height: 100px;
    display: flex;
    flex-direction: column;
    justify-content: flex-start;
}

.projects-grid .project-title {
    font-size: 16px;
    font-weight: 600;
    margin-bottom: 6px;
    color: #ffffff;
    line-height: 1.2;
}
.projects-grid .project-time {
    font-size: 14px;
    color: #888888;
    margin: 0;
}
.projects-grid .project-card:hover .hover-overlay {
    opacity: 1;
}
.projects-grid .dubbing {
    background-color: #FF9800;
    color: white;
}
.projects-grid .placeholder-icon {
    font-size: 48px;
    color: #404040;
}
.projects-grid .placeholder-thumbnail {
    background: linear-gradient(135deg, #1a1a1a, #2d2d2d);
    display: flex
;
    align-items: center;
    justify-content: center;
    height: 204px;
    position: relative;
}
.projects-grid .edit-btn {
    background: rgba(0, 0, 0, 0.8);
    border: 1px solid #404040;
    color: white;
    padding: 8px 16px;
    border-radius: 6px;
    font-size: 14px;
    font-weight: 500;
    display: flex;
    align-items: center;
    gap: 8px;
    cursor: pointer;
    transition: all 0.3s ease;
}
.projects-grid .edit-btn:hover {
    background: rgba(0, 0, 0, 0.9);
    border-color: #666;
}


  // === Responsive CSS === //

    @media (max-width: 768px) {
        .sidebar {
            transform: translateX(-100%);
            transition: transform 0.3s ease;
        }
        
        .topview-content {
            margin-left: 0;
            padding: 20px;
        }
        
        .url-input-section {
            flex-direction: column;
            gap: 10px;
        }
        
        .url-input {
            width: 100%;
            max-width: 400px;
        }
    }
 	</style>
@endsection

@section('content')

    <!-- Sidebar -->
    <div class="sidebar">
        <div class="logo">
            AI Avatar
        </div>
        <div class="navbar">
        <div class="nav-item active">
           <a href="#"> <i class="fas fa-th-large"></i>
            Dashboard </a>
        </div>
        
      <!--  <div class="nav-item">
          <a href="#"> <i class="fas fa-folder"></i>
            Projects </a>
        </div>
        
        <div class="nav-item">
           <a href="#"> <i class="fas fa-images"></i>
            Assets </a>
        </div>
        
        <div class="nav-item">
          <a href="#"> <i class="fas fa-palette"></i>
            Brand Kit </a>
        </div> -->
        
        <div class="nav-section">Create</div>
        
        <div class="nav-item mx-0">
          <a href="{{ route('avatars.product.templete') }}"> <i class="fas fa-user"></i>
            Create Avatars </a>
        </div>
        <div class="nav-item mx-0">
          <a href="{{ route('avatars.create') }}"> <i class="fas fa-user"></i>
            Create Marketing Video </a>
        </div>
        
        <div class="nav-item mx-0">
          <a href="{{ route('avatars.video.creation') }}"> <i class="fas fa-video"></i>
            Create Avatar Videos </a>
        </div>

        <!-- <div class="nav-item mx-0">
          <a href="{{ route('all.project') }}"> <i class="fas fa-book"></i>
            My Project </a>
        </div> -->
        </div>
    </div>

    <!-- Main Content -->
    <div class="topview-content">
        <!-- Header Section -->
        <div class="header-section">
            <h1 class="header-title">Create marketing videos from links or materials</h1>
            
            <div class="url-input-section">
                <input type="text" class="form-control url-input" placeholder="Amazon/Shopify/TikTok/Ebay/Mercado...">
                <a href="#" class="btn-sample">Try Sample</a>
                 <a href="#" class="btn btn-create">Create Video</a>
                <span style="color: rgba(255,255,255,0.5);">or</span>
                <a href="#" class="btn btn-upload">Upload file</a>
            </div>
        </div>

        <!-- AI Creation Tools Start-->
        <div class="ai-tools-section">
            <h2 class="section-title">AI Creation Tools</h2>
            <div class="tools-slider">
                <a href="{{ route('avatars.create') }}" class="tool-card">
                    <div class="tool-preview">
                        <div style="background: linear-gradient(135deg, #533afd 0%, #6c5ce7 100%); width: 100%; height: 100%; display: flex; align-items: center; justify-content: center;">
                            <i class="fas fa-video" style="font-size: 2rem; opacity: 0.7; color: #f5f9fc;"></i>
                        </div>
                    </div>
                    <div class="tool-title">Avatar Marketing Video</div>
                    <div class="tool-description">Create marketing video ads from link or local materials</div>
                </a>
                
                <a href="{{ route('avatars.video.creation') }}" class="tool-card">
                    <div class="tool-preview">
                        <div style="background: linear-gradient(135deg, #f093fb 0%, #f5576c 100%); width: 100%; height: 100%; display: flex; align-items: center; justify-content: center;">
                            <i class="fas fa-user-circle" style="font-size: 2rem; opacity: 0.7;"></i>
                        </div>
                    </div>
                    <div class="tool-title">Video Avatar</div>
                    <div class="tool-description">Create avatar videos or clone your avatar from a video</div>
                </a>
                
                 <a href="{{ route('avatars.product.templete') }}" class="tool-card">
                    <div class="tool-preview">
                        <div style="background: linear-gradient(135deg, #4facfe 0%, #00f2fe 100%); width: 100%; height: 100%; display: flex; align-items: center; justify-content: center;">
                            <i class="fas fa-box" style="font-size: 2rem; opacity: 0.7;"></i>
                        </div>
                    </div>
                    <div class="tool-title">Product Avatar</div>
                    <div class="tool-description">Create an avatar holding your product with one image</div>
                 </a>
                
                <a href="{{ route('avatars.anyshoot.templete') }}" class="tool-card">
                    <div class="free-badge">Limited Free</div>
                    <div class="tool-preview">
                        <div style="background: linear-gradient(135deg, #a8edea 0%, #fed6e3 100%); width: 100%; height: 100%; display: flex; align-items: center; justify-content: center;">
                            <i class="fas fa-camera" style="font-size: 2rem; opacity: 0.7;"></i>
                        </div>
                    </div>
                    <div class="tool-title">Product AnyShoot</div>
                    <div class="tool-description">Fit any product anywhere, perfect for try-ons and product showcases</div>
                </a>
                
                <!-- <a href="#" class="tool-card">
                    <div class="tool-preview">
                        <div style="background: linear-gradient(135deg, #d299c2 0%, #fef9d7 100%); width: 100%; height: 100%; display: flex; align-items: center; justify-content: center;">
                            <i class="fas fa-magic" style="font-size: 2rem; opacity: 0.7;"></i>
                        </div>
                    </div>
                    <div class="tool-title">Prompt to Avatar</div>
                    <div class="tool-description">Create an avatar from a text description</div>
                </a> -->
                
                <!-- <a href="#" class="tool-card">
                    <div class="tool-preview">
                        <div style="background: linear-gradient(135deg, #667eea 0%, #764ba2 100%); width: 100%; height: 100%; display: flex; align-items: center; justify-content: center;">
                            <i class="fas fa-exchange-alt" style="font-size: 2rem; opacity: 0.7;"></i>
                        </div>
                    </div>
                    <div class="tool-title">Face Swap</div>
                    <div class="tool-description">Swap the face in images</div>
                </a> -->

                <!-- <a href="#" class="tool-card">
                    <div class="tool-preview">
                        <div style="background: linear-gradient(135deg, #c471f5 0%, #fa71cd 100%); width: 100%; height: 100%; display: flex; align-items: center; justify-content: center;">
                            <i class="fas fa-link" style="font-size: 2rem; opacity: 0.7; color: #fff;"></i>
                        </div>
                    </div>
                    <div class="tool-title">Batch Link-to-Video</div>
                    <div class="tool-description">Up to 3000 videos can be created at once</div>
                </a> -->

                <!-- <a href="#" class="tool-card">
                    <div class="tool-preview">
                        <div style="background: linear-gradient(135deg, #f093fb 0%, #f5576c 100%); width: 100%; height: 100%; display: flex; align-items: center; justify-content: center;">
                            <i class="fas fa-user-circle" style="font-size: 2rem; opacity: 0.7; color: #fff;"></i>
                        </div>
                    </div>
                    <div class="tool-title">Photo Avatar</div>
                    <div class="tool-description">Make the picture talk</div>
                </a> -->

                <!-- <a href="#" class="tool-card">
                    <div class="tool-preview">
                        <div style="background: linear-gradient(135deg, #4facfe 0%, #00f2fe 100%); width: 100%; height: 100%; display: flex; align-items: center; justify-content: center;">
                            <i class="fas fa-image" style="font-size: 2rem; opacity: 0.7; color: #fff;"></i>
                        </div>
                    </div>
                    <div class="tool-title">Text to Image</div>
                    <div class="tool-description">Enter prompts to generate UGC/pro style images</div>
                </a> -->

                <!-- <a href="#" class="tool-card">
                    <div class="tool-preview">
                        <div style="background: linear-gradient(135deg, #667eea 0%, #764ba2 100%); width: 100%; height: 100%; display: flex; align-items: center; justify-content: center;">
                            <i class="fas fa-video" style="font-size: 2rem; opacity: 0.7; color: #fff;"></i>
                        </div>
                    </div>
                    <div class="tool-title">Image/Text to Video</div>
                    <div class="tool-description">Generate videos from an image or text, supporting lip sync</div>
                </a> -->

                <!-- <a href="#" class="tool-card">
                    <div class="tool-preview">
                        <div style="background: linear-gradient(135deg, #a18cd1 0%, #fbc2eb 100%); width: 100%; height: 100%; display: flex; align-items: center; justify-content: center;">
                            <i class="fas fa-volume-up" style="font-size: 2rem; opacity: 0.7; color: #fff;"></i>
                        </div>
                    </div>
                    <div class="tool-title">AI Voice Generator</div>
                    <div class="tool-description">Transfer text to speech</div>
                </a> -->
                
            </div>
        </div> 
        <!-- AI Creation Tools End-->

        <!-- Product Avatar Templates Start -->
        <div class="templates-section">
            <div class="templates-header d-flex justify-content-between align-items-center">
                <h2 class="section-title">Product Avatar Templates</h2>
                <a href="{{ route('avatars.product.templete') }}" class="view-all" >View All</a>
                <!-- <a href="{{ route('avatars.product.templete') }}" class="view-all" data-bs-toggle="modal" data-bs-target="#allAvatarsModal">View All</a> -->
            </div>

            <!-- Display First 6 Avatars -->
            <div class="templates-slider row">
                @foreach(array_slice($product_avatar_temp['result']['data'], 0, 6) as $template)
                    <div class="col-6 col-md-4 col-lg-2 mb-3 px-2">
                        <a href="{{ route('avatars.product.templete') }}?avatarId={{ $template['avatarId'] }}&image={{ urlencode($template['coverUrl'] ?? $template['avatarImagePath']) }}" class="template-card d-block mx-0 text-center">
                            <div class="template-preview mb-2">
                                <img src="{{ $template['coverUrl'] ?? $template['avatarImagePath'] }}" alt="" class="img-fluid rounded" />
                            </div>
                            <div class="template-info small">
                                <p class="mb-0">{{ $template['templateCategoryList'][0]['categoryName'] ?? ($template['avatarCategoryList'][0]['categoryName'] ?? '') }}</p>
                            </div>
                        </a>
                    </div>
                @endforeach
            </div>
        </div>
        <!-- Modal to Show All Avatars -->
        <div class="modal fade" id="allAvatarsModal" tabindex="-1" aria-labelledby="allAvatarsModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-xl modal-dialog-scrollable">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="allAvatarsModalLabel">All Product Avatars</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="row">
                            @foreach($product_avatar_temp['result']['data'] as $template)
                                <div class="col-6 col-md-3 col-lg-2 mb-3">
                                    <a href="#" class="template-card d-block text-center">
                                        <div class="template-preview mb-2">
                                            <img src="{{ $template['coverUrl'] ?? $template['avatarImagePath'] }}" alt="" class="img-fluid rounded" />
                                        </div>
                                        <div class="template-info small">
                                            <p class="mb-0">{{ $template['templateCategoryList'][0]['categoryName'] ?? ($template['avatarCategoryList'][0]['categoryName'] ?? '') }}</p>
                                        </div>
                                    </a>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Product Avatar Templates End -->

         <!-- Product Avatar Templates Start -->
        <div class="templates-section">
            <div class="templates-header">
                <h2 class="section-title">AnyShoot Templates</h2>
                <!-- <a href="{{ route('avatars.anyshoot.templete') }}" class="view-all" data-bs-toggle="modal" data-bs-target="#allTemplatesModal">View All</a>-->
                <a href="{{ route('avatars.anyshoot.templete') }}" class="view-all">View All</a>
            </div>
            
            <div class="templates-slider" id="anyshoot-carousel">
                @foreach(array_slice($product_anyShoot_template['result']['data'], 0, 6) as $template)
                    <a href="#" class="template-card">
                        <div class="template-preview">
                            <img src="{{ $template['coverUrl'] }}" alt="Template Preview" />
                        </div>
                        <div class="template-info">
                            <p>{{ $template['templateCategoryList'][0]['categoryName'] ?? '' }}</p>
                        </div>
                    </a>
                @endforeach
            </div>
        </div> 
    <!-- Product Avatar Templates End -->

    <!-- Video Avatar Templates End -->
     <div class="templates-section">
            <div class="templates-header">
                <h2 class="section-title">Video Avatar Templates</h2>
                <a href="{{ route('avatars.video.creation') }}" class="view-all">View All</a>

            </div>
            
            <div class="templates-slider" id="videoavatar-carousel">
                @foreach(array_slice($video_avatars['result']['data'], 0, 6) as $video_avatar)
                    <a href="#" class="template-card">
                        <div class="template-preview">
                            <img src="{{ $video_avatar['coverUrl'] }}" alt="Template Preview" />
                        </div>
                        <div class="template-info">
                            <p>{{ $video_avatar['ethnicities'][0]['ethnicityName'] ?? 'Unknown Ethnicity'  }}</p>
                        </div>
                    </a>
                @endforeach
            </div>
    </div><!-- Product Avatar Templates End -->

    <!-- Recent Projects Templates Start -->
    <!-- <div class="templates-section">
          <div class="templates-header">
               <h2 class="section-title">Recent Projects</h2>
               <a href="#" class="view-all">View All</a>
          </div>
           <div class="projects-container">
                <div class="projects-grid">
                    <div class="project-item">
                        <div class="project-card">
                            <div class="project-thumbnail project-1">
                                <img class="video-img" src="https://images.unsplash.com/photo-1438761681033-6461ffad8d80?w=300&h=300&fit=crop&crop=face" alt="" class="img-fluid rounded" />
                                <span class="project-type-badge avatar-video">Avatar Video</span>
                                <div class="hover-overlay">
                                    <button class="watch-btn" data-bs-toggle="modal" data-bs-target="#videoPreviewModal">
                                        <i class="fas fa-play"></i>
                                        Watch
                                    </button>
                                </div>
                            </div>
                            <div class="project-info">
                                <div class="project-title">Untitled video</div>
                                <div class="project-time">4 hours ago</div>
                            </div>
                        </div>
                    </div>

                    <div class="project-item">
                        <div class="project-card">
                            <div class="project-thumbnail project-2">
                            <img class="video-img" src="https://images.unsplash.com/photo-1438761681033-6461ffad8d80?w=300&h=300&fit=crop&crop=face" alt="" class="img-fluid rounded" />
                                <span class="project-type-badge avatar-video">Avatar Video</span>
                                <div class="hover-overlay">
                                    <button class="watch-btn">
                                        <i class="fas fa-play"></i>
                                        Watch
                                    </button>
                                </div>
                            </div>
                            <div class="project-info">
                                <div class="project-title">Untitled video</div>
                                <div class="project-time">a day ago</div>
                            </div>
                        </div>
                    </div>

                    <div class="project-item">
                        <div class="project-card">
                            <div class="project-thumbnail project-3">
                            <img class="video-img" src="https://images.unsplash.com/photo-1438761681033-6461ffad8d80?w=300&h=300&fit=crop&crop=face" alt="" class="img-fluid rounded" />
                                <span class="project-type-badge avatar-video">Avatar Video</span>
                                <div class="hover-overlay">
                                    <button class="watch-btn">
                                        <i class="fas fa-play"></i>
                                        Watch
                                    </button>
                                </div>
                            </div>
                            <div class="project-info">
                                <div class="project-title">Untitled video</div>
                                <div class="project-time">2 days ago</div>
                            </div>
                        </div>
                    </div>

                    <div class="project-item">
                        <div class="project-card">
                            <div class="placeholder-thumbnail">
                                <i class="fas fa-video placeholder-icon"></i>
                                <span class="project-type-badge dubbing">Dubbing</span>
                                <div class="hover-overlay">
                                    <button class="edit-btn">
                                        <i class="fas fa-edit"></i>
                                        Edit
                                    </button>
                                </div>
                            </div>
                            <div class="project-info">
                                <div class="project-title">0701-1</div>
                                <div class="project-time">2 days ago</div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
     </div> -->
    <!-- Recent Projects Templates End -->

</div>

<!-- Modal to Show All Templates -->
<div class="modal fade" id="allTemplatesModal" tabindex="-1" aria-labelledby="allTemplatesModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl modal-dialog-scrollable">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="allTemplatesModalLabel">All Templates</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="row">
                    @foreach($product_anyShoot_template['result']['data'] as $template)
                        <div class="col-6 col-md-3 col-lg-2 mb-3">
                            <a href="#" class="template-card d-block text-center">
                                <div class="template-preview mb-2">
                                    <img src="{{ $template['coverUrl'] }}" alt="" class="img-fluid rounded" />
                                </div>
                                <div class="template-info small">
                                    <p class="mb-0">{{ $template['templateCategoryList'][0]['categoryName'] ?? '' }}</p>
                                </div>
                            </a>
                        </div>
                    @endforeach
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
<!-- Slick JS -->
<script type="text/javascript" src="https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js"></script>

<script>

 $('.tools-slider').slick({
  slidesToShow: 3,
  arrows: true,
  dots: false,
  responsive: [
    { breakpoint: 991, settings: { slidesToShow: 2 } },
    { breakpoint: 576, settings: { slidesToShow: 1 } }
  ]
});

 $('#templates-carousel, #anyshoot-carousel, #videoavatar-carousel').slick({
    slidesToShow: 5,
    slidesToScroll: 1,
    arrows: true,
    dots: false,
    responsive: [
      { breakpoint: 1200, settings: { slidesToShow: 3 } },
      { breakpoint: 991, settings: { slidesToShow: 2 } },
      { breakpoint: 576, settings: { slidesToShow: 1 } }
    ]
  });


</script>

@endsection