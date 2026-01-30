<x-layout>
    @slot('title', 'Admission Complete - Sona Devi University')
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

        .success-card {
            background: #ffffff;
            border-radius: 1.5rem;
            border: 1px solid #e2e8f0;
            box-shadow: 0 10px 25px -5px rgba(0, 0, 0, 0.05);
            padding: 3rem 2rem;
            text-align: center;
        }

        .confetti-icon {
            animation: bounce 2s infinite;
        }

        @keyframes bounce {
            0%, 100% { transform: translateY(0); }
            50% { transform: translateY(-10px); }
        }

        .progress-line-active {
            background-color: #10b981;
        }
    </style>

    <div class="min-h-screen pb-20">
        <!-- Logo Banner -->
        <div class="py-4 shadow-xl text-center">
            <img class="h-16 mx-auto" src="{{ asset('img/SDU Logo Dark@4x.png') }}" alt="SDU">
        </div>

        <div class="max-w-7xl mx-auto px-4 mt-8">
            <div class="flex flex-col lg:flex-row gap-8">
                
                <!-- Progress Sidebar -->
                <div class="lg:w-1/4">
                    <div class="step-gradient rounded-2xl p-6 text-white sticky top-10">
                        <h2 class="text-lg font-bold mb-6">Process Complete</h2>
                        <div class="space-y-6 relative">
                            <div class="absolute left-4 top-2 bottom-2 w-0.5 bg-emerald-500/30"></div>
                            
                            <!-- All previous steps marked as complete -->
                            <div class="flex items-center gap-3 relative">
                                <div class="w-8 h-8 rounded-full bg-emerald-500 flex items-center justify-center text-white z-10 text-xs shadow-lg shadow-emerald-500/20">
                                    <ion-icon name="checkmark-done-outline"></ion-icon>
                                </div>
                                <p class="text-xs font-semibold text-emerald-400">Prospectus & Phone</p>
                            </div>

                            <div class="flex items-center gap-3 relative">
                                <div class="w-8 h-8 rounded-full bg-emerald-500 flex items-center justify-center text-white z-10 text-xs">
                                    <ion-icon name="checkmark-done-outline"></ion-icon>
                                </div>
                                <p class="text-xs font-semibold text-emerald-400">OTP Verification</p>
                            </div>

                            <div class="flex items-center gap-3 relative">
                                <div class="w-8 h-8 rounded-full bg-emerald-500 flex items-center justify-center text-white z-10 text-xs">
                                    <ion-icon name="checkmark-done-outline"></ion-icon>
                                </div>
                                <p class="text-xs font-semibold text-emerald-400">Admission Form</p>
                            </div>

                            <div class="flex items-center gap-3 relative">
                                <div class="w-8 h-8 rounded-full bg-emerald-500 flex items-center justify-center text-white z-10 text-xs">
                                    <ion-icon name="checkmark-done-outline"></ion-icon>
                                </div>
                                <p class="text-xs font-semibold text-emerald-400">Document Upload</p>
                            </div>

                            <div class="flex items-center gap-3 relative">
                                <div class="w-8 h-8 rounded-full bg-emerald-500 flex items-center justify-center text-white z-10 text-xs ring-4 ring-emerald-500/20">
                                    <ion-icon name="mail-open-outline"></ion-icon>
                                </div>
                                <p class="text-xs font-bold text-white uppercase tracking-wider">Final Step</p>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Success Content Area -->
                <div class="lg:w-3/4 flex items-center justify-center">
                    <div class="success-card w-full max-w-2xl">
                        <!-- Success Animation / Image -->
                        <div class="mb-8 relative flex justify-center">
                            <div class="absolute inset-0 bg-emerald-100 rounded-full scale-150 blur-3xl opacity-30"></div>
                            <img src="{{ asset('img/succlog.png') }}" alt="Success" class="w-32 h-32 relative z-10 confetti-icon drop-shadow-2xl">
                        </div>

                        <div class="space-y-4">
                            <h3 class="text-slate-500 text-xs font-bold uppercase tracking-widest">Application Submitted</h3>
                            <h2 class="text-3xl md:text-4xl font-extrabold text-slate-800 tracking-tight">Congratulations!</h2>
                            <p class="text-slate-600 max-w-md mx-auto leading-relaxed">
                                We have successfully received your admission form for the <span class="text-slate-900 font-bold">{{ date('Y') }}</span> session. Your profile is now under review by our academic board.
                            </p>
                        </div>

                        <!-- Info Box -->
                        <div class="mt-10 grid grid-cols-1 md:grid-cols-2 gap-4">
                            <div class="p-4 bg-slate-50 border border-slate-100 rounded-2xl text-left">
                                <div class="text-blue-600 mb-2 text-xl"><ion-icon name="time-outline"></ion-icon></div>
                                <h4 class="text-sm font-bold text-slate-800">Review Timeline</h4>
                                <p class="text-xs text-slate-500 mt-1">Please allow up to 7 working days for our team to verify your documents.</p>
                            </div>
                            <div class="p-4 bg-slate-50 border border-slate-100 rounded-2xl text-left">
                                <div class="text-emerald-600 mb-2 text-xl"><ion-icon name="mail-unread-outline"></ion-icon></div>
                                <h4 class="text-sm font-bold text-slate-800">Email Notification</h4>
                                <p class="text-xs text-slate-500 mt-1">A confirmation will be sent to your registered email address once approved.</p>
                            </div>
                        </div>

                        <!-- Footer Actions -->
                        <div class="mt-12 flex flex-col md:flex-row gap-4 justify-center">
                            <a href="{{ url('/') }}" class="inline-flex items-center justify-center gap-2 px-10 h-12 rounded-xl font-bold bg-slate-900 text-white hover:bg-slate-800 transition-all shadow-xl shadow-slate-900/20">
                                <ion-icon name="home-outline"></ion-icon>
                                Back to Homepage
                            </a>
                            <button onclick="window.print()" class="inline-flex items-center justify-center gap-2 px-8 h-12 rounded-xl font-bold text-slate-600 border border-slate-200 hover:bg-slate-50 transition-all">
                                <ion-icon name="print-outline"></ion-icon>
                                Print Application
                            </button>
                        </div>

                        <p class="mt-8 text-[11px] text-slate-400">
                            For any queries, please contact admission support at <span class="text-blue-500 font-semibold underline cursor-pointer">support@sonadeviuniversity.org</span>
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
    @endslot
</x-layout>