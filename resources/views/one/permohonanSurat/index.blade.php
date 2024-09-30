@extends('layouts.app.frontend')

@section('title')
    Permohonan Surat
@endsection

@section('content')
    @push('custom_css')
        <style>
            .img-contain {
                height: 150px;
                object-fit: contain;
                border-radius: 10px;
            }

            .show_image {
                width: 100%;
                height: 500px;
                object-fit: contain;
            }

            .owl-nav {
                margin-top: 10px;
                display: flex;
                justify-content: space-between;
            }

            .card_form {
                width: 100%;
                height: 500px;
                overflow-y: scroll;
            }

            .text-underline {
                text-decoration: underline;
            }

            label.error {
                font-size: 12px;
                color: #F5004F;
            }
        </style>
    @endpush


    <!-- Service Start -->
    <section class="section" id="projects">
        <div class="container">
            <div class="card mt-5">
                <div class="card-header">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{ url('/') }}">Home</a></li>
                            <li class="breadcrumb-item"><a href="{{ url('/permohonanSurat') }}">List Pengajuan</a></li>
                            <li class="breadcrumb-item active"><span>Form Pengajuan</span></li>
                        </ol>
                    </nav>
                </div>
                <div class="card-body">
                    <div class="row justify-content-center mb-5 mt-3">
                        <div class="col-md-8 col-lg-6 text-center">
                            <h6 class="subtitle">Form Pengajuan</h6>
                            <h2 class="title">List Data Surat Pembuatan Pengajuan Permadani</h2>
                        </div>
                    </div>
                    <!-- Gallary -->
                    <div class="row">
                        <div class="col-lg-12">
                            <form action="{{ $action }}" method="post" id="form-submit">
                                <div class="owl-carousel owl-theme">
                                    @foreach ($informasiSebelum as $iSebelum => $item)
                                        <div class="item">
                                            <img class="show_image rounded"
                                                src="{{ asset('upload/informasiSebelum/' . $item->gambar_isebelum) }}"
                                                alt="{{ $item->gambar_isebelum }}" style="border-radius: 10px;">
                                        </div>

                                        @php
                                            $countISebelum = count($informasiSebelum) - 1;
                                        @endphp

                                        @if ($countISebelum == $iSebelum)
                                            <div class="item">
                                                <div class="card">
                                                    <div class="card-header">
                                                        <i class="fas fa-envelope-open-text"></i> Form
                                                        {{ $formSurat->judul_fsurat }}
                                                    </div>
                                                    <div class="card-body card_form">
                                                        <div class="mb-2">
                                                            <span class="text-underline">
                                                                <i class="fas fa-pencil-alt"></i> Diisi apabila ada tanda
                                                                (*)
                                                            </span>
                                                        </div>
                                                        <nav>
                                                            <div class="nav nav-tabs" id="nav-tab" role="tablist">
                                                                <button class="nav-link active" id="nav-biodata-tab"
                                                                    data-bs-toggle="tab" data-bs-target="#nav-biodata"
                                                                    type="button" role="tab"
                                                                    aria-controls="nav-biodata"
                                                                    aria-selected="true">Biodata</button>
                                                                <button class="nav-link" id="nav-dataPemohon-tab"
                                                                    data-bs-toggle="tab" data-bs-target="#nav-dataPemohon"
                                                                    type="button" role="tab"
                                                                    aria-controls="nav-dataPemohon"
                                                                    aria-selected="false">Data-data
                                                                    Pemohon</button>
                                                                <button class="nav-link" id="nav-penutupPemohon-tab"
                                                                    data-bs-toggle="tab"
                                                                    data-bs-target="#nav-penutupPemohon" type="button"
                                                                    role="tab" aria-controls="nav-penutupPemohon"
                                                                    aria-selected="false">Penutup
                                                                    Pemohon</button>
                                                            </div>
                                                        </nav>
                                                        <div class="tab-content" id="nav-tabContent">
                                                            <div class="tab-pane fade show active" id="nav-biodata"
                                                                role="tabpanel" aria-labelledby="nav-biodata-tab">
                                                                <div class="row mt-3">
                                                                    <x-form-template :structurForm="$structureBiodata" />
                                                                </div>
                                                            </div>
                                                            <div class="tab-pane fade" id="nav-dataPemohon" role="tabpanel"
                                                                aria-labelledby="nav-dataPemohon-tab">
                                                                <div class="row mt-3">
                                                                    <x-form-template :structurForm="$structureDataPemohon" />
                                                                </div>
                                                            </div>
                                                            <div class="tab-pane fade" id="nav-penutupPemohon"
                                                                role="tabpanel" aria-labelledby="nav-penutupPemohon-tab">
                                                                <div class="row mt-3">
                                                                    <x-form-template :structurForm="$structurePenutup" />
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            @foreach ($informasiSetelah as $iSetelah => $item)
                                                <div class="item">
                                                    <img class="show_image rounded"
                                                        src="{{ asset('upload/informasiSetelah/' . $item->gambar_isetelah) }}"
                                                        alt="{{ $item->gambar_isetelah }}" style="border-radius: 10px;">
                                                </div>
                                            @endforeach
                                        @endif
                                    @endforeach
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Service End -->
    @push('custom_js')
        <script class="judul_fsurat" data-value="{{ $formSurat->judul_fsurat }}"></script>
        <script class="id_fsurat" data-value="{{ $formSurat->id }}"></script>
        <script class="url_root" data-value="{{ url('/') }}"></script>
        @if (strtolower($formSurat->judul_fsurat) == 'permohonan eksekusi')
            <script src="{{ asset('js/one/permohonanSurat/index.js') }}"></script>
        @elseif (strtolower($formSurat->judul_fsurat) == 'permohonan izin sebagai kuasa insidentil')
            <script src="{{ asset('js/one/permohonanSurat/izinKuasaInsidentil.js') }}"></script>
        @else
            <script src="{{ asset('js/one/permohonanSurat/pembetulanAktaCatatanSipil.js') }}"></script>
        @endif
    @endpush
@endsection
