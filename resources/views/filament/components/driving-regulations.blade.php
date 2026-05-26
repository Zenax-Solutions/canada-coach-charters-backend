@php
$durationHours = $duration ? floor($duration / 60) : 0;
$durationMinutes = $duration ? ($duration % 60) : 0;
$exceedsLimit = $duration && $duration > 1800; // 30 hours = 1800 minutes
$distanceKm = $distance ?? 0;
@endphp

<div class="space-y-3">
    <div class="text-sm text-gray-700">
        <p class="font-semibold mb-2">🚌 Canadian Commercial Vehicle Driving Hours Regulations</p>
        <ul class="space-y-2 text-xs">
            <li><strong>Max Continuous Driving:</strong> 13 hours per day</li>
            <li><strong>Max Driving per Cycle:</strong> 120 hours over 14 days</li>
            <li><strong>Mandatory Break:</strong> 8-10 hours between driving periods</li>
            <li><strong>Note:</strong> For trips >13 hours, plan multiple drivers or overnight stops.</li>
        </ul>
    </div>

    @if($duration)
    <div class="border-t pt-3">
        <p class="font-semibold text-sm mb-2">📊 Quote Details:</p>
        <div class="grid grid-cols-3 gap-2 text-xs">
            <div class="bg-blue-50 p-2 rounded">
                <p class="text-gray-600">Distance</p>
                <p class="font-bold text-blue-700">{{ number_format($distanceKm, 1) }} km</p>
            </div>
            <div class="bg-blue-50 p-2 rounded">
                <p class="text-gray-600">Duration</p>
                <p class="font-bold text-blue-700">{{ $durationHours }}h {{ $durationMinutes }}min</p>
            </div>
            <div class="bg-blue-50 p-2 rounded">
                <p class="text-gray-600">Avg Speed</p>
                <p class="font-bold text-blue-700">{{ $duration ? number_format(($distanceKm / $duration * 60), 1) : '–' }} km/h</p>
            </div>
        </div>

        @if($exceedsLimit)
        <div class="mt-3 bg-amber-50 border border-amber-200 rounded p-2">
            <p class="text-xs font-semibold text-amber-900 flex items-center gap-1">
                ⚠️ EXCEEDS 13-HOUR DRIVING LIMIT
            </p>
            <p class="text-xs text-amber-800 mt-1">
                This trip is <strong>{{ $durationHours - 13 }}h {{ $durationMinutes }}min over</strong> the maximum continuous driving time.
                Recommend multiple drivers or overnight stops.
            </p>
        </div>
        @else
        <div class="mt-3 bg-green-50 border border-green-200 rounded p-2">
            <p class="text-xs font-semibold text-green-900">✓ Within driving limits</p>
        </div>
        @endif
    </div>
    @endif
</div>