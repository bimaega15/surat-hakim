@extends('layouts.app.index')

@section('title')
    Management Permissions
@endsection

@section('content')
    <div class="container-xxl flex-grow-1 container-p-y">
        {{ Breadcrumbs::render('permissions') }}
        <!-- Basic Bootstrap Table -->
        <div class="card">
            <h5 class="card-header">
                <div class="d-flex flex-wrap justify-content-between">
                    <div>
                        Data Permissions
                    </div>
                    <div>
                        <x-button-main title="Akses" className="btn-access" typeModal="largeModal"
                            urlCreate="{{ url('setting/permissions/accessRole') }}" icon='<i class="bx bx-user-plus me-sm-1"></i>' color="btn-info" />

                        <x-button-main title="Tambah" className="btn-add" typeModal="largeModal"
                            urlCreate="{{ url('setting/permissions/create') }}" icon='<i class="bx bx-plus me-sm-1"></i>' />

                        <x-button-main title="Refresh" className="btn-synchrone" typeModal="largeModal"
                            urlCreate="{{ url('setting/permissions/refresh') }}"
                            icon='<i class="bx bx-refresh me-sm-1"></i>'
                            color="btn-success" />
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
        <script class="url_rendermenu" data-url="{{ route('permissions.index') }}"></script>
        <script class="url_sortandnested" data-url="{{ route('permissions.index') }}"></script>
        <script src="{{ asset('js/setting/permissions/index.js') }}"></script>
    @endpush
@endsection
