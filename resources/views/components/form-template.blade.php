@props(['structurForm' => []])

@foreach ($structurForm as $item)
    @switch($item['type'])
        @case('checkbox')
            <x-form-checkbox-vertical label="{{ $item['label'] }}" name="{{ $item['name'] }}"
                labelInput="{{ $item['labelInput'] }}" checked="{{ $item['checked'] }}" col="{{ @$item['col'] }}" />
        @break

        @case('hidden')
            <input type="{{ $item['type'] }}" name="{{ $item['name'] }}" value="{{ $item['value'] }}">
        @break

        @case('text')
            <x-form-input-vertical type="{{ $item['type'] }}" label="{{ $item['label'] }}" name="{{ $item['name'] }}"
                placeholder="{{ $item['placeholder'] }}" value="{{ $item['value'] }}" col="{{ @$item['col'] }}"
                class="{{ @$item['class'] }}" />
        @break

        @case('number')
            <x-form-input-vertical type="{{ $item['type'] }}" label="{{ $item['label'] }}" name="{{ $item['name'] }}"
                placeholder="{{ $item['placeholder'] }}" value="{{ $item['value'] }}" col="{{ @$item['col'] }}"
                class="{{ @$item['class'] }}" />
        @break

        @case('file')
            <x-form-input-vertical type="{{ $item['type'] }}" label="{{ $item['label'] }}" name="{{ $item['name'] }}"
                col="{{ @$item['col'] }}" class="{{ @$item['class'] }}" />
            @if ($item['render'])
                {!! $item['render'] !!}
            @endif
        @break

        @case('textarea')
            <x-form-textarea-vertical label="{{ $item['label'] }}" name="{{ $item['name'] }}"
                placeholder="{{ $item['placeholder'] }}" value="{{ $item['value'] }}" id="{{ @$item['id'] }}"
                col="{{ @$item['col'] }}" class="{{ @$item['class'] }}" />
        @break

        @case('select')
            <x-form-select-vertical label="{{ $item['label'] }}" name="{{ $item['name'] }}" :data="$item['array_data']"
                value="{{ $item['value'] }}" col="{{ $item['col'] }}" expand_input="{{ @$item['expand_input'] }}" />
        @break

        @default
            <x-form-input-vertical type ="{{ $item['type'] }}" label="{{ $item['label'] }}" name="{{ $item['name'] }}"
                placeholder="{{ $item['placeholder'] }}" value="{{ $item['value'] }}" col="{{ @$item['col'] }}"
                class="{{ @$item['class'] }}" />
        @break
    @endswitch
@endforeach
