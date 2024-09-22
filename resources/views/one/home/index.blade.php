@extends('layouts.app.frontend')

@section('title')
    Home Page
@endsection

@section('content')
    <div class="container-fluid py-5 about bg-light">
        <div class="container py-5">
            <div class="row g-5 align-items-center">
                <div class="col-lg-5 wow fadeIn" data-wow-delay="0.1s">
                    <div class="video border">
                        <button type="button" class="btn btn-play" data-bs-toggle="modal"
                            data-src="https://www.youtube.com/embed/DWRcNpR6Kdc" data-bs-target="#videoModal">
                            <span></span>
                        </button>
                    </div>
                </div>
                <div class="col-lg-7 wow fadeIn card_area" data-wow-delay="0.3s">
                    <h4
                        class="text-primary mb-4 border-bottom border-primary border-2 d-inline-block p-2 title-border-radius">
                        Daftar Permohonan
                    </h4>
                    <div class="row">
                        @foreach ($formSurat as $item)
                            @php
                                $slug = str_replace(' ', '-', strtolower($item->judul_fsurat));
                            @endphp
                            <div class="col-lg-3 mb-3">
                                <a href="{{ url('permohonanSurat?slug=' . $slug) }}" class="card p-2 card_surat">
                                    <img src="{{ asset('upload/surat/' . $item->icon_fsurat) }}"
                                        alt="{{ $item->icon_fsurat }}" class="icon_surat shadow" style="margin: 0 auto;">
                                    <p class="title_surat">
                                        {{ $item->judul_fsurat }}
                                    </p>
                                </a>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
