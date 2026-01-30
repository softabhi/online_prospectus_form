<?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = $__env->getContainer()->make(Illuminate\View\AnonymousComponent::class, ['view' => 'components.layout','data' => []]); ?>
<?php $component->withName('layout'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes([]); ?>
    <?php $__env->slot('title', 'OTP Verification - Sona Devi University'); ?>
    <?php $__env->slot('body'); ?>
    <!-- Tailwind CSS CDN -->
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        @import  url('https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@300;400;500;600;700&display=swap');
        
        body {
            font-family: 'Plus Jakarta Sans', sans-serif;
            background-color: #f8fafc;
        }

        .step-gradient {
            background: linear-gradient(135deg, #0f172a 0%, #1e293b 100%);
        }

        .otp-input-style {
            letter-spacing: 0.5em;
            text-align: center;
            font-size: 1.5rem;
            font-weight: 700;
            transition: all 0.3s ease;
        }

        .otp-input-style:focus {
            border-color: #3b82f6;
            box-shadow: 0 0 0 4px rgba(59, 130, 246, 0.1);
            outline: none;
        }

        .active-glow {
            box-shadow: 0 0 20px rgba(59, 130, 246, 0.4);
        }
    </style>

    <div class="min-h-screen">
        <!-- Brand Header -->
        <div class="py-6 shadow-xl text-center">
            <img class="h-14 mx-auto transition-transform hover:scale-105 duration-300" src="<?php echo e(asset('img/SDU Logo Dark@4x.png')); ?>" alt="SDU">
        </div>

        <div class="max-w-6xl mx-auto px-4 py-12">
            <div class="bg-white rounded-[2.5rem] shadow-2xl flex flex-col lg:flex-row overflow-hidden border border-slate-100 min-h-[650px]">
                
                <!-- Left Sidebar: Progress Navigation -->
                <div class="lg:w-2/5 step-gradient p-10 text-white relative">
                    <div class="relative z-10 h-full flex flex-col justify-between">
                        <div>
                            <div class="mb-14">
                                <span class="bg-blue-600/20 text-blue-400 px-4 py-1.5 rounded-full text-xs font-bold uppercase tracking-widest border border-blue-500/30">Verification Phase</span>
                                <h1 class="text-3xl font-extrabold mt-4 leading-tight">Admission Portal</h1>
                                <p class="text-slate-400 mt-2">Finalize your identity to start the application.</p>
                            </div>

                            <div class="space-y-10 relative">
                                <div class="absolute left-6 top-4 bottom-4 w-[2px] bg-slate-700/50 -z-10"></div>

                                <!-- Step 1 (Completed) -->
                                <div class="flex items-center space-x-6">
                                    <div class="w-10 h-10 rounded-2xl bg-emerald-500 flex items-center justify-center text-xl shadow-lg shadow-emerald-900/20">
                                        <ion-icon name="checkmark-outline"></ion-icon>
                                    </div>
                                    <div>
                                        <h3 class="font-bold text-slate-300">Identity Check</h3>
                                        <p class="text-slate-500 text-xs">Prospectus & Mobile No.</p>
                                    </div>
                                </div>

                                <!-- Step 2 (Active) -->
                                <div class="flex items-center space-x-6">
                                    <div class="w-10 h-10 rounded-2xl bg-blue-600 active-glow flex items-center justify-center text-xl">
                                        <ion-icon name="shield-checkmark-outline"></ion-icon>
                                    </div>
                                    <div>
                                        <h3 class="font-bold text-blue-400 text-lg">Verification</h3>
                                        <p class="text-slate-400 text-xs">Enter 6-Digit OTP</p>
                                    </div>
                                </div>

                                <!-- Steps 3-5 (Pending) -->
                                <div class="flex items-center space-x-6 opacity-30">
                                    <div class="w-10 h-10 rounded-2xl bg-slate-800 flex items-center justify-center text-xl">
                                        <ion-icon name="document-text-outline"></ion-icon>
                                    </div>
                                    <div class="font-bold">Form Details</div>
                                </div>

                                <div class="flex items-center space-x-6 opacity-30">
                                    <div class="w-10 h-10 rounded-2xl bg-slate-800 flex items-center justify-center text-xl">
                                        <ion-icon name="cloud-upload-outline"></ion-icon>
                                    </div>
                                    <div class="font-bold">Documents</div>
                                </div>
                            </div>
                        </div>

                        <div class="text-slate-500 text-xs flex items-center gap-2 mt-10">
                            <ion-icon name="lock-closed-outline" class="text-blue-500"></ion-icon>
                            Your data is encrypted and secure
                        </div>
                    </div>
                </div>

                <!-- Right Side: OTP Verification Area -->
                <div class="lg:w-3/5 p-8 md:p-16 flex flex-col justify-center">
                    <div class="max-w-md mx-auto w-full">
                        <div class="mb-10 text-center lg:text-left">
                            <span class="text-blue-600 font-bold text-sm tracking-widest uppercase">Step 02 / 05</span>
                            <h2 class="text-3xl font-extrabold text-slate-800 mt-2">Verify OTP</h2>
                            <p class="text-slate-500 mt-3 leading-relaxed">
                                A 6-digit verification code has been sent to 
                                <span class="text-slate-900 font-bold">
                                    <?php if(session()->has('phone')): ?> <?php echo e(session()->get('phone')); ?> <?php else: ?> +91-XXXXXXXXXX <?php endif; ?>
                                </span>
                            </p>
                        </div>

                        <form action="<?php echo e(route('admission.otp_verify')); ?>" method="POST" class="space-y-8">
                            <?php echo csrf_field(); ?>
                            
                            <div class="space-y-4">
                                <label class="text-sm font-bold text-slate-700 block text-center lg:text-left">
                                    Enter Code
                                </label>
                                <input type="text" name="otp" required maxlength="6" minlength="6"
                                    class="w-full h-10 rounded-2xl border-2 border-slate-200 bg-slate-50 otp-input-style" 
                                    placeholder="••••••" autocomplete="one-time-code">
                                
                                <div class="flex flex-col items-center py-2 space-y-2">
                                    <div id="timer-box" class="flex items-center text-sm font-medium text-slate-500">
                                        <ion-icon name="time-outline" class="mr-2 text-blue-500"></ion-icon>
                                        Resend available in: <span id="timer" class="ml-1 text-blue-600 font-bold tracking-tight">30 seconds</span>
                                    </div>
                                    <button type="button" id="resend" onclick="location.reload()" 
                                        class="hidden text-sm font-extrabold text-blue-600 hover:text-blue-800 transition-colors flex items-center gap-1 group">
                                        <ion-icon name="refresh-outline" class="group-hover:rotate-180 transition-transform duration-500"></ion-icon>
                                        I didn't receive the code. Resend now.
                                    </button>
                                </div>
                            </div>

                            <button type="submit" class="w-full h-10 bg-slate-900 hover:bg-black text-white font-bold rounded-2xl transition-all duration-300 transform hover:-translate-y-1 shadow-xl flex items-center justify-center space-x-3 group">
                                <span>Complete Verification</span>
                                <ion-icon name="arrow-forward" class="group-hover:translate-x-1 transition-transform"></ion-icon>
                            </button>
                        </form>

                        <div class="mt-12 pt-8 border-t border-slate-100 flex flex-col items-center">
                            <a href="#" onclick="window.history.back()" class="text-sm font-bold text-slate-600 hover:text-blue-600 transition-colors flex items-center gap-2">
                                <ion-icon name="arrow-back-outline"></ion-icon>
                                Back to Step 1 (Change Mobile)
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Ionicons Script -->
    <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
    
    <script>
        var timeLeft = 30;
        var timerElem = document.getElementById('timer');
        var resendBtn = document.getElementById('resend');
        var timerBox = document.getElementById('timer-box');
        
        var timerId = setInterval(countdown, 1000);

        function countdown() {
            if (timeLeft <= 0) {
                clearInterval(timerId);
                doSomething();
            } else {
                timerElem.innerHTML = timeLeft + ' seconds';
                timeLeft--;
            }
        }

        function doSomething() {
            resendBtn.classList.remove('hidden');
            timerBox.classList.add('hidden');
        }
    </script>
    <?php $__env->endSlot(); ?>
 <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?><?php /**PATH /opt/lampp/htdocs/admissions/resources/views/admission_opt_verify.blade.php ENDPATH**/ ?>