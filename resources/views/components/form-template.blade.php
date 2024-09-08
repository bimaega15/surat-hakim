@props(['structurForm' => []])

@foreach ($structurForm as $item)
    @switch($item['type'])
        @case('checkbox')
            <x-form-checkbox-vertical label="{{ $item['label'] }}" name="{{ $item['name'] }}"
                labelInput="{{ $item['labelInput'] }}" checked="{{ $item['checked'] }}" />
        @break

        @case('text')
            <x-form-input-vertical type="{{ $item['type'] }}" label="{{ $item['label'] }}" name="{{ $item['name'] }}"
                placeholder="{{ $item['placeholder'] }}" value="{{ $item['value'] }}" />
        @break

        @case('file')
            <x-form-input-vertical type="{{ $item['type'] }}" label="{{ $item['label'] }}" name="{{ $item['name'] }}" />
            @if ($item['render'])
                {!! $item['render'] !!}
            @endif
        @break

        @case('textarea')
            <x-form-textarea-vertical label="{{ $item['label'] }}" name="{{ $item['name'] }}"
                placeholder="{{ $item['placeholder'] }}" value="{{ $item['value'] }}" id="{{ @$item['id'] }}" />
        @break

        @default
            <x-form-input-vertical type ="{{ $item['type'] }}" label="{{ $item['label'] }}" name="{{ $item['name'] }}"
                placeholder="{{ $item['placeholder'] }}" value="{{ $item['value'] }}" />
        @break
    @endswitch
@endforeach
