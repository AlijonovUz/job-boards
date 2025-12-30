@props([
    'name',
    'label' => '',
    'placeholder' => '',
    'type' => 'text',
    'value' => null
])


<div class="mb-3">
    @if($label)
        <label for="{{ $name }}" class="form-label">{{ $label }}</label>
    @endif

    @if ($type === 'textarea')
        <textarea id="{{ $name }}" name="{{ $name }}" rows="4"
                  placeholder="{{ $placeholder }}" {{ $attributes->class(['form-control', 'form-control-lg', 'is-invalid' => $errors->has($name)]) }}>{{ old($name, $value) }}</textarea>
    @else
        <input id="{{ $name }}" type="{{ $type }}" name="{{ $name }}" value="{{ old($name, $value) }}"
               placeholder="{{ $placeholder }}" {{ $attributes->class(['form-control', 'form-control-lg', 'is-invalid' => $errors->has($name)]) }}>
    @endif

    @error($name)
    <div class="invalid-feedback">
        {{ $message }}
    </div>
    @enderror

</div>
