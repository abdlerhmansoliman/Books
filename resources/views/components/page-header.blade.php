<div class="bg-white border m-3">
    <h1 class=" text-2xl m-4 text-[#1B3764]">
        {{ __('messages.home') }}
        @isset($subpage)
            > {{ $subpage }}
        @endisset
    </h1>
</div>