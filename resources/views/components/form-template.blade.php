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
                class="{{ @$item['class'] }}" data_index="{{ @$item['data-index'] }}" />
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

        @case('array_input')
            <div class="area_array_input">
                @php
                    $title = '<i class="fas fa-plus"></i> Tambah data';
                @endphp
                <div class="form_array_input">
                    <div class="row mb-2">
                        @foreach ($item['array_data'] as $key => $value)
                            @if (count($value) > 1)
                                @foreach ($value as $key_value => $value_data)
                                    @if ($value_data['type'] != 'button_remove_array_input')
                                        <x-form-input-vertical name="{{ $value_data['name'] }}"
                                            label="{{ $value_data['label'] }} " placeholder="{{ $value_data['placeholder'] }}"
                                            value="{{ $value_data['value'] }}" col="{{ $value_data['col'] }}"
                                            data_index="{{ $value_data['data-index'] }}"
                                            class="{{ @$value_data['class'] }}" />
                                    @else
                                        <x-button-global title="{!! $value_data['title'] !!}" col="{{ $value_data['col'] }}"
                                            style="{{ @$value_data['style'] }}" data_index="{{ $value_data['data-index'] }}"
                                            disabled="{{ @$value_data['disabled'] }}" class="{{ $value_data['class'] }}" />
                                    @endif
                                @endforeach
                            @else
                                @if ($value['type'] != 'button_remove_array_input')
                                    <x-form-input-vertical name="{{ $value['name'] }}" label="{{ $value['label'] }} "
                                        placeholder="{{ $value['placeholder'] }}" value="{{ $value['value'] }}"
                                        col="{{ $value['col'] }}" data_index="{{ $value['data-index'] }}"
                                        class="{{ @$value['class'] }}" />
                                @else
                                    <x-button-global title="{!! $value['title'] !!}" col="{{ $value['col'] }}"
                                        style="{{ @$value['style'] }}" data_index="{{ $value['data-index'] }}"
                                        disabled="{{ @$value['disabled'] }}" class="{{ $value['class'] }}" />
                                @endif
                            @endif
                        @endforeach
                    </div>
                </div>
                <div class="text-end">
                    <x-button-global title="{!! $title !!}" class="btn btn-primary btn-add-array_input" />
                </div>
            </div>
        @break

        @case('button_remove_array_input')
            <x-button-global title="{!! $item['title'] !!}" col="{{ $item['col'] }}" style="{{ @$item['style'] }}"
                data_index="{{ $item['data-index'] }}" disabled="{{ @$item['disabled'] }}" class="{{ $item['class'] }}" />
        @break

        @default
            <x-form-input-vertical type ="{{ $item['type'] }}" label="{{ $item['label'] }}" name="{{ $item['name'] }}"
                placeholder="{{ $item['placeholder'] }}" value="{{ $item['value'] }}" col="{{ @$item['col'] }}"
                class="{{ @$item['class'] }}" data_index="{{ $item['data-index'] }}" />
        @break
    @endswitch
@endforeach
