<?php if (isset($component)) { $__componentOriginalba35371caef1eeddf45260937599d5fd5fb5dd30 = $component; } ?>
<?php $component = $__env->getContainer()->make(App\View\Components\Layout::class, []); ?>
<?php $component->withName('layout'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes([]); ?>
    <?php $__env->slot('title', 'Sona Devi University'); ?>
    <?php $__env->slot('body'); ?>
        <div class="bg-dark text-center"><br>
            <img class="logo" src="<?php echo e(asset('img/SDU Logo Dark@4x.png')); ?>" alt="SDU">
        </div>
        <!-- start contact -->
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
                                <h3>Your name</h3>
                                <p>Enter & press next</p>
                            </div>
                            <div class="title__name">
                                <h3>Desctibes</h3>
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
                                <li id="icon2">
                                    <ion-icon name="book-outline"></ion-icon>
                                </li>
                                <li id="icon3">
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
                        <fieldset id="form1">
                            <div class="sub__title__container ">
                                <p>Step 1/5</p>
                                <h2>Let's start with your prospectus and phone number </h2>
                                <p>Please fill the details below so that you have to go into the next step </p>
                            </div>
                            <div class="input__container">
                                <form action="<?php echo e(route('admission.otp_generating')); ?>" method="POST">
                                    <?php echo csrf_field(); ?>
                                    <div class="row">
                                        <div class="col-sm-6">
                                            <label for="name">Enter your prospectus number </label>
                                            <input type="text" placeholder=" Propectus number" class="form-control"
                                                name="prospectus_number" id="">
                                        </div>
                                        <div class="col-sm-6">
                                            <label for="name">Enter your mobile number </label>
                                            <input type="text" placeholder=" Phone number" class="form-control"
                                                name="phone_number" id="">
                                        </div>
                                    </div>
                                    <p class="text-danger">
                                        <?php if(session()->has('error')): ?>
                                            <?php echo e(session()->get('error')); ?>

                                        <?php endif; ?>
                                    </p>
                                    <button class="nxt__btn mt-2" type="submit"> Next</button>
                                </form>
                            </div>
                        </fieldset>
                    </div>
                </div>
            </div>
            <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
        </section>
        <!-- end contact -->
    <?php $__env->endSlot(); ?>
 <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalba35371caef1eeddf45260937599d5fd5fb5dd30)): ?>
<?php $component = $__componentOriginalba35371caef1eeddf45260937599d5fd5fb5dd30; ?>
<?php unset($__componentOriginalba35371caef1eeddf45260937599d5fd5fb5dd30); ?>
<?php endif; ?>
<?php /**PATH C:\xampp\htdocs\prospectus\resources\views/already_prospectus.blade.php ENDPATH**/ ?>