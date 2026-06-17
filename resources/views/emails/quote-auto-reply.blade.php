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
    $pickupDate = $quote->trip_date ? $quote->trip_date->format('M d, Y') : null;
    $pickupDateAndTime = $pickupDate || $quote->pickup_time
    ? trim(($pickupDate ?? '') . ($quote->pickup_time ? ' ' . $quote->pickup_time : ''))
    : null;
    $dropoffDate = $quote->departure_date ? $quote->departure_date->format('M d, Y') : null;
    $dropoffDateAndTime = $dropoffDate || $quote->departure_time
    ? trim(($dropoffDate ?? '') . ($quote->departure_time ? ' ' . $quote->departure_time : ''))
    : null;
    $tripTypeLabel = match ($quote->transfer_trip_type) {
    'round-trip' => 'Round Trip',
    'one-way' => 'One Way',
    default => null,
    };
    $vehicleAtDestination = is_null($quote->use_vehicle_at_destination)
    ? null
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
    }
    @endphp

    <div class="logo-wrap">
        <img class="logo" src="{{ url('/logo.png') }}" alt="Canada Coach Charters">
    </div>

    <h2>Thank you, {{ $quote->name }}!</h2>
    <p>We've received your <strong>{{ ucfirst($quote->service_type) }}</strong> request. Our team will review it and get back to you <strong>ASAP</strong>.</p>

    <div class="box">
        <strong>Your Request Summary</strong>
        <table>
            <tr>
                <td>Service Type</td>
                <td>{{ ucfirst($quote->service_type) }}</td>
            </tr>
            @if($quote->passengers)<tr>
                <td>No. of Passengers</td>
                <td>{{ $quote->passengers }}</td>
            </tr>@endif
            @if($quote->pickup_location)<tr>
                <td>Pickup</td>
                <td>{{ $quote->pickup_location }}</td>
            </tr>@endif
            @if($quote->dropoff_location)<tr>
                <td>Drop-off</td>
                <td>{{ $quote->dropoff_location }}</td>
            </tr>@endif
            @if($pickupDate)<tr>
                <td>Pickup Date</td>
                <td>{{ $pickupDate }}</td>
            </tr>@endif
            @if($quote->pickup_time)<tr>
                <td>Pickup Time</td>
                <td>{{ $quote->pickup_time }}</td>
            </tr>@endif
            @if($quote->service_type === 'transfer' && $dropoffDate)<tr>
                <td>Departure Date</td>
                <td>{{ $dropoffDate }}</td>
            </tr>@endif
            @if($quote->service_type === 'transfer' && $quote->departure_time)<tr>
                <td>Departure Time</td>
                <td>{{ $quote->departure_time }}</td>
            </tr>@endif
            @if($quote->service_type === 'transfer' && $tripTypeLabel)<tr>
                <td>Trip Type</td>
                <td>{{ $tripTypeLabel }}</td>
            </tr>@endif
            @if($quote->service_type === 'transfer' && $vehicleAtDestination)<tr>
                <td>Do you plan to use the vehicle at the destination?</td>
                <td>{{ $vehicleAtDestination }}</td>
            </tr>@endif
            @if($note)<tr>
                <td>Note</td>
                <td>{{ $note }}</td>
            </tr>@endif
        </table>
    </div>

    <p style="margin-top:20px;">If you need to reach us sooner, you can reply to this email or contact us directly:</p>

    <div class="box" style="background:#eff6ff;border-color:#bfdbfe;">
        <strong>Contact Us</strong>
        <table>
            <tr>
                <td>Phone</td>
                <td><a href="tel:+13436559818" style="color:#1d4ed8;">+1 (343) 655-9818</a></td>
            </tr>
            <tr>
                <td>WhatsApp</td>
                <td><a href="https://wa.me/13436559818" style="color:#1d4ed8;">+1 (343) 655-9818</a></td>
            </tr>
            <tr>
                <td>Email</td>
                <td><a href="mailto:info@canadacoachcharters.ca" style="color:#1d4ed8;">info@canadacoachcharters.ca</a></td>
            </tr>
            <tr>
                <td>Website</td>
                <td><a href="https://canadacoachcharters.ca" style="color:#1d4ed8;">canadacoachcharters.ca</a></td>
            </tr>
        </table>
    </div>

    <div class="footer">
        Canada Coach Charters &mdash; Toronto, Ontario<br>
        This is an automated confirmation. You can reply to this email for urgent updates.
    </div>
</body>

</html>