@extends('layouts.app.index')

@section('title')
    List Surat Page
@endsection

@section('content')
    <div class="container-xxl flex-grow-1 container-p-y">
        {{ Breadcrumbs::render('listSurat') }}

        <!-- Basic Bootstrap Table -->
        <div class="card">
            <h5 class="card-header">
                <div class="d-flex flex-wrap justify-content-between">
                    <div>
                        Data List Surat
                    </div>
                    <div>
                        <a href="{{ url('surat/listSurat/create') }}" class="btn btn-primary">
                            <i class="bx bx-plus me-sm-1"></i> Tambah Surat
                        </a>
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
                                <th>Icon</th>
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
        <script src="{{ asset('js/surat/listSurat/index.js') }}"></script>
    @endpush
@endsection
