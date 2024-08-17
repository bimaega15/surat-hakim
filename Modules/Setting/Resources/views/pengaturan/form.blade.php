<form action="{{ $action }}" method="post" id="form-submit">
    <div class="mb-4">
        <x-form-input-vertical label="Nama Aplikasi" name="namaaplikasi_pengaturan" placeholder="Nama Aplikasi..."
            value="{{ isset($row) ? $row->namaaplikasi_pengaturan ?? '' : '' }}" />
        <x-form-input-vertical label="Nama Instansi" name="namainstansi_pengaturan" placeholder="Nama Instansi..."
            value="{{ isset($row) ? $row->namainstansi_pengaturan ?? '' : '' }}" />
        <x-form-textarea-vertical label="Alamat" name="alamat_pengaturan" placeholder="Alamat..."
            value="{{ isset($row) ? $row->alamat_pengaturan ?? '' : '' }}" />
        <x-form-input-vertical type="number" label="No. Telepon" name="notelepon_pengaturan"
            placeholder="No. Telepon..." value="{{ isset($row) ? $row->notelepon_pengaturan ?? '' : '' }}" />
        <x-form-textarea-vertical label="Deskripsi" name="deskripsi_pengaturan" placeholder="Deskripsi..."
            value="{{ isset($row) ? $row->deskripsi_pengaturan ?? '' : '' }}" />
        @php
            $logoAplikasi = isset($row) ? $row->logoaplikasi_pengaturan ?? '' : '';
        @endphp
        <x-form-input-vertical type="file" label="Logo Aplikasi" name="logoaplikasi_pengaturan" />
        @php
            if ($logoAplikasi != '') {
                echo '
                <a href="' .
                    url('upload/setting/' . $logoAplikasi) .
                    '" target="_blank">  
                        <img src="' .
                    asset('upload/setting/' . $logoAplikasi) .
                    '" alt="Logo Aplikasi" style="width: 150px;"/>
                </a>';
            }
        @endphp
    </div>
    <div class="row">
        <div class="col-sm-12 d-flex justify-content-end">
            <x-button-cancel-modal />
            <x-button-submit-modal />
        </div>
    </div>
</form>
