<div class="row">

    <div class="col-sm-12">								
        <div class="card shadow-0 mb-5">							
            <div class="card-body">
                <div class="input-box mb-2">
                    <h6 class="text-muted fs-12"><?php echo e(__('Default Language')); ?> </h6>
                    <form action="<?php echo e(route('elseyyid.translations.lang.setLocale2')); ?>" class="relative" method="GET">
                        <select id="setLocale" name="setLocale" class="form-select">
                            <option value="" disabled selected><?php echo e(__('Select Default Language')); ?></option>
                            <?php $__currentLoopData = LaravelLocalization::getSupportedLocales(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $localeCode => $properties): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>                                
                                <?php if(in_array( $localeCode, explode(',', $settings->languages) )): ?>
                                    <option value="<?php echo e($localeCode); ?>" <?php if( $settings->default_language === $localeCode): ?> <?php echo e('selected'); ?> <?php endif; ?>><?php echo e(ucfirst($properties['native'])); ?> <?php if( $settings->default_language === $localeCode): ?><?php echo e(__('(Default Language)')); ?><?php endif; ?></option>
                                <?php endif; ?>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>																															
                        </select>
                        <button class="btn btn-primary locale-action-button" type="submit"><?php echo e(__('Set')); ?></button>
                    </form>
                </div>	
            </div>
        </div>
    </div>

    <div class="col-sm-12">								
        <div class="card shadow-0">							
            <div class="card-body">
                <div class="input-box mb-2">
                    <h6 class="text-muted fs-12"><?php echo e(__('Add New Language')); ?> </h6>
                    <form action="<?php echo e(route('elseyyid.translations.lang.newLang2')); ?>" class="relative" method="GET">
                        <select id="newLang" name="newLang" class="form-select">
                            <option value="" disabled selected><?php echo e(__('Add New language')); ?></option>
                            <?php $__currentLoopData = LaravelLocalization::getSupportedLocales(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $localeCode => $properties): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <?php if( !in_array($localeCode, languagesList()) ): ?>
                                    <option value="<?php echo e($localeCode); ?>"></span><?php echo e(ucfirst($properties['native'])); ?></option>
                                <?php endif; ?>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>																															
                        </select>
                        <button class="btn btn-primary locale-action-button" type="submit"><?php echo e(__('Add')); ?></button>
                    </form>
                </div>	
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-sm-6 text-center">
            <a href="<?php echo e(route('elseyyid.translations.lang.publishAll2')); ?>" class="btn btn-primary pl-7 pr-7" style="text-transform: none"><?php echo e(__('Publish All JSON Files')); ?></a>
        </div>
        <div class="col-sm-6 text-center">
            <a href="<?php echo e(route('elseyyid.translations.lang.reinstall')); ?>" class="btn btn-cancel pl-7 pr-7" style="text-transform: none"><?php echo e(__('Reinstall Language Files')); ?></a>
        </div>
    </div>

</div>
<?php /**PATH /home/customer/www/staging.paraclete.ai/public_html/resources/views/vendor/langs/includes/tools.blade.php ENDPATH**/ ?>