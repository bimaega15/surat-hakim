@php
    $structurForm = [
        [
            'type' => 'checkbox',
            'label' => 'Apakah Surat Menggunakan Watermark ? ',
            'name' => 'iswatermark_fsurat',
            'checked' => isset($row) ? ($row->iswatermark_fsurat == true ? 'checked' : '' ?? '') : '',
            'labelInput' => 'Iya',
        ],
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
            'type' => 'textarea',
            'label' => 'Isi Surat',
            'id' => 'contentSurat',
            'name' => 'content_fsurat',
            'placeholder' => 'Content surat...',
            'value' => isset($row) ? $row->content_fsurat ?? '' : '',
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

@extends('layouts.app.index')

@section('title')
    Form Surat Page
@endsection

@section('content')
    <div class="container-xxl flex-grow-1 container-p-y">
        {{ Breadcrumbs::render('formListSurat') }}

        <!-- Basic Bootstrap Table -->
        <div class="card">
            <h5 class="card-header">
                <div class="d-flex flex-wrap justify-content-between">
                    <div>
                        Form List Surat
                    </div>
                </div>
            </h5>
            <div class="card-body">
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
        </div>
        <!--/ Basic Bootstrap Table -->
    </div>

    @push('custom_js')
        <script class="url_root" data-value="{{ url('/') }}"></script>
        <script class="form_surat_id" data-value="{{ isset($row) ? $row->id ?? '' : '' }}"></script>
        <script src="{{ asset('js/surat/listSurat/form.js') }}"></script>
    @endpush
@endsection
