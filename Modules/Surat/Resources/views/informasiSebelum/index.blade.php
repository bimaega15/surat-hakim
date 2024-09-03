@extends('layouts.app.index')

@section('title')
    Petunjuk Awal Surat Page
@endsection

@section('content')
    <div class="container-xxl flex-grow-1 container-p-y">
        {{ Breadcrumbs::render('petunjukAwal') }}

        <!-- Basic Bootstrap Table -->
        <div class="card">
            <h5 class="card-header">
                <div class="d-flex flex-wrap justify-content-between">
                    <div>
                        Data Petunjuk Awal Surat
                    </div>
                    <div>
                        <x-button-main title="Tambah" className="btn-add" typeModal="mediumModal"
                            urlCreate="{{ url('surat/petunjukAwal/create') }}" />
                    </div>
                </div>
            </h5>
            <div class="card-body">
                <div class="table-responsive text-nowrap px-3">
                    <table class="table" id="dataTable">
                        <thead>
                            <tr>
                                <th width="10%;">No.</th>
                                <th>Judul</th>
                                <th>Deskripsi</th>
                                <th>Gambar</th>
                                <th class="text-center">Aksi</th>
                            </tr>
                        </thead>
                        <tbody class="table-border-bottom-0">
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <!--/ Basic Bootstrap Table -->
    </div>

    @push('custom_js')
        <script class="url_root" data-url="{{ url('/') }}"></script>
        <script class="formSuratId" data-value="{{ $formSuratId }}"></script>
        <script src="{{ asset('js/surat/petunjukAwal/index.js') }}"></script>
    @endpush
@endsection
