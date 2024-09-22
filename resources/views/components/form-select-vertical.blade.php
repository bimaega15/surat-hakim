@props([
    'label',
    'name',
    'data' => [],
    'value' => '',
    'disabled' => '',
    'class' => '',
    'col' => 'col-lg-12',
    'expand_input' => '',
])

<div class="form-group mb-3 {{ $col }}">
    <label for="{{ $name }}" class="form-label">{{ $label }}</label>
    <select name="{{ $name }}" class="form-select {{ $class }}" id="{{ $name }}"
        {{ $disabled }}>
        <option selected value="">-- Pilih {{ $label }} --</option>
        @foreach ($data as $index => $item)
            @php
                $item = (object) $item;
            @endphp
            <option value="{{ $item->id }}" {{ $item->id == $value ? 'selected' : '' }}>{{ $item->label }}</option>
        @endforeach
    </select>

    @if ($expand_input)
        <div class="{{ $expand_input }}"></div>
    @endif
</div>
