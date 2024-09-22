@php
    $structurForm = [
        [
            'type' => 'text',
            'label' => 'Nama Aplikasi',
            'placeholder' => 'Nama Aplikasi...',
            'name' => 'namaaplikasi_pengaturan',
            'value' => isset($row) ? $row->namaaplikasi_pengaturan ?? '' : '',
        ],

        [
            'type' => 'text',
            'label' => 'Nama Instansi',
            'placeholder' => 'Nama Instansi...',
            'name' => 'namainstansi_pengaturan',
            'value' => isset($row) ? $row->namainstansi_pengaturan ?? '' : '',
        ],

        [
            'type' => 'textarea',
            'label' => 'Alamat',
            'name' => 'alamat_pengaturan',
            'placeholder' => 'Alamat...',
            'value' => isset($row) ? $row->alamat_pengaturan ?? '' : '',
        ],

        [
            'type' => 'text',
            'label' => 'Email',
            'placeholder' => 'Email...',
            'name' => 'email_pengaturan',
            'value' => isset($row) ? $row->email_pengaturan ?? '' : '',
        ],

        [
            'type' => 'text',
            'label' => 'No. Telepon',
            'placeholder' => 'No. Telepon...',
            'name' => 'notelepon_pengaturan',
            'value' => isset($row) ? $row->notelepon_pengaturan ?? '' : '',
        ],

        [
            'type' => 'textarea',
            'label' => 'Deskripsi',
            'name' => 'deskripsi_pengaturan',
            'placeholder' => 'Deskripsi...',
            'value' => isset($row) ? $row->deskripsi_pengaturan ?? '' : '',
        ],

        [
            'type' => 'file',
            'label' => 'Icon',
            'name' => 'logoaplikasi_pengaturan',
            'render' => isset($row)
                ? '
                <a href="' .
                        asset('upload/setting/' . $row->logoaplikasi_pengaturan) .
                        '">
                    <img src="' .
                        asset('upload/setting/' . $row->logoaplikasi_pengaturan) .
                        '" alt="' .
                        $row->logoaplikasi_pengaturan .
                        '" class="img-thumbnail" style="width: 150px;">
                </a>' ??
                    ''
                : '',
        ],
        [
            'type' => 'file',
            'label' => 'Video Website',
            'name' => 'video_pengaturan',
            'render' =>
                isset($row) && !empty($row->video_pengaturan)
                    ? '
            <a href="' .
                        asset('upload/settingVideo/' . $row->video_pengaturan) .
                        '" target="_blank">
                <video width="250" controls>
                    <source src="' .
                        asset('upload/settingVideo/' . $row->video_pengaturan) .
                        '" type="video/mp4">
                    Your browser does not support the video tag.
                </video>
            </a>'
                    : '',
        ],
    ];
@endphp

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
