<?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = $__env->getContainer()->make(Illuminate\View\AnonymousComponent::class, ['view' => 'components.layout','data' => []]); ?>
<?php $component->withName('layout'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes([]); ?>
    <?php $__env->slot('title', 'Sona Devi University'); ?>

    <?php $__env->slot('body'); ?>


    <div class="bg-dark text-center"><br>
        <img class="logo" src="<?php echo e(asset('img/SDU Logo Dark@4x.png')); ?>" alt="NSU">
    </div>

    <section class="contact-section ">
        <div class="form__container">
            <div class="title__container">
                <h1> Admission Form <?php echo e(date('Y')); ?> </h1>
                <p>Follow the 4 simple steps to complete your admission proccess </p>
            </div>
            <div class="body__container">
                <div class="left__container">
                    <div class="side__titles">
                        <div class="title__name">
                            <h3>Enter Prospectus No.& Mobile No.</h3>
                            <p>Enter & press next</p>
                        </div>
                        <div class="title__name">
                            <h3>OTP Verification</h3>
                            <p>select & press next</p>
                        </div>
                        <div class="title__name">
                            <h3>Carefully Fill the Form</h3>
                            <p>select & press next</p>
                        </div>
                        <div class="title__name">
                            <h3>Upload Your Educational Documents</h3>
                            <p>Select & press next</p>
                        </div>
                        <div class="title__name">
                            <h3>Complete</h3>
                            <p>Finaly press submit</p>
                        </div>
                    </div>
                    <div class="progress__bar__container">
                        <ul>
                            <li class="active" id="icon1">
                                <ion-icon name="person-outline"></ion-icon>
                            </li>
                            <li class="active" id="icon2">
                                <i class="fa fa-key" aria-hidden="true"></i>
                            </li>
                            <li class="active" id="icon3">
                                <ion-icon name="layers-outline"></ion-icon>
                            </li>
                            <li id="icon4">
                                <ion-icon name="pricetag-outline"></ion-icon>
                            </li>
                            <li id="icon5">
                                <ion-icon name="mail-outline"></ion-icon>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="right__container">
                    <fieldset id="form5">
                        <div class="sub__title__container">
                            <p>Step 5/5</p>
                            <h2>Thank You for Completing the Admission Process.</h2>
                            <p>Your form has been submitted successfully.</p>
                        </div>
                        <div class="thank-you__content" style="text-align: center; padding: 40px 20px;">
                            <div class=" text-center"><br>
                                <img class="logo" src="<?php echo e(asset('img/succlog.png')); ?>" alt="NSU" style="width: 10rem; height:10rem;" >
                            </div>
                            <!-- <div class="thank-you__icon" style="font-size: 60px; color: #28a745; margin-bottom: 20px;">
                                <i class="fa fa-check-circle" aria-hidden="true"></i>
                            </div> -->
                            <h3 style="font-size: 28px; font-weight: bold; color:#fff;">Thank You!</h3>
                            <p style="font-size: 16px; margin: 10px 0; color:#fff;">We have received your admission form
                                successfully.</p>
                            <p style="font-size: 14px;  color:#fff;">Please wait for admission confirmation mail, up to 7 days.</p>
                            <div style="margin-top: 25px;">
                                <a href="<?php echo e(url('/')); ?>" class="btn btn-success"
                                    style="padding: 10px 25px; border-radius: 6px; text-decoration: none; font-size: 16px;">Go
                                    to Homepage</a>
                            </div>
                        </div>
                    </fieldset>
                </div>
            </div>
        </div>
        <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
    </section>
    <?php $__env->endSlot(); ?>
 <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?><?php /**PATH /home/u517204354/domains/sonadeviuniversity.ac.in/public_html/admissions/resources/views/thankyou.blade.php ENDPATH**/ ?>