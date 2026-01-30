<x-layout>
    @slot('title', 'Document Upload - Sona Devi University')
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
            margin-bottom: 1.5rem;
        }

        /* Sleek Thin File Input Styling */
        .file-input-wrapper {
            position: relative;
            width: 100%;
        }

        .label-style {
            display: block;
            font-size: 0.7rem;
            font-weight: 700;
            color: #64748b;
            margin-bottom: 0.375rem;
            text-transform: uppercase;
            letter-spacing: 0.05em;
        }

        .custom-file-input {
            width: 100%;
            height: 2rem;
            font-size: 0.75rem;
            color: #64748b;
            background-color: #f8fafc;
            border: 1px solid #cbd5e1;
            border-radius: 0.5rem;
            transition: all 0.2s ease;
        }

        .custom-file-input::-webkit-file-upload-button {
            background: #3b82f6;
            border: none;
            color: white;
            padding: 0 1rem;
            height: 100%;
            margin-right: 1rem;
            font-weight: 600;
            font-size: 0.75rem;
            cursor: pointer;
            transition: background 0.2s;
        }

        .custom-file-input::-webkit-file-upload-button:hover {
            background: #2563eb;
        }

        .section-header {
            border-left: 3px solid #3b82f6;
            padding-left: 0.875rem;
            margin-bottom: 1.5rem;
        }

        .upload-grid {
            display: grid;
            grid-template-columns: repeat(1, minmax(0, 1fr));
            gap: 1.25rem;
        }

        @media (min-width: 768px) {
            .upload-grid {
                grid-template-columns: repeat(2, minmax(0, 1fr));
            }
        }

        @media (min-width: 1024px) {
            .upload-grid {
                grid-template-columns: repeat(3, minmax(0, 1fr));
            }
        }
    </style>
