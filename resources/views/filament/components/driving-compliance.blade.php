@php
$durationHours = $duration ? floor($duration / 60) : 0;
$durationMinutes = $duration ? ($duration % 60) : 0;
$exceedsLimit = $duration && $duration > 1800; // 30 hours = 1800 minutes
$hoursOver = $exceedsLimit ? ($durationHours - 13) : 0;
$minutesOver = $exceedsLimit ? $durationMinutes : 0;
@endphp

<div class="space-y-3">
    @if($exceedsLimit)
    <div class="rounded-lg border-l-4 border-amber-400 bg-amber-50 p-4">
        <div class="flex items-start gap-3">
            <div class="pt-0.5">
                <svg class="h-5 w-5 text-amber-600" fill="currentColor" viewBox="0 0 20 20">
                    <path fill-rule="evenodd" d="M8.257 3.099c.765-1.36 2.722-1.36 3.486 0l5.58 9.92c.75 1.334-.213 2.98-1.742 2.98H4.42c-1.53 0-2.493-1.646-1.743-2.98l5.58-9.92zM11 13a1 1 0 11-2 0 1 1 0 012 0zm-1-8a1 1 0 00-1 1v3a1 1 0 002 0V6a1 1 0 00-1-1z" clip-rule="evenodd" />
                </svg>
            </div>
            <div>
                <p class="font-semibold text-amber-900">⚠️ Exceeds 13-Hour Driving Limit</p>
                <p class="mt-1 text-sm text-amber-800">
                    This trip is <strong>{{ $hoursOver }}h {{ $minutesOver }}min over</strong> the maximum continuous driving time.
                </p>
                <p class="mt-2 text-sm font-medium text-amber-900">
                    ✓ Recommendation: Use multiple drivers or plan overnight stops
                </p>
            </div>
        </div>
    </div>
    @else
    <div class="rounded-lg border-l-4 border-green-400 bg-green-50 p-4">
        <div class="flex items-start gap-3">
            <div class="pt-0.5">
                <svg class="h-5 w-5 text-green-600" fill="currentColor" viewBox="0 0 20 20">
                    <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd" />
                </svg>
            </div>
            <div>
                <p class="font-semibold text-green-900">✓ Within Driving Limits</p>
                <p class="mt-1 text-sm text-green-800">
                    This trip complies with Canadian commercial vehicle driving hour regulations (max 13 hours continuous).
                </p>
            </div>
        </div>
    </div>
    @endif
</div>