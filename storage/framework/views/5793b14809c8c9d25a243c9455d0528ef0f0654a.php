<?php if (isset($component)) { $__componentOriginalba35371caef1eeddf45260937599d5fd5fb5dd30 = $component; } ?>
<?php $component = $__env->getContainer()->make(App\View\Components\Layout::class, []); ?>
<?php $component->withName('layout'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes([]); ?>
    <?php $__env->slot('title', 'Sona Devi Univversity'); ?>

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
                        <fieldset id="form2">
                            <div class="sub__title__container ">
                                <p>Step 2/5</p>
                                <h2>Let's start with your prospectus and phone number </h2>
                                <p>Please fill the details below so that you have to go into the next step </p>
                            </div>
                            <div class="input__container">
                                <form action="<?php echo e(route('admission.otp_verify')); ?>" method="POST">
                                    <?php echo csrf_field(); ?>
                                    <div class="row">
                                        <div class="col-sm-6">
                                            <label for="name">Enter otp </label>
                                            <input type="text" placeholder="Enter 6 digit otp " min="6" max="6" required
                                                title="please enter 6 digit valid otp" class="form-control" name="otp"
                                                id="">
                                            <div class="row">
                                                <div class="col-6">
                                                    <span class="text-white">
                                                        Otp sended
                                                        <?php if(session()->has('phone')): ?>
                                                            <?php echo e(session()->get('phone')); ?>

                                                        <?php endif; ?>

                                                    </span>
                                                </div>
                                                <div class="col-4">
                                                    <div class="massage ms-3">
                                                        <span class="text-success" id="timer"></span>
                                                        <a class="text-white" id="resend" href="#" onclick="location.reload()">
                                                            Resend </a>

                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-sm-6 pt-3 mt-1">
                                            <button class="nxt__btn mt-2" type="submit"> Next</button>
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
<?php if (isset($__componentOriginalba35371caef1eeddf45260937599d5fd5fb5dd30)): ?>
<?php $component = $__componentOriginalba35371caef1eeddf45260937599d5fd5fb5dd30; ?>
<?php unset($__componentOriginalba35371caef1eeddf45260937599d5fd5fb5dd30); ?>
<?php endif; ?>

<script>


    var timeLeft = 30;
    var elem = document.getElementById('resend').style.display='none';
    var elem = document.getElementById('timer');
    var timerId = setInterval(countdown, 1000);

    function countdown() {

        if (timeLeft == -1) {
            clearTimeout(timerId);
            doSomething();
        } else {
            elem.innerHTML = timeLeft + ' seconds';
            timeLeft--;
        }
    }

    function doSomething() {
           document.getElementById('resend').style.display='block';
        document.getElementById('timer').style.display='none';
    }
</script>
<?php /**PATH C:\xampp\htdocs\prospectus\resources\views/admission_opt_verify.blade.php ENDPATH**/ ?>