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
                                <h3>Prospectus & Phone</h3>
                                <p>Enter & press next</p>
                            </div>
                            <div class="title__name">
                                <h3>OTP Verification</h3>
                                <p>select & press next</p>
                            </div>
                            <div class="title__name">
                                <h3>Services</h3>
                                <p>select & press next</p>
                            </div>
                            <div class="title__name">
                                <h3>Budget</h3>
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
                        <fieldset id="form2">
                            <div class="sub__title__container ">
                                <p>Step 3/5</p>
                                <h2> Documents Required For Admission form fillup </h2>
                                <p>Please fill the details below so that you have to go into the next step </p>
                            </div>
                            <div class="input__container">
                                <form role="form" action="<?php echo e(route('admission.admission_document')); ?>" method="POST"
                                    id="admission_form" enctype="multipart/form-data">
                                    <?php echo csrf_field(); ?>
                                    <div class="-body table-responsive p-0">
                                        <div class="-body">
                                            <div class="row">
                                                <input type="hidden" name="id" value="<?php echo e($id); ?>" id="">
                                                <div class="col-4">
                                                    <label>10th Marksheet</label>
                                                    <input type="file" name="admission_tenth_marksheet"
                                                        class="form-control">
                                                </div>
                                                <div class="col-4">
                                                    <label>10th Passing Certificate</label>
                                                    <input type="file" name="admission_tenth_passing_certificate"
                                                        class="form-control">
                                                </div>
                                                <div class="col-4">
                                                    <label>12th Marksheet</label>
                                                    <input type="file" name="admission_twelve_markesheet"
                                                        class="form-control">
                                                </div>

                                                <div class="col-4">
                                                    <label>12th Passing Certificate</label>
                                                    <input type="file" name="admission_twelve_passing_certificate"
                                                        class="form-control">
                                                </div>
                                                <div class="col-4">
                                                    <label>Graduation Marksheet</label>
                                                    <input type="file" name="admission_graduation_marksheet"
                                                        class="form-control">
                                                </div>
                                                <div class="col-4">
                                                    <label>Recent Character Certificate</label>
                                                    <input type="file" name="admission_recent_character_certificate"
                                                        class="form-control">
                                                </div>

                                                <div class="col-4">
                                                    <label>Other Certificate (If applicable)</label>
                                                    <input type="file" name="admission_other_certificate"
                                                        class="form-control">
                                                </div>
                                                <div class="col-4">
                                                    <label>Character Certificate (If applicable)</label>
                                                    <input type="file" name="admission_character_certificate"
                                                        class="form-control">
                                                </div>

                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <button type="submit" id="admission_button" class="btn btn-warning">Submit</button>
                                    </div>
                            </div>
                            </form>
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
<?php endif; ?>
<?php /**PATH /home/u517204354/domains/sonadeviuniversity.ac.in/public_html/admissions/resources/views/admission_document.blade.php ENDPATH**/ ?>