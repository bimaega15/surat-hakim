@props(['label', 'name', 'placeholder' => '', 'type' => 'text', 'value' => '', 'class' => '', 'disabled' => '', 'col' => 'col-lg-12'])
<div class="form-group mb-3 {{ $col }}">
    <label class="mb-2">{{ $label }}</label>
    <input type="{{ $type }}" class="form-control {{ $class }}" name="{{ $name }}"
        placeholder="{{ $placeholder }}" value="{{ $value }}" {{ $disabled }} />
</div>
