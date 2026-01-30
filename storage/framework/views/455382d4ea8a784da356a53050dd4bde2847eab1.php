<?php if (isset($component)) { $__componentOriginalba35371caef1eeddf45260937599d5fd5fb5dd30 = $component; } ?>
<?php $component = $__env->getContainer()->make(App\View\Components\Layout::class, []); ?>
<?php $component->withName('layout'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes([]); ?>
    <?php $__env->slot('title', 'Sona devi University'); ?>

    <?php $__env->slot('body'); ?>

        <style>
            p {
                margin-top: 0;
                margin-bottom: 0.25rem;
            }

            .card-title {
                margin-bottom: 0rem;
                filter: none !important;
            }

        </style>
        <div class="container">
            <!-- app invoice View Page -->
            <section class="invoice-view-wrapper section mt-5">
                <div class="row ">
                    <!-- invoice view page -->
                    <div class="col-sm-12">
                    </div>
                    <div class="col-sm-12 ">
                        <div class="card">
                            <div class="card-content " id="print_pdf_file">
                                <div class="row container">
                                    <div class="col-sm-12" style="text-align: center; width: 100%;">
                                        <nav class="whitenav" style="background-color: white; box-shadow: none;">
                                            <div class="nav-wrapper">
                                                <img width="250" class="img-fluid my-2" src="<?php echo e(asset('img/SDU Logo Dark@4x.png')); ?>"
                                                    alt="sona devi Logo">
                                            </div>
                                        </nav>
                                        <h6> <strong>Online Application Form </strong></h6>
                                    </div>
                                    <div class="row container ">
                                        <div class="col-10">
                                            <strong> Referance No : <?php echo e($data->id); ?></strong>
                                        </div>
                                        <div class="col-2">

                                            <div class="invoice-action-btn ">
                                                <button id="printbutton" onclick="printdata()"
                                                    class="btn btn-success btn-sm mb-3">
                                                    <span>Print</span> </button>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                            </div>
                            <div class="card bg-dark p-1 mb-3 col-sm-12  ">
                                <h5 class="card-title container  text-white">1. Program Details </h5>
                            </div>
                            <div class="row container ">

                                <div class="col-4">
                                    <p><strong>Session</strong></p>
                                    <p><?php
                                    echo $data->prospectus_session;
                                    ?></p>
                                </div>
                                <div class="col-4">
                                    <p><strong>Course</strong></p>
                                    <p><?php echo e(DB::table('tbl_course')->where('course_id', $data->prospectus_course_name)->first()->course_name); ?>

                                    </p>
                                </div>
                            </div>
                            <div class="invoice-product-details">
                                <div class="card bg-dark p-1 mb-3 col-sm-12 ">
                                    <h5 class="card-title container  text-white">2. Personal Details </h5>
                                </div>
                                <div class="row container">
                                    <div class="col-sm-4" style="width: 33.33%">
                                        <p><strong>Your Name</strong></p>
                                        <p><?php echo e($data->prospectus_applicant_name); ?></p>
                                    </div>
                                    <div class="col-sm-4" style="width: 33.33%">
                                        <p><strong>Mobile Number</strong></p>
                                        <p><?php echo e($data->mobile); ?></p>
                                    </div>
                                    <div class="col-sm-4" style="width: 33.33%">
                                        <p><strong>Email</strong></p>
                                        <p><?php echo e($data->prospectus_emailid); ?></p>
                                    </div>
                                </div>
                                <div class="row container">

                                    <div class="col-sm-4" style="width: 33.33%">
                                        <p><strong>Gender</strong></p>
                                        <p><?php echo e($data->prospectus_gender); ?></p>
                                    </div>
                                    <div class="col-sm-4" style="width: 33.33%">
                                        <p><strong>Date Of Birth</strong></p>
                                        <p><?php echo e($data->prospectus_dob); ?></p>
                                    </div>
                                    <div class="col-sm-4" style="width: 33.33%">
                                        <p><strong>Refered BY</strong></p>
                                        <p><?php echo e($data->revert_by); ?></p>
                                    </div>
                                </div>
                                <div class="row container">
                                    <div class="col-sm-4" style="width: 33.33%">
                                        <p><strong>Father's Name</strong></p>
                                        <p><?php echo e($data->prospectus_father_name); ?></p>
                                    </div>

                                    <div class="col-sm-4" style="width: 33.33%">
                                        <p><strong>Mother's Name</strong></p>
                                        <p><?php echo e($data->prospectus_mother_name); ?></p>
                                    </div>

                                </div>

                                <div class="card bg-dark p-1 mb-3 col-sm-12 ">
                                    <h5 class="card-title container  text-white">3. Address Details </h5>
                                </div>
                                <div class="row container">

                                    <div class="col-sm-4" style="width: 33.33%">
                                        <p><strong> Address</strong></p>
                                        <p><?php echo e($data->prospectus_address); ?></p>

                                    </div>
                                    <div class="col-sm-4" style="width: 33.33%">
                                        <p><strong>Country</strong></p>
                                        <p><?php echo e($data->prospectus_country); ?></p>
                                    </div>

                                </div>
                                <div class="row container">
                                    <div class="col-sm-4" style="width: 33.33%">
                                        <p><strong>City</strong></p>
                                        <p><?php echo e($data->prospectus_city); ?></p>
                                    </div>

                                    <div class="col-sm-4" style="width: 33.33%">
                                        <p><strong>State/Province</strong></p>
                                        <p><?php echo e($data->prospectus_state); ?></p>
                                    </div>
                                    <div class="col-sm-4" style="width: 33.33%">
                                        <p><strong>Postal Code</strong></p>
                                        <p><?php echo e($data->prospectus_postal_code); ?></p>
                                    </div>
                                </div>


                                <div class="card bg-dark p-1 mb-3 col-sm-12 ">
                                    <h5 class="card-title container  text-white">4. Payment Details </h5>
                                </div>
                                <div class="row container">
                                    <div class="col-sm-4" style="width: 33.33%">
                                        <p><strong>Payment mode</strong></p>
                                        <p><?php echo e($data->prospectus_payment_mode); ?></p>
                                    </div>
                                    <div class="col-sm-4" style="width: 33.33%">
                                        <p><strong>Amount </strong></p>
                                        <p><?php echo e($data->prospectus_rate); ?></p>
                                    </div>
                                    <div class="col-sm-4" style="width: 33.33%">
                                        <p><strong>Deposit To</strong></p>
                                        <p><?php echo e($data->prospectus_deposit_to); ?></p>
                                    </div>

                                </div>
                                <div class="row container">
                                    <div class="col-sm-4" style="width: 33.33%">
                                        <p><strong>Transaction Date</strong></p>
                                        <p><?php echo e($data->transaction_date); ?></p>
                                    </div>
                                    <div class="col-sm-4" style="width: 33.33%">
                                        <p><strong>Transaction Id</strong></p>
                                        <p><?php echo e($data->transaction_id); ?></p>
                                    </div>
                                    <div class="col-sm-4" style="width: 33.33%">
                                        <p><strong>Easebuzz Id</strong></p>
                                        <p><?php echo e($data->easebuzz_id); ?></p>
                                    </div>
                                </div>


                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <!-- START RIGHT SIDEBAR NAV -->
        </div>
    <?php $__env->endSlot(); ?>
 <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalba35371caef1eeddf45260937599d5fd5fb5dd30)): ?>
<?php $component = $__componentOriginalba35371caef1eeddf45260937599d5fd5fb5dd30; ?>
<?php unset($__componentOriginalba35371caef1eeddf45260937599d5fd5fb5dd30); ?>
<?php endif; ?>

<script>
    function printdata() {
        document.getElementsByClassName('bg-black')[0].style.display = "none"
        document.getElementsByClassName('bg-black')[1].style.display = "none"
        document.getElementById('printbutton').style.display = "none"

        print()
    }
</script>
<?php /**PATH C:\xampp\htdocs\prospectus\resources\views/print.blade.php ENDPATH**/ ?>