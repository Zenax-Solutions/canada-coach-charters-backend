<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <style>
        body {
            font-family: Arial, sans-serif;
            color: #333;
            max-width: 600px;
            margin: 0 auto;
            padding: 20px;
        }

        h2 {
            color: #1d4ed8;
        }

        .box {
            background: #f0f9ff;
            border: 1px solid #bfdbfe;
            border-radius: 8px;
            padding: 20px;
            margin-top: 20px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 8px;
        }

        td {
            padding: 8px 10px;
            border-bottom: 1px solid #e5e7eb;
            font-size: 14px;
        }

        td:first-child {
            font-weight: bold;
            width: 35%;
            color: #6b7280;
        }

        .footer {
            margin-top: 30px;
            font-size: 12px;
            color: #9ca3af;
            border-top: 1px solid #e5e7eb;
            padding-top: 16px;
        }
    </style>
</head>

<body>
    <h2>Thank you, {{ $quote->name }}!</h2>
    <p>We've received your <strong>{{ ucfirst($quote->service_type) }}</strong> request and our team will review it and get back to you within <strong>24 hours</strong>.</p>

    <div class="box">
        <strong>Your Request Summary</strong>
        <table>
            <tr>
                <td>Service</td>
                <td>{{ ucfirst($quote->service_type) }}</td>
            </tr>
            @if($quote->pickup_location)<tr>
                <td>Pickup</td>
                <td>{{ $quote->pickup_location }}</td>
            </tr>@endif
            @if($quote->dropoff_location)<tr>
                <td>Drop-off</td>
                <td>{{ $quote->dropoff_location }}</td>
            </tr>@endif
            @if($quote->trip_date)<tr>
                <td>Date</td>
                <td>{{ $quote->trip_date->format('M d, Y') }}</td>
            </tr>@endif
            @if($quote->passengers)<tr>
                <td>Passengers</td>
                <td>{{ $quote->passengers }}</td>
            </tr>@endif
        </table>
    </div>

    <p style="margin-top:20px;">If you need to reach us sooner, you can reply to this email or call us directly.</p>

    <div class="footer">
        Canada Coach Charters &mdash; Toronto, Ontario<br>
        This is an automated confirmation. Please do not reply directly to this address.
    </div>
</body>

</html>