@php
    $dataCount = [];
    foreach ($formSurat as $key => $value) {
        $searchValue = $dataGroup->where('form_surat_id', $value->id)->first();
        $dataCount[] = [
            'title' => 'Total <strong>' . $value->judul_fsurat . '</strong>',
            'icon' => 'fa-solid fa-cart-shopping',
            'color' => 'text-primary',
            'value' => $searchValue->total ?? 0,
            'image' =>
                '<img style="width: 70px; border-radius: 10px;" src="' .
                asset('upload/surat/' . $value->icon_fsurat) .
                '" alt="' .
                $value->icon_fsurat .
                '" />',
        ];
    }

@endphp
<div class="row mt-3">
    <div class="row mb-3">
        @foreach ($dataCount as $item)
            <div class="col-lg-4">
                <div class="card" style="min-height: 170px;">
                    <div class="card-body d-flex align-items-center">
                        <div class="d-flex justify-content-between align-item-center">
                            <div>
                                <h3 class="text-dark mb-4">{{ $item['value'] }}</h3>
                                <span class="text-dark">{!! $item['title'] !!} </span>
                            </div>
                            <div>
                                {!! $item['image'] !!}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach

    </div>
</div>
