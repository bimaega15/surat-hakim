@props(['label', 'name', 'labelInput', 'checked' => ''])
<div class="form-group mb-3">
    <label for="">
        {{ $label }}
    </label>
    <div>
        <div class="form-check form-switch mb-2">
            <input class="form-check-input" name="{{ $name }}" type="checkbox" id="{{ $name }}"
                {{ $checked }}>
            <label class="form-check-label" for="{{ $name }}">{{ $labelInput }}</label>
        </div>
    </div>
</div>
