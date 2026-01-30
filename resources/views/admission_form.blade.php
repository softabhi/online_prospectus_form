<x-layout>
    @slot('title', 'Admission Form - Sona Devi University')
    @slot('body')
    <!-- Tailwind CSS for modern styling -->
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@300;400;500;600;700&display=swap');
        
        body {
            font-family: 'Plus Jakarta Sans', sans-serif;
            background-color: #f1f5f9;
        }

        .step-gradient {
            background: linear-gradient(135deg, #0f172a 0%, #1e293b 100%);
        }

        .form-card {
            background: #ffffff;
            border-radius: 1rem;
            border: 1px solid #e2e8f0;
            box-shadow: 0 1px 3px 0 rgba(0, 0, 0, 0.1);
            padding: 1.5rem;
            margin-bottom: 1rem;
        }

        .input-field {
            width: 100%;
            height: 2rem; /* Reduced height from 3rem */
            padding: 0 0.875rem;
            border-radius: 0.5rem; /* Slightly tighter corners */
            border: 1px solid #cbd5e1;
            background-color: #f8fafc;
            transition: all 0.2s ease;
            font-size: 0.813rem; /* Slightly smaller text for thin field */
        }

        .input-field:focus {
            border-color: #3b82f6;
            background-color: #ffffff;
            box-shadow: 0 0 0 3px rgba(59, 130, 246, 0.1);
            outline: none;
        }

        .label-style {
            display: block;
            font-size: 0.7rem; /* Reduced from 0.75rem */
            font-weight: 700;
            color: #64748b;
            margin-bottom: 0.375rem;
            text-transform: uppercase;
            letter-spacing: 0.05em;
        }

        .section-header {
            border-left: 3px solid #3b82f6;
            padding-left: 0.875rem;
            margin-bottom: 1rem;
        }

        .academic-table-container {
            overflow-x: auto;
            border-radius: 0.75rem;
            border: 1px solid #e2e8f0;
            margin-bottom: 0.5rem;
        }

        .academic-table {
            width: 100%;
            border-collapse: collapse;
            font-size: 0.813rem;
            min-width: 800px;
        }

        .academic-table th {
            background-color: #f8fafc;
            color: #475569;
            font-weight: 700;
            text-align: left;
            padding: 0.75rem 0.875rem; /* Tighter padding */
            border-bottom: 2px solid #e2e8f0;
        }

        .academic-table td {
            padding: 0.5rem 0.875rem; /* Tighter padding */
            border-bottom: 1px solid #f1f5f9;
        }

        .academic-input {
            width: 100%;
            height: 2rem; /* Reduced from 2.5rem */
            padding: 0 0.625rem;
            border: 1px solid #e2e8f0;
            border-radius: 0.375rem;
            background-color: #fff;
            font-size: 0.75rem;
        }

        .academic-input:focus {
            border-color: #3b82f6;
            outline: none;
        }
    </style>

    <div class="min-h-screen pb-7">
        <!-- Logo Banner -->
        <div class="py-4 shadow-xl text-center">
            <img class="h-14 mx-auto" src="{{ asset('img/SDU Logo Dark@4x.png') }}" alt="SDU">
        </div>

        <div class="max-w-7xl mx-auto px-4 mt-8">
            <div class="flex flex-col lg:flex-row gap-6">
                
                <!-- Progress Sidebar -->
                <div class="lg:w-1/4">
                    <div class="step-gradient rounded-2xl p-6 text-white sticky top-10">
                        <h2 class="text-lg font-bold mb-6">Application Step 3/5</h2>
                        <div class="space-y-6 relative">
                            <div class="absolute left-4 top-2 bottom-2 w-0.5 bg-slate-700"></div>
                            
                            <div class="flex items-center gap-3 relative">
                                <div class="w-8 h-8 rounded-full bg-emerald-500 flex items-center justify-center text-white z-10 text-xs">
                                    <ion-icon name="person-outline"></ion-icon>
                                </div>
                                <div>
                                    <p class="text-[10px] text-emerald-400 font-bold uppercase">Step 01</p>
                                    <p class="text-xs font-semibold">Registration</p>
                                </div>
                            </div>

                            <div class="flex items-center gap-3 relative">
                                <div class="w-8 h-8 rounded-full bg-emerald-500 flex items-center justify-center text-white z-10 text-xs">
                                    <ion-icon name="key-outline"></ion-icon>
                                </div>
                                <div>
                                    <p class="text-[10px] text-emerald-400 font-bold uppercase">Step 02</p>
                                    <p class="text-xs font-semibold">OTP Verified</p>
                                </div>
                            </div>

                            <div class="flex items-center gap-3 relative">
                                <div class="w-8 h-8 rounded-full bg-blue-600 flex items-center justify-center text-white z-10 ring-4 ring-blue-900/30 text-xs">
                                    <ion-icon name="layers-outline"></ion-icon>
                                </div>
                                <div>
                                    <p class="text-[10px] text-blue-400 font-bold uppercase tracking-widest">Step 03</p>
                                    <p class="text-xs font-bold text-white uppercase">Admission Form</p>
                                </div>
                            </div>

                            <div class="flex items-center gap-3 relative opacity-30">
                                <div class="w-8 h-8 rounded-full bg-slate-800 border border-slate-700 flex items-center justify-center text-white z-10 text-xs">
                                    <ion-icon name="pricetag-outline"></ion-icon>
                                </div>
                                <p class="text-xs font-semibold">Upload Docs</p>
                            </div>

                            <div class="flex items-center gap-3 relative opacity-30">
                                <div class="w-8 h-8 rounded-full bg-slate-800 border border-slate-700 flex items-center justify-center text-white z-10 text-xs">
                                    <ion-icon name="mail-outline"></ion-icon>
                                </div>
                                <p class="text-xs font-semibold">Complete</p>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Main Form Area -->
                <div class="lg:w-3/4">
                    <form role="form" action="{{ route('admission.admission_form') }}" method="POST" id="admission_form" enctype="multipart/form-data">
                        @csrf
                        <div id="error_section"></div>
                        <input type="hidden" name="approval" value="not">
                        <input type="hidden" name="admission_program_type" value="{{ $data->prospectus_program_type }}">
                        
                        

                        <!-- CARD: Application Metadata -->
                        <div class="form-card">
                            <div class="section-header">
                                <h2 class="text-lg font-bold text-slate-800 uppercase tracking-tight">Application Identifiers</h2>
                            </div>
                            <div class="grid grid-cols-1 md:grid-cols-3 gap-3">
                                <div>
                                    <label class="label-style">Registration No</label>
                                    <input disabled type="text" value="Generated After Admission" class="input-field bg-slate-50 text-slate-400 italic border-slate-200">
                                </div>
                                <div>
                                    <label class="label-style">Prospectus No <span class="text-red-500">*</span></label>
                                    <input id="form_no" readonly value="{{ $data->prospectus_no }}" type="text" name="admission_form_no" class="input-field bg-blue-50 text-blue-700 font-bold border-blue-200" required>
                                </div>
                                <div>
                                    <label class="label-style">Admission No</label>
                                    <input type="text" name="admission_no" class="input-field bg-slate-50 italic border-slate-200" value="" readonly placeholder="University Internal">
                                </div>
                            </div>
                        </div>

                        <!-- CARD: Student Personal Info -->
                        <div class="form-card">
                            <div class="section-header">
                                <h2 class="text-lg font-bold text-slate-800 uppercase tracking-tight">Personal Profile</h2>
                            </div>
                            <div class="grid grid-cols-1 md:grid-cols-4 gap-4 mb-6">
                                <div>
                                    <label class="label-style">Title <span class="text-red-500">*</span></label>
                                    <select name="admission_title" class="input-field">
                                        <option selected disabled>Select</option>
                                        <option value="Master">Master</option>
                                        <option value="Miss">Miss</option>
                                        <option value="Mr">Mr</option>
                                        <option value="Mrs">Mrs</option>
                                    </select>
                                </div>
                                <div>
                                    <label class="label-style">First Name <span class="text-red-500">*</span></label>
                                    <input id="first_name" type="text" value="{{ $data->prospectus_applicant_name }}" name="admission_first_name" class="input-field" required>
                                </div>
                                <div>
                                    <label class="label-style">Middle Name</label>
                                    <input type="text" name="admission_middle_name" class="input-field">
                                </div>
                                <div>
                                    <label class="label-style">Last Name <span class="text-red-500">*</span></label>
                                    <input id="last_name" type="text" name="admission_last_name" class="input-field">
                                </div>
                            </div>

                            <div class="grid grid-cols-1 md:grid-cols-3 gap-4 mb-6">
                                <div>
                                    <label class="label-style">Course <span class="text-red-500">*</span></label>
                                    @php $p_course = DB::table('tbl_course')->where('course_id', $data->prospectus_course_name)->first(); @endphp
                                    <input type="hidden" name="admission_course_name" value="{{ $data->prospectus_course_name }}">
                                    <input type="text" class="input-field bg-slate-50 font-bold border-slate-200" disabled value="{{ $p_course->course_name }}">
                                </div>
                                <div>
                                    <label class="label-style">Session <span class="text-red-500">*</span></label>
                                    <select id="session_check" class="input-field" name="admission_session">
                                        @php
                                            $sessions = DB::table('tbl_university_details')->orderBy('university_details_id', 'ASC')->get();
                                            foreach ($sessions as $session) {
                                                $start_year = explode('-', $session->university_details_academic_start_date)[0];
                                                $end_year = explode('-', $session->university_details_academic_end_date)[0];
                                                echo "<option value='{$session->university_details_id}'>{$start_year}-{$end_year}</option>";
                                            }
                                        @endphp
                                    </select>
                                </div>
                                <div>
                                    <label class="label-style">Date of Birth <span class="text-red-500">*</span></label>
                                    <input id="dob" value="{{ $data->prospectus_dob }}" type="date" name="admission_dob" class="input-field bg-slate-50 border-slate-200" required>
                                </div>
                            </div>

                            <div class="grid grid-cols-1 md:grid-cols-4 gap-4">
                                <div>
                                    <label class="label-style">Nationality <span class="text-red-500">*</span></label>
                                    <input type="text" name="admission_nationality" class="input-field">
                                </div>
                                <div>
                                    <label class="label-style">Aadhar No <span class="text-red-500">*</span></label>
                                    <input type="text" name="admission_aadhar_no" class="input-field">
                                </div>
                                <div>
                                    <label class="label-style">Religion <span class="text-red-500">*</span></label>
                                    <select name="admission_religion" class="input-field">
                                        <option selected disabled>Select</option>
                                        <option value="Hindu">Hindu</option>
                                        <option value="Muslim">Muslim</option>
                                        <option value="Sikh">Sikh</option>
                                        <option value="Christian">Christian</option>
                                        <option value="Others">Others</option>
                                    </select>
                                </div>
                                <div>
                                    <label class="label-style">Category <span class="text-red-500">*</span></label>
                                    <select name="admission_category" class="input-field">
                                        <option selected disabled>Select</option>
                                        <option value="General">General</option>
                                        <option value="SC">SC</option>
                                        <option value="ST">ST</option>
                                        <option value="OBC">OBC</option>
                                    </select>
                                </div>
                            </div>
                        </div>

                        <!-- CARD: Contact & Portal -->
                        <div class="form-card">
                            <div class="section-header">
                                <h2 class="text-lg font-bold text-slate-800 uppercase tracking-tight">Communication & Access</h2>
                            </div>
                            <div class="grid grid-cols-1 md:grid-cols-3 gap-4 mb-6">
                                <div>
                                    <label class="label-style">Mobile (Student) <span class="text-red-500">*</span></label>
                                    <input readonly id="mobile_no" type="text" value="{{ $data->mobile }}" name="admission_mobile_student" class="input-field bg-slate-50 border-slate-200">
                                </div>
                                <div>
                                    <label class="label-style">Email (Student) <span class="text-red-500">*</span></label>
                                    <input readonly id="email_id" value="{{ $data->prospectus_emailid }}" type="email" name="admission_emailid_student" class="input-field bg-slate-50 border-slate-200">
                                </div>
                                <div>
                                    <label class="label-style">Blood Group <span class="text-red-500">*</span></label>
                                    <input type="text" name="admission_blood_group" class="input-field" placeholder="e.g. B+">
                                </div>
                            </div>
                            <div class="grid grid-cols-1 md:grid-cols-4 gap-4 mb-6">
                                <div>
                                    <label class="label-style">Username (Auto)</label>
                                    <input readonly type="text" value="{{ $data->prospectus_emailid }}" name="admission_username" class="input-field bg-slate-50 border-slate-200 text-slate-400">
                                </div>
                                <div>
                                    <label class="label-style">Portal Password <span class="text-red-500">*</span></label>
                                    <input type="password" name="admission_password" class="input-field" placeholder="••••••••">
                                </div>
                                <div>
                                    <label class="label-style">Hostel</label>
                                    <select name="admission_hostel" class="input-field">
                                        <option value="No">No</option>
                                        <option value="Yes">Yes</option>
                                    </select>
                                </div>
                                <div>
                                    <label class="label-style">Transport</label>
                                    <select name="admission_transport" class="input-field">
                                        <option value="No">No</option>
                                        <option value="Yes">Yes</option>
                                    </select>
                                </div>
                            </div>
                            <div class="grid grid-cols-1 md:grid-cols-2 gap-4 items-center">
                                <div>
                                    <label class="label-style">Profile Photo <span class="text-red-500">*</span></label>
                                    <input type="file" name="admission_profile_image" id="admission_profile_image" class="block w-full text-xs text-slate-500 file:mr-3 file:py-1.5 file:px-3 file:rounded-md file:border-0 file:text-[11px] file:font-bold file:bg-blue-50 file:text-blue-700 hover:file:bg-blue-100">
                                </div>
                                <div class="flex justify-center md:justify-start">
                                    <img src="{{ asset('img/user.png') }}" id="photoBrowser" class="w-20 h-20 rounded-lg border border-slate-200 object-cover shadow-sm bg-slate-50">
                                </div>
                            </div>
                        </div>

                        <!-- CARD: Present Address -->
                        <div class="form-card">
                            <div class="section-header">
                                <h2 class="text-lg font-bold text-slate-800 uppercase tracking-tight">Present Address</h2>
                            </div>
                            <div class="grid grid-cols-1 md:grid-cols-3 gap-4 mb-3">
                                <div>
                                    <label class="label-style">Pin Code <span class="text-red-500">*</span></label>
                                    <input id="postal_code" type="text" onkeyup="check_pincode(this.value)" value="{{ $data->prospectus_postal_code }}" name="admission_pin_code" class="input-field" required placeholder="6 Digit PIN">
                                </div>
                                <div>
                                    <label class="label-style">Country</label>
                                    <input readonly id="country" type="text" class="input-field bg-slate-50 border-slate-200 font-medium" value="{{ $data->prospectus_country }}">
                                </div>
                                <div>
                                    <label class="label-style">State</label>
                                    <input readonly id="state" type="text" name="admission_state" class="input-field bg-slate-50 border-slate-200 font-medium" value="{{ $data->prospectus_state }}">
                                </div>
                            </div>
                            <div class="grid grid-cols-1 md:grid-cols-3 gap-4 mb-3">
                                <div>
                                    <label class="label-style">District</label>
                                    <input  type="text" id="district" name="admission_district" class="input-field bg-slate-50 border-slate-200 font-medium">
                                </div>
                                <div>
                                    <label class="label-style">City <span class="text-red-500">*</span></label>
                                    <input id="city" type="text" name="admission_city" class="input-field" value="{{ $data->prospectus_city }}">
                                </div>
                                <div>
                                    <label class="label-style">Home Landline</label>
                                    <input type="text" name="admission_home_landlineno" class="input-field">
                                </div>
                            </div>
                            <div class="w-full">
                                <label class="label-style">Detailed Residential Address <span class="text-red-500">*</span></label>
                                <textarea id="address" name="admission_residential_address" class="input-field h-20 py-2"  required>{{ $data->prospectus_address }}</textarea>
                            </div>
                        </div>

                        <!-- CARD: Parent Details -->
                        <div class="form-card">
                            <div class="section-header">
                                <h2 class="text-lg font-bold text-slate-800 uppercase tracking-tight">Parent Details</h2>
                            </div>
                            <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mb-3">
                                <div>
                                    <label class="label-style">Mother's Name <span class="text-red-500">*</span></label>
                                    <input id="mother_name" type="text" name="admission_mother_name" class="input-field" required value="{{ $data->prospectus_father_name }}">
                                </div>
                                <div>
                                    <label class="label-style">Father's Name <span class="text-red-500">*</span></label>
                                    <input id="father_name" type="text" name="admission_father_name" class="input-field" required value="{{ $data->prospectus_mother_name }}">
                                </div>
                            </div>
                            <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                                <div>
                                    <label class="label-style">Father's Phone No.</label>
                                    <input type="text" name="admission_father_phoneno" class="input-field">
                                </div>
                                <div>
                                    <label class="label-style">Father's Whatsapp</label>
                                    <input type="text" name="admission_father_whatsappno" class="input-field">
                                </div>
                                <div>
                                    <label class="label-style">Father's Email ID</label>
                                    <input type="email" name="admission_emailid_father" class="input-field">
                                </div>
                            </div>
                        </div>

                        <!-- CARD: Academic Details -->
                        <div class="form-card">
                            <div class="section-header">
                                <h2 class="text-lg font-bold text-slate-800 uppercase tracking-tight">Academic History</h2>
                                <p class="text-slate-400 text-[11px]">Enter marks precisely as per original certificates</p>
                            </div>
                            <div class="academic-table-container">
                                <table class="academic-table">
                                    <thead>
                                        <tr>
                                            <th>Qualification</th>
                                            <th>Board / University</th>
                                            <th>School / College</th>
                                            <th class="w-24">Year</th>
                                            <th class="w-24">% / CGPA</th>
                                            <th>Subjects</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td class="font-bold text-slate-700">10th Std <span class="text-red-500">*</span></td>
                                            <td><input type="text" name="admission_high_school_board_university" class="academic-input" required></td>
                                            <td><input type="text" name="admission_high_school_college_name" class="academic-input" required></td>
                                            <td><input type="text" name="admission_high_school_passing_year" class="academic-input" required></td>
                                            <td><input type="text" name="admission_high_school_per" class="academic-input" required></td>
                                            <td><input type="text" name="admission_high_school_subjects" class="academic-input" required></td>
                                        </tr>
                                        <tr>
                                            <td class="font-bold text-slate-700">12th Std <span class="text-red-500">*</span></td>
                                            <td><input type="text" name="admission_intermediate_board_university" class="academic-input" required></td>
                                            <td><input type="text" name="admission_intermediate_college_name" class="academic-input" required></td>
                                            <td><input type="text" name="admission_intermediate_passing_year" class="academic-input" required></td>
                                            <td><input type="text" name="admission_intermediate_per" class="academic-input" required></td>
                                            <td><input type="text" name="admission_intermediate_subjects" class="academic-input" required></td>
                                        </tr>
                                        <tr>
                                            <td class="font-bold text-slate-700">Graduation</td>
                                            <td><input type="text" name="admission_graduation_board_university" class="academic-input"></td>
                                            <td><input type="text" name="admission_graduation_college_name" class="academic-input"></td>
                                            <td><input type="text" name="admission_graduation_passing_year" class="academic-input"></td>
                                            <td><input type="text" name="admission_graduation_per" class="academic-input"></td>
                                            <td><input type="text" name="admission_graduation_subjects" class="academic-input"></td>
                                        </tr>
                                        <tr>
                                            <td class="font-bold text-slate-700">Post Grad</td>
                                            <td><input type="text" name="admission_post_graduation_board_university" class="academic-input"></td>
                                            <td><input type="text" name="admission_post_graduation_college_name" class="academic-input"></td>
                                            <td><input type="text" name="admission_post_graduation_others" class="academic-input"></td>
                                            <td><input type="text" name="admission_post_graduation_per" class="academic-input"></td>
                                            <td><input type="text" name="admission_post_graduation_subjects" class="academic-input"></td>
                                        </tr>
                                        <tr>
                                            <td class="font-bold text-slate-700">Others</td>
                                            <td><input type="text" name="admission_others_board_university" class="academic-input"></td>
                                            <td><input type="text" name="admission_others_college_name" class="academic-input"></td>
                                            <td><input type="text" name="admission_others_passing_year" class="academic-input"></td>
                                            <td><input type="text" name="admission_others_per" class="academic-input"></td>
                                            <td><input type="text" name="admission_others_subjects" class="academic-input"></td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>

                        <!-- CARD: Technical Qualifications -->
                        <div class="form-card">
                            <div class="section-header">
                                <h2 class="text-lg font-bold text-slate-800 uppercase tracking-tight">Technical Qualifications</h2>
                            </div>
                            <div class="academic-table-container">
                                <table class="academic-table">
                                    <thead>
                                        <tr>
                                            <th class="w-12">S.N</th>
                                            <th>Course</th>
                                            <th>Board / University</th>
                                            <th class="w-24">Year</th>
                                            <th class="w-24">% / CGPA</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>1</td>
                                            <td><input type="text" name="admission_course1" class="academic-input"></td>
                                            <td><input type="text" name="admission_board_university1" class="academic-input"></td>
                                            <td><input type="text" name="admission_year_of_passing1" class="academic-input"></td>
                                            <td><input type="text" name="admission_percentage1" class="academic-input"></td>
                                        </tr>
                                        <tr>
                                            <td>2</td>
                                            <td><input type="text" name="admission_course2" class="academic-input"></td>
                                            <td><input type="text" name="admission_board_university2" class="academic-input"></td>
                                            <td><input type="text" name="admission_year_of_passing2" class="academic-input"></td>
                                            <td><input type="text" name="admission_percentage2" class="academic-input"></td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>

                        <!-- CARD: Work Experience -->
                        <div class="form-card">
                            <div class="section-header">
                                <h2 class="text-lg font-bold text-slate-800 uppercase tracking-tight">Work Experience</h2>
                            </div>
                            <div class="academic-table-container">
                                <table class="academic-table">
                                    <thead>
                                        <tr>
                                            <th class="w-12">S.N</th>
                                            <th>Name of Organisation</th>
                                            <th>Designation</th>
                                            <th>Duration</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>1</td>
                                            <td><input type="text" name="admission_name_of_org1" class="academic-input"></td>
                                            <td><input type="text" name="admission_designation1" class="academic-input"></td>
                                            <td><input type="text" name="admission_duration1" class="academic-input"></td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>

                        <!-- Actions Bar (Sticky) -->
                        <div class="sticky bottom-4 z-50 px-4">
                            <div class="bg-white/90 backdrop-blur-md p-3 rounded-2xl shadow-xl border border-slate-200 flex flex-col md:flex-row items-center justify-between gap-3 max-w-4xl mx-auto">
                                <div id="loader_section"></div>
                                <div class="flex gap-3 w-full md:w-auto">
                                    <button type="reset" class="flex-1 md:flex-none px-6 h-10 rounded-lg font-bold text-slate-500 hover:bg-slate-100 transition-all text-sm">Reset</button>
                                    <button type="submit" id="admission_button" class="flex-1 md:flex-none px-10 h-10 rounded-lg font-bold bg-amber-500 text-slate-900 hover:bg-amber-600 shadow-md transition-all flex items-center justify-center gap-2 text-sm">
                                        Submit Form
                                        <ion-icon name="checkmark-circle-outline"></ion-icon>
                                    </button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Scripts -->
    <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
    <script>
        // Image Preview
        document.getElementById('admission_profile_image').onchange = function (evt) {
            var tgt = evt.target || window.event.srcElement,
                files = tgt.files;
            if (FileReader && files && files.length) {
                var fr = new FileReader();
                fr.onload = function () {
                    document.getElementById('photoBrowser').src = fr.result;
                }
                fr.readAsDataURL(files[0]);
            }
        }

        // Pincode Logic
        function check_pincode(pincode) {
            if (pincode.length == 6) {
                var xmlhttp = new XMLHttpRequest();
                xmlhttp.onreadystatechange = function() {
                    if (this.readyState == 4 && this.status == 200) {
                        try {
                            var data = JSON.parse(this.responseText);
                            if(data[0].Status == "Success") {
                                document.getElementById('postal_code').style.borderColor = '#10b981';
                                document.getElementById('state').value = data[0].PostOffice[0].State;
                                document.getElementById('city').value = data[0].PostOffice[0].Block;
                                document.getElementById('country').value = data[0].PostOffice[0].Country;
                                document.getElementById('district').value = data[0].PostOffice[0].District;
                            } else {
                                document.getElementById('postal_code').style.borderColor = '#ef4444';
                            }
                        } catch(e) { 
                            console.error("PIN Parse error"); 
                        }
                    }
                }
                xmlhttp.open("GET", "https://api.postalpincode.in/pincode/" + pincode);
                xmlhttp.send();
            } else {
                document.getElementById('state').value = '';
                document.getElementById('city').value = '';
                document.getElementById('postal_code').style.borderColor = '#ef4444';
            }
        }

        // Session Changer
        function change_session(data) {
            const xhttp = new XMLHttpRequest();
            xhttp.onload = function() {
                document.getElementById("session_check").innerHTML = this.responseText;
            }
            xhttp.open("GET", "/admission/session/" + data);
            xhttp.send();
        }
    </script>
    @endslot
</x-layout>