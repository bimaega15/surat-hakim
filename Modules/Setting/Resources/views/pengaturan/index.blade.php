@extends('layouts.app.index')

@section('title')
    Halaman Pengaturan
@endsection

@section('content')
    <div class="container-xxl flex-grow-1 container-p-y">
        {{ Breadcrumbs::render('pengaturan') }}

        <!-- Basic Bootstrap Table -->
        <div class="card">
            <h5 class="card-header">
                <div class="d-flex flex-wrap justify-content-between">
                    <div>
                        Pengaturan Aplikasi
                    </div>
                </div>
            </h5>
            <div class="card-body">
                <div id="output"></div>
                <div class="w-100 text-center loading d-none">
                    <div class="spinner-border" role="status">
                        <span class="visually-hidden">Loading...</span>
                    </div> <br />
                    <strong>Loading...</strong>
                </div>
            </div>
        </div>
        <!--/ Basic Bootstrap Table -->
    </div>

    @push('custom_js')
        <script class="baseurl" data-value="{{ url('/') }}"></script>
        <script src="{{ asset('js/setting/pengaturan/index.js') }}"></script>
    @endpush
@endsection
