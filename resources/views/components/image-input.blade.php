@props(['disabled' => false, 'currentImagePath' => ''])

<input type="file" accept="image/*" {{ $disabled ? 'disabled' : '' }} {!! $attributes !!} />

@if ($currentImagePath)
    <img class="mt-4" src="{{ asset('storage/' . $currentImagePath) }}" alt="" />
@endif
