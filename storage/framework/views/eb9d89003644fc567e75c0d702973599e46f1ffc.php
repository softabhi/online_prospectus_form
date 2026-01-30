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
                        <fieldset id="form2">
                            <div class="sub__title__container ">
                                <p>Step 3/5</p>
                                <h2> Admission form fill up </h2>
                                <p>Please fill the details below so that you have to go into the next step </p>
                            </div>
                            <div class="input__container">
                                <form role="form" action="<?php echo e(route('admission.admission_form')); ?>" method="POST" id="admission_form"
                                    enctype="multipart/form-data">
                                    <?php echo csrf_field(); ?>
                                    <div class="row">
                                        <div class="col-md-12" id="error_section"></div>
                                        <input type="hidden" name="approval"  value="not" >
                                        <div class="col-4">
                                            <label>Registration No <span class="text-danger">*</span> </label>
                                            <input disabled  type="text" name="admission_id" value="Generated After Admission "
                                                class="form-control">
                                        </div>
                                        <div class="col-4">
                                            <label>Enter Prospectus No <span class="text-danger">*</span></label>
                                            <input id="form_no" readonly value="<?php echo e($data->prospectus_no); ?>" type="text"
                                                name="admission_form_no" class="form-control" required="">
                                        </div>
                                        <div class="col-4">
                                            <label>Admission No</label>
                                            <input type="text" name="admission_no" class="form-control" value=""
                                                readonly="" placeholder="Generate By University">
                                        </div>

                                        <div class="col-4">
                                            <label>Title <span class="text-danger">*</span></label>
                                            <select name="admission_title" class="form-control">
                                                <option selected disabled>Select</option>
                                                <option value="Master">Master</option>
                                                <option value="Miss">Miss</option>
                                                <option value="Mr">Mr</option>
                                                <option value="Mrs">Mrs</option>
                                            </select>
                                        </div>

                                        <div class="col-4">
                                            <label>First Name <span class="text-danger">*</span></label>
                                            <input id="first_name" type="text" value="<?php echo e($data->prospectus_applicant_name); ?>" name="admission_first_name"
                                                class="form-control" required="">
                                        </div>
                                        <input id="first_name" type="hidden" value="<?php echo e($data->prospectus_program_type); ?>" name="admission_program_type"
                                                class="form-control" required="">

                                        <div class="col-4">
                                            <label>Middle Name </label>
                                            <input type="text" name="admission_middle_name" class="form-control">
                                        </div>

                                        <div class="col-4">
                                            <label>Last Name <span class="text-danger">*</span></label>
                                            <input id="last_name" type="text" name="admission_last_name"
                                                class="form-control">
                                        </div>

                                        <div class="col-4">
                                            <label>Course <span class="text-danger">*</span></label>

                                            <?php $p_course = DB::table('tbl_course')
                                                ->where('course_id', $data->prospectus_course_name)
                                                ->get(); ?>
                                            <input type="hidden" name="admission_course_name"
                                                value="<?php echo e($data->prospectus_course_name); ?>" id="">
                                            <input type="text" class="form-control" disabled
                                                value="<?php echo e($p_course[0]->course_name); ?>" id="">



                                            

                                        </div>
                                        <div class="col-4">
                                            <label>Session <span class="text-danger">*</span></label>

                                            <select aria-readonly="false" id="session_check" class="form-control"
                                                name="admission_session">
                                                <?php
                                                $flag = 0;
                                                $course1 = DB::table('tbl_course')
                                                    ->where('course_id', $data->prospectus_course_name)
                                                    ->get();
                                                $sessions = DB::table('tbl_university_details')
                                                    ->orderBy('university_details_id', 'ASC')
                                                    ->get();
                                                foreach ($sessions as $session) {
                                                    $start_year = explode('-', $session->university_details_academic_start_date)[0];
                                                    $end_year = explode('-', $session->university_details_academic_end_date)[0];
                                                    $total_year = $end_year - $start_year;
                                                    if ($total_year == $course1[0]->duration) {
                                                        $flag++;
                                                        echo ' <option value="' . $session->university_details_id . '">' . $start_year . '-' . $end_year . '</option>';
                                                    }
                                                    if($flag==1){
                                                        break;
                                                    }
                                                } ?>
                                            </select>
                                        </div>
                                        <div class="col-4">
                                            <label>Date Of Birth <span class="text-danger">*</span></label>
                                            <input readonly id="dob" value="<?php echo e($data->prospectus_dob); ?>" type="date"
                                                name="admission_dob" class="form-control" required="">
                                        </div>

                                        <div class="col-4">
                                            <label>Nationality <span class="text-danger">*</span></label>
                                            <input type="text" name="admission_nationality" class="form-control">
                                        </div>
                                        <div class="col-4">
                                            <label>Aadhar No <span class="text-danger">*</span></label>
                                            <input type="text" name="admission_aadhar_no" class="form-control">
                                        </div>

                                        <div class="col-4">
                                            <label>Date Of Admission <span class="text-danger">*</span></label>
                                            <input readonly type="date" name="date_of_admission"
                                                value="<?php echo e(date('Y-m-d')); ?>" class="form-control">
                                        </div>
                                        <div class="col-4">
                                            <label>Religion <span class="text-danger">*</span></label>
                                            <select name="admission_religion" class="form-control">
                                                <option selected disabled>Select</option>
                                                <option value="Hindu">Hindu</option>
                                                <option value="Muslim">Muslim</option>
                                                <option value="Sikh">Sikh</option>
                                                <option value="Christian">Christian</option>
                                                <option value="Others">Others</option>
                                            </select>
                                        </div>
                                        <div class="col-4">
                                            <label>Category <span class="text-danger">*</span></label>
                                            <select name="admission_category" class="form-control">
                                                <option selected disabled>Select</option>
                                                <option value="General">General</option>
                                                <option value="SC">SC</option>
                                                <option value="ST">ST</option>
                                                <option value="OBC">OBC</option>
                                            </select>
                                        </div>
                                        <div class="col-4">
                                            <label>Gender <span class="text-danger">*</span></label>
                                            <select id="gender" name="admission_gender" class="form-control">
                                                <option value="<?php echo e($data->prospectus_gender); ?>">
                                                    <?php echo e($data->prospectus_gender); ?></option>
                                                <option value="Male">Male</option>
                                                <option value="Female">Female</option>
                                            </select>
                                        </div>
                                        <div class="col-4">
                                            <label>Mobile No. (Student) <span class="text-danger">*</span></label>
                                            <input readonly id="mobile_no" type="text" value="<?php echo e($data->mobile); ?>"
                                                name="admission_mobile_student" class="form-control">
                                        </div>
                                        <div class="col-4">
                                            <label>Home Landline no.</label>
                                            <input type="text" name="admission_home_landlineno" class="form-control">
                                        </div>
                                        <div class="col-4">
                                            <label>Email Id (Student) <span class="text-danger">*</span></label>
                                            <input readonly id="email_id" value="<?php echo e($data->prospectus_emailid); ?>"
                                                type="email" name="admission_emailid_student" class="form-control">
                                        </div>

                                        <div class="col-md-4">
                                            <label>Username <span class="text-danger">*</span></label>
                                            <input readonly type="text" value="<?php echo e($data->prospectus_emailid); ?>"
                                                name="admission_username" class="form-control" required="">
                                        </div>
                                        <div class="col-4">
                                            <label>Password <span class="text-danger">*</span></label>
                                            <input type="password" name="admission_password" class="form-control"
                                                required="">
                                        </div>
                                        <div class="col-4">
                                            <label>Blood Group <span class="text-danger">*</span></label>
                                            <input type="text" name="admission_blood_group" class="form-control">
                                        </div>

                                        <div class="col-4">
                                            <label>Hostel</label>
                                            <select name="admission_hostel" class="form-control">
                                                <option value="No">No</option>
                                                <option value="Yes">Yes</option>
                                            </select>
                                        </div>
                                        <div class="col-4">
                                            <label>Transport</label>
                                            <select name="admission_transport" class="form-control">
                                                <option value="No">No</option>
                                                <option value="Yes">Yes</option>
                                            </select>
                                        </div>
                                        <div class="col-4">
                                            <label>Image <span class="text-danger">*</span></label>
                                            <input type="file" name="admission_profile_image" id="admission_profile_image"
                                                class="form-control">
                                        </div>
                                        <div class="col-4">
                                            <img src="<?php echo e(asset('img/user.png')); ?>" id="photoBrowser"
                                                style="margin-top:17px;margin-left:4px;border:solid 1px lightgray"
                                                width="120" height="120">
                                        </div>

                                    </div>

                                    <hr>
                                    <div class="sub__title__container ">
                                        <h3 class="text-white">PRESENT ADDRESS</h3>
                                    </div>
                                    <br>

                                    <div class="body table-responsive p-0">
                                        <div class="-body">
                                            <div class="row">
                                                <div class="col-4">
                                                    <label>Pin Code <span class="text-danger">*</span></label>
                                                    <input id="postal_code" type="text" onkeyup="check_pincode(this.value)"
                                                        name="admission_pin_code" class="form-control" required="">
                                                </div>
                                                <div class="col-4">
                                                    <label>Country<span class="text-danger">*</span></label>
                                                    <input readonly id="country" type="text"
                                                        class="form-control">
                                                </div>
                                                <div class="col-4">
                                                    <label>State<span class="text-danger">*</span></label>
                                                    <input readonly id="state" type="text" name="admission_state"
                                                        class="form-control">
                                                </div>
                                                <div class="col-4">
                                                    <label>District <span class="text-danger">*</span></label>
                                                    <input readonly type="text" id="district" name="admission_district"
                                                        class="form-control">
                                                </div>
                                                <div class="col-4">
                                                    <label>City <span class="text-danger">*</span></label>
                                                    <input id="city" type="text" name="admission_city"
                                                        class="form-control">
                                                </div>

                                              
                                                <div class="col-4">
                                                    <label>Residential Address <span
                                                            class="text-danger">*</span></label>
                                                    <textarea id="address" name="admission_residential_address" class="form-control" style="height: 38px;" required=""></textarea>
                                                </div>



                                            </div>
                                        </div>
                                    </div>



                                    <hr>
                                    <div class="sub__title__container ">
                                        <h3 class="text-white">Parent Details</h3>
                                    </div>
                                    <br>
                                    <div class="-body table-responsive p-0">
                                        <div class="-body">
                                            <div class="row">
                                                <div class="col-4">
                                                    <label>Mother Name<span class="text-danger">*</span></label>
                                                    <input id="mother_name" placeholder="Mother name" type="text"
                                                        name="admission_mother_name" class="form-control" required="" >
                                                </div>
                                                <div class="col-4">
                                                    <label>Father Name <span class="text-danger">*</span></label>
                                                    <input placeholder="Father name" id="father_name" type="text"
                                                        name="admission_father_name" class="form-control" required="">
                                                </div>
                                                <div class="col-4">
                                                    <label>Father Phone No.</label>
                                                    <input type="text" name="admission_father_phoneno"
                                                        class="form-control">
                                                </div>
                                                <div class="col-4">
                                                    <label>Father Whatsapp No</label>
                                                    <input placeholder="Father whatsapp number" type="text"
                                                        name="admission_father_whatsappno" class="form-control">
                                                </div>


                                                <div class="col-4">
                                                    <label>Email Id (Father) </label>
                                                    <input type="email" placeholder="Fatehr email address"
                                                        name="admission_emailid_father" class="form-control">
                                                </div>
                                            </div>
                                        </div>
                                    </div>



                                    <hr>
                                    <div class="sub__title__container ">
                                        <h3 class="text-white">Academic Details</h3>
                                    </div>
                                    <br>
                                    <div class="body table-responsive p-0">
                                        <table class="table table-hover">
                                            <thead>
                                                <tr>
                                                    <th>S.No</th>
                                                    <th>Qualification</th>
                                                    <th>Board/University</th>
                                                    <th>School/College Name</th>
                                                    <th>Year Of Passing</th>
                                                    <th>Percentage or CGPA</th>
                                                    <th>Subjects</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <td>1</td>
                                                    <td>High School <span class="text-danger">*</span></td>
                                                    <td><input type="text" name="admission_high_school_board_university"
                                                            size="15" value="" required=""></td>
                                                    <td><input type="text" name="admission_high_school_college_name"
                                                            size="15" value="" required=""></td>
                                                    <td><input type="text" name="admission_high_school_passing_year"
                                                            size="15" value="" required=""></td>
                                                    <td><input type="text" name="admission_high_school_per" size="15"
                                                            value="" required=""></td>
                                                    <td><input type="text" name="admission_high_school_subjects" size="15"
                                                            value="" required=""></td>
                                                </tr>
                                                <tr>
                                                    <td>2</td>
                                                    <td>Intermediate <span class="text-danger">*</span></td>
                                                    <td><input type="text" name="admission_intermediate_board_university"
                                                            size="15" value="" required=""></td>
                                                    <td><input type="text" name="admission_intermediate_college_name"
                                                            size="15" value="" required=""></td>
                                                    <td><input type="text" name="admission_intermediate_passing_year"
                                                            size="15" value="" required=""></td>
                                                    <td><input type="text" name="admission_intermediate_per" size="15"
                                                            value="" required=""></td>
                                                    <td><input type="text" name="admission_intermediate_subjects" size="15"
                                                            value="" required=""></td>
                                                </tr>
                                                <tr>
                                                    <td>3</td>
                                                    <td>Graduation</td>
                                                    <td><input type="text" name="admission_graduation_board_university"
                                                            size="15" value=""></td>
                                                    <td><input type="text" name="admission_graduation_college_name"
                                                            size="15" value=""></td>
                                                    <td><input type="text" name="admission_graduation_passing_year"
                                                            size="15" value=""></td>
                                                    <td><input type="text" name="admission_graduation_per" size="15"
                                                            value=""></td>
                                                    <td><input type="text" name="admission_graduation_subjects" size="15"
                                                            value=""></td>
                                                </tr>
                                                <tr>
                                                    <td>4</td>
                                                    <td>Post Graduation</td>
                                                    <td><input type="text" name="admission_post_graduation_board_university"
                                                            size="15" value=""></td>
                                                    <td><input type="text" name="admission_post_graduation_college_name"
                                                            size="15" value=""></td>
                                                    <td><input type="text" name="admission_post_graduation_others" size="15"
                                                            value=""></td>
                                                    <td><input type="text" name="admission_post_graduation_per" size="15"
                                                            value=""></td>
                                                    <td><input type="text" name="admission_post_graduation_subjects"
                                                            size="15" value=""></td>
                                                </tr>
                                                <tr>
                                                    <td>5</td>
                                                    <td>Others</td>
                                                    <td><input type="text" name="admission_others_board_university"
                                                            size="15" value=""></td>
                                                    <td><input type="text" name="admission_others_college_name" size="15"
                                                            value=""></td>
                                                    <td><input type="text" name="admission_others_passing_year" size="15"
                                                            value=""></td>
                                                    <td><input type="text" name="admission_others_per" size="15" value="">
                                                    </td>
                                                    <td><input type="text" name="admission_others_subjects" size="15"
                                                            value=""></td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>



                                    <hr>
                                    <div class="sub__title__container ">
                                        <h3 class="text-white">TECHNICAL QUALIFICATION (IF ANY)</h3>
                                    </div>
                                    <br>

                                    <div class="-body table-responsive p-0">
                                        <table class="table table-hover">
                                            <thead>
                                                <tr>
                                                    <th>S.No</th>
                                                    <th>Course</th>
                                                    <th>Board / University</th>
                                                    <th>Year Of Passing</th>
                                                    <th>Percentage or CGPA</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <td>1</td>
                                                    <td><input type="text" name="admission_course1" size="15" value=""></td>
                                                    <td><input type="text" name="admission_board_university1" size="15"
                                                            value=""></td>
                                                    <td><input type="text" name="admission_year_of_passing1" size="15"
                                                            value=""></td>
                                                    <td><input type="text" name="admission_percentage1" size="15" value="">
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>2</td>
                                                    <td><input type="text" name="admission_course2" size="15" value=""></td>
                                                    <td><input type="text" name="admission_board_university2" size="15"
                                                            value=""></td>
                                                    <td><input type="text" name="admission_year_of_passing2" size="15"
                                                            value=""></td>
                                                    <td><input type="text" name="admission_percentage2" size="15" value="">
                                                    </td>
                                                </tr>

                                            </tbody>
                                        </table>

                                    </div>


                                    <hr>
                                    <div class="sub__title__container ">
                                        <h3 class="text-white">WORK EXPERIENCE (IF ANY)</h3>
                                    </div>
                                    <br>

                                    <div class="-body table-responsive p-0">
                                        <table class="table table-hover">
                                            <thead>
                                                <tr>
                                                    <th>S.No</th>
                                                    <th>Name of organisation</th>
                                                    <th>Designation</th>
                                                    <th>Duration</th>

                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <td>1</td>
                                                    <td><input type="text" name="admission_name_of_org1" size="15"></td>
                                                    <td><input type="text" name="admission_designation1" size="15"></td>
                                                    <td><input type="text" name="admission_duration1" size="15"></td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>


                                    <div class="col-md-12">
                                        <div id="loader_section"></div>
                                    </div>
                                    <div class="col-md-6">
                                        <button type="submit" id="admission_button" class="btn btn-warning">Submit</button>
                                        <button type="reset" class="btn btn-primary">Reset</button>
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
<script>
    function change_session(data) {
        console.log(data);
        const xhttp = new XMLHttpRequest();
        xhttp.onload = function() {
            document.getElementById("session_check").innerHTML = this.responseText;
        }
        xhttp.open("GET", "/admission/session/" + data);
        xhttp.send();
    }

    // getting the state name and city name from the pincode
    function check_pincode(pincode) {
        console.log(pincode);
        if (pincode.length == 6) {
            var xmlhttp = new XMLHttpRequest();
            xmlhttp.onreadystatechange = function() {
                data = this.responseText;
                var data = JSON.parse(data);
                document.getElementById('postal_code').style.borderColor = 'green';
                document.getElementById('state').value = data[0].PostOffice[0].State;
                document.getElementById('city').value = data[0].PostOffice[0].Block;
                document.getElementById('country').value = data[0].PostOffice[0].Country;
                document.getElementById('district').value = data[0].PostOffice[0].District;


            }
            xmlhttp.open("GET", "https://api.postalpincode.in/pincode/" + pincode);
            xmlhttp.send();
        } else {
            document.getElementById('state').value = '';
            document.getElementById('city').value = '';
            document.getElementById('postal_code').style.borderColor = 'red';
        }
    }
</script>
<?php /**PATH /home/u517204354/domains/sonadeviuniversity.ac.in/public_html/admissions/resources/views/admission_form.blade.php ENDPATH**/ ?>