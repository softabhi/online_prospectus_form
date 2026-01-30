<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Admission Form</title>
    <style>
        @page {
            size: A4;
            margin: 20mm;
        }

        body {
            font-family: DejaVu Sans, sans-serif;
            font-size: 11px;
            margin: 0;
            padding: 0;
            line-height: 1.4;
        }

        .container {
            width: 100%;
            padding: 10px;
            box-sizing: border-box;
        }

        .header {
            text-align: center;
            margin-bottom: 10px;
        }

        .header img {
            height: 60px;
        }

        h2 {
            color: #c00;
            margin: 5px 0;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 8px;
        }

        td {
            padding: 4px;
            vertical-align: top;
        }

        .section-title {
            background-color: #eee;
            font-weight: bold;
            text-align: left;
            padding: 6px;
            border: 1px solid #ccc;
            margin-top: 12px;
            margin-bottom: 6px;
        }

        .label {
            font-weight: bold;
            width: 30%;
        }

        .value {
            border-bottom: 1px solid #333;
            padding-left: 4px;
            min-height: 14px;
        }
    </style>
</head>
<body>
    <div class="container">
        <!-- Header -->
        <div class="header">
            <img src="{{ public_path('img/logg.png') }}" alt="Logo">
            <h2>Online Admission Form</h2>
            <p><strong>Prospectus No:</strong> {{ $data->prospectus_no }}</p>
        </div>

        <!-- Section 1: Program Details -->
        <div class="section-title">1. Program Details</div>
        <table>
            <tr>
                <td class="label">Session:</td>
                <td class="value">{{ $data->prospectus_session }}</td>
                <td class="label">Course:</td>
                <td class="value">
                    {{ DB::table('tbl_course')->where('course_id', $data->prospectus_course_name)->first()->course_name }}
                </td>
            </tr>
        </table>

        <!-- Section 2: Personal Details -->
        <div class="section-title">2. Personal Details</div>
        <table>
            <tr>
                <td class="label">Name:</td>
                <td class="value">{{ $data->prospectus_applicant_name }}</td>
                <td class="label">Mobile No:</td>
                <td class="value">{{ $data->mobile }}</td>
            </tr>
            <tr>
                <td class="label">Email:</td>
                <td class="value">{{ $data->prospectus_emailid }}</td>
                <td class="label">Gender:</td>
                <td class="value">{{ $data->prospectus_gender }}</td>
            </tr>
            <tr>
                <td class="label">Date of Birth:</td>
                <td class="value">{{ $data->prospectus_dob }}</td>
                <td class="label">Referred By:</td>
                <td class="value">{{ $data->revert_by }}</td>
            </tr>
            <tr>
                <td class="label">Father's Name:</td>
                <td class="value">{{ $data->prospectus_father_name }}</td>
                <td class="label">Mother's Name:</td>
                <td class="value">{{ $data->prospectus_mother_name }}</td>
            </tr>
        </table>

        <!-- Section 3: Address Details -->
        <div class="section-title">3. Address Details</div>
        <table>
            <tr>
                <td class="label">Address:</td>
                <td class="value" colspan="3">{{ $data->prospectus_address }}</td>
            </tr>
            <tr>
                <td class="label">City:</td>
                <td class="value">{{ $data->prospectus_city }}</td>
                <td class="label">State/Province:</td>
                <td class="value">{{ $data->prospectus_state }}</td>
            </tr>
            <tr>
                <td class="label">Country:</td>
                <td class="value">{{ $data->prospectus_country }}</td>
                <td class="label">Postal Code:</td>
                <td class="value">{{ $data->prospectus_postal_code }}</td>
            </tr>
        </table>

        <!-- Section 4: Payment Details -->
        <div class="section-title">4. Payment Details</div>
        <table>
            <tr>
                <td class="label">Payment Mode:</td>
                <td class="value">{{ $data->prospectus_payment_mode }}</td>
                <td class="label">Amount:</td>
                <td class="value">{{ $data->prospectus_rate }}</td>
            </tr>
            <tr>
                
                <td class="label">Transaction Date:</td>
                <td class="value">{{ $data->transaction_date }}</td>
            </tr>
            <tr>
                <td class="label">Transaction ID:</td>
                <td class="value">{{ $data->transaction_id }}</td>
                <td class="label">Easebuzz ID:</td>
                <td class="value">{{ $data->easebuzz_id }}</td>
            </tr>
        </table>
    </div>
</body>
</html>
