@extends('layouts.app.frontend')

@section('title')
    List Permohonan Surat Pemohon
@endsection

@section('content')
    @push('custom_css')
        <style>
            #dataTable {
                table-layout: fixed;
                width: 100% !important;
            }
        </style>
    @endpush

    <!-- Service Start -->
    <div class="container-fluid service py-5">
        <div class="container py-5">
            <div class="mx-auto text-center wow fadeIn" data-wow-delay="0.1s" style="max-width: 700px;">
                <h4 class="text-primary mb-4 border-bottom border-primary border-2 d-inline-block p-2 title-border-radius">
                    List Permohonan Surat Pemohon
                </h4>
            </div>
            <div class="row g-5 mt-1">
                <div class="col-lg-12 mx-auto">
                    <div class="card">
                        <div class="card-body">
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
    </div>
    <!-- Service End -->

    @push('custom_js')
        <script class="url_root" data-value="{{ url('/') }}"></script>
        <script class="slug" data-value="{{ $slug }}"></script>
        <script src="{{ asset('js/one/hasilPermohonan/result.js') }}"></script>
    @endpush
@endsection