<!-- bg-slate-900 this is black color code  -->
    <div class="min-h-screen pb-20">
        <!-- Logo Banner -->
        <div class=" py-4 shadow-xl text-center">
            <img class="h-10 mx-auto" src="{{ asset('img/SDU Logo Dark@4x.png') }}" alt="SDU">
        </div>

        <div class="max-w-7xl mx-auto px-4 mt-8">
            <div class="flex flex-col lg:flex-row gap-6">
                
                <!-- Progress Sidebar -->
                <div class="lg:w-1/4">
                    <div class="step-gradient rounded-2xl p-6 text-white sticky top-10">
                        <h2 class="text-lg font-bold mb-6">Application Step 4/5</h2>
                        <div class="space-y-6 relative">
                            <div class="absolute left-4 top-2 bottom-2 w-0.5 bg-slate-700"></div>
                            
                            <!-- Steps 1-3 marked as complete -->
                            <div class="flex items-center gap-3 relative">
                                <div class="w-8 h-8 rounded-full bg-emerald-500 flex items-center justify-center text-white z-10 text-xs">
                                    <ion-icon name="checkmark-outline"></ion-icon>
                                </div>
                                <div>
                                    <p class="text-[10px] text-emerald-400 font-bold uppercase">Step 01</p>
                                    <p class="text-xs font-semibold opacity-70">Registration</p>
                                </div>
                            </div>

                            <div class="flex items-center gap-3 relative">
                                <div class="w-8 h-8 rounded-full bg-emerald-500 flex items-center justify-center text-white z-10 text-xs">
                                    <ion-icon name="checkmark-outline"></ion-icon>
                                </div>
                                <div>
                                    <p class="text-[10px] text-emerald-400 font-bold uppercase">Step 02</p>
                                    <p class="text-xs font-semibold opacity-70">OTP Verified</p>
                                </div>
                            </div>

                            <div class="flex items-center gap-3 relative">
                                <div class="w-8 h-8 rounded-full bg-emerald-500 flex items-center justify-center text-white z-10 text-xs">
                                    <ion-icon name="checkmark-outline"></ion-icon>
                                </div>
                                <div>
                                    <p class="text-[10px] text-emerald-400 font-bold uppercase">Step 03</p>
                                    <p class="text-xs font-semibold opacity-70">Admission Form</p>
                                </div>
                            </div>

                            <!-- Current Step -->
                            <div class="flex items-center gap-3 relative">
                                <div class="w-8 h-8 rounded-full bg-blue-600 flex items-center justify-center text-white z-10 ring-4 ring-blue-900/30 text-xs">
                                    <ion-icon name="pricetag-outline"></ion-icon>
                                </div>
                                <div>
                                    <p class="text-[10px] text-blue-400 font-bold uppercase tracking-widest">Step 04</p>
                                    <p class="text-xs font-bold text-white uppercase">Upload Documents</p>
                                </div>
                            </div>

                            <div class="flex items-center gap-3 relative opacity-30">
                                <div class="w-8 h-8 rounded-full bg-slate-800 border border-slate-700 flex items-center justify-center text-white z-10 text-xs">
                                    <ion-icon name="mail-outline"></ion-icon>
                                </div>
                                <p class="text-xs font-semibold">Final Complete</p>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Main Content Area -->
                <div class="lg:w-3/4">
                    <form role="form" action="{{ route('admission.admission_document') }}" method="POST" id="admission_form" enctype="multipart/form-data">
                        @csrf
                        <input type="hidden" name="id" value="{{ $id }}">

                        <div class="form-card">
                            <div class="section-header">
                                <h2 class="text-lg font-bold text-slate-800 uppercase tracking-tight">Required Documents</h2>
                                <p class="text-slate-400 text-[11px]">Upload clear scanned copies (PDF, JPG, or PNG formats preferred).</p>
                            </div>

                            <div class="upload-grid">
                                <!-- 10th Documents -->
                                <div class="file-input-wrapper">
                                    <label class="label-style">10th Marksheet <span class="text-red-500">*</span></label>
                                    <input type="file" name="admission_tenth_marksheet" class="custom-file-input" required>
                                </div>

                                <div class="file-input-wrapper">
                                    <label class="label-style">10th Passing Certificate <span class="text-red-500">*</span></label>
                                    <input type="file" name="admission_tenth_passing_certificate" class="custom-file-input" required>
                                </div>

                                <!-- 12th Documents -->
                                <div class="file-input-wrapper">
                                    <label class="label-style">12th Marksheet <span class="text-red-500">*</span></label>
                                    <input type="file" name="admission_twelve_markesheet" class="custom-file-input" required>
                                </div>

                                <div class="file-input-wrapper">
                                    <label class="label-style">12th Passing Certificate <span class="text-red-500">*</span></label>
                                    <input type="file" name="admission_twelve_passing_certificate" class="custom-file-input" required>
                                </div>

                                <!-- Graduation -->
                                <div class="file-input-wrapper">
                                    <label class="label-style">Graduation Marksheet</label>
                                    <input type="file" name="admission_graduation_marksheet" class="custom-file-input">
                                </div>

                                <!-- Character Certificates -->
                                <div class="file-input-wrapper">
                                    <label class="label-style">Character Certificate</label>
                                    <input type="file" name="admission_recent_character_certificate" class="custom-file-input">
                                </div>

                                <div class="file-input-wrapper">
                                    <label class="label-style">Character Cert. (Secondary)</label>
                                    <input type="file" name="admission_character_certificate" class="custom-file-input">
                                </div>

                                <!-- Others -->
                                <div class="file-input-wrapper">
                                    <label class="label-style">Other Certificate</label>
                                    <input type="file" name="admission_other_certificate" class="custom-file-input">
                                </div>
                            </div>

                            <!-- Warning / Instruction Note -->
                            <div class="mt-8 p-4 bg-amber-50 rounded-xl border border-amber-100 flex gap-3 items-start">
                                <div class="text-amber-500 mt-0.5">
                                    <ion-icon name="alert-circle-outline" class="text-lg"></ion-icon>
                                </div>
                                <div class="text-xs text-amber-800 leading-relaxed">
                                    <strong>Important Note:</strong> Ensure all files are under 2MB. If you are applying for a PG course, Graduation Marksheet is mandatory. Please review your documents before clicking submit.
                                </div>
                            </div>
                        </div>

                        <!-- Actions Bar (Sticky) -->
                        <div class="sticky bottom-4 z-50 px-4">
                            <div class="bg-white/90 backdrop-blur-md p-3 rounded-2xl shadow-xl border border-slate-200 flex flex-col md:flex-row items-center justify-between gap-3 max-w-4xl mx-auto">
                                <div class="text-xs text-slate-500 font-medium px-2">
                                    <span class="hidden md:inline">Step 4 of 5: Document Submission</span>
                                </div>
                                <div class="flex gap-3 w-full md:w-auto">
                                    <a href="javascript:history.back()" class="flex-1 md:flex-none px-6 h-10 rounded-lg font-bold text-slate-500 hover:bg-slate-100 transition-all text-sm flex items-center justify-center">Back</a>
                                    <button type="submit" id="admission_button" class="flex-1 md:flex-none px-12 h-10 rounded-lg font-bold bg-amber-500 text-slate-900 hover:bg-amber-600 shadow-md transition-all flex items-center justify-center gap-2 text-sm">
                                        Submit Documents
                                        <ion-icon name="arrow-forward-outline"></ion-icon>
                                    </button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Ionicons Script -->
    <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
    @endslot
</x-layout>