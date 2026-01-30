<?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = $__env->getContainer()->make(Illuminate\View\AnonymousComponent::class, ['view' => 'components.layout','data' => []]); ?>
<?php $component->withName('layout'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes([]); ?>
    <?php $__env->slot('title', 'Confirm Prospectus - Sona Devi University'); ?>
    <?php $__env->slot('body'); ?>
    <!-- Tailwind CSS CDN -->
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        @import  url('https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@300;400;500;600;700&display=swap');
        
        body {
            font-family: 'Plus Jakarta Sans', sans-serif;
            background-color: #f1f5f9;
        }

        .step-gradient {
            background: linear-gradient(135deg, #0f172a 0%, #1e293b 100%);
        }

        /* Thin Read-only Inputs */
        .input-readonly {
            height: 2.5rem;
            font-size: 0.85rem;
            background-color: #f8fafc;
            border: 1px solid #e2e8f0;
            border-radius: 0.6rem;
            color: #1e293b;
            font-weight: 600;
            width: 100%;
            padding: 0 0.875rem;
        }

        .label-style {
            display: block;
            font-size: 0.7rem;
            font-weight: 700;
            color: #64748b;
            margin-bottom: 0.3rem;
            text-transform: uppercase;
            letter-spacing: 0.025em;
        }

        .sidebar-compact {
            width: 100%;
        }
        @media (min-width: 1024px) {
            .sidebar-compact { width: 300px; }
        }

        .amount-highlight {
            background: linear-gradient(135deg, #fef3c7 0%, #fffbeb 100%);
            border: 1px dashed #f59e0b;
        }
    </style>

    <div class="min-h-screen py-8 px-4">
        <!-- Logo Header -->
        <div class="mb-8 text-center">
            <img class="h-12 mx-auto" src="<?php echo e(asset('img/SDU Logo Dark@4x.png')); ?>" alt="SDU">
        </div>

        <div class="max-w-5xl mx-auto bg-white rounded-[2rem] shadow-2xl flex flex-col lg:flex-row overflow-hidden border border-slate-200">
            
            <!-- Sidebar -->
            <aside class="sidebar-compact step-gradient p-8 text-white">
                <div class="mb-10">
                    <span class="bg-blue-600/20 text-blue-400 px-3 py-1 rounded-full text-[10px] font-bold uppercase tracking-widest border border-blue-500/30">Step 2 of 4</span>
                    <h1 class="text-xl font-bold mt-2">Prospectus <?php echo e(date('Y')); ?></h1>
                </div>

                <nav class="space-y-8 relative">
                    <div class="absolute left-4 top-2 bottom-2 w-[1px] bg-slate-700"></div>

                    <div class="flex items-center space-x-4 relative">
                        <div class="w-8 h-8 rounded-xl bg-emerald-500 flex items-center justify-center text-sm z-10 shadow-lg shadow-emerald-500/20">
                            <ion-icon name="checkmark-outline"></ion-icon>
                        </div>
                        <div>
                            <h4 class="text-xs font-bold text-emerald-400">Step 1</h4>
                            <p class="text-[10px] text-slate-400">Fill Details</p>
                        </div>
                    </div>

                    <div class="flex items-center space-x-4 relative">
                        <div class="w-8 h-8 rounded-xl bg-blue-600 flex items-center justify-center text-sm z-10 shadow-lg shadow-blue-500/40">
                            <ion-icon name="layers-outline"></ion-icon>
                        </div>
                        <div>
                            <h4 class="text-xs font-bold text-blue-400">Step 2</h4>
                            <p class="text-[10px] text-white font-semibold">Confirmation</p>
                        </div>
                    </div>

                    <div class="flex items-center space-x-4 opacity-30 relative">
                        <div class="w-8 h-8 rounded-xl bg-slate-800 flex items-center justify-center text-sm z-10">
                            <ion-icon name="pricetag-outline"></ion-icon>
                        </div>
                        <div>
                            <h4 class="text-xs font-bold">Step 3</h4>
                            <p class="text-[10px]">Payment</p>
                        </div>
                    </div>

                    <div class="flex items-center space-x-4 opacity-30 relative">
                        <div class="w-8 h-8 rounded-xl bg-slate-800 flex items-center justify-center text-sm z-10">
                            <ion-icon name="print-outline"></ion-icon>
                        </div>
                        <div>
                            <h4 class="text-xs font-bold">Step 4</h4>
                            <p class="text-[10px]">Complete</p>
                        </div>
                    </div>
                </nav>
            </aside>

            <!-- Content Area -->
            <div class="flex-1 p-6 lg:p-10 bg-slate-50/50">
                <div class="max-w-3xl mx-auto">
                    
                    <div class="mb-6 flex justify-between items-end">
                        <div>
                            <h2 class="text-2xl font-extrabold text-slate-800">Check & Confirm</h2>
                            <p class="text-xs text-slate-500 mt-1 uppercase tracking-wider font-semibold">Review your details before payment</p>
                        </div>
                        <div class="hidden md:block text-right">
                            <span class="text-[10px] text-slate-400 font-bold block">ORDER ID</span>
                            <span class="text-xs font-mono font-bold text-slate-700"><?php echo e($txn_id); ?></span>
                        </div>
                    </div>

                    <!-- Critical Notes -->
                    <div class="mb-6 p-4 bg-red-50 rounded-2xl border border-red-100 space-y-2">
                        <div class="flex items-start gap-2">
                            <ion-icon name="alert-circle" class="text-red-500 text-lg"></ion-icon>
                            <p class="text-[11px] text-red-800 font-bold leading-tight">
                                भुगतान के बाद, कृपया कुछ सेकंड प्रतीक्षा करें। जब तक रशीद प्रताप न हों।
                            </p>
                        </div>
                        <p class="text-[11px] text-red-600 pl-7 font-medium">
                            After payment, please wait for some seconds until the receipt is displayed. Do not refresh.
                        </p>
                    </div>

                    <form method="POST" action="<?php echo e(route('easebuzz')); ?>" class="space-y-6">
                        <?php echo csrf_field(); ?>
                        
                        <!-- Details Grid -->
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-x-6 gap-y-4">
                            
                            <div>
                                <label class="label-style">Applicant Name</label>
                                <input type="text" name="firstname" value="<?php echo e($data->prospectus_applicant_name); ?>" class="input-readonly" readonly>
                            </div>

                            <div>
                                <label class="label-style">Email Address</label>
                                <input type="email" name="email" value="<?php echo e($data->prospectus_emailid); ?>" class="input-readonly" readonly>
                            </div>

                            <div>
                                <label class="label-style">Father's Name</label>
                                <input type="text" name="udf1" value="<?php echo e($data->prospectus_father_name); ?>" class="input-readonly" readonly>
                            </div>

                            <div>
                                <label class="label-style">Mobile Number</label>
                                <input type="text" name="phone" value="<?php echo e($data->mobile); ?>" class="input-readonly" readonly>
                            </div>

                            <div>
                                <label class="label-style">Course Applied</label>
                                <?php $course = DB::table('tbl_course')->where('course_id', $data->prospectus_course_name)->first(); ?>
                                <input type="text" name="udf2" value="<?php echo e($course->course_name ?? 'N/A'); ?>" class="input-readonly" readonly>
                            </div>

                            <div>
                                <label class="label-style">Academic Session</label>
                                <input type="text" name="udf3" value="<?php echo e($data->prospectus_session); ?>" class="input-readonly" readonly>
                            </div>

                            <input type="hidden" name="txnid" value="<?php echo e($txn_id); ?>">
                        </div>

                        <!-- Amount Section -->
                        <div class="amount-highlight p-5 rounded-2xl flex flex-col md:flex-row items-center justify-between gap-4">
                            <div>
                                <h4 class="text-amber-800 font-bold text-sm">Prospectus Fee</h4>
                                <p class="text-[11px] text-amber-600">This amount is non-refundable.</p>
                            </div>
                            <div class="flex items-center gap-4">
                                <span class="text-2xl font-black text-amber-900">₹<?php echo e(session('prospectus_money')); ?></span>
                                <input type="hidden" name="amount" value="<?php echo e(session('prospectus_money')); ?>">
                                <button type="submit" class="bg-slate-900 hover:bg-black text-white px-8 h-12 rounded-xl font-bold transition-all shadow-xl flex items-center gap-2 group">
                                    <span>Pay Now</span>
                                    <ion-icon name="arrow-forward-outline" class="group-hover:translate-x-1 transition-transform"></ion-icon>
                                </button>
                            </div>
                        </div>

                        <!-- Support Footer -->
                        <div class="pt-6 border-t border-slate-200">
                            <div class="flex items-start gap-3">
                                <div class="w-8 h-8 rounded-full bg-slate-100 flex items-center justify-center text-slate-500">
                                    <ion-icon name="help-buoy-outline"></ion-icon>
                                </div>
                                <div>
                                    <h5 class="text-[11px] font-bold text-slate-700">Technical Support</h5>
                                    <p class="text-[10px] text-slate-400 mt-0.5">If you face issues during payment, contact: +91-9060908201 / +91-9123227267</p>
                                </div>
                            </div>
                        </div>
                    </form>

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
<?php endif; ?><?php /**PATH /opt/lampp/htdocs/admissions/resources/views/confirmation.blade.php ENDPATH**/ ?>