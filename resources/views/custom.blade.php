<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Application Confirmation</title>
    <style>
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background-color: #f5f6fa;
            color: #333;
            padding: 20px;
            line-height: 1.6;
        }

        .email-container {
            max-width: 600px;
            margin: auto;
            background-color: #ffffff;
            border-radius: 6px;
            padding: 30px;
            box-shadow: 0 0 10px rgba(0,0,0,0.05);
        }

        .header {
            text-align: center;
            margin-bottom: 20px;
        }

        .header h2 {
            color: #4a90e2;
        }

        .content p {
            font-size: 15px;
        }

        .button {
            display: inline-block;
            margin-top: 20px;
            padding: 12px 20px;
            font-size: 16px;
            background-color: #4a90e2;
            color: #ffffff;
            text-decoration: none;
            border-radius: 4px;
        }

        .footer {
            margin-top: 30px;
            font-size: 13px;
            color: #888;
            text-align: center;
        }
    </style>
</head>
<body>
    <div class="email-container">
        <div class="header">
            <h2>Thank You for Your Application</h2>
        </div>

        <div class="content">
            <p>Dear {{ $data->prospectus_applicant_name }},</p>

            <p>
                Thank you for purchasing the prospectus at <strong>Sonadevi University</strong>.
                You can now proceed to fill out your admission form using the link below.
            </p>

            <p style="text-align: center;">
                <a href="https://admissions.sonadeviuniversity.ac.in/already" class="button">
                    Complete Admission Form
                </a>
            </p>

            <p>
                If you have any questions, feel free to reply to this email or contact our admission support team.
            </p>

            <p>Best regards,<br>
            Sonadevi University Admissions</p>
        </div>

        <div class="footer">
            @include('include.footer')
        </div>
    </div>
</body>
</html>
