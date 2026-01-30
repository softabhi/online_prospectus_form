<?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = $__env->getContainer()->make(Illuminate\View\AnonymousComponent::class, ['view' => 'components.layout','data' => []]); ?>
<?php $component->withName('layout'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes([]); ?>
    <?php $__env->slot('title', 'Admission Form - Sona Devi University'); ?>
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

        .input-focus-effect {
            transition: all 0.3s ease;
        }

        .input-focus-effect:focus {
            border-color: #3b82f6;
            box-shadow: 0 0 0 4px rgba(59, 130, 246, 0.1);
            outline: none;
        }

        /* Custom Progress Line for 5 Steps */
        .progress-line {
            position: absolute;
            left: 24px;
            top: 0;
            bottom: 0;
            width: 2px;
            background: #334155;
            z-index: 0;
        }

        .step-active {
            color: #3b82f6;
        }
    </style>

    <div class="min-h-screen">
        <!-- Brand Header -->
        <div class="py-6 shadow-xl text-center">
            <img class="h-16 mx-auto transition-transform hover:scale-105 duration-300" src="<?php echo e(asset('img/SDU Logo Dark@4x.png')); ?>" alt="SDU">
        </div>

        <div class="max-w-6xl mx-auto px-4 py-12">
            <div class="bg-white rounded-[2.5rem] shadow-2xl flex flex-col lg:flex-row overflow-hidden border border-slate-100 min-h-[700px]">
                
                <!-- Left Sidebar: 5-Step Progress -->
                <div class="lg:w-2/5 step-gradient p-10 text-white relative">
                    <div class="relative z-10">
                        <div class="mb-14">
                            <span class="bg-blue-600/20 text-blue-400 px-4 py-1.5 rounded-full text-xs font-bold uppercase tracking-widest border border-blue-500/30">Academic Session <?php echo e(date('Y')); ?></span>
                            <h1 class="text-3xl font-extrabold mt-4 leading-tight">Admission Portal</h1>
                            <p class="text-slate-400 mt-2">Begin your journey with Sona Devi University.</p>
                        </div>

                        <div class="space-y-8 relative">
                            <!-- Vertical Line Decoration -->
                            <div class="absolute left-6 top-4 bottom-4 w-[2px] bg-slate-700/50 -z-10"></div>

                            <!-- Step 1 -->
                            <div class="flex items-center space-x-6 relative group">
                                <div class="w-10 h-10 rounded-2xl bg-blue-600 flex items-center justify-center text-xl shadow-[0_0_20px_rgba(59,130,246,0.5)] transition-all">
                                    <ion-icon name="person-outline"></ion-icon>
                                </div>
                                <div>
                                    <h3 class="font-bold text-blue-400">Identity Check</h3>
                                    <p class="text-slate-400 text-xs">Prospectus & Mobile No.</p>
                                </div>
                            </div>

                            <!-- Step 2 -->
                            <div class="flex items-center space-x-6 opacity-40">
                                <div class="w-10 h-10 rounded-2xl bg-slate-800 flex items-center justify-center text-xl border border-slate-700">
                                    <ion-icon name="shield-checkmark-outline"></ion-icon>
                                </div>
                                <div>
                                    <h3 class="font-bold">Verification</h3>
                                    <p class="text-slate-400 text-xs">Enter OTP Received</p>
                                </div>
                            </div>

                            <!-- Step 3 -->
                            <div class="flex items-center space-x-6 opacity-40">
                                <div class="w-10 h-10 rounded-2xl bg-slate-800 flex items-center justify-center text-xl border border-slate-700">
                                    <ion-icon name="create-outline"></ion-icon>
                                </div>
                                <div>
                                    <h3 class="font-bold">Form Filling</h3>
                                    <p class="text-slate-400 text-xs">Detailed Academic Info</p>
                                </div>
                            </div>

                            <!-- Step 4 -->
                            <div class="flex items-center space-x-6 opacity-40">
                                <div class="w-10 h-10 rounded-2xl bg-slate-800 flex items-center justify-center text-xl border border-slate-700">
                                    <ion-icon name="cloud-upload-outline"></ion-icon>
                                </div>
                                <div>
                                    <h3 class="font-bold">Documents</h3>
                                    <p class="text-slate-400 text-xs">Upload Marksheets</p>
                                </div>
                            </div>

                            <!-- Step 5 -->
                            <div class="flex items-center space-x-6 opacity-40">
                                <div class="w-10 h-10 rounded-2xl bg-slate-800 flex items-center justify-center text-xl border border-slate-700">
                                    <ion-icon name="checkmark-done-circle-outline"></ion-icon>
                                </div>
                                <div>
                                    <h3 class="font-bold">Submission</h3>
                                    <p class="text-slate-400 text-xs">Final Review & Complete</p>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Footer Note in Sidebar -->
                    <div class="absolute bottom-10 left-10 right-10">
                        <div class="flex items-center space-x-3 text-slate-500 text-sm">
                            <ion-icon name="lock-closed-outline"></ion-icon>
                            <span>Secure SSL Encrypted Connection</span>
                        </div>
                    </div>
                </div>

                <!-- Right Side: Interaction Area -->
                <div class="lg:w-3/5 p-8 md:p-16 flex flex-col justify-center">
                    <div class="max-w-md mx-auto w-full">
                        <div class="mb-10">
                            <span class="text-blue-600 font-bold text-sm tracking-widest uppercase">Step 01 / 05</span>
                            <h2 class="text-3xl font-extrabold text-slate-800 mt-2">Verify Application</h2>
                            <p class="text-slate-500 mt-3 leading-relaxed">Enter your Prospectus number and registered Mobile number to continue with the admission process.</p>
                        </div>

                        <form action="<?php echo e(route('admission.otp_generating')); ?>" method="POST" class="space-y-6">
                            <?php echo csrf_field(); ?>
                            
                            <div class="space-y-2">
                                <label class="text-sm font-bold text-slate-700 flex items-center">
                                    Prospectus Number
                                    <span class="ml-1 text-red-500">*</span>
                                </label>
                                <div class="relative">
                                    <div class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none text-slate-400">
                                        <ion-icon name="newspaper-outline"></ion-icon>
                                    </div>
                                    <input type="text" name="prospectus_number" required
                                        class="w-full h-10 pl-11 pr-4 rounded-2xl border border-slate-200 bg-slate-50 input-focus-effect font-medium" 
                                        placeholder="e.g. SDU20240001">
                                </div>
                            </div>

                            <div class="space-y-2">
                                <label class="text-sm font-bold text-slate-700 flex items-center">
                                    Mobile Number
                                    <span class="ml-1 text-red-500">*</span>
                                </label>
                                <div class="relative">
                                    <div class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none text-slate-400">
                                        <ion-icon name="call-outline"></ion-icon>
                                    </div>
                                    <input type="text" name="phone_number" required
                                        class="w-full h-10 pl-11 pr-4 rounded-2xl border border-slate-200 bg-slate-50 input-focus-effect font-medium" 
                                        placeholder="10-digit mobile number">
                                </div>
                            </div>

                            <?php if(session()->has('error')): ?>
                                <div class="p-4 bg-red-50 border border-red-100 rounded-2xl flex items-start space-x-3 animate-head-shake">
                                    <ion-icon name="alert-circle" class="text-red-500 text-xl mt-0.5"></ion-icon>
                                    <p class="text-sm text-red-600 font-medium"><?php echo e(session()->get('error')); ?></p>
                                </div>
                            <?php endif; ?>

                            <button type="submit" class="w-full h-12 bg-slate-900 hover:bg-black text-white font-bold rounded-2xl transition-all duration-300 transform hover:-translate-y-1 shadow-xl hover:shadow-2xl flex items-center justify-center space-x-3 group">
                                <span>Generate OTP</span>
                                <ion-icon name="arrow-forward" class="group-hover:translate-x-1 transition-transform"></ion-icon>
                            </button>
                        </form>

                        <div class="mt-10 pt-10 border-t border-slate-100">
                            <div class="flex items-center justify-between text-sm">
                                <span class="text-slate-400">Technical Help?</span>
                                <a href="tel:+919263783020" class="text-slate-900 font-bold hover:text-blue-600 transition-colors underline underline-offset-4 decoration-slate-200">Contact Support</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Icons -->
    <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
    <?php $__env->endSlot(); ?>
 <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?><?php /**PATH /opt/lampp/htdocs/prospectus-new-version/resources/views/already_prospectus.blade.php ENDPATH**/ ?>