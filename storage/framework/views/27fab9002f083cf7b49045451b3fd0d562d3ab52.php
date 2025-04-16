<select id="model" name="model" class="form-select" onchange="updateModel()">   	
    <?php $__currentLoopData = $models; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $model): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <?php if(trim($model) == 'gpt-3.5-turbo-0125'): ?>
            <option value="<?php echo e(trim($model)); ?>" <?php if(trim($model) == $default_model): ?> selected <?php endif; ?>><?php echo e(__('OpenAI | GPT 3.5 Turbo')); ?></option>
        <?php elseif(trim($model) == 'gpt-4'): ?>
            <option value="<?php echo e(trim($model)); ?>" <?php if(trim($model) == $default_model): ?> selected <?php endif; ?>><?php echo e(__('OpenAI | GPT 4')); ?></option>
        <?php elseif(trim($model) == 'gpt-4o'): ?>
            <option value="<?php echo e(trim($model)); ?>" <?php if(trim($model) == $default_model): ?> selected <?php endif; ?>><?php echo e(__('OpenAI | GPT 4o')); ?></option>
        <?php elseif(trim($model) == 'gpt-4o-mini'): ?>
            <option value="<?php echo e(trim($model)); ?>" <?php if(trim($model) == $default_model): ?> selected <?php endif; ?>><?php echo e(__('OpenAI | GPT 4o mini')); ?></option>
        <?php elseif(trim($model) == 'gpt-4-0125-preview'): ?>
            <option value="<?php echo e(trim($model)); ?>" <?php if(trim($model) == $default_model): ?> selected <?php endif; ?>><?php echo e(__('OpenAI | GPT 4 Turbo')); ?></option>
        <?php elseif(trim($model) == 'gpt-4.5-preview'): ?>
            <option value="<?php echo e(trim($model)); ?>" <?php if(trim($model) == $default_model): ?> selected <?php endif; ?>><?php echo e(__('OpenAI | GPT 4.5')); ?></option>
        <?php elseif(trim($model) == 'o1'): ?>
            <option value="<?php echo e(trim($model)); ?>" <?php if(trim($model) == $default_model): ?> selected <?php endif; ?>><?php echo e(__('OpenAI | o1')); ?></option>
        <?php elseif(trim($model) == 'o1-mini'): ?>
            <option value="<?php echo e(trim($model)); ?>" <?php if(trim($model) == $default_model): ?> selected <?php endif; ?>><?php echo e(__('OpenAI | o1 mini')); ?></option>
        <?php elseif(trim($model) == 'o3-mini'): ?>
            <option value="<?php echo e(trim($model)); ?>" <?php if(trim($model) == $default_model): ?> selected <?php endif; ?>><?php echo e(__('OpenAI | o3 mini')); ?></option>
        <?php elseif(trim($model) == 'claude-3-opus-20240229'): ?>
            <option value="<?php echo e(trim($model)); ?>" <?php if(trim($model) == $default_model): ?> selected <?php endif; ?>><?php echo e(__('Anthropic | Claude 3 Opus')); ?></option>
        <?php elseif(trim($model) == 'claude-3-7-sonnet-20250219'): ?>
            <option value="<?php echo e(trim($model)); ?>" <?php if(trim($model) == $default_model): ?> selected <?php endif; ?>><?php echo e(__('Anthropic | Claude 3.7 Sonnet')); ?></option>
        <?php elseif(trim($model) == 'claude-3-5-sonnet-20241022'): ?>
            <option value="<?php echo e(trim($model)); ?>" <?php if(trim($model) == $default_model): ?> selected <?php endif; ?>><?php echo e(__('Anthropic | Claude 3.5v2 Sonnet')); ?></option>
        <?php elseif(trim($model) == 'claude-3-5-haiku-20241022'): ?>
            <option value="<?php echo e(trim($model)); ?>" <?php if(trim($model) == $default_model): ?> selected <?php endif; ?>><?php echo e(__('Anthropic | Claude 3.5 Haiku')); ?></option>
        <?php elseif(trim($model) == 'gemini-1.5-pro'): ?>
            <option value="<?php echo e(trim($model)); ?>" <?php if(trim($model) == $default_model): ?> selected <?php endif; ?>><?php echo e(__('Google | Gemini 1.5 Pro')); ?></option>
        <?php elseif(trim($model) == 'gemini-1.5-flash'): ?>
            <option value="<?php echo e(trim($model)); ?>" <?php if(trim($model) == $default_model): ?> selected <?php endif; ?>><?php echo e(__('Google | Gemini 1.5 Flash')); ?></option>
        <?php elseif(trim($model) == 'gemini-2.0-flash'): ?>
            <option value="<?php echo e(trim($model)); ?>" <?php if(trim($model) == $default_model): ?> selected <?php endif; ?>><?php echo e(__('Google | Gemini 2.0 Flash')); ?></option>
        <?php elseif(trim($model) == 'grok-2-1212'): ?>
            <option value="<?php echo e(trim($model)); ?>" <?php if(trim($model) == $default_model): ?> selected <?php endif; ?>><?php echo e(__('xAI | Grok 2')); ?></option>
        <?php elseif(trim($model) == 'grok-2-vision-1212'): ?>
            <option value="<?php echo e(trim($model)); ?>" <?php if(trim($model) == $default_model): ?> selected <?php endif; ?>><?php echo e(__('xAI | Grok 2 Vision')); ?></option>
        <?php elseif(trim($model) == 'deepseek-reasoner'): ?>
            <option value="<?php echo e(trim($model)); ?>" <?php if(trim($model) == $default_model): ?> selected <?php endif; ?>><?php echo e(__('DeepSeek R1')); ?></option>
        <?php elseif(trim($model) == 'deepseek-chat'): ?>
            <option value="<?php echo e(trim($model)); ?>" <?php if(trim($model) == $default_model): ?> selected <?php endif; ?>><?php echo e(__('DeepSeek V3')); ?></option>
        <?php elseif(trim($model) == 'sonar'): ?>
            <option value="<?php echo e(trim($model)); ?>" <?php if(trim($model) == $default_model): ?> selected <?php endif; ?>><?php echo e(__('Perplexity | Sonar')); ?></option>
        <?php elseif(trim($model) == 'sonar-pro'): ?>
            <option value="<?php echo e(trim($model)); ?>" <?php if(trim($model) == $default_model): ?> selected <?php endif; ?>><?php echo e(__('Perplexity | Sonar Pro')); ?></option>
        <?php elseif(trim($model) == 'sonar-reasoning'): ?>
            <option value="<?php echo e(trim($model)); ?>" <?php if(trim($model) == $default_model): ?> selected <?php endif; ?>><?php echo e(__('Perplexity | Sonar Reasoning')); ?></option>
        <?php elseif(trim($model) == 'sonar-reasoning-pro'): ?>
            <option value="<?php echo e(trim($model)); ?>" <?php if(trim($model) == $default_model): ?> selected <?php endif; ?>><?php echo e(__('Perplexity | Sonar Reasoning Pro')); ?></option>
        <?php elseif(trim($model) == 'us.amazon.nova-micro-v1:0'): ?>
            <option value="<?php echo e(trim($model)); ?>" <?php if(trim($model) == $default_model): ?> selected <?php endif; ?>><?php echo e(__('Amazon | Nova Micro')); ?></option>
        <?php elseif(trim($model) == 'us.amazon.nova-lite-v1:0'): ?>
            <option value="<?php echo e(trim($model)); ?>" <?php if(trim($model) == $default_model): ?> selected <?php endif; ?>><?php echo e(__('Amazon | Nova Lite')); ?></option>
        <?php elseif(trim($model) == 'us.amazon.nova-pro-v1:0'): ?>
            <option value="<?php echo e(trim($model)); ?>" <?php if(trim($model) == $default_model): ?> selected <?php endif; ?>><?php echo e(__('Amazon | Nova Pro')); ?></option>
        <?php else: ?>
            <?php $__currentLoopData = $fine_tunes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $fine_tune): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <?php if(trim($model) == $fine_tune->model): ?>
                    <option value="<?php echo e($fine_tune->model); ?>" <?php if(trim($model) == $default_model): ?> selected <?php endif; ?>><?php echo e(__('OpenAI | ')); ?> <?php echo e($fine_tune->description); ?></option>
                <?php endif; ?>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        <?php endif; ?>
        
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>									
</select><?php /**PATH /home/customer/www/staging.paraclete.ai/public_html/resources/views/default/components/original-template-models.blade.php ENDPATH**/ ?>