<x-layout>
    @slot('title', 'Sona Devi University - Prospectus Form')
    @slot('body')
    <!-- Tailwind CSS CDN -->
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@300;400;500;600;700&display=swap');
        
        body {
            font-family: 'Plus Jakarta Sans', sans-serif;
            background-color: #f8fafc;
        }

        .step-gradient {
            background: linear-gradient(135deg, #1e293b 0%, #0f172a 100%);
        }

        .form-input-focus {
            transition: all 0.2s ease;
        }

        .form-input-focus:focus {
            border-color: #3b82f6;
            box-shadow: 0 0 0 4px rgba(59, 130, 246, 0.1);
            outline: none;
        }

        /* Active Sidebar Step Style */
        .step-item.active .step-icon {
            background-color: #3b82f6;
            color: white;
            box-shadow: 0 0 15px rgba(59, 130, 246, 0.4);
        }

        .step-item.active .step-text h3 {
            color: #3b82f6;
        }

        input[readonly] {
            background-color: #f1f5f9 !important;
            cursor: not-allowed;
            /* bg-slate-950 */
        }
    </style>

    <div class="min-h-screen bg-slate-50">
        <!-- Brand Header -->
        <div class=" py-4 shadow-lg text-center">
            <img class="h-16 mx-auto transition-transform hover:scale-105 duration-300" src="{{ asset('img/SDU Logo Dark@4x.png') }}" alt="SDU">
        </div>

        <div class="max-w-7xl mx-auto px-4 py-10">
            <div class="bg-white rounded-3xl shadow-2xl flex flex-col lg:flex-row overflow-hidden border border-slate-100">
                
                <!-- Left Sidebar: Progress Steps -->
                <div class="lg:w-1/3 step-gradient p-10 text-white flex flex-col justify-between">
                    <div>
                        <div class="mb-12">
                            <h1 class="text-3xl font-bold tracking-tight mb-2">Prospectus Form {{ date('Y') }}</h1>
                            <p class="text-slate-400 leading-relaxed">Follow the 4 simple steps to complete your admission process.</p>
                        </div>

                        <div class="space-y-10">
                            <!-- Step 1 -->
                            <div class="step-item active flex items-center space-x-5">
                                <div class="step-icon w-12 h-8 rounded-2xl bg-slate-800 flex items-center justify-center text-2xl transition-all duration-300">
                                    <ion-icon name="book-outline"></ion-icon>
                                </div>
                                <div class="step-text">
                                    <h3 class="font-bold text-lg">Fill Form</h3>
                                    <p class="text-slate-400 text-sm">Enter & press next</p>
                                </div>
                            </div>
                            <!-- Step 2 -->
                            <div class="step-item flex items-center space-x-5">
                                <div class="step-icon w-12 h-8 rounded-2xl bg-slate-800 flex items-center justify-center text-2xl">
                                    <ion-icon name="layers-outline"></ion-icon>
                                </div>
                                <div class="step-text">
                                    <h3 class="font-bold text-lg text-slate-300">Confirmation</h3>
                                    <p class="text-slate-400 text-sm">Check & press pay</p>
                                </div>
                            </div>
                            <!-- Step 3 -->
                            <div class="step-item flex items-center space-x-5">
                                <div class="step-icon w-12 h-8 rounded-2xl bg-slate-800 flex items-center justify-center text-2xl">
                                    <ion-icon name="pricetag-outline"></ion-icon>
                                </div>
                                <div class="step-text">
                                    <h3 class="font-bold text-lg text-slate-300">Pay Amount</h3>
                                    <p class="text-slate-400 text-sm">Cards & payment methods</p>
                                </div>
                            </div>
                            <!-- Step 4 -->
                            <div class="step-item flex items-center space-x-5">
                                <div class="step-icon w-12 h-8 rounded-2xl bg-slate-800 flex items-center justify-center text-2xl">
                                    <ion-icon name="checkmark-done-outline"></ion-icon>
                                </div>
                                <div class="step-text">
                                    <h3 class="font-bold text-lg text-slate-300">Complete</h3>
                                    <p class="text-slate-400 text-sm">Print & check email</p>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="mt-12 p-6 bg-slate-800/50 rounded-2xl border border-slate-700/50">
                        <p class="text-xs text-slate-400 font-semibold uppercase tracking-wider mb-2">Support Line</p>
                        <p class="text-sm font-medium mb-1">+91 9263783020</p>
                        <p class="text-xs text-slate-500 italic text-red-400">Facing issues? +91 9060908201</p>
                    </div>
                </div>

                <!-- Right Side: Form Content -->
                <div class="lg:w-2/3 p-8 md:p-12 lg:p-16">
                    <div class="flex flex-col md:flex-row justify-between items-start md:items-center mb-8 gap-4">
                        <div>
                            <span class="px-3 py-1 bg-blue-50 text-blue-600 text-xs font-bold rounded-full uppercase tracking-widest">Step 1 of 4</span>
                            <h2 class="text-2xl font-bold text-slate-800 mt-2">Let's start with Program Details</h2>
                        </div>
                        <a href="already" class="inline-flex items-center px-5 py-2.5 bg-slate-100 hover:bg-slate-200 text-slate-700 font-bold text-sm rounded-xl transition-colors duration-200">
                            Already Applied <ion-icon name="arrow-forward-outline" class="ml-2"></ion-icon>
                        </a>
                    </div>

                    @if(session('error'))
                    <div class="mb-6 p-4 bg-amber-50 border-l-4 border-amber-400 text-amber-800 flex items-center rounded-r-xl">
                        <ion-icon name="alert-circle-outline" class="text-2xl mr-3"></ion-icon>
                        <p class="font-medium text-sm">{{ session('error') }}</p>
                    </div>
                    @endif

                    <form method="POST" action="{{ route('prospectus') }}" class="space-y-10">
                        @csrf
                        
                        <!-- Section 1: Program -->
                        <div>
                            <div class="flex items-center mb-6">
                                <div class="w-8 h-8 rounded-lg bg-blue-600 text-white flex items-center justify-center font-bold mr-3 shadow-md shadow-blue-200">1</div>
                                <h3 class="text-lg font-bold text-slate-800">Program Selection</h3>
                            </div>
                            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                                <div>
                                    <label class="block text-sm font-semibold text-slate-700 mb-2">Select Course <span class="text-red-500">*</span></label>
                                    <select id="prospectus_course" onchange="check_semester(this.value)" name="prospectus_course_name" class="w-full h-8 px-4 rounded-xl border border-slate-200 form-input-focus bg-slate-50" required>
                                        <option selected disabled>Choose your course</option>
                                        @foreach ($data as $course)
                                            <option value="{{ $course->course_id }}">{{ $course->course_name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div>
                                    <label class="block text-sm font-semibold text-slate-700 mb-2">Session <span class="text-red-500">*</span></label>
                                    <input required readonly id="session" name="prospectus_session" class="w-full h-8 px-4 rounded-xl border border-slate-200 bg-slate-100" placeholder="Auto-filled">
                                </div>
                                <div>
                                    <label class="block text-sm font-semibold text-slate-700 mb-2">Amount <span class="text-red-500">*</span></label>
                                    <input required readonly id="amount" class="w-full h-8 px-4 rounded-xl border border-slate-200 bg-slate-100 font-bold text-blue-600" placeholder="0.00">
                                </div>
                                <div>
                                    <label class="block text-sm font-semibold text-slate-700 mb-2">Program Type <span class="text-red-500">*</span></label>
                                    <input required readonly id="program_type" name="prospectus_program_type" class="w-full h-8 px-4 rounded-xl border border-slate-200 bg-slate-100" value="{{ old('prospectus_program_type') }}" placeholder="Auto-filled">
                                </div>
                            </div>
                        </div>

                        <!-- Section 2: Personal -->
                        <div>
                            <div class="flex items-center mb-6">
                                <div class="w-8 h-8 rounded-lg bg-blue-600 text-white flex items-center justify-center font-bold mr-3 shadow-md shadow-blue-200">2</div>
                                <h3 class="text-lg font-bold text-slate-800">Personal Details</h3>
                            </div>
                            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4">
                                <div class="lg:col-span-1">
                                    <label class="block text-sm font-semibold text-slate-700 mb-2">Applicant Name <span class="text-red-500">*</span></label>
                                    <input id="prospectus_applicant_name" name="prospectus_applicant_name" class="w-full h-8 px-4 rounded-xl border border-slate-200 form-input-focus" placeholder="Full Name" type="text" required>
                                </div>
                                <div>
                                    <label class="block text-sm font-semibold text-slate-700 mb-2">Father's Name <span class="text-red-500">*</span></label>
                                    <input id="prospectus_fathers_name" name="prospectus_father_name" class="w-full h-8 px-4 rounded-xl border border-slate-200 form-input-focus" placeholder="Father's Name" type="text" required>
                                </div>
                                <div>
                                    <label class="block text-sm font-semibold text-slate-700 mb-2">Mother's Name <span class="text-red-500">*</span></label>
                                    <input id="prospectus_mothers_name" name="prospectus_mother_name" class="w-full h-8 px-4 rounded-xl border border-slate-200 form-input-focus" placeholder="Mother's Name" type="text" required>
                                </div>
                                <div>
                                    <label class="block text-sm font-semibold text-slate-700 mb-2">Gender <span class="text-red-500">*</span></label>
                                    <select id="prospectus_gender" name="prospectus_gender" class="w-full h-8 px-4 rounded-xl border border-slate-200 form-input-focus" required>
                                        <option value="Male">Male</option>
                                        <option value="Female">Female</option>
                                        <option value="Other">Other</option>
                                    </select>
                                </div>
                                <div>
                                    <label class="block text-sm font-semibold text-slate-700 mb-2">Date Of Birth <span class="text-red-500">*</span></label>
                                    <input id="prospectus_dob" name="prospectus_dob" class="w-full h-8 px-4 rounded-xl border border-slate-200 form-input-focus" type="date" required>
                                </div>
                                <div>
                                    <label class="block text-sm font-semibold text-slate-700 mb-2">Postal Code <span class="text-red-500">*</span></label>
                                    <input onkeyup="check_pincode(this.value)" maxlength="6" id="prospectus_postal_code" name="prospectus_postal_code" class="w-full h-8 px-4 rounded-xl border border-slate-200 form-input-focus" placeholder="6-Digit Pincode" type="text" required>
                                </div>
                                <div>
                                    <label class="block text-sm font-semibold text-slate-700 mb-2">City <span class="text-red-500">*</span></label>
                                    <input id="prospectus_city" name="prospectus_city" class="w-full h-8 px-4 rounded-xl border border-slate-200 bg-slate-50" required readonly>
                                </div>
                                <div>
                                    <label class="block text-sm font-semibold text-slate-700 mb-2">State <span class="text-red-500">*</span></label>
                                    <input required id="prospectus_state" name="prospectus_state" class="w-full h-8 px-4 rounded-xl border border-slate-200 bg-slate-50" readonly>
                                </div>
                                <div>
                                    <label class="block text-sm font-semibold text-slate-700 mb-2">Country <span class="text-red-500">*</span></label>
                                    <input id="prospectus_country" name="prospectus_country" class="w-full h-8 px-4 rounded-xl border border-slate-200 bg-slate-50" readonly>
                                </div>
                                <div class="md:col-span-2">
                                    <label class="block text-sm font-semibold text-slate-700 mb-2">Full Residential Address <span class="text-red-500">*</span></label>
                                    <textarea id="prospectus_address" name="prospectus_address" rows="2" class="w-full px-4 py-3 rounded-xl border border-slate-200 form-input-focus" placeholder="H-No, Street, Landmark..." required></textarea>
                                </div>
                                <div>
                                    <label class="block text-sm font-semibold text-slate-700 mb-2">Counselor Reference</label>
                                    <input type="text" name="councellor_name" placeholder="Name if any" class="w-full h-8 px-4 rounded-xl border border-slate-200 form-input-focus">
                                </div>
                            </div>
                        </div>

                        <!-- Section 3: Verification -->
                        <div>
                            <div class="flex items-center mb-6">
                                <div class="w-8 h-8 rounded-lg bg-blue-600 text-white flex items-center justify-center font-bold mr-3 shadow-md shadow-blue-200">3</div>
                                <h3 class="text-lg font-bold text-slate-800">Account Verification</h3>
                            </div>
                            <div class="grid grid-cols-1 md:grid-cols-2 gap-4 p-6 bg-slate-50 rounded-2xl border border-slate-100">
                                <div>
                                    <label class="block text-sm font-semibold text-slate-700 mb-2">Email Address <span class="text-red-500">*</span></label>
                                    <input id="email" name="prospectus_emailid" class="w-full h-8 px-4 rounded-xl border border-slate-200 form-input-focus bg-white" placeholder="you@example.com" type="email" required>
                                    <p class="text-[11px] text-slate-500 mt-2 italic">We'll send your prospectus copy here.</p>
                                </div>
                                <div>
                                    <label class="block text-sm font-semibold text-slate-700 mb-2">Mobile Number <span class="text-red-500">*</span></label>
                                    <input id="prospectus_phone" name="mobile" onkeyup="check_number(this.value)" class="w-full h-8 px-4 rounded-xl border border-slate-200 form-input-focus bg-white" placeholder="10-Digit Mobile" type="text" maxlength="10" required>
                                    <p id="prospectus_phone_err" class="text-[11px] font-bold mt-2"></p>
                                </div>
                                <div id="vaild_otp" class="md:col-span-2 hidden animate-pulse">
                                    <label class="block text-sm font-bold text-blue-700 mb-2 uppercase tracking-wide">Enter 6-Digit OTP <span class="text-red-500">*</span></label>
                                    <input id="prospectus_otp" name="prospectus_otp" class="w-full h-14 px-4 text-center text-2xl tracking-[1em] rounded-xl border-2 border-blue-200 form-input-focus bg-white" placeholder="000000" type="number">
                                    <p id="prospectus_otp_err" class="text-xs text-blue-600 mt-2 font-medium">OTP sent to your phone and email.</p>
                                </div>
                            </div>
                        </div>

                        <!-- Submit Section -->
                        <div class="pt-8 border-t border-slate-100">
                            <label class="flex items-start mb-8 cursor-pointer group">
                                <div class="flex items-center h-5">
                                    <input type="checkbox" required class="w-5 h-5 rounded border-slate-300 text-blue-600 focus:ring-blue-500">
                                </div>
                                <div class="ml-4 text-sm">
                                    <p class="font-medium text-slate-700">I have read and accept all instructions.</p>
                                    <p class="text-slate-500">By clicking Next, you agree to our terms of admission.</p>
                                </div>
                            </label>

                            <button type="submit" class="w-full md:w-auto px-12 py-2 bg-slate-900 hover:bg-black text-white font-bold rounded-2xl transition-all duration-300 transform hover:-translate-y-1 shadow-xl flex items-center justify-center space-x-3">
                                <span>Continue to Next Step</span>
                                <ion-icon name="arrow-forward-outline"></ion-icon>
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Icon Library -->
    <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>

    <script>
        // Keeping your logic intact
        function check_semester(course) {
            var xmlhttp = new XMLHttpRequest();
            xmlhttp.onreadystatechange = function() {
                if (this.readyState === 4 && this.status === 200) {
                    var data = JSON.parse(this.responseText);
                    if (data.error) return;
                    document.getElementById('amount').value = data.prospectus_rate;
                    var session = data.duration;
                    document.getElementById('session').value = new Date().getFullYear() + ' - ' + (parseInt(new Date().getFullYear()) + Number(session));
                    document.getElementById('program_type').value = data.program_type;
                }
            };
            xmlhttp.open("GET", window.location.href + "course/" + course);
            xmlhttp.send();
        }

        function check_pincode(pincode) {
            if (pincode.length == 6) {
                var xmlhttp = new XMLHttpRequest();
                xmlhttp.onreadystatechange = function() {
                    if (this.readyState === 4 && this.status === 200) {
                        var data = JSON.parse(this.responseText);
                        if(data[0].Status === "Success") {
                            document.getElementById('prospectus_state').value = data[0].PostOffice[0].State;
                            document.getElementById('prospectus_city').value = data[0].PostOffice[0].Block;
                            document.getElementById('prospectus_country').value = data[0].PostOffice[0].Country;
                            document.getElementById('prospectus_postal_code').classList.add('border-green-500');
                        }
                    }
                }
                xmlhttp.open("GET", "https://api.postalpincode.in/pincode/" + pincode);
                xmlhttp.send();
            } else {
                document.getElementById('prospectus_postal_code').classList.remove('border-green-500');
            }
        }

        function check_number(number) {
            if (number.length === 10) {
                const email = document.getElementById('email').value;
                if(!email) {
                    document.getElementById('prospectus_phone_err').innerText = "Please enter email first";
                    document.getElementById('prospectus_phone_err').className = "text-[11px] font-bold mt-2 text-red-500";
                    return;
                }
                var xmlhttp = new XMLHttpRequest();
                xmlhttp.onreadystatechange = function() {
                    if (this.readyState === 4) {
                        document.getElementById('vaild_otp').classList.remove('hidden');
                        document.getElementById('prospectus_phone_err').innerHTML = 'OTP sent to ' + number + ' & ' + email;
                        document.getElementById('prospectus_phone_err').className = "text-[11px] font-bold mt-2 text-green-600";
                    }
                }
                xmlhttp.open("GET", window.location.href + "otp/" + number + "/" + email);
                xmlhttp.send();
                document.getElementById('prospectus_phone').classList.add('border-green-500');
            }
        }
    </script>
    @endslot
</x-layout>