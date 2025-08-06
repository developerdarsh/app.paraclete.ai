

  
  <?php $__env->startSection('css'); ?>
  
  <!-- Sweet Alert CSS -->
  <link href="<?php echo e(URL::asset('plugins/sweetalert/sweetalert2.min.css')); ?>" rel="stylesheet" />
  <link href="<?php echo e(URL::asset('plugins/highlight/highlight.dark.min.css')); ?>" rel="stylesheet" />
  <!-- Slick CSS -->
  <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.css" />
  <link rel="stylesheet" type="text/css"
    href="https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick-theme.css" />

  <style>
    .button--back {
        background-color: #404040;
        color: #ffffff;
        margin-right: 16px;
    }
    .app-content .side-app {
        padding: 20px 0 0;
        max-width: 1600px !important;
    }
    .all-product-list-section {
        position: relative;
        padding: 40px 0;
    }

    .all-product-list-section .header-bar {
        display: flex;
        justify-content: space-between;
        align-items: center;
        border-bottom: none;
        margin-bottom: 40px;
    }
        
    .all-product-list-section .header-left {
        display: flex;
        align-items: center;
        gap: 16px;
    }
    
    .all-product-list-section .header-title {
        font-size: 24px;
        font-weight: 600;
        margin: 0;
    }
    
    .all-product-list-section .usage-text {
        font-size: 14px;
        color: #888888;
        margin: 0;
    }
    
    .all-product-list-section .upgrade-btn {
        background: linear-gradient(135deg, #ff6b35, #ff8c00);
        border: none;
        color: white;
        padding: 8px 16px;
        border-radius: 6px;
        font-size: 14px;
        font-weight: 600;
        display: flex;
        align-items: center;
        gap: 6px;
    }
    
    .all-product-list-section .upgrade-btn:hover {
        background: linear-gradient(135deg, #ff5722, #ff7043);
        color: white;
    }
    
    .all-product-list-section .sort-btn {
        background-color: #533afd;
        border: 1px solid #533afd;
        color: #ffffff;
        padding: 8px 16px;
        border-radius: 6px;
        font-size: 14px;
        display: flex;
        align-items: center;
        gap: 8px;
    }
    
    .all-product-list-section .sort-btn:hover {
        background-color: #1a1a1a;
        color: #ffffff;
    }
    
    .all-product-list-section .project-card {
        background-color: #1a1a1a;
        border: 1px solid #ffffff;
        border-radius: 12px;
        overflow: hidden;
        width: 100%;
        height: 280px;
        position: relative;
    }
    
    .all-product-list-section .project-thumbnail {
        width: 100%;
        height: auto;
        object-fit: cover;
        position: relative;
    }
    
    .all-product-list-section .project-type-badge {
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
    
    .all-product-list-section .avatar-video {
        background-color: #2196F3;
        color: white;
    }
    
    .all-product-list-section .dubbing {
        background-color: #FF9800;
        color: white;
    }
    
    .all-product-list-section .project-info {
        padding: 16px;
        height: 100px;
        display: flex;
        flex-direction: column;
        justify-content: flex-start;
    }
    
    .all-product-list-section .project-title {
        font-size: 16px;
        font-weight: 600;
        margin-bottom: 6px;
        color: #ffffff;
        line-height: 1.2;
    }
    
    .all-product-list-section .project-time {
        font-size: 14px;
        color: #888888;
        margin: 0;
    }
    
    .all-product-list-section .placeholder-thumbnail {
        background: linear-gradient(135deg, #1a1a1a, #2d2d2d);
        display: flex;
        align-items: center;
        justify-content: center;
        height: 204px;
        position: relative;
    }
    
    .all-product-list-section .placeholder-icon {
        font-size: 48px;
        color: #404040;
    }
    
    .all-product-list-section .projects-grid {
        display: flex;
        gap: 24px;
        flex-wrap: wrap;
    }
    
    .all-product-list-section .project-item {
        width: 240px;
        flex-shrink: 0;
    }
/* Hover overlay and watch button */
        .all-product-list-section .hover-overlay {
        position: absolute;
        top: 0;
        left: 0;
        right: 0;
        bottom: 0;
        background: rgba(0, 0, 0, 0.6);
        display: flex;
        align-items: center;
        justify-content: center;
        opacity: 0;
        transition: opacity 0.3s ease;
        z-index: 5;
    }
    
        .all-product-list-section .project-card:hover .hover-overlay {
        opacity: 1;
    }
    
        .all-product-list-section .watch-btn {
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
    
        .all-product-list-section .watch-btn:hover {
        background: rgba(0, 0, 0, 0.9);
        border-color: #666;
    }
    
        .all-product-list-section .edit-btn {
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
    
        .all-product-list-section .edit-btn:hover {
        background: rgba(0, 0, 0, 0.9);
        border-color: #666;
    }
    
    /* Three dots menu */
    .all-product-list-section .dots-menu {
        position: absolute;
        top: 12px;
        right: 12px;
        z-index: 10;
    }
    
        .all-product-list-section .dots-btn {
        background: rgba(0, 0, 0, 0.6);
        border: none;
        color: white;
        width: 32px;
        height: 32px;
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        cursor: pointer;
        transition: all 0.3s ease;
    }
    
    .all-product-list-section .dots-btn:hover {
        background: rgba(0, 0, 0, 0.8);
    }
    
     .all-product-list-section .dropdown-menu {
        position: absolute;
        top: 40px;
        right: 0;
        background: #2d2d2d;
        border: 1px solid #404040;
        border-radius: 8px;
        padding: 0;
        min-width: 140px;
        box-shadow: 0 8px 24px rgba(0, 0, 0, 0.4);
        z-index: 20;
        max-height: 0;
        opacity: 0;
        transform: translateY(-10px);
    }
    
    .all-product-list-section .dropdown-menu.show {
        max-height: 200px;
        opacity: 1;
        transform: translateY(0);
        padding: 8px 0;
        pointer-events: auto;
    }
    .all-product-list-section .project-thumbnail .video-img {
        width: 100%;
        height: 200px;
        object-fit: cover;
        object-position: center;
    }
    .all-product-list-section .dropdown-item {
        padding: 10px 16px;
        color: #ffffff !important;
        text-decoration: none;
        display: flex;
        align-items: center;
        gap: 12px;
        font-size: 14px;
        font-weight: 500;
        transition: background-color 0.2s ease;
        cursor: pointer;
    }
    
        .all-product-list-section .dropdown-item:hover {
        background-color: #404040;
        color: #ffffff;
    }
    
        .all-product-list-section .dropdown-item i {
        width: 16px;
        font-size: 14px;
    }
    
    /* Show hover state for second card */
        .all-product-list-section .project-item:nth-child(2) .hover-overlay {
        opacity: 1;
    }
    
        .all-product-list-section .project-item:nth-child(2) .dropdown-menu {
        display: block;
    }
</style>

  <?php $__env->stopSection(); ?>

  <?php $__env->startSection('content'); ?>
    
    <section class="all-product-list-section">
        <div class="container-fluid">
            <div class="back-btn mb-3">
                <a href="https://staging.paraclete.ai/public/app/user/ai-avatar" class="btn button--back">
                    <i class="fas fa-arrow-left button__icon me-2"></i>Back
                </a>
            </div>
            <div class="header-bar">
        <div class="header-left">
            <h1 class="header-title">My projects (5)</h1>
            <p class="usage-text">0GB/5GB |</p>
            <button class="upgrade-btn">
                <i class="fas fa-crown"></i>Upgrade
            </button>
        </div>
        <button class="sort-btn">
            Newest <i class="fas fa-chevron-down"></i>
        </button>
    </div>

    <div class="projects-container">
        <div class="projects-grid">
            <!-- Avatar Video 1 -->
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
                        <div class="dots-menu">
                            <button class="dots-btn" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                                <i class="fas fa-ellipsis-v"></i>
                            </button>
                            <div class="dropdown-menu">
                                <a class="dropdown-item">
                                    <i class="fas fa-edit"></i>
                                    Rename
                                </a>
                                <a class="dropdown-item">
                                    <i class="fas fa-comment"></i>
                                    Feedback
                                </a>
                                <a class="dropdown-item">
                                    <i class="fas fa-trash"></i>
                                    Delete
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="project-info">
                        <div class="project-title">Untitled video</div>
                        <div class="project-time">4 hours ago</div>
                    </div>
                </div>
            </div>

            <!-- Avatar Video 2 -->
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
                        <div class="dots-menu">
                            <button class="dots-btn" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                                <i class="fas fa-ellipsis-v"></i>
                            </button>
                            <div class="dropdown-menu">
                                <a class="dropdown-item">
                                    <i class="fas fa-edit"></i>
                                    Rename
                                </a>
                                <a class="dropdown-item">
                                    <i class="fas fa-comment"></i>
                                    Feedback
                                </a>
                                <a class="dropdown-item">
                                    <i class="fas fa-trash"></i>
                                    Delete
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="project-info">
                        <div class="project-title">Untitled video</div>
                        <div class="project-time">a day ago</div>
                    </div>
                </div>
            </div>

            <!-- Avatar Video 3 -->
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
                        <div class="dots-menu">
                            <button class="dots-btn" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                                <i class="fas fa-ellipsis-v"></i>
                            </button>
                            <div class="dropdown-menu">
                                <a class="dropdown-item">
                                    <i class="fas fa-edit"></i>
                                    Rename
                                </a>
                                <a class="dropdown-item">
                                    <i class="fas fa-comment"></i>
                                    Feedback
                                </a>
                                <a class="dropdown-item">
                                    <i class="fas fa-trash"></i>
                                    Delete
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="project-info">
                        <div class="project-title">Untitled video</div>
                        <div class="project-time">2 days ago</div>
                    </div>
                </div>
            </div>

            <!-- Dubbing Project 1 -->
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
                        <div class="dots-menu">
                            <button class="dots-btn" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                                <i class="fas fa-ellipsis-v"></i>
                            </button>
                            <div class="dropdown-menu">
                                <a class="dropdown-item">
                                    <i class="fas fa-edit"></i>
                                    Rename
                                </a>
                                <a class="dropdown-item">
                                    <i class="fas fa-comment"></i>
                                    Feedback
                                </a>
                                <a class="dropdown-item">
                                    <i class="fas fa-trash"></i>
                                    Delete
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="project-info">
                        <div class="project-title">0701-1</div>
                        <div class="project-time">2 days ago</div>
                    </div>
                </div>
            </div>

            <!-- Dubbing Project 2 -->
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
                        <div class="dots-menu">
                            <button class="dots-btn" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                                <i class="fas fa-ellipsis-v"></i>
                            </button>
                            <div class="dropdown-menu">
                                <a class="dropdown-item">
                                    <i class="fas fa-edit"></i>
                                    Rename
                                </a>
                                <a class="dropdown-item">
                                    <i class="fas fa-comment"></i>
                                    Feedback
                                </a>
                                <a class="dropdown-item">
                                    <i class="fas fa-trash"></i>
                                    Delete
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="project-info">
                        <div class="project-title">0701</div>
                        <div class="project-time">2 days ago</div>
                    </div>
                </div>
            </div>
        </div>
    </div>
        </div>
    </section>

    <!-- Video Preview Modal -->
    <div class="modal fade" id="videoPreviewModal" tabindex="-1" aria-labelledby="videoPreviewModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg modal-dialog-centered">
            <div class="modal-content bg-dark text-white border-0" style="border-radius: 20px; background: #1a1a1a !important;">
                <div class="modal-header mt-2 pb-2">
                    <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
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
                                    <source src="<?php echo e(URL::asset('img/ai-avtar/analyzed_video.mp4')); ?>" type="video/mp4">
                                    Your browser does not support the video tag.
                                </video>
                        </div>
                    </div>
                    
                    <!-- Action Buttons -->
                    <div class="d-flex gap-3 justify-content-center mb-4">
                        <button class="btn btn-outline-light px-4 py-2" style="border-radius: 10px;">
                           <i class="fa-regular fa-download me-2"></i> Download
                        </button>
                      <button class="btn btn-outline-light px-4 py-2" style="border-radius: 10px;">
                            <i class="fa-regular fa-link me-2"></i> Copy Link
                        </button>
                    </div>
                    
                </div>
            </div>
        </div>
    </div>

  <script>

  </script>

  <?php $__env->stopSection(); ?>

  <?php $__env->startSection('js'); ?>

  <?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/customer/www/staging.paraclete.ai/public_html/resources/views/default/user/topview/all-project.blade.php ENDPATH**/ ?>