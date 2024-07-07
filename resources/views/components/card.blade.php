<div class="bg-white overflow-hidden shadow-sm rounded-lg {{ $class ?? '' }}">
    @if (isset($title))
        <div class="border-b py-3 px-4 md:py-4 md:px-5">
            <p class="mt-1">
                <strong>{{ $title }}</strong>
            </p>
        </div>
    @endif

    <div class="p-6 text-gray-900">
        {{ $slot }}
    </div>
</div>
