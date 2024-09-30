@extends('layouts.app.frontend')

@section('title')
    List Permohonan Surat Pemohon
@endsection

@section('content')
    <section class="section" id="projects">
        <div class="container">
            <div class="card mt-5">
                <div class="card-header">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{ url('/') }}">Home</a></li>
                            @if ($slug)
                                <li class="breadcrumb-item"><a href="{{ url('hasilPermohonan') }}">Cari Data</a></li>
                                <li class="breadcrumb-item active"><span>Hasil Pencarian Data</span></li>
                            @else
                                <li class="breadcrumb-item active"><span>Hasil Pencarian Data</span></li>
                            @endif
                        </ol>
                    </nav>
                </div>
                <div class="card-body">
                    <div class="row justify-content-center mb-5 mt-3">
                        <div class="col-md-8 col-lg-6 text-center">
                            <h6 class="subtitle">Form Pengajuan</h6>
                            <h2 class="title">Hasil Pencarian Data Pengajuan</h2>
                        </div>
                    </div>
                    <!-- Gallary -->

                    <div class="row">
                        <div class="col-lg-12">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" style="width: 100%;">
                                    <thead>
                                        <tr>
                                            <th>No.</th>
                                            <th>NIK</th>
                                            <th>Nama</th>
                                            <th>Jenis Surat</th>
                                            <th class="text-center">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    @push('custom_js')
        <script class="url_root" data-value="{{ url('/') }}"></script>
        <script class="slug" data-value="{{ $slug }}"></script>
        <script src="{{ asset('js/one/hasilPermohonan/result.js') }}"></script>
    @endpush
@endsection
