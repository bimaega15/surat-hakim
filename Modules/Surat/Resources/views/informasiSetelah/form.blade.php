@php
    $structurForm = [
        [
            'type' => 'text',
            'label' => 'Judul Petunjuk',
            'name' => 'judul_isetelah',
            'placeholder' => 'Judul Petunjuk Akhir...',
            'value' => isset($row) ? $row->judul_isetelah ?? '' : '',
        ],
        [
            'type' => 'textarea',
            'label' => 'Deskripsi Petunjuk',
            'name' => 'deskripsi_isetelah',
            'placeholder' => 'Deskripsi Petunjuk Akhir...',
            'value' => isset($row) ? $row->deskripsi_isetelah ?? '' : '',
        ],
        [
            'type' => 'file',
            'label' => 'Gambar Petunjuk',
            'name' => 'gambar_isetelah',
            'render' => isset($row)
                ? '
                <a href="' .
                        asset('upload/informasiSetelah/' . $row->gambar_isetelah) .
                        '">
                    <img src="' .
                        asset('upload/informasiSetelah/' . $row->gambar_isetelah) .
                        '" alt="' .
                        $row->gambar_isetelah .
                        '" class="img-thumbnail" style="width: 100px;">
                </a>' ??
                    ''
                : '',
        ],
    ];
@endphp
<div>
    <form id="form-submit" action="{{ $action }}">
        <div class="modal-body">
            <x-form-template :structurForm="$structurForm" />
        </div>
        <div class="modal-footer">
            <div class="d-flex justify-content-end">
                <div>
                    <x-button-cancel-modal />
                    <x-button-submit-modal />
                </div>
            </div>
        </div>
    </form>
</div>
<script src="{{ asset('js/surat/petunjukAkhir/form.js') }}"></script>
