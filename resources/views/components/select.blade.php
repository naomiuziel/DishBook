@props(['disabled' => false, 'options' => [], 'value' => ''])

<select {{ $disabled ? 'disabled' : '' }} {!! $attributes->except('options')->merge([
    'class' => 'border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm',
]) !!}>
    <option selected disabled>- Select an option -</option>

    @foreach ($options as $key => $label)
        <option {{ isset($value) && $key == $value ? 'selected' : '' }} value="{{ $key }}">
            {{ $label }}
        </option>
    @endforeach
</select>
