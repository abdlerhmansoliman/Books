@php
    $avgRating = round($rating, 1);
@endphp

<div class="flex">
    @for ($i = 1; $i <= 5; $i++)
        @if ($i <= floor($avgRating))
            <!-- نجم مملوء -->
            <svg xmlns="http://www.w3.org/2000/svg" fill="#F2C94C" stroke="currentColor" stroke-width="0.5" viewBox="0 0 24 24" class="w-5 h-5">
                <path d="M12 2l2.4 7.4h7.6l-6.2 4.5 2.4 7.4-6.2-4.5-6.2 4.5 2.4-7.4-6.2-4.5h7.6z"/>
            </svg>
        @elseif ($i - $avgRating < 1 && $i - $avgRating > 0)
            <!-- نجم نصف مملوء -->
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" class="w-5 h-5">
                <defs>
                    <clipPath id="half-star-{{ $i }}">
                        <rect x="0" y="0" width="12" height="24" />
                    </clipPath>
                </defs>
                <path fill="none" stroke="currentColor" stroke-width="0.5" d="M12 2l2.4 7.4h7.6l-6.2 4.5 2.4 7.4-6.2-4.5-6.2 4.5 2.4-7.4-6.2-4.5h7.6z"/>
                <path clip-path="url(#half-star-{{ $i }})" fill="#F2C94C" stroke="none" d="M12 2l2.4 7.4h7.6l-6.2 4.5 2.4 7.4-6.2-4.5-6.2 4.5 2.4-7.4-6.2-4.5h7.6z"/>
            </svg>
        @else
            <!-- نجم فارغ -->
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" stroke="currentColor" stroke-width="0.5" viewBox="0 0 24 24" class="w-5 h-5">
                <path d="M12 2l2.4 7.4h7.6l-6.2 4.5 2.4 7.4-6.2-4.5-6.2 4.5 2.4-7.4-6.2-4.5h7.6z"/>
            </svg>
        @endif
    @endfor
</div>
