@php
    $structurForm = [
        [
            'type' => 'text',
            'label' => 'Judul Surat',
            'name' => 'judul_fsurat',
            'placeholder' => 'Judul surat...',
            'value' => isset($row) ? $row->judul_fsurat ?? '' : '',
        ],
        [
            'type' => 'textarea',
            'label' => 'Deskripsi',
            'name' => 'deskripsi_fsurat',
            'placeholder' => 'Deskripsi surat...',
            'value' => isset($row) ? $row->deskripsi_fsurat ?? '' : '',
        ],
        [
            'type' => 'file',
            'label' => 'Icon',
            'name' => 'icon_fsurat',
            'render' => isset($row)
                ? '
                <a href="' .
                        asset('upload/surat/' . $row->icon_fsurat) .
                        '">
                    <img src="' .
                        asset('upload/surat/' . $row->icon_fsurat) .
                        '" alt="' .
                        $row->icon_fsurat .
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
<script src="{{ asset('js/surat/listSurat/form.js') }}"></script>
