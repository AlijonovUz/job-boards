@props([
    'name',
    'value',
    'label',
    'checked' => false
])

<div class="form-check">
    <input
        type="radio"
        class="form-check-input {{ $errors->has($name) ? 'is-invalid' : '' }}"
        name="{{ $name }}"
        id="{{ $name }}_{{ $value }}"
        value="{{ $value }}"
        @checked(old($name, $checked ? $value : '') == $value)
    >

    <label class="form-check-label" for="{{ $name }}_{{ $value }}">
        {{ $label }}
    </label>
</div>
