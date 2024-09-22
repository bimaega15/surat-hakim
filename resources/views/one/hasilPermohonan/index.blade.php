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
        </style>
    @endpush

    <!-- Service Start -->
    <div class="container-fluid service py-5">
        <div class="container py-5">
            <div class="mx-auto text-center wow fadeIn" data-wow-delay="0.1s" style="max-width: 700px;">
                <h4 class="text-primary mb-4 border-bottom border-primary border-2 d-inline-block p-2 title-border-radius">
                    Hasil Permohonan Surat
                </h4>
            </div>
            <div class="row g-5 mt-1">
                <div class="col-lg-8 mx-auto">
                    <div class="card_area">
                        <form action="{{ url('hasilPermohonan') }}" method="get" id="form-submit">
                            <div class="d-flex">
                                <input type="text" name="slug" class="form-control input_custom"
                                    placeholder="Cari berdasarkan Nama atau NIK">
                                <button type="button" class="btn btn-primary button_search">
                                    <i class="fas fa-search"></i> Cari
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Service End -->

    @push('custom_js')
        <script class="url_root" data-value="{{ url('/') }}"></script>
        <script src="{{ asset('js/one/hasilPermohonan/index.js') }}"></script>
    @endpush
@endsection
