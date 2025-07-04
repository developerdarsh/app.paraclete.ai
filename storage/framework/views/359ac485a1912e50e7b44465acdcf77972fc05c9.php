

<?php $__env->startSection('css'); ?>
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
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?> 
<div class="container">
    <h1>AI Video Generator</h1>

    

    
    <div class="form-group">
        <label for="title">Enter Title</label>
        <input type="text" id="title" class="form-control" placeholder="Enter the video title here...">
    </div>

    <div class="form-group">
        <label for="creatorName">Select Avtar</label>
        <select id="creatorName" class="form-control">
                <option value="" data-image=""> Select avtar</option>
        </select>
    </div>
    <div class="form-group">
        <label for="voiceName">Select Voice</label>
        <select id="voiceName" class="form-control">
           
                <option value="">Select Voice</option>
           
        </select>
    </div>

    
    <div class="form-group">
        <label for="script">Enter Script</label>
        <textarea id="script" class="form-control" rows="4" placeholder="Enter the video script here..."></textarea>
    </div>
    
    </Br>
    
    <button id="generateButton" class="btn btn-primary">Generate Video</button>
    
    
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
           
        </tbody>
    </table>

    <div>
    </Br>
    </div>
   
</div>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('js'); ?>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
<script>
  
</script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/customer/www/staging.paraclete.ai/public_html/resources/views/classic/user/training_video/ai_avtar.blade.php ENDPATH**/ ?>