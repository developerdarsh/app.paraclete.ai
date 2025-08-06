<?php $__env->startSection(config('elseyyid-location.content_section')); ?>
        <?php echo $__env->make('langs::includes.tools', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        <?php $codes = explode(',', trim($settings->languages)); ?>
        <h6 class="text-center font-weight-semibold fs-14 mt-5 mb-5 text-muted"><?php echo e(__('Installed Languages')); ?></h6>

        <div class="card card-body language-card mb-3 flex flex-row items-center justify-between">
            <h6 class="mb-0 fs-14 font-weight-semibold"><?php echo e(ucfirst('English')); ?><span class="text-muted fs-10 ml-2">en</span></h6>
            <div>
                <label class="custom-switch language-switch-checkbox">
                    <input type="checkbox" name="language-checkbox" class="custom-switch-input" id="en" <?php if(in_array('en-US', $codes)): ?> <?php echo e('checked'); ?> <?php endif; ?> <?php if(LaravelLocalization::getCurrentLocale() === 'en'): ?> <?php echo e('disabled'); ?> <?php endif; ?>>
                    <span class="custom-switch-indicator"></span>
                </label>
            </div>
        </div>

        <?php $__currentLoopData = $langs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $lang): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <?php $lang_region = LaravelLocalization::getSupportedLocales()[str_replace('_','-',$lang)]['regional']; ?>
            <?php $lang_native = LaravelLocalization::getSupportedLocales()[str_replace('_','-',$lang)]['native']; ?>
            <div class="card card-body language-card mb-3 flex flex-row items-center justify-between">
                <h6 class="mb-0 fs-14 font-weight-semibold"><?php echo e(ucfirst($lang_native)); ?><span class="text-muted fs-10 ml-2"><?php echo e($lang); ?></span></h6>
                <div>
                    <label class="custom-switch language-switch-checkbox">
                        <input type="checkbox" name="language-checkbox" class="custom-switch-input" id="<?php echo e($lang); ?>" <?php if(in_array($lang, $codes)): ?> <?php echo e('checked'); ?> <?php endif; ?> <?php if(LaravelLocalization::getCurrentLocale() === $lang): ?> <?php echo e('disabled'); ?> <?php endif; ?>>
                        <span class="custom-switch-indicator"></span>
                    </label>
                    
                    <div class="btn-group dashboard-menu-button language-ellipsis">
                        <button type="button" class="btn dropdown-toggle" data-bs-toggle="dropdown" id="export" data-bs-display="static" aria-expanded="false"><i class="fa-solid fa-ellipsis language-action-buttons"></i></button>
                        <div class="dropdown-menu" aria-labelledby="export" data-popper-placement="bottom-start">								
                            <a href="<?php echo e(route('elseyyid.translations.lang2', $lang)); ?>" class="dropdown-item"><i class="fa-solid fa-money-check-pen text-muted mr-2"></i> <?php echo e(__('Edit Strings')); ?></a>	
                            <a href="<?php echo e(route('elseyyid.translations.lang.generateJson2', $lang)); ?>"  class="dropdown-item"><i class="fa-solid fa-file-lines text-muted mr-2"></i><?php echo e(__('Generate JSON File')); ?></a>	
                        </div>
                    </div>
                </div>
            </div>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

<?php $__env->stopSection(); ?>

<?php echo $__env->make(config('elseyyid-location.layout'), \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/customer/www/staging.paraclete.ai/public_html/resources/views/vendor/langs/home.blade.php ENDPATH**/ ?>