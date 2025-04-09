@props([
    'icon' => '',
    'name' => '',
    'text' => '',
    'value' => null,
    ])
<div class="d-flex flex-row align-items-center ps-5">
    <x-form.input-error-alert :name="$name"/>
</div>
<div class="d-flex flex-row align-items-center mb-4">
    @if($icon)
        <i class="{{ $icon }} "></i>
    @endif
    <div class="form-floating flex-fill mb-0">
        <textarea class="form-control {{ $errors->has($name) ? 'is-invalid' : '' }}"
                  style="height: 200px" name="{{ $name }}">{{ old($name) ? old($name) : $value ?? '' }}</textarea>
        <label class="form-label">
            {{ $text }}
        </label>
    </div>
</div>
