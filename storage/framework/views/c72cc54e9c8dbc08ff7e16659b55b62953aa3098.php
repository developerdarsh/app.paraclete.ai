<body style="margin: 0;padding: 0;font-family: 'Montserrat', sans-serif;">
    <div class="shape-left" style="width: 1.4cm; height: 5.9cm; position: absolute;left: 0px; top: 44px;">
      <div style="width: 100%; height: 100%; position: absolute; left: 0px; top: 0px;"><img src="<?php echo e(URL::asset('img/resume/profile-left-shape.png')); ?>"></div>
    </div> 
    <div class="shape-top" style="width: 24cm; height: 6cm; position: absolute;left: 40px; top: 0px;">
       <div style="width: 100%; height: 100%; position: absolute; left: 0px; top: 0px;"><img src="<?php echo e(URL::asset('img/resume/profile-top-shape.png')); ?>"></div>
    </div> 
   <div class="shape-top" style="width: 5cm; height: 5cm; position: absolute;left: 254px; top: 0px;">
         <div style="width: 100%; height: 100%; position: absolute; left: 0px; top: 0px;"><img src="<?php echo e(URL::asset('img/resume/shape-trigle.png')); ?>"></div>
     </div> 
       <div class="shape-top-left" style="width: 6cm; height: 6cm; position: absolute;left: 200px; top: 170px;">
         <div style="width: 100%; height: 100%; position: absolute; left: 0px; top: 0px;"><img src="<?php echo e(URL::asset('img/resume/shape-trigle2.png')); ?>"></div>
     </div> 
    <div class="auto-container" style="width: 100%;margin-right: auto; margin-left: auto;position: relative;">
        <div class="resume-section" style="width: 100%; display: inline-block;position: relative;padding: 0px 40px 40px;">
            <div class="leftpart" style="width: 30%; float: left;">
                <div style="padding: 0px;"> 
                    <div class="user-image" style="width: 100%; height: 260px;margin: 0px;border: none;overflow: hidden;">
                        <?php if($base64URL): ?>
                            <img style="width: 100%; height: 230px;object-fit: cover;position: relative;" src="<?php echo e($base64URL); ?>" alt="">
                        <?php else: ?>
                            <img style="width: 100%; height: 230px;object-fit: cover;position: relative;" src="<?php echo e(URL::asset('img/resume/default_img.jpg')); ?>" alt="">
                        <?php endif; ?>
                    </div>
                    <div style="padding: 0px 10px;">
                    <div class="user-info" style="width: 100%;position: relative;">
                        <h2 style="margin: 0px;font-size: 24px;line-height: 28px;color: #000000;padding-bottom: 15px;"><?php echo e($data['first_name']); ?> <?php echo e($data['last_name']); ?></h2>
                        <p style="margin: 0px;font-size: 14px;line-height: 14px;color: #000000;text-transform: uppercase;padding-bottom: 40px;"><?php echo e($data['jobTitleInput']); ?></p>
                    </div>
                    <div class="contact-box" style="margin-bottom: 40px;">
                        <h4 style="margin: 0px;margin-bottom: 20px;border-top: 1px solid #000000;border-bottom: 1px solid #000000;padding: 10px 0px;text-transform: uppercase;letter-spacing: 2px;font-size: 20px;line-height: 24px;">Contact</h4>
                        <div class="number-line">
                            <div style="margin-bottom: 10px;font-size: 15px;">
                              <div style="float: left;width: 10%;margin-right: 10px;font-weight: bold;"> P :</div>
                              <div style="overflow: hidden;margin-left: 30px;"> <?php echo e($data['phone']); ?> </div>
                            </div>
                        </div>
                        <div class="email-line">
                             <div style="margin-bottom: 10px;font-size: 15px;">
                              <div style="float: left;width: 10%;margin-right: 10px;font-weight: bold;"> E :</div>
                              <div style="overflow: hidden;margin-left: 30px;"> <?php echo e($data['email']); ?> </div>
                            </div>
                        </div>
                        <div class="address-line">
                             <div style="margin-bottom: 10px;font-size: 15px;">
                              <div style="float: left;width: 10%;margin-right: 10px;font-weight: bold;"> A :</div>
                              <div style="overflow: hidden;margin-left: 30px;"> <?php echo e($data['address']); ?> <?php echo e($data['city']); ?>, <?php echo e($data['country']); ?>-<?php echo e($data['postal_code']); ?> </div>
                            </div>
                        </div>
                    </div>
                    <div class="eduction-box" style="margin-bottom: 40px;">
                        <h2 style="margin: 0px;margin-bottom: 20px;border-top: 1px solid #000000;border-bottom: 1px solid #000000;padding: 10px 0px;text-transform: uppercase;letter-spacing: 2px;font-size: 20px;line-height: 24px;">eduction</h2>
                        <?php $__currentLoopData = $data['edu_school']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=>$education): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <div class="eduction-line" style="margin-bottom: 10px;">
                                <h4 style="margin: 0px;margin-bottom: 10px;color: #000000;letter-spacing: 0px;font-size: 16px;line-height: 24px;"><?php echo e($education); ?> </h4>
                                   <p style="color: #000000;font-size: 15px;line-height: 20px;font-weight: 500;margin: 0px;margin-bottom: 5px;"><?php echo e(date('M Y',strtotime($data['edu_start_date'][$key]))); ?> - <?php echo e(date('M Y',strtotime($data['edu_end_date'][$key]))); ?></p>
                                <p style="color: #000000;font-size: 15px;line-height: 20px;font-weight: 500;margin: 0px;margin-bottom: 5px;"><?php echo e($data['edu_city'][$key]); ?></p>
                            </div>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </div>
                    </div>
                </div>
            </div>
            <div class="rightpart" style="width: 70%;float: right;">
                <div style="padding-top: 60px;padding-left: 40px;"> 
                    <div class="summary-box" style="margin-bottom: 40px;">
                        <h4 style="margin: 0px;margin-bottom: 20px;border-top: 1px solid #000000;border-bottom: 1px solid #000000;padding: 10px 0px;text-transform: uppercase;letter-spacing: 2px;font-size: 20px;line-height: 24px;">summary</h4>
                        <p style="color: #000000;font-size: 15px;line-height: 22px;font-weight: 500;margin-bottom: 10px;"><?php echo e(strip_tags($data['professional_summary'])); ?></p>
                    </div> 
                    <?php $__currentLoopData = $data['emp_job_title']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=>$job_title): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <div class="Experience-box" style="margin-bottom: 40px;">
                            <h2 style="margin: 0px;margin-bottom: 20px;border-top: 1px solid #000000;border-bottom: 1px solid #000000;padding: 10px 0px;text-transform: uppercase;letter-spacing: 2px;font-size: 20px;line-height: 24px;">experience</h2>
                            <h4 style="margin: 0px;margin-bottom: 5px;color: #000000;letter-spacing: 2px;font-size: 16px;line-height: 24px;"><?php echo e($data['emp_employer'][$key]); ?> </h4>
                            <p style="color: #000000;font-size: 15px;line-height: 22px;font-weight: 500;margin: 0px;margin-bottom: 10px;"><em> <?php echo e($job_title); ?> / <?php echo e(date('M Y',strtotime($data['emp_start_date'][$key]))); ?> - <?php echo e(date('M Y',strtotime($data['emp_end_date'][$key]))); ?></em></p>
                            <ul style="padding-left: 0px;">
                                <?php echo e($data['emp_description'][$key]); ?>

                            </ul>
                        </div>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    <div class="skills-box" style="margin-bottom: 40px;">
                        <h2 style="margin: 0px;margin-bottom: 20px;border-top: 1px solid #000000;border-bottom: 1px solid #000000;padding: 10px 0px;text-transform: uppercase;letter-spacing: 2px;font-size: 20px;line-height: 24px;">skills</h2>
                        <ul style="padding-left: 0px;list-style: none;">
                            <?php $__currentLoopData = $data['skill_title']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=>$skills): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <li style="color: #000000;font-size: 15px;line-height: 22px;font-weight: 500;margin: 0px;margin-bottom: 10px;"><?php echo e($skills); ?>

                                </li>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </ul>
                    </div> 
                    <?php if(isset($data['lang_name'] )): ?>  
                        <div class="languages-box" style="margin-bottom: 40px;">
                            <h2 style="margin: 0px;margin-bottom: 20px;border-top: 1px solid #000000;border-bottom: 1px solid #000000;padding: 10px 0px;text-transform: uppercase;letter-spacing: 2px;font-size: 20px;line-height: 24px;">Languages</h2>
                            <ul style="padding-left: 15px;">
                                <?php $__currentLoopData = $data['lang_name']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $language): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <li style="color: #000000;font-size: 15px;line-height: 22px;font-weight: 500;margin: 0px;margin-bottom: 10px;float: left;"><?php echo e($language); ?>

                                    </li>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </ul>
                        </div> 
                    <?php endif; ?>
                    <?php if(isset($data['cur_title'])): ?>
                        <div class="Course-box" style="margin-bottom: 40px;">
                            <h2 style="margin: 0px;margin-bottom: 20px;border-top: 1px solid #000000;border-bottom: 1px solid #000000;padding: 10px 0px;text-transform: uppercase;letter-spacing: 2px;font-size: 20px;line-height: 24px;">Course</h2>
                            <?php $__currentLoopData = $data['cur_title']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=>$courses): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <div class="course-name"> 
                                    <h6 style="font-size: 16px;line-height: 18px;margin: 0px;padding-bottom: 10px;font-weight: 500;"><?php echo e($courses); ?> <span style="font-weight: bold;"> At <?php echo e($data['cur_institution'][$key]); ?></span> </h6>
                                    <p style="font-size: 12px;line-height: 16px;margin: 0px;padding-bottom: 15px;"><?php echo e(date('M Y',strtotime($data['cur_start_date'][$key]))); ?> - <?php echo e(date('M Y',strtotime($data['cur_end_date'][$key]))); ?></p>
                                </div>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </div> 
                    <?php endif; ?>
                    <?php if(isset($data['Hobbies'])): ?>
                        <div class="Hobbies-box" style="margin-bottom: 40px;">
                            <h2 style="margin: 0px;margin-bottom: 20px;border-top: 1px solid #000000;border-bottom: 1px solid #000000;padding: 10px 0px;text-transform: uppercase;letter-spacing: 2px;font-size: 20px;line-height: 24px;">Hobbies</h2>
                            <ul style="display: inline-block;list-style: none;padding: 0px;">
                                <?php $__currentLoopData = $data['Hobbies']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=>$Hobbie): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <li style="color: #000000;font-size: 15px;line-height: 22px;font-weight: 500;margin: 0px;margin-bottom: 10px;display: inline;"><?php echo e($Hobbie); ?>

                                    </li>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </ul>
                        </div> 
                    <?php endif; ?>
                    <?php if(isset($data['eca_title'])): ?>
                        <div class="Extra-curricular-box" style="margin-bottom: 40px;">
                            <h2 style="margin: 0px;margin-bottom: 20px;border-top: 1px solid #000000;border-bottom: 1px solid #000000;padding: 10px 0px;text-transform: uppercase;letter-spacing: 2px;font-size: 20px;line-height: 24px;">Extra-curricular Activities</h2>
                            <?php $__currentLoopData = $data['eca_title']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=>$eca): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <div class="curricular-name"> 
                                    <h6 style="font-size: 16px;line-height: 18px;margin: 0px;padding-bottom: 10px;font-weight: 500;"><?php echo e($eca); ?> <span style="font-weight: bold;"> at  <?php echo e($data['eca_employer'][$key]); ?>,<?php echo e($data['eca_city'][$key]); ?></span> </h6>
                                    <p style="font-size: 12px;line-height: 16px;margin: 0px;padding-bottom: 15px;"><?php echo e(date('M Y',strtotime($data['eca_start_date'][$key]))); ?> - <?php echo e(date('M Y',strtotime($data['eca_end_date'][$key]))); ?></p>
                                </div>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </div> 
                    <?php endif; ?>
                    <?php if(isset($data['ref_name'])): ?>
                        <div class="References-box" style="margin-bottom: 40px;">
                            <h2 style="margin: 0px;margin-bottom: 20px;border-top: 1px solid #000000;border-bottom: 1px solid #000000;padding: 10px 0px;text-transform: uppercase;letter-spacing: 2px;font-size: 20px;line-height: 24px;">References</h2>
                            <?php $__currentLoopData = $data['ref_name']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=>$refrance): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <div class="curricular-name"> 
                                    <h6 style="font-size: 16px;line-height: 18px;margin: 0px;padding-bottom: 10px;font-weight: 500;"><?php echo e($refrance); ?><span style="font-weight: bold;"> from  <?php echo e($data['ref_company'][$key]); ?></span> </h6>
                                    <ul class="Hobbies-list" style="padding: 0px;margin: 0px;list-style: none;">
                                        <li><p style="font-size: 14px;line-height: 20px;margin: 0px;margin-bottom: 10px;padding-right: 5px;"><?php echo e($data['ref_phone'][$key]); ?></p></li>
                                        <li><p style="font-size: 14px;line-height: 20px;margin: 0px;margin-bottom: 10px;padding-right: 5px;"><?php echo e($data['ref_email'][$key]); ?>;</p></li>
                                    </ul>   
                                </div>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </div> 
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>
    
   <div class="shape-bottom" style="width: 14cm; height: 2cm; position: absolute;right: -390px; bottom: 0px;">
      <div style="width: 100%; height: 100%; position: absolute; right: 0px; bottom: 0px;"><img src="data:image/png;base64,<?php echo e(base64_encode(file_get_contents( "https://staging.paraclete.ai/img/users/shape-vector.png" ))); ?>"></div>
    </div> 
    

</body>
<?php /**PATH /var/www/html/public_html/resources/views/default/user/resume/template2.blade.php ENDPATH**/ ?>