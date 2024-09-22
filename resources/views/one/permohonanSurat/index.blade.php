@extends('layouts.app.frontend')

@section('title')
    Permohonan Surat
@endsection

@section('content')
    @push('custom_css')
        <style>
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
    <div class="container-fluid service py-5">
        <div class="container py-5">
            <div class="mx-auto text-center wow fadeIn" data-wow-delay="0.1s" style="max-width: 700px;">
                <h4 class="text-primary mb-4 border-bottom border-primary border-2 d-inline-block p-2 title-border-radius">
                    {{ $formSurat->judul_fsurat }}
                </h4>
            </div>
            <div class="row g-5">
                <div class="col-lg-12">
                    <form action="{{ $action }}" method="post" id="form-submit">
                        <div class="owl-carousel owl-theme">
                            @foreach ($informasiSebelum as $iSebelum => $item)
                                <div class="item">
                                    <img class="show_image rounded"
                                        src="{{ asset('upload/informasiSebelum/' . $item->gambar_isebelum) }}"
                                        alt="{{ $item->gambar_isebelum }}">
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
                                                        <i class="fas fa-pencil-alt"></i> Diisi apabila ada tanda (*)
                                                    </span>
                                                </div>
                                                <nav>
                                                    <div class="nav nav-tabs" id="nav-tab" role="tablist">
                                                        <button class="nav-link active" id="nav-biodata-tab"
                                                            data-bs-toggle="tab" data-bs-target="#nav-biodata"
                                                            type="button" role="tab" aria-controls="nav-biodata"
                                                            aria-selected="true">Biodata</button>
                                                        <button class="nav-link" id="nav-dataPemohon-tab"
                                                            data-bs-toggle="tab" data-bs-target="#nav-dataPemohon"
                                                            type="button" role="tab" aria-controls="nav-dataPemohon"
                                                            aria-selected="false">Data-data
                                                            Pemohon</button>
                                                        <button class="nav-link" id="nav-penutupPemohon-tab"
                                                            data-bs-toggle="tab" data-bs-target="#nav-penutupPemohon"
                                                            type="button" role="tab" aria-controls="nav-penutupPemohon"
                                                            aria-selected="false">Penutup
                                                            Pemohon</button>
                                                    </div>
                                                </nav>
                                                <div class="tab-content" id="nav-tabContent">
                                                    <div class="tab-pane fade show active" id="nav-biodata" role="tabpanel"
                                                        aria-labelledby="nav-biodata-tab">
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
                                                    <div class="tab-pane fade" id="nav-penutupPemohon" role="tabpanel"
                                                        aria-labelledby="nav-penutupPemohon-tab">
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
                                                alt="{{ $item->gambar_isetelah }}">
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
    <!-- Service End -->
    @push('custom_js')
        <script class="judul_fsurat" data-value="{{ $formSurat->judul_fsurat }}"></script>
        <script class="id_fsurat" data-value="{{ $formSurat->id }}"></script>
        <script class="url_root" data-value="{{ url('/') }}"></script>
        @if ($formSurat->judul_fsurat == 'Permohonan Eksekusi')
            <script src="{{ asset('js/one/permohonanSurat/index.js') }}"></script>
        @endif
    @endpush
@endsection
