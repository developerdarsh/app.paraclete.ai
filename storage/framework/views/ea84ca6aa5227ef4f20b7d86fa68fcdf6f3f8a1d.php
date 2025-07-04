  
  <?php $__env->startSection('css'); ?>
  
  <!-- Sweet Alert CSS -->
  <link href="<?php echo e(URL::asset('plugins/sweetalert/sweetalert2.min.css')); ?>" rel="stylesheet" />
  <link href="<?php echo e(URL::asset('plugins/highlight/highlight.dark.min.css')); ?>" rel="stylesheet" />
  <!-- Slick CSS -->
  <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.css" />
  <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick-theme.css" />

    <style>
        :root {
            --primary-color: #4e40f3;
            --secondary-color: #6c757d;
            --light-gray: #f8f9fa;
            --border-color: #dee2e6;
        }
        .app-content .side-app {
             max-width: 1420px !important;
        }
        .all-anyshoot-template {
            postion: reletive;
            margin: 40px 0;
        }
         .all-anyshoot-template .primary-btn {
            background-color: var(--primary-color);
            border-color: var(--primary-color);
            color: white;
            transition: all 0.3s ease;
        }

        .all-anyshoot-template .primary-btn:hover {
            background-color: #3a2ec4;
            border-color: #3a2ec4;
            transform: translateY(-1px);
        }

         .all-anyshoot-template .upload-area {
            border: 2px dashed var(--border-color);
            border-radius: 12px;
            background-color: var(--light-gray);
            transition: all 0.3s ease;
            min-height: 300px;
            display: flex;
            align-items: center;
            justify-content: center;
            flex-direction: column;
        }

        .all-anyshoot-template .upload-area:hover {
            border-color: var(--primary-color);
            background-color: rgba(78, 64, 243, 0.05);
        }

       .all-anyshoot-template .card {
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            border-radius: 12px;
            background-color: white;
        }
         
       .all-anyshoot-template .card-header {
            display: inline-block;
            padding: 0.8rem 1rem;
            background-color: white;
            border-bottom: 1px solid var(--border-color);
            border-radius: 12px 12px 0 0 !important;
        }

       .all-anyshoot-template .mode-toggle {
            background-color: var(--light-gray);
            border-radius: 8px;
            padding: 4px;
        }

       .all-anyshoot-template .mode-toggle .nav-link {
            border-radius: 6px;
            border: none;
            padding: 8px 16px;
            font-size: 14px;
            transition: all 0.3s ease;
            color: var(--secondary-color);
            background-color: transparent;
        }

       .all-anyshoot-template .mode-toggle .nav-link.active {
            background-color: var(--primary-color);
            color: white;
        }

       .all-anyshoot-template .mode-toggle .nav-link:hover {
            background-color: rgba(78, 64, 243, 0.1);
            color: var(--primary-color);
        }

       .all-anyshoot-template .mode-toggle .nav-link.active:hover {
            background-color: var(--primary-color);
            color: white;
        }

      .all-anyshoot-template .sample-grid {
            display: grid;
            grid-template-columns: repeat(2, 1fr);
            gap: 12px;
        }

       .all-anyshoot-template .sample-item {
            border-radius: 8px;
            overflow: hidden;
            border: 2px solid transparent;
            transition: all 0.3s ease;
            cursor: pointer;
            background-color: var(--light-gray);
            aspect-ratio: 1;
            display: flex;
            align-items: center;
            justify-content: center;
        }

       .all-anyshoot-template .sample-item:hover {
            border-color: var(--primary-color);
            transform: scale(1.05);
        }

       .all-anyshoot-template .sample-item img {
            width: 100%;
            height: 100%;
            object-fit: cover;
        }

       .all-anyshoot-template .range-slider {
            accent-color: var(--primary-color);
        }

      .all-anyshoot-template .btn-outline-primary {
            border-color: var(--primary-color);
            color: var(--primary-color);
        }

       .all-anyshoot-template .btn-outline-primary:hover {
            background-color: var(--primary-color);
            border-color: var(--primary-color);
        }

       .all-anyshoot-template .action-btn {
            background-color: var(--light-gray);
            border: 1px solid var(--border-color);
            border-radius: 8px;
            padding: 12px;
            transition: all 0.3s ease;
            color: var(--secondary-color);
        }

       .all-anyshoot-template .action-btn:hover {
            background-color: var(--primary-color);
            color: white;
            border-color: var(--primary-color);
        }

       .all-anyshoot-template .generate-btn {
            background: linear-gradient(135deg, var(--primary-color), #6c5ce7);
            border: none;
            border-radius: 8px;
            padding: 12px 24px;
            color: white;
            font-weight: 600;
            transition: all 0.3s ease;
        }

       .all-anyshoot-template .generate-btn:hover {
            transform: translateY(-2px);
            box-shadow: 0 8px 15px rgba(78, 64, 243, 0.3);
        }

       .all-anyshoot-template .toolbar {
            background-color: white;
            border-radius: 8px;
            padding: 12px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        }

       .all-anyshoot-template .tool-btn {
            width: 40px;
            height: 40px;
            border-radius: 6px;
            border: 1px solid var(--border-color);
            background-color: white;
            display: flex;
            align-items: center;
            justify-content: center;
            transition: all 0.3s ease;
            margin: 0 2px;
        }

       .all-anyshoot-template .tool-btn:hover {
            background-color: var(--primary-color);
            color: white;
        }

       .all-anyshoot-template .tool-btn.active {
            background-color: var(--primary-color);
            color: white;
        }
        .all-anyshoot-template textarea.form-control {
            background-color: #ffffff;
            color: #282828;
            border: 1px solid #eee;
            resize: none;
            font-size: 14px;
        }
        .header-section {
            padding: 20px 0 10px;
            border-bottom: 1px solid #cfcfcf;
        }
        .header-section .btn-outline-light {
            color: #6e6e6e;
            border-color: rgba(219, 226, 235, .4901960784);
            padding: 0.6rem 0.8rem;
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
            grid-template-columns: repeat(auto-fill, minmax(160px, 1fr));
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
        .modal-fullscreen {
             width: 85vw;
        }
        .modal-fullscreen .modal-footer {
            border-radius: 0;
            background: #ffffff;
        }
         .modal-fullscreen .modal-footer .btn {
            border-radius: 40px;
            font-size: 14px;
            padding: 0.5rem 1rem;
            cursor: pointer;
            text-transform: capitalize;
            font-weight: 600;
            letter-spacing: 0.4px;
         }
        .header-section select.form-select {
             padding-right: 30px;
        }
        .avatar-card.selected {
            border: 3px solid #0d6efd; /* Bootstrap primary color */
            border-radius: 8px;
            box-shadow: 0 0 8px rgba(13, 110, 253, 0.5); /* subtle glow */
            transition: all 0.2s ease-in-out;
        }
    </style>

     <?php $__env->stopSection(); ?>

     <?php $__env->startSection('content'); ?>

    <div class="all-anyshoot-template">
       <div class="container-fluid py-4" style="background-color: white;">
        <div class="row">
            <!-- Left Sidebar -->
            <div class="col-md-3">
                <div class="card mb-4">
                    <div class="card-header">
                        <h5 class="mb-0">Product Image</h5>
                        <small class="text-muted">Image format: jpg, jpeg, png, webp; File size: < 10MB.</small>
                    </div>
                    <div class="card-body">
                        <div class="upload-area">
                            <i class="fas fa-home fa-2x text-muted mb-3"></i>
                            <p class="text-muted mb-0">Click to upload product image</p>
                        </div>
                    </div>
                </div>

                <!-- Drawing Tools -->
                <div class="toolbar mb-4">
                    <div class="mb-4">
                        <!-- Tool Tabs -->
                        <ul class="nav nav-tabs mb-3 border-0">
                            <li class="nav-item">
                            <button class="nav-link active tool-btn" id="brush-tab" data-bs-toggle="tab" data-bs-target="#brush" type="button">
                                <i class="fas fa-pencil-alt"></i>
                            </button>
                            </li>
                            <li class="nav-item">
                            <button class="nav-link tool-btn" id="eraser-tab" data-bs-toggle="tab" data-bs-target="#eraser" type="button">
                                <i class="fas fa-eraser"></i>
                            </button>
                            </li>
                        </ul>

                        <!-- Tab Contents -->
                        <div class="tab-content">
                            <!-- Brush Tab -->
                            <div class="tab-pane fade show active" id="brush" role="tabpanel" aria-labelledby="brush-tab">
                            <label class="form-label small">Brush Thickness</label>
                            <input type="range" class="form-range range-slider" min="1" max="10" value="5">
                            </div>

                            <!-- Eraser Tab -->
                            <div class="tab-pane fade" id="eraser" role="tabpanel" aria-labelledby="eraser-tab">
                            <label class="form-label small">Eraser Thickness</label>
                            <input type="range" class="form-range range-slider" min="1" max="10" value="5">
                            </div>
                        </div>
                        </div>
                      <div>
                        <label class="form-label small">Generating Count: 2</label>
                        <input type="range" class="form-range range-slider" min="1" max="4" value="2">
                        <div class="d-flex justify-content-between">
                            <small class="text-muted">1</small>
                            <small class="text-muted">2</small>
                            <small class="text-muted">3</small>
                            <small class="text-muted">4</small>
                        </div>
                    </div>
                    
                </div>
            </div>

            <!-- Main Content -->
            <div class="col-md-6">
                <!-- Mode Tabs -->
                <div class="d-flex justify-content-between align-items-center mb-4">
                    <ul class="nav nav-pills mode-toggle" id="modeTabs" role="tablist">
                        <li class="nav-item" role="presentation">
                            <button class="nav-link active" id="standard-tab" data-bs-toggle="pill" data-bs-target="#standard" type="button" role="tab">
                                Standard Mode
                            </button>
                        </li>
                        <li class="nav-item" role="presentation">
                            <button class="nav-link" id="creative-tab" data-bs-toggle="pill" data-bs-target="#creative" type="button" role="tab">
                                Creative Mode
                            </button>
                        </li>
                    </ul>
                    <button class="btn btn-outline-primary">
                        <i class="fas fa-external-link-alt me-2"></i>New
                    </button>
                </div>

                <!-- Tab Content -->
                <div class="tab-content" id="modeTabsContent">
                    <!-- Standard Mode Tab -->
                    <div class="tab-pane fade show active" id="standard" role="tabpanel">
                        <div class="card">
                            <div class="card-header d-flex justify-content-between align-items-center">
                                <h5 class="mb-0">Target Image</h5>
                                <small class="text-muted">
                                    <i class="fas fa-question-circle me-1"></i>How to Draw?
                                </small>
                            </div>
                            <div class="card-body" style="min-height: 400px;">
                                <!-- Canvas Area -->
                                <div class="d-flex align-items-center justify-content-center h-420">
                                    <div class="text-center">
                                        <img id="productImagePreview" src="" class="img-fluid mb-3" style="display: none; max-height: 400px; border-radius: 8px;" />
                                        <button class="btn primary-btn mb-3 py-3 px-5" data-bs-toggle="modal" data-bs-target="#PublicTemplatesModal" data-bs-whatever="@getbootstrap">
                                            Select from Public Templates
                                        </button>
                                        <div class="mb-3">
                                            <button class="action-btn d-block w-100 mb-2">
                                                <i class="fas fa-magic me-2"></i>AI Create
                                            </button>
                                            <button class="action-btn d-block w-100">
                                                <i class="fas fa-upload me-2"></i>Local Upload
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Creative Mode Tab -->
                    <div class="tab-pane fade" id="creative" role="tabpanel">
                        <div class="card">
                            <div class="card-header d-flex justify-content-between align-items-center">
                                <h5 class="mb-0">Image Prompt</h5>
                                <button class="btn btn-sm btn-outline-primary">
                                    <i class="fas fa-magic me-1"></i>AI Design Prompt
                                </button>
                            </div>
                            <div class="card-body">
                                <div class="mb-3">
                                    <textarea 
                                        class="form-control" 
                                        rows="10" 
                                        placeholder="Please describe how you would like to modify your product image. For example, &quot;Dress this outfit on a Zara-style model.&quot;&#10;&#10;Not sure what to write? Try the AI Design Prompt button."
                                        "
                                    ></textarea>
                                    <div class="d-flex justify-content-end mt-2">
                                        <small class="text-muted">0/1500</small>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Generate Button -->
                <div class="text-center mt-4">
                    <button class="generate-btn">
                        <i class="fas fa-cog me-2"></i>Generate
                        <span class="badge bg-success ms-2">Limited Free</span>
                    </button>
                </div>
            </div>

            <!-- Right Sidebar -->
            <div class="col-md-3">
                <div class="card">
                    <div class="card-header">
                        <h5 class="mb-0">Samples</h5>
                       
                    </div>
                    <div class="card-body">
                        <div class="sample-grid">
                            <div class="sample-item">
                                <i class="fas fa-tshirt fa-2x text-muted"></i>
                            </div>
                            <div class="sample-item">
                                <i class="fas fa-shoe-prints fa-2x text-muted"></i>
                            </div>
                            <div class="sample-item">
                                <i class="fas fa-hat-cowboy fa-2x text-muted"></i>
                            </div>
                            <div class="sample-item">
                                <i class="fas fa-female fa-2x text-muted"></i>
                            </div>
                        </div>
                    </div>
                    <div class="card-footer">
                         <small class="text-muted">Click to Try Samples</small>
                     </div>
                </div>
            </div>
        </div>
    </div>
    </div>

   <!---  PublicTemplatesModal Start ---> 
    <div class="modal fade" id="PublicTemplatesModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-fullscreen">
            <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                    <div class="header-section">
                        <div class="d-flex justify-content-between align-items-center">
                            <h2 class="mb-0">Public Templates</h2>
                            <div class="d-flex gap-2">
                                <select class="form-select" aria-label="Default select example">
                                    <option selected>Type: All</option>
                                    <option value="1">All</option>
                                    <option value="2">UGC</option>
                                    <option value="3">Pro</option>
                                </select>
                                <button class="btn btn-outline-light btn-sm">
                                    <i class="fas fa-heart"></i>
                                </button>
                            </div>
                        </div>
                    </div>

                    <!-- Filter Tabs -->
                    <div class="filter-tabs">
                        <ul class="nav nav-pills flex-wrap" id="filterTabs">
                            <li class="nav-item">
                                <a class="nav-link active" href="#" data-category="">All</a>
                            </li>
                            <?php $__currentLoopData = $categories['result']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <li class="nav-item">
                                    <a class="nav-link" href="#" data-category="<?php echo e($category['categoryId']); ?>">
                                        <?php echo e($category['categoryName']); ?>

                                    </a>
                                </li>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </ul>
                    </div>
                    <!-- Avatar Grid -->
                    <div class="avatar-grid" id="templateGrid">
                        <!-- Keep the upload card first always -->
                        <div class="upload-card" data-bs-toggle="tooltip" title="Use My Photo">
                            <i class="fa-regular fa-image fa-2x mb-2"></i>
                            <span class="small">Materials Maker</span>
                        </div>

                        <?php $__currentLoopData = $template_list['result']['data']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $template): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <div class="avatar-card" data-url="<?php echo e($template['coverUrl']); ?>" data-template="<?php echo e($template['templateId']); ?>" data-category="<?php echo e($template['templateCategoryList'][0]['categoryName'] ?? 'all'); ?>">
                                <?php if($template['style'] === 'Pro'): ?>
                                    <div class="premium-badge">VIP</div>
                                <?php endif; ?>
                                <img src="<?php echo e($template['coverUrl']); ?>" class="avatar-image" alt="Template">
                                <div class="control-icons">
                                    <button class="control-icon" title="Favorite"><i class="fa-regular fa-star"></i></button>
                                    <button class="control-icon" title="Refresh"><i class="fas fa-redo"></i></button>
                                </div>
                            </div>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </div>

                    <!-- Load More -->
                    <div class="text-center mt-3">
                        <button id="loadMoreBtn" class="btn btn-primary" data-page="2" data-category="">Load More</button>
                    </div>

                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-outline-primary" data-bs-dismiss="modal">Cancel</button>
                <button type="button" class="btn btn-primary">Use</button>
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

     // Handle filter tab clicks
        document.querySelectorAll('.filter-tabs .nav-link').forEach(link => {
            link.addEventListener('click', function(e) {
                e.preventDefault();
                
                // Remove active class from all links
                document.querySelectorAll('.filter-tabs .nav-link').forEach(l => l.classList.remove('active'));
                
                // Add active class to clicked link
                this.classList.add('active');
                
                // Get filter category
                const filterCategory = this.getAttribute('data-category');
                
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

        document.addEventListener('DOMContentLoaded', function () {
            const loadMoreBtn = document.getElementById('loadMoreBtn');
            let currentPage = 2;

            // Load More button click
            loadMoreBtn.addEventListener('click', function () {
                const categoryId = loadMoreBtn.getAttribute('data-category');

                $.ajax({
                    url: '<?php echo e(route("avatars.anyshoot.templete.ajax")); ?>',
                    method: 'GET',
                    data: {
                        page: currentPage,
                        category_id: categoryId
                    },
                    beforeSend: function () {
                        loadMoreBtn.disabled = true;
                        loadMoreBtn.textContent = 'Loading...';
                    },
                    success: function (res) {
                         if (res.templates && res.templates.length > 0) {
                            res.templates.forEach(template => {
                                const isVip = template.style === 'Pro' ? `<div class="premium-badge">VIP</div>` : '';
                                const templateCard = `
                                    <div class="avatar-card" data-url="${template.coverUrl}" data-template="${template.templateId}" data-category="${template.templateCategoryList?.[0]?.categoryName || 'all'}">
                                        ${isVip}
                                        <img src="${template.coverUrl}" class="avatar-image" alt="Template">
                                        <div class="control-icons">
                                            <button class="control-icon" title="Favorite"><i class="fa-regular fa-star"></i></button>
                                            <button class="control-icon" title="Refresh"><i class="fas fa-redo"></i></button>
                                        </div>
                                    </div>
                                `;
                                $('#templateGrid').append(templateCard);
                            });

                            currentPage++;
                            loadMoreBtn.setAttribute('data-page', currentPage);
                            loadMoreBtn.disabled = false;
                            loadMoreBtn.textContent = 'Load More';
                        } else {
                            loadMoreBtn.style.display = 'none';
                        }
                    },
                    error: function () {
                        loadMoreBtn.disabled = false;
                        loadMoreBtn.textContent = 'Load More';
                        alert('Error loading templates');
                    }
                });
            });

            // Category tab click
            $('#filterTabs .nav-link').on('click', function (e) {
                e.preventDefault();
                $('#filterTabs .nav-link').removeClass('active');
                $(this).addClass('active');

                const categoryId = $(this).data('category');
                currentPage = 1;

                // Update button attributes
                loadMoreBtn.setAttribute('data-category', categoryId);
                loadMoreBtn.setAttribute('data-page', currentPage + 1); // Because page 1 is about to be loaded
                loadMoreBtn.style.display = 'block';

                $.ajax({
                    url: '<?php echo e(route("avatars.anyshoot.templete.ajax")); ?>',
                    method: 'GET',
                    data: {
                        page: 1,
                        category_id: categoryId
                    },
                    beforeSend: function () {
                        $('#templateGrid').html(`
                            <div class="upload-card" data-bs-toggle="tooltip" title="Use My Photo">
                                <i class="fa-regular fa-image fa-2x mb-2"></i>
                                <span class="small">Materials Maker</span>
                            </div>
                        `);
                         if (res.templates && res.templates.length > 0) {
                            res.templates.forEach(template => {
                                const isVip = template.style === 'Pro' ? `<div class="premium-badge">VIP</div>` : '';
                                const templateCard = `
                                    <div class="avatar-card" data-url="${template.coverUrl}" data-template="${template.templateId}" data-category="${template.templateCategoryList?.[0]?.categoryName || 'all'}">
                                        ${isVip}
                                        <img src="${template.coverUrl}" class="avatar-image" alt="Template">
                                        <div class="control-icons">
                                            <button class="control-icon" title="Favorite"><i class="fa-regular fa-star"></i></button>
                                            <button class="control-icon" title="Refresh"><i class="fas fa-redo"></i></button>
                                        </div>
                                    </div>
                                `;
                                $('#templateGrid').append(templateCard);
                            });

                            currentPage++;
                            loadMoreBtn.setAttribute('data-page', currentPage);
                            loadMoreBtn.disabled = false;
                            loadMoreBtn.textContent = 'Load More';
                        } else {
                            loadMoreBtn.style.display = 'none';
                        }
                    },
                    success: function (res) {
                        if (res.html) {
                            $('#templateGrid').append(res.html);
                        } else {
                            loadMoreBtn.style.display = 'none';
                        }
                    },
                    error: function () {
                        alert('Error loading category templates');
                    }
                });
            });
        });

        // Handle avatar selection
        $(document).on('click', '.avatar-card', function () {
            $('.avatar-card').removeClass('selected'); // optional highlight
            $(this).addClass('selected');
            selectedImageUrl = $(this).data('url');
            console.log(selectedImageUrl);
        });

        // Handle 'Use' button click
        $('#PublicTemplatesModal .btn-primary').on('click', function () {
            if (selectedImageUrl) {
                $('#productImagePreview')
                    .attr('src', selectedImageUrl)
                    .show(); // show image

                $('#PublicTemplatesModal').modal('hide'); // close modal
            } else {
                alert('Please select a template image first.');
            }
        });


    </script>
    
    <?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/customer/www/staging.paraclete.ai/public_html/resources/views/classic/user/topview/all-anyshoot-template.blade.php ENDPATH**/ ?>