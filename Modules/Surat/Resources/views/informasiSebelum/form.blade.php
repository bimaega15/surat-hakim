@php
    $structurForm = [
        [
            'type' => 'text',
            'label' => 'Judul Petunjuk',
            'name' => 'judul_isebelum',
            'placeholder' => 'Judul Petunjuk Awal...',
            'value' => isset($row) ? $row->judul_isebelum ?? '' : '',
        ],
        [
            'type' => 'textarea',
            'label' => 'Deskripsi Petunjuk',
            'name' => 'deskripsi_isebelum',
            'placeholder' => 'Deskripsi Petunjuk Awal...',
            'value' => isset($row) ? $row->deskripsi_isebelum ?? '' : '',
        ],
        [
            'type' => 'file',
            'label' => 'Gambar Petunjuk',
            'name' => 'gambar_isebelum',
            'render' => isset($row)
                ? '
                <a href="' .
                        asset('upload/informasiSebelum/' . $row->gambar_isebelum) .
                        '">
                    <img src="' .
                        asset('upload/informasiSebelum/' . $row->gambar_isebelum) .
                        '" alt="' .
                        $row->gambar_isebelum .
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
<script src="{{ asset('js/surat/petunjukAwal/form.js') }}"></script>
