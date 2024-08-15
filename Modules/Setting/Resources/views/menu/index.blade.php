@extends('layouts.app.index')

@section('title')
    Management Menu
@endsection

@section('content')
    <div class="container-xxl flex-grow-1 container-p-y">
        {{ Breadcrumbs::render('menu') }}
        <!-- Basic Bootstrap Table -->
        <div class="card">
            <h5 class="card-header">
                <div class="d-flex flex-wrap justify-content-between">
                    <div>
                        Data Management Menu
                    </div>
                    <div>
                        <x-button-main title="Tambah" className="btn-add" typeModal="largeModal"
                            urlCreate="{{ url('setting/menu/create') }}" />
                    </div>
                </div>
            </h5>
            <div class="card-body">
                <div id="output_tree"></div>
            </div>
        </div>
        <!--/ Basic Bootstrap Table -->
    </div>

    @push('custom_js')
        <script class="url_rendermenu" data-url="{{ route('menu.index') }}"></script>
        <script class="url_sortandnested" data-url="{{ route('menu.index') }}"></script>
        <script src="{{ asset('js/setting/menu/index.js') }}"></script>
    @endpush
@endsection
