@extends('layouts.app.frontend')

@section('title')
    List Permohonan Surat
@endsection

@section('content')
    @push('custom_css')
        <style>
            .img-contain {
                height: 150px;
                object-fit: contain;
                border-radius: 10px;
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
                            <li class="breadcrumb-item active"><span>List Pengajuan</span></li>
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

                    <div class="row justify-content-center">
                        @foreach ($dataFormSurat as $item)
                            @php
                                $slug = str_replace(' ', '-', strtolower($item->judul_fsurat));
                            @endphp
                            <div class="col-md-6 col-xl-4">
                                <a href="{{ url('permohonanSurat?slug=' . $slug) }}" class="text-dark">
                                    <div class="card item-box rounded mt-4 overflow-hidden" style="min-height: 300px;">
                                        <div class="card-body pt-4 d-flex align-items-center flex-column justify-content-center">
                                            <div class="position-relative">
                                                <div class="text-center">
                                                    <img class="item-container img-fluid img-contain"
                                                        src="{{ asset('upload/surat/' . $item->icon_fsurat) }}"
                                                        alt="{{ $item->icon_fsurat }}" />
                                                </div>
                                                <div class="item-mask mfp-image"
                                                    data-src="{{ asset('upload/surat/' . $item->icon_fsurat) }}"
                                                    data-gallery="myGal">
                                                </div>
                                            </div>
                                            <h5 class="fs-18 mb-1 mt-3">{{ $item->judul_fsurat }}</h5>
                                            <p class="text-muted mb-0">{{ $item->deskripsi_fsurat }}</p>
                                        </div>
                                    </div>
                                </a>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Service End -->
@endsection
