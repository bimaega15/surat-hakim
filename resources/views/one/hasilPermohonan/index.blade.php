@extends('layouts.app.frontend')

@section('title')
    Hasil Permohonan Surat
@endsection

@section('content')
    @push('custom_css')
        <style>
            .card_area {
                height: 160px;
                overflow: hidden;
            }

            .input_custom {
                height: 60px;
            }

            .button_search {
                width: 100px
            }

            .width-150 {
                width: 150px;
            }
        </style>
    @endpush

    <section class="section" id="projects">
        <div class="container">
            <div class="card mt-5">
                <div class="card-header">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{ url('/') }}">Home</a></li>
                            <li class="breadcrumb-item active"><span>Cari Data</span></li>
                        </ol>
                    </nav>
                </div>
                <div class="card-body">
                    <div class="row justify-content-center mb-5 mt-3">
                        <div class="col-md-8 col-lg-6 text-center">
                            <h6 class="subtitle">Form Pengajuan</h6>
                            <h2 class="title">Cari Data Pengajuan</h2>
                        </div>
                    </div>
                    <!-- Gallary -->

                    <div class="row justify-content-center">
                        <div class="col-lg-8 mx-auto">
                            <div class="card_area">
                                <form action="{{ url('hasilPermohonan') }}" method="get" id="form-submit">
                                    <div class="d-flex">
                                        <input type="text" name="slug" class="form-control input_custom shadow"
                                            placeholder="Cari Berdasarkan Nomor Induk Kependudukan (KTP)">
                                        <button type="button" class="btn btn-primary button_search width-150">
                                            <strong>
                                                <i class="fas fa-search"></i> Cari
                                            </strong>
                                        </button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    @push('custom_js')
        <script class="url_root" data-value="{{ url('/') }}"></script>
        <script src="{{ asset('js/one/hasilPermohonan/index.js') }}"></script>
    @endpush
@endsection
