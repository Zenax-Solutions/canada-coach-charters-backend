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
            border-bottom: 2px solid #1d4ed8;
            padding-bottom: 8px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 16px;
        }

        td {
            padding: 10px 12px;
            border-bottom: 1px solid #e5e7eb;
        }

        td:first-child {
            font-weight: bold;
            width: 35%;
            color: #6b7280;
        }

        .badge {
            display: inline-block;
            padding: 3px 10px;
            border-radius: 999px;
            font-size: 12px;
            background: #dbeafe;
            color: #1d4ed8;
            text-transform: uppercase;
        }

        .message-box {
            background: #f9fafb;
            border-left: 4px solid #1d4ed8;
            padding: 12px 16px;
            margin-top: 16px;
            border-radius: 4px;
        }
    </style>
</head>

<body>
    <h2>New Quote Request Received</h2>
    <p>A new <span class="badge">{{ $quote->service_type }}</span> quote request has been submitted.</p>

    <table>
        <tr>
            <td>Name</td>
            <td>{{ $quote->name }}</td>
        </tr>
        <tr>
            <td>Email</td>
            <td><a href="mailto:{{ $quote->email }}">{{ $quote->email }}</a></td>
        </tr>
        <tr>
            <td>Phone</td>
            <td>{{ $quote->phone ?? '—' }}</td>
        </tr>
        <tr>
            <td>Service Type</td>
            <td>{{ ucfirst($quote->service_type) }}</td>
        </tr>
        <tr>
            <td>Pickup</td>
            <td>{{ $quote->pickup_location ?? '—' }}</td>
        </tr>
        <tr>
            <td>Drop-off</td>
            <td>{{ $quote->dropoff_location ?? '—' }}</td>
        </tr>
        <tr>
            <td>Distance</td>
            <td>{{ $quote->distance_km ? number_format($quote->distance_km, 1) . ' km' : '—' }}</td>
        </tr>
        <tr>
            <td>Estimated Duration</td>
            <td>{{ $quote->duration_minutes ? $quote->duration_minutes . ' min' : '—' }}</td>
        </tr>
        <tr>
            <td>Trip Date</td>
            <td>{{ $quote->trip_date ? $quote->trip_date->format('M d, Y') : '—' }}</td>
        </tr>
        <tr>
            <td>Passengers</td>
            <td>{{ $quote->passengers ?? '—' }}</td>
        </tr>
        <tr>
            <td>Budget</td>
            <td>{{ $quote->budget ? '$' . number_format($quote->budget, 2) : '—' }}</td>
        </tr>
        <tr>
            <td>Received</td>
            <td>{{ $quote->created_at->format('M d, Y H:i') }}</td>
        </tr>
    </table>

    @if($quote->message)
    <div class="message-box">
        <strong>Message:</strong><br>{{ $quote->message }}
    </div>
    @endif

    <p style="margin-top:24px; color:#6b7280; font-size:13px;">
        This request is now in your admin panel under <strong>Enquiries → Quote Requests</strong>.
    </p>
</body>

</html>