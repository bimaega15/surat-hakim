@extends('layouts.app.frontend')

@section('title')
    Halaman Home
@endsection

@section('content')
    @php
        $settingApp = UtilsHelp::settingApp();
    @endphp
    <section class="hero-agency" id="home">
        <div class="container">
            <div class="row">
                <div class="col-lg-6">
                    <div class="hero-title-badge mb-3"><span class="text-primary">Aplikasi Permadani </span> Untuk
                        Masyarakat
                    </div>
                    <h1 class="hero-title fw-bold mb-4">Layanan Digital Form Pengajuan Permadani</h1>
                    <p class="text-muted mb-5 fs-18">
                        Aplikasi Permadani memudahkan masyarakat mengajukan permintaan surat permadani tanpa perlu
                        datang ke kantor desa.
                    </p>
                    <div class="d-flex align-items-center mb-4 mb-lg-0">
                        <a href="{{ url('permohonanSurat') }}" class="btn btn-gradient-success rounded-pill me-4">Buat
                            Pengajuan<i class="mdi mdi-chevron-right ms-1"></i></a>
                        <a href="{{ asset('upload/settingVideo/' . $settingApp->video_pengaturan) }}"
                            class="text-secondary d-flex align-items-center" data-bs-toggle="modal"
                            data-bs-target="#watchvideomodal">
                            Lihat Video <i class="mdi mdi-motion-play-outline h1 mb-0 ms-2"></i>
                        </a>

                        <div class="modal fade bd-example-modal-lg" id="watchvideomodal" data-bs-keyboard="false"
                            tabindex="-1" aria-hidden="true">
                            <div class="modal-dialog modal-dialog-centered modal-dialog modal-lg">
                                <div class="modal-content video-modal">
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                        aria-label="Close"></button>
                                    <video id="VisaChipCardVideo" class="w-100" controls>
                                        <source src="{{ asset('upload/settingVideo/' . $settingApp->video_pengaturan) }}"
                                            type="video/mp4" />
                                        <!--Browser does not support <video> tag -->
                                    </video>
                                </div>
                            </div>
                        </div>
                        <!-- Modal -->
                    </div>
                </div>
                <div class="col-lg-6">
                    <img src="{{ asset('template/Dojek_v1.0.0/HTML') }}/images/agency/hero-img.png" alt=""
                        class="img-fluid" />
                </div>
            </div>
        </div>
    </section>
@endsection
