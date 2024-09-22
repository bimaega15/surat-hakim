@props([
    'label',
    'name',
    'placeholder',
    'value' => '',
    'rows' => 3,
    'disabled' => '',
    'id' => '',
    'col' => 'col-lg-12',
    'class' => '',
])
<div class="form-group mb-3 {{ $col }}">
    <label for="{{ $label }}">{{ $label }}</label>
    <textarea class="form-control {{ $class }}" placeholder="{{ $placeholder }}" name="{{ $name }}" rows="{{ $rows }}"
        {{ $disabled }} id="{{ $id }}">{{ $value }}</textarea>
</div>
