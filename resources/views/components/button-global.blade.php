@props([
    'title' => '',
    'class' => 'btn btn-primary',
    'col' => '',
    'style' => '',
    'data_index' => '',
    'disabled' => '',
])

@if ($col)
    <div class="{{ $col }}">
        <button
            {{ $attributes->merge([
                'class' => $class . ' ',
                'type' => 'button',
                'style' => $style,
                'data-index' => $data_index,
            ]) }}
            type="button" {{ $disabled == 'disabled' ? 'disabled' : '' }}>
            <span>
                {!! $title !!}
            </span>
        </button>
    </div>
@else
    <button
        {{ $attributes->merge([
            'class' => $class . ' ',
            'type' => 'button',
            'style' => $style,
            'data-index' => $data_index,
        ]) }}
        type="button" {{ $disabled == 'disabled' ? 'disabled' : '' }}>
        <span>
            {!! $title !!}
        </span>
    </button>
@endif
