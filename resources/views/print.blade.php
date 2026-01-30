<x-layout>
    @slot('title', 'Application Receipt - Sona Devi University')
    @slot('body')
    <!-- Tailwind CSS for modern layout -->
    <script src="https://cdn.tailwindcss.com"></script>
    
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap');
        
        body {
            font-family: 'Inter', sans-serif;
            background-color: #f1f5f9;
        }

        .receipt-card {
            background: white;
            border-radius: 1rem;
            box-shadow: 0 4px 6px -1px rgb(0 0 0 / 0.1);
        }

        .section-header {
            background-color: #0f172a;
            color: white;
            padding: 0.5rem 1rem;
            border-radius: 0.5rem;
            font-size: 0.875rem;
            font-weight: 700;
            text-transform: uppercase;
            letter-spacing: 0.05em;
            margin-bottom: 1rem;
            margin-top: 1.5rem;
        }

        .data-label {
            color: #64748b;
            font-size: 0.75rem;
            font-weight: 600;
            text-transform: uppercase;
            margin-bottom: 0.125rem;
        }

        .data-value {
            color: #1e293b;
            font-size: 0.935rem;
            font-weight: 500;
        }

        /* Print Optimization */
        @media print {
            body { background: white !important; padding: 0 !important; }
            .no-print { display: none !important; }
            .receipt-card { box-shadow: none !important; border: none !important; width: 100% !important; margin: 0 !important; }
            .section-header { background-color: #000 !important; color: white !important; -webkit-print-color-adjust: exact; }
            .container { max-width: 100% !important; width: 100% !important; }
        }
    </style>

    <div class="container mx-auto px-4 py-8 max-w-4xl">
        
        <!-- Action Header (Hidden on Print) -->
        <div class="no-print flex justify-between items-center mb-6 bg-white p-4 rounded-xl shadow-sm">
            <a href="{{ url('/') }}" class="text-slate-600 flex items-center gap-2 hover:text-slate-900 transition-colors">
                <ion-icon name="arrow-back-outline"></ion-icon>
                <span class="text-sm font-bold">Back to Dashboard</span>
            </a>
            <button onclick="window.print()" class="bg-emerald-600 hover:bg-emerald-700 text-white px-6 py-2 rounded-lg font-bold flex items-center gap-2 shadow-lg shadow-emerald-600/20 transition-all">
                <ion-icon name="print-outline"></ion-icon>
                Print Application
            </button>
        </div>

        <div class="receipt-card p-6 md:p-10">
            <!-- University Header -->
            <div class="text-center border-b border-slate-100 pb-8 mb-6">
                <img class="h-16 mx-auto mb-4" src="{{ asset('img/SDU Logo Dark@4x.png') }}" alt="SDU Logo">
                <h1 class="text-2xl font-black text-slate-900 tracking-tight">ONLINE APPLICATION FORM</h1>
                <div class="mt-2 inline-block bg-slate-100 px-4 py-1 rounded-full">
                    <span class="text-xs font-bold text-slate-500 uppercase tracking-widest">Prospectus No: </span>
                    <span class="text-xs font-black text-slate-800">{{ $data->prospectus_no }}</span>
                </div>
            </div>

            <!-- 1. Program Details -->
            <div class="section-header">1. Program Details</div>
            <div class="grid grid-cols-2 md:grid-cols-3 gap-6 px-2">
                <div>
                    <p class="data-label">Session</p>
                    <p class="data-value">{{ $data->prospectus_session }}</p>
                </div>
                <div class="col-span-1 md:col-span-2">
                    <p class="data-label">Course Applied</p>
                    <p class="data-value">{{ DB::table('tbl_course')->where('course_id', $data->prospectus_course_name)->first()->course_name }}</p>
                </div>
            </div>

            <!-- 2. Personal Details -->
            <div class="section-header">2. Personal Details</div>
            <div class="grid grid-cols-1 md:grid-cols-3 gap-y-6 gap-x-4 px-2">
                <div>
                    <p class="data-label">Applicant Name</p>
                    <p class="data-value">{{ $data->prospectus_applicant_name }}</p>
                </div>
                <div>
                    <p class="data-label">Mobile Number</p>
                    <p class="data-value">{{ $data->mobile }}</p>
                </div>
                <div>
                    <p class="data-label">Email ID</p>
                    <p class="data-value">{{ $data->prospectus_emailid }}</p>
                </div>
                <div>
                    <p class="data-label">Father's Name</p>
                    <p class="data-value">{{ $data->prospectus_father_name }}</p>
                </div>
                <div>
                    <p class="data-label">Mother's Name</p>
                    <p class="data-value">{{ $data->prospectus_mother_name }}</p>
                </div>
                <div>
                    <p class="data-label">Gender / DOB</p>
                    <p class="data-value">{{ $data->prospectus_gender }} | {{ $data->prospectus_dob }}</p>
                </div>
                <div>
                    <p class="data-label">Referred By</p>
                    <p class="data-value">{{ $data->revert_by ?: 'N/A' }}</p>
                </div>
                <div>
                    <p class="data-label">Counsellor</p>
                    <p class="data-value">{{ $data->councellor_name ?: 'N/A' }}</p>
                </div>
            </div>

            <!-- 3. Address Details -->
            <div class="section-header">3. Address Details</div>
            <div class="grid grid-cols-1 md:grid-cols-3 gap-y-6 gap-x-4 px-2">
                <div class="md:col-span-2">
                    <p class="data-label">Permanent Address</p>
                    <p class="data-value">{{ $data->prospectus_address }}</p>
                </div>
                <div>
                    <p class="data-label">Country</p>
                    <p class="data-value">{{ $data->prospectus_country }}</p>
                </div>
                <div>
                    <p class="data-label">City</p>
                    <p class="data-value">{{ $data->prospectus_city }}</p>
                </div>
                <div>
                    <p class="data-label">State</p>
                    <p class="data-value">{{ $data->prospectus_state }}</p>
                </div>
                <div>
                    <p class="data-label">Postal Code</p>
                    <p class="data-value">{{ $data->prospectus_postal_code }}</p>
                </div>
            </div>

            <!-- 4. Payment Details -->
            <div class="section-header">4. Payment Details</div>
            <div class="bg-slate-50 border border-slate-100 rounded-xl p-4 grid grid-cols-1 md:grid-cols-3 gap-y-6 gap-x-4">
                <div>
                    <p class="data-label">Payment Mode</p>
                    <p class="data-value font-bold text-blue-600">{{ $data->prospectus_payment_mode }}</p>
                </div>
                <div>
                    <p class="data-label">Total Amount</p>
                    <p class="data-value font-bold text-slate-900">₹{{ number_format($data->prospectus_rate, 2) }}</p>
                </div>
                <div>
                    <p class="data-label">Transaction Date</p>
                    <p class="data-value">{{ $data->transaction_date }}</p>
                </div>
                <div class="md:col-span-1">
                    <p class="data-label">Transaction ID</p>
                    <p class="data-value font-mono text-xs">{{ $data->transaction_id }}</p>
                </div>
                <div class="md:col-span-2">
                    <p class="data-label">Easebuzz / Reference ID</p>
                    <p class="data-value font-mono text-xs">{{ $data->easebuzz_id }}</p>
                </div>
            </div>

            <!-- Footer Seal/Signature Area -->
            <div class="mt-12 pt-8 border-t border-slate-100 flex justify-between items-end">
                <div class="text-[10px] text-slate-400">
                    <p>Computer Generated Receipt</p>
                    <p>Generated on: {{ date('d-M-Y H:i:s') }}</p>
                </div>
                <div class="text-center w-48">
                    <div class="border-b border-slate-300 mb-2 h-12"></div>
                    <p class="text-[10px] font-bold text-slate-500 uppercase">Registrar Signature</p>
                </div>
            </div>
        </div>
        
        <p class="text-center text-[10px] text-slate-400 mt-6 no-print">
            Sona Devi University, Ghatsila, Jharkhand. For support call: 1800 309 2626
        </p>
    </div>

    <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
    @endslot
</x-layout>