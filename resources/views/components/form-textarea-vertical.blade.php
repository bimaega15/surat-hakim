@props(['label', 'name', 'placeholder', 'value' => '', 'rows' => 3, 'disabled' => '', 'id' => ''])
<div class="form-group mb-3">
    <label for="{{ $label }}">{{ $label }}</label>
    <textarea class="form-control" placeholder="{{ $placeholder }}" name="{{ $name }}" rows="{{ $rows }}" {{ $disabled }} id="{{ $id }}">{{ $value }}</textarea>
</div>
