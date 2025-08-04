

  
  <?php $__env->startSection('css'); ?>
  
  <!-- Sweet Alert CSS -->
  <link href="<?php echo e(URL::asset('plugins/sweetalert/sweetalert2.min.css')); ?>" rel="stylesheet" />
  <link href="<?php echo e(URL::asset('plugins/highlight/highlight.dark.min.css')); ?>" rel="stylesheet" />
  <!-- Slick CSS -->
  <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.css" />
  <link rel="stylesheet" type="text/css"
    href="https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick-theme.css" />

  <style>
    /* Header Block */
    .header {
      background-color: #2d2d2d;
      border-bottom: 1px solid #868686;
      padding: 0;
    }

    .header__container {
      display: flex;
      justify-content: space-between;
      align-items: center;
      padding: 12px 0px;
    }

    .header__left {
      display: flex;
      align-items: center;
    }

    .header__right {
      display: flex;
      align-items: center;
      gap: 16px;
    }

    /* Logo Block */
    .logo {
      color: #ffffff;
      font-weight: 600;
      font-size: 16px;
      text-decoration: none;
    }

    .logo::before {
      content: "|||";
      color: #6366f1;
      margin-right: 8px;
      font-weight: bold;
    }

    /* Button Block */
    .button {
      border: none;
      border-radius: 6px;
      padding: 8px 16px;
      font-size: 14px;
      cursor: pointer;
      transition: all 0.3s ease;
      text-decoration: none;
      display: inline-flex;
      align-items: center;
      font-weight: 500;
    }

    .button--back {
      background-color: #404040;
      color: #ffffff;
      margin-right: 16px;
    }

    .button--back:hover {
      background-color: #505050;
      color: #ffffff;
    }

    .button--import {
      background: linear-gradient(135deg, #6366f1, #8b5cf6);
      color: white;
      font-size: 14px;
    }

    .button--import:hover {
      background: linear-gradient(135deg, #5856eb, #7c3aed);
    }

    .button--secondary {
      background-color: #404040;
      color: #ffffff;
      padding: 10px 20px;
    }

    .button--secondary:hover {
      background-color: #505050;
      color: #ffffff;
    }

    .button--primary {
      background: linear-gradient(135deg, #6366f1, #8b5cf6);
      color: white;
      padding: 10px 24px;
    }

    .button--primary:hover {
      background: linear-gradient(135deg, #5856eb, #7c3aed);
    }

    .button__icon {
      margin-right: 8px;
    }

    /* Avatar Block */
    .avatar {
      width: 32px;
      height: 32px;
      background: linear-gradient(135deg, #06d6a0, #118ab2);
      border-radius: 50%;
      display: flex;
      align-items: center;
      justify-content: center;
      color: white;
      font-weight: 600;
      font-size: 14px;
    }

    /* Main Container Block */
    .main-container {
      margin: 40px auto;
      padding: 0 20px;
    }

    /* Section Block */
    .section {
      margin-bottom: 40px;
    }

    .section__header {
      display: flex;
      justify-content: space-between;
      align-items: center;
      margin-bottom: 24px;
    }

    .section__title {
      font-size: 18px;
      font-weight: 600;
      margin: 0;
    }

    /* Link Block */
    .link {
      color: #888;
      font-size: 14px;
      text-decoration: none;
      transition: color 0.3s ease;
    }

    .link:hover {
      color: #6366f1;
    }

    /* Import Block */
    .import {
      margin-bottom: 24px;
    }

    .import__input-container {
      position: relative;
      margin-bottom: 20px;
    }

    .import__input {
      background-color: #f2f2f2;
      border: 1px solid #404040;
      color: #000000;
      border-radius: 8px;
      padding: 12px 140px 12px 40px;
      width: 100%;
      font-size: 14px;
    }

    .import__input:focus {
      border-color: #6366f1;
      box-shadow: 0 0 0 0.2rem rgba(99, 102, 241, 0.25);
      outline: none;
    }

    .import__input::placeholder {
      color: #888;
    }

    .import__link-icon {
      position: absolute;
      left: 12px;
      top: 50%;
      transform: translateY(-50%);
      color: #888;
    }

    .import__format-icons {
      position: absolute;
      right: 140px;
      top: 50%;
      transform: translateY(-50%);
      display: flex;
      gap: 8px;
      font-size: 12px;
      color: #888;
    }

    .import__button {
      position: absolute;
      right: 8px;
      top: 50%;
      transform: translateY(-50%);
    }

    .import__cards {
      display: flex;
      gap: 15px;
      flex-wrap: wrap;
    }

    /* Card Block */
    .import__cards .card {
      border-radius: 12px;
      padding: 30px 20px;
      text-align: center;
      cursor: pointer;
      transition: all 0.3s ease;
      flex: 1;
      min-width: 200px;
    }

    .import__cards .card:hover {
      border-color: #dedfff;
    }

    .import__cards .card__icon {
      font-size: 24px;
      color: #888;
      margin-bottom: 10px;
      display: block;
    }

    .import__cards .card__title {
      font-weight: 600;
      margin-bottom: 5px;
    }

    .import__cards .card__subtitle {
      color: #888;
      font-size: 12px;
    }

    /* Form Block */
    .form {
      margin-bottom: 24px;
    }

    .form__group {
      margin-bottom: 24px;
    }

    .form__label {
      font-weight: 500;
      margin-bottom: 8px;
      display: block;
      font-size: 14px;
    }

    .form__input {
      background-color: #f2f2f2;
      border: 1px solid #404040;
      color: #000000;
      border-radius: 8px;
      padding: 12px;
      width: 100%;
      font-size: 14px;
    }

    .form__input:focus {
      background-color: #f2f2f2;
      border-color: #6366f1;
      box-shadow: 0 0 0 0.2rem rgba(99, 102, 241, 0.25);
      outline: none;
    }

    .form__input::placeholder {
      color: #888;
    }

    .form__textarea {
      background-color: #ffffff;
      border: 1px solid #404040;
      color: #000000;
      border-radius: 8px;
      padding: 16px;
      min-height: 200px;
      resize: vertical;
      width: 100%;
      font-size: 14px;
    }

    .form__textarea:focus {
      border-color: #6366f1;
      box-shadow: 0 0 0 0.2rem rgba(99, 102, 241, 0.25);
      outline: none;
    }

    .form__textarea::placeholder {
      color: #888;
    }

    .form__char-count {
      text-align: right;
      color: #888;
      font-size: 12px;
      margin-top: 5px;
    }


    /* More Options Block */
    .more-options {
      cursor: pointer;
      margin-bottom: 30px;
    }

    .more-options__icon {
      margin-right: 8px;
      transition: transform 0.3s ease;
    }

    .more-options__icon--expanded {
      transform: rotate(90deg);
    }

    /* Controls Block */
    .controls {
      display: flex;
      justify-content: space-between;
      align-items: center;
      padding: 20px 0;
      border-top: 1px solid #404040;
    }

    .controls__group {
      display: flex;
      align-items: center;
      gap: 15px;
    }

    /* Select Block */
    .controls__group .select {
      background-color: #2d2d2d;
      border: 1px solid #404040;
      color: #ffffff;
      border-radius: 6px;
      padding: 8px 12px;
      font-size: 14px;
      cursor: pointer;
    }

    .controls__group .select:focus {
      border-color: #6366f1;
      outline: none;
    }

    /* Flag Block */
    .flag {
      font-size: 16px;
      margin-right: 8px;
    }

    /* Icon Block */
    .icon {
      color: #888;
      margin-right: 8px;
    }

    .icon--user {
      font-size: 18px;
    }

    /* Page Title Block */
    .page-title {
      color: #ffffff;
      font-size: 16px;
    }

    .form__group .nav-tabs {
      border-bottom: 1px solid #dee2e6;
      gap: 10px;
    }

    .form__group .nav-tabs .nav-link {
      color: #1e1e2d;
      background-color: #404040;
      color: #ffffff;
      border: none;
      padding: 8px 16px;
      border-radius: 6px 6px 0 0;
      cursor: pointer;
      font-size: 14px;
      transition: background-color 0.3s ease;
    }

    .form__group .nav-tabs .nav-link.active {
      color: #ffffff;
      background: linear-gradient(135deg, #6366f1, #8b5cf6) !important;
      border-top-left-radius: 5px;
      border-top-right-radius: 5px;
    }

    .card.dragover {
      border-color: #333;
      background-color: #f8f8f8;
    }

    .card__icon {
      font-size: 40px;
      color: #666;
    }

    .card__title {
      margin-top: 10px;
      font-weight: bold;
    }

    .card__subtitle {
      font-size: 12px;
      color: #999;
    }

    #preview {
      margin-top: 20px;
      max-width: 100%;
    }

    .preview-wrapper {
      margin-top: 15px;
      word-wrap: break-word;
      background-color: #fff;
      background-clip: border-box;
      position: relative;
      margin-bottom: 1.5rem;
      width: 100%;
      border: 1px solid rgba(219, 226, 235, .4901960784);
      border-radius: 8px;
    }

    img.preview-image {
      max-width: 100%;
      max-height: 200px;
      border-radius: 8px;
    }

    .more-options .container-custom {
      padding: 20px 0;
      position: relative;
    }

    .more-options .container-custom .section-title {
      font-size: 16px;
      font-weight: 500;
      margin-bottom: 15px;
    }

    .more-options .container-custom .form-control,
    .more-options .container-custom .form-select {
      color: #000000;
      border-radius: 8px;
      font-size: 14px;
    }



    .more-options .container-custom .form-control::placeholder {
      color: #888888;
    }

    .more-options .container-custom .btn-toggle {
      background-color: #404040;
      border: 1px solid #404040;
      border-radius: 8px;
      padding: 8px 16px;
      margin-right: 10px;
      transition: all 0.3s ease;
    }

    .more-options .container-custom .btn-toggle.active,
    .more-options .container-custom .nav-link.active.btn-toggle {
      color: #ffffff;
      background: linear-gradient(135deg, #6366f1, #8b5cf6) !important;
      border-top-left-radius: 5px;
      border-top-right-radius: 5px;
    }

    .more-options .container-custom .nav-pills .nav-link {
      color: #1e1e2d;
      background-color: #404040;
      color: #ffffff;
      border: none;
      padding: 8px 16px;
      border-radius: 6px 6px 0 0;
      cursor: pointer;
      font-size: 14px;
      transition: background-color 0.3s ease;
    }

    .more-options .container-custom .style-prompt-container {
      background-color: #ffffff;
      border: 1px solid #ced4da;
      border-radius: 8px;
      padding: 20px;
    }

    .more-options .container-custom .style-prompt-textarea {
      min-height: 180px;
      font-family: 'Courier New', monospace;
      font-size: 14px;
      line-height: 1.5;
      resize: vertical;
    }

    .more-options .container-custom .character-count {
      text-align: right;
      margin-top: 10px;
      font-size: 12px;
    }

    .more-options .container-custom .btn-outline-secondary {
      background-color: #404040;
      border-color: #404040;
      color: #ffffff;
      padding: 0.4rem 0.8rem;
      border-radius: 40px;
    }

    .more-options .container-custom .btn-outline-secondary:hover {
      background-color: #505050;
      border-color: #505050;
    }

    .more-options .container-custom .btn-primary {
      background-color: #6f42c1;
      border-color: #6f42c1;
          font-size: 12px;
    }

    .more-options .container-custom .btn-primary:hover {
      background-color: #5a35a1;
      border-color: #5a35a1;
    }

    .more-options .container-custom .upload-area {
      border: 1px dashed #533afd;
      border-radius: 8px;
      padding: 20px 20px;
      text-align: center;
      background-color: rgba(83, 58, 253, 0.1);
      cursor: pointer;
      transition: border-color 0.3s ease;
    }

    .more-options .container-custom .upload-area:hover {
      border-color: #0d6efd;
    }

    .more-options .container-custom .upload-icon {
      font-size: 24px;
      margin-bottom: 10px;
      color: #888888;
    }

    .more-options .container-custom .upload-text {
      color: #888888;
      font-size: 14px;
    }

    .more-options .container-custom .batch-btn {
      background: linear-gradient(135deg, #6366f1, #8b5cf6);
      color: #ffffff;
      border-radius: 8px;
      padding: 12px 20px;
      text-decoration: none;
      display: inline-flex;
      align-items: center;
      transition: background-color 0.3s ease;
    }

    .more-options .container-custom .batch-btn:hover {
      background-color: #404040;
      text-decoration: none;
    }

    .more-options .container-custom .info-icon {
      color: #888888;
      font-size: 14px;
      margin-left: 5px;
      cursor: help;
    }

    .more-options .container-custom .form-check-input:checked {
      background-color: #6366f1;
      border-color: #6366f1;
    }

    .more-options .container-custom .form-check-label {}

    .more-options .container-custom .collapse-btn {
      background: none;
      border: none;
      color: #533afd;
      font-size: 16px;
      font-weight: 500;
      display: flex;
      align-items: center;
      margin-bottom: 20px;
    }

    .more-options .container-custom .collapse-btn i {
      color: #533afd;
      margin-right: 8px;
      transition: transform 0.3s ease;
    }

    .more-options .container-custom .collapse-btn.collapsed i {
      transform: rotate(-90deg);
    }

    /* Responsive Design */
    @media (max-width: 768px) {
      .import__cards {
        flex-direction: column;
      }

      .card {
        min-width: auto;
      }

      .controls {
        flex-direction: column;
        gap: 20px;
      }

      .controls__group {
        flex-wrap: wrap;
        justify-content: center;
      }

      .main-container {
        padding: 0 15px;
      }

      .header__container {
        padding: 12px 0px;
      }
    }
  </style>

  <?php $__env->stopSection(); ?>

  <?php $__env->startSection('content'); ?>

  <!-- Header Block -->
  <header class="header">
    <div class="header__container">
      <div class="header__left">
        <a href="<?php echo e(route('user.avatar')); ?>" class="button button--back">
          <i class="fas fa-arrow-left button__icon"></i>Dashboard
        </a>
      </div>
    </div>
  </header>

  <!-- Main Container Block -->
  <main class="main-container">
    <!-- Import Materials Section Block -->
    <section class="section">
      <header class="section__header">
        <h1 class="section__title">Import Materials</h1>
        <a href="#" class="link">Try sample</a>
      </header>

      <!-- Import Block -->
      <div class="import">
        <!-- URL Import -->
        <div class="import__input-container">
          <i class="fas fa-link import__link-icon"></i>
          <input type="text" class="import__input" placeholder="Enter a link, supports">
          <div class="import__format-icons">
            <i class="fab fa-youtube" title="YouTube"></i>
            <i class="fas fa-file-alt" title="Document"></i>
            <i class="fas fa-file-pdf" title="PDF"></i>
            <i class="fas fa-link" title="Link"></i>
            <i class="fas fa-envelope" title="Email"></i>
            <i class="fas fa-chart-bar" title="Excel"></i>
            <i class="fas fa-font" title="Text"></i>
            <i class="fas fa-play" title="Video"></i>
            <i class="fas fa-ellipsis-h" title="More"></i>
          </div>
          <button class="button button--import import__button">Import from Link</button>
        </div>

        <!-- Import Cards -->
        <div class="import__cards">
          <div class="card">
            <div id="uploadCard">
              <i class="fas fa-cloud-upload-alt card__icon"></i>
              <div class="card__title">Upload File</div>
              <div class="card__subtitle">(mp4, mov, png, jpg, bmp, webp)</div>
            </div>
            <input type="file" id="fileInput" multiple accept=".mp4,.mov,.png,.jpg,.jpeg,.bmp,.webp" style="display: none;">
          </div>
          <div class="card">
            <i class="fas fa-robot card__icon"></i>
            <div class="card__title">AI Create</div>
          </div>
          <div class="card">
            <i class="fas fa-folder card__icon"></i>
            <div class="card__title">Import from Assets</div>
          </div>
        </div>
        <!-- preview images -->
        <div class="preview-wrapper" id="previewWrapper"></div>
      </div>
    </section>

    <!-- Product Form Section Block -->
    <section class="section">
      <!-- Product Name Form Group -->
      <div class="form__group">
        <label class="form__label">Product Name</label>
        <input type="text" class="form__input" placeholder="Your product name or video topic">
      </div>

      <!-- Script Form Group -->
      <div class="form__group">
        <ul class="nav nav-tabs" id="productTabs" role="tablist">
          <li class="nav-item" role="presentation">
            <button class="nav-link active" id="details-tab" data-bs-toggle="tab" data-bs-target="#details"
              type="button" role="tab" aria-controls="details" aria-selected="true">
              Product Details for The Script
            </button>
          </li>
          <li class="nav-item" role="presentation">
            <button class="nav-link" id="myscript-tab" data-bs-toggle="tab" data-bs-target="#myscript" type="button"
              role="tab" aria-controls="myscript" aria-selected="false">
              Use My Script
            </button>
          </li>
        </ul>

        <!-- Tab Content -->
        <div class="tab-content mt-3" id="productTabsContent">
          <!-- Tab 1 -->
          <div class="tab-pane fade show active" id="details" role="tabpanel" aria-labelledby="details-tab">
            <textarea class="form-control" placeholder="Describe the features of your product/service/application."
              maxlength="5000" rows="10" oninput="updateCharCount(this, 'charCount1')"></textarea>
            <div class="form-text text-end"><span id="charCount1">0</span>/5000</div>
          </div>

          <!-- Tab 2 -->
          <div class="tab-pane fade" id="myscript" role="tabpanel" aria-labelledby="myscript-tab">
            <textarea class="form-control"
              placeholder="Input your own script content; the Al will use it directly without editing." maxlength="5000"
              rows="10" oninput="updateCharCount(this, 'charCount2')"></textarea>
            <div class="form-text text-end"><span id="charCount2">0</span>/5000</div>
          </div>
        </div>
      </div>
      <!-- More Options Block -->
      <div class="more-options">
        <div class="container-custom">
          <button class="collapse-btn" type="button" data-bs-toggle="collapse" data-bs-target="#moreOptions"
            aria-expanded="true">
            <i class="fa fa-chevron-down"></i>
            More Options
          </button>

          <div class="collapse" id="moreOptions">
            <!-- Script Writing Style -->
            <div class="mb-4">
              <div class="section-title">Script Writing Style</div>

              <!-- Bootstrap Tabs -->
              <ul class="nav nav-pills mb-3" id="styleTabs" role="tablist">
                <li class="nav-item" role="presentation">
                  <button class="nav-link active btn-toggle" id="choose-style-tab" data-bs-toggle="pill"
                    data-bs-target="#choose-style" type="button" role="tab" aria-controls="choose-style"
                    aria-selected="true">
                    Choose A Style
                  </button>
                </li>
                <li class="nav-item" role="presentation">
                  <button class="nav-link btn-toggle" id="my-style-tab" data-bs-toggle="pill" data-bs-target="#my-style"
                    type="button" role="tab" aria-controls="my-style" aria-selected="false">
                    Use My Style Prompt
                  </button>
                </li>
              </ul>

              <!-- Tab Content -->
              <div class="tab-content" id="styleTabsContent">
                <!-- Choose A Style Tab -->
                <div class="tab-pane fade show active" id="choose-style" role="tabpanel"
                  aria-labelledby="choose-style-tab">
                  <select class="form-select">
                    <option selected>Auto-select by AI</option>
                    <option>Formal</option>
                    <option>Casual</option>
                    <option>Educational</option>
                    <option>Entertainment</option>
                  </select>
                </div>

                <!-- Use My Style Prompt Tab -->
                <div class="tab-pane fade" id="my-style" role="tabpanel" aria-labelledby="my-style-tab">
                  <div class="style-prompt-container">
                    <div class="d-flex justify-content-end mb-3 gap-2">
                      <button class="btn btn-outline-secondary btn-sm">
                        <i class="fa fa-shuffle"></i> Random
                      </button>
                      <button class="btn btn-outline-secondary btn-sm">
                        <i class="fa fa-upload"></i> Load Prompt
                      </button>
                      <button class="btn btn-primary btn-sm">Save Prompt</button>
                    </div>

                    <div class="style-prompt-content">
                      <textarea class="form-control style-prompt-textarea" rows="8"
                        placeholder="Enter your custom style prompt..."></textarea>
                      <div class="character-count">
                        <span class="text-muted">430/3000</span>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>

            <!-- Target Audience -->
            <div class="mb-4">
              <div class="section-title">Target Audience (Optional)</div>
              <textarea class="form-control" rows="3"
                placeholder="The target audience can better guide the AI in script writing."></textarea>
            </div>

            <!-- Video Length -->
            <div class="mb-4">
              <div class="section-title">
                Video Length
                <i class="bi bi-info-circle info-icon" title="Information about video length"></i>
              </div>
              <select class="form-select" style="max-width: 200px;">
                <option selected>Auto (15s-30s)</option>
                <option>15 seconds</option>
                <option>30 seconds</option>
                <option>60 seconds</option>
                <option>90 seconds</option>
              </select>
            </div>

            <!-- Logo & Endcard -->
            <div class="mb-4">
              <div class="section-title">Logo & Endcard</div>
              <div class="row">
                <div class="col-md-6">
                  <div class="form-check mb-3">
                    <input class="form-check-input" type="checkbox" id="endcard">
                    <label class="form-check-label" for="endcard">
                      Endcard
                      <i class="bi bi-info-circle info-icon" title="Information about endcard"></i>
                    </label>
                  </div>
                <div class="upload-area mb-2">
                    <div class="upload-text">png, jpg, mp4</div>
                    <div class="upload-preview"></div> <!-- Preview here -->
                </div>

                  <div class="d-flex gap-2 mb-2">
                    <select class="form-select flex-grow-1">
                      <option>For All Size</option>
                      <option>For 9:16</option>
                      <option>For 3:4</option>
                      <option>For 1:1</option>
                      <option>For 4:3</option>
                      <option>For 16:9</option>
                    </select>
                  </div>
                  <div class="form-check">
                    <input class="form-check-input" type="checkbox" id="blackBg">
                    <label class="form-check-label" for="blackBg">
                      Black Background
                    </label>
                  </div>
                   <div class="form-check">
                    <input class="form-check-input" type="checkbox" id="blackBg2">
                    <label class="form-check-label" for="blackBg2">
                      White Background
                    </label>
                  </div>
                </div>

                <div class="col-md-6">
                  <div class="form-check mb-3">
                    <input class="form-check-input" type="checkbox" id="watermark">
                    <label class="form-check-label" for="watermark">
                      Watermark
                      <i class="bi bi-info-circle info-icon" title="Information about watermark"></i>
                    </label>
                  </div>
                  <div class="upload-area mb-2">
                    <div class="upload-text">png, jpg, mp4</div>
                    <div class="upload-preview"></div> <!-- Preview here -->
                    </div>
                </div>
              </div>
            </div>

            <!-- Batch Mode -->
            <div class="mb-4">
              <div class="section-title">Batch Mode</div>
              <a href="#" class="batch-btn">
                Go to Batch Link-to-Video
                <i class="bi bi-arrow-right ms-2"></i>
              </a>
            </div>
          </div>
        </div>
      </div>
    </section>

    <!-- Bottom Controls Section Block -->
    <section class="controls">
      <div class="controls__group">
        <select class="select">
          <option>9:16</option>
          <option>3:4</option>
          <option>1:1</option>
          <option>4:3</option>
          <option>16:9</option>
        </select>

        <select class="select">
          <option>English</option>
          <option>Spanish</option>
          <option>French</option>
        </select>

        <div class="controls__group">
          <button class="button button--secondary">
            Violet
          </button>
        </div>

        <div class="controls__group">
          <button class="button button--secondary">
            No avatar
          </button>
        </div>
      </div>

      <div class="controls__group">
        <!-- <button class="button button--secondary">
          <i class="fas fa-lightbulb button__icon"></i>Think
        </button> -->
        <button class="button button--primary">
          <i class="fas fa-magic button__icon"></i>Generate
        </button>
      </div>
    </section>

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
      const uploadCard = document.getElementById('uploadCard');
      const fileInput = document.getElementById('fileInput');
      const previewWrapper = document.getElementById('previewWrapper');

      uploadCard.addEventListener('click', () => fileInput.click());

        fileInput.addEventListener('change', (e) => {
            const files = Array.from(e.target.files);
            files.forEach(file => handleFile(file));
        });

      uploadCard.addEventListener('dragover', (e) => {
        e.preventDefault();
        uploadCard.classList.add('dragover');
      });

      uploadCard.addEventListener('dragleave', () => {
        uploadCard.classList.remove('dragover');
      });

      uploadCard.addEventListener('drop', (e) => {
        e.preventDefault();
        uploadCard.classList.remove('dragover');
        const file = e.dataTransfer.files[0];
        handleFile(file);
      });

      function handleFile(file) {
        if (!file) return;
        previewWrapper.innerHTML = '';

        const fileType = file.type;
        const validImageTypes = ['image/png', 'image/jpeg', 'image/jpg', 'image/bmp', 'image/webp'];
        const validVideoTypes = ['video/mp4', 'video/quicktime'];

        if (validImageTypes.includes(fileType)) {
          const reader = new FileReader();
          reader.onload = function (e) {
            const img = document.createElement('img');
            img.src = e.target.result;
            img.className = 'preview-image';
            previewWrapper.appendChild(img);
          };
          reader.readAsDataURL(file);
        } else if (validVideoTypes.includes(fileType)) {
          const message = document.createElement('div');
          message.textContent = `Video file selected: ${file.name}`;
          previewWrapper.appendChild(message);
        } else {
          const message = document.createElement('div');
          message.textContent = `Unsupported file type: ${file.name}`;
          previewWrapper.appendChild(message);
        }
      }
    </script>

    <script>
      // Toggle collapse button icon
      document.querySelector('.collapse-btn').addEventListener('click', function () {
        this.classList.toggle('collapsed');
      });

      // Handle style toggle buttons - now handled by Bootstrap tabs

      // Character counter for style prompt
      const textarea = document.querySelector('.style-prompt-textarea');
      const counter = document.querySelector('.character-count span');

      if (textarea && counter) {
        textarea.addEventListener('input', function () {
          const count = this.value.length;
          counter.textContent = `${count}/3000`;

          if (count > 3000) {
            counter.style.color = '#dc3545';
          } else if (count > 2700) {
            counter.style.color = '#ffc107';
          } else {
            counter.style.color = '#6c757d';
          }
        });
      }

      // Handle upload areas
      document.querySelectorAll('.upload-area').forEach(area => {
        area.addEventListener('click', function () {
            const input = document.createElement('input');
            input.type = 'file';

            const isVideoAllowed = this.querySelector('.upload-text').textContent.includes('mp4');
            input.accept = isVideoAllowed ? '.png,.jpg,.jpeg,.mp4' : '.png,.jpg,.jpeg';

            input.addEventListener('change', function () {
            const file = this.files[0];
            const previewContainer = area.querySelector('.upload-preview');
            const uploadText = area.querySelector('.upload-text');
            previewContainer.innerHTML = ''; // Clear previous preview

            if (!file) return;

            // Hide upload text
            uploadText.style.display = 'none';

            const fileType = file.type;

            const reader = new FileReader();
            reader.onload = function (e) {
                if (fileType.startsWith('image/')) {
                const img = document.createElement('img');
                img.src = e.target.result;
                img.style.maxWidth = '100%';
                img.style.height = 'auto';
                previewContainer.appendChild(img);
                } else if (fileType === 'video/mp4') {
                const video = document.createElement('video');
                video.src = e.target.result;
                video.controls = true;
                video.style.maxWidth = '100%';
                video.style.height = 'auto';
                previewContainer.appendChild(video);
                }
            };

            reader.readAsDataURL(file);
            });

            input.click();
        });
        });


    </script>

    <?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/customer/www/staging.paraclete.ai/public_html/resources/views/default/user/topview/create.blade.php ENDPATH**/ ?>