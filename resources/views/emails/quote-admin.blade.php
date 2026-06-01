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

        .logo-wrap {
            text-align: center;
            margin-bottom: 18px;
        }

        .logo {
            max-width: 220px;
            width: 100%;
            height: auto;
        }
    </style>
</head>

<body>
    @php
    $serviceTypeLabel = ucfirst($quote->service_type ?? '');
    $pickupDate = $quote->trip_date ? $quote->trip_date->format('M d, Y') : null;
    $pickupDateAndTime = $pickupDate || $quote->pickup_time
    ? trim(($pickupDate ?? '') . ($quote->pickup_time ? ' ' . $quote->pickup_time : ''))
    : '—';
    $dropoffDate = $quote->departure_date ? $quote->departure_date->format('M d, Y') : null;
    $dropoffDateAndTime = $dropoffDate || $quote->departure_time
    ? trim(($dropoffDate ?? '') . ($quote->departure_time ? ' ' . $quote->departure_time : ''))
    : '—';
    $tripTypeLabel = match ($quote->transfer_trip_type) {
    'round-trip' => 'Round Trip',
    'one-way' => 'One Way',
    default => '—',
    };
    $vehicleAtDestination = is_null($quote->use_vehicle_at_destination)
    ? '—'
    : ($quote->use_vehicle_at_destination ? 'Yes' : 'No');
    $note = null;
    if (!empty($quote->message)) {
    foreach (preg_split('/\r\n|\r|\n/', $quote->message) as $line) {
    $trimmedLine = trim($line);
    if (str_starts_with($trimmedLine, 'Note:')) {
    $note = trim(substr($trimmedLine, 5));
    break;
    }
    }
    if (!$note) {
    $note = $quote->message;
    }
    }
    @endphp

    <div class="logo-wrap">
        <img class="logo" src="{{ url('/logo.png') }}" alt="Canada Coach Charters">
    </div>

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
            <td>{{ $serviceTypeLabel }}</td>
        </tr>
        <tr>
            <td>No. of Passengers</td>
            <td>{{ $quote->passengers ?? '—' }}</td>
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
            <td>Pickup Date and Time</td>
            <td>{{ $pickupDateAndTime }}</td>
        </tr>
        @if($quote->service_type === 'transfer')
        <tr>
            <td>Drop-off Date and Time</td>
            <td>{{ $dropoffDateAndTime }}</td>
        </tr>
        @endif
        <tr>
            <td>Distance</td>
            <td>{{ $quote->distance_km ? number_format($quote->distance_km, 1) . ' km' : '—' }}</td>
        </tr>
        @if($quote->service_type === 'transfer')
        <tr>
            <td>Trip Type</td>
            <td>{{ $tripTypeLabel }}</td>
        </tr>
        <tr>
            <td>Do you plan to use the vehicle at the destination?</td>
            <td>{{ $vehicleAtDestination }}</td>
        </tr>
        @endif
        <tr>
            <td>Note</td>
            <td>{{ $note ?: '—' }}</td>
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
        <strong>Full Message Payload:</strong><br>{{ $quote->message }}
    </div>
    @endif

    <p style="margin-top:24px; color:#6b7280; font-size:13px;">
        This request is now in your admin panel under <strong>Enquiries → Quote Requests</strong>.
    </p>
</body>

</html>