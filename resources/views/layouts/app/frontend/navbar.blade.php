<div class="container-fluid border-bottom bg-light wow fadeIn" data-wow-delay="0.1s">
    <div class="container topbar bg-primary d-none d-lg-block py-2" style="border-radius: 0 40px">
        <div class="d-flex justify-content-between">
            <div class="top-info ps-2">
                <small class="me-3"><i class="fas fa-map-marker-alt me-2 text-secondary"></i> <a href="#"
                        class="text-white">{{ $settingApp->alamat_pengaturan }}</a></small>
                <small class="me-3"><i class="fas fa-envelope me-2 text-secondary"></i><a href="mailto:{{ $settingApp->email_pengaturan }}"
                        class="text-white">{{ $settingApp->email_pengaturan }}</a></small>
            </div>
            <div class="top-link pe-2">
                <a href="" class="btn btn-light btn-sm-square rounded-circle"><i
                        class="fab fa-facebook-f text-secondary"></i></a>
                <a href="" class="btn btn-light btn-sm-square rounded-circle"><i
                        class="fab fa-twitter text-secondary"></i></a>
                <a href="" class="btn btn-light btn-sm-square rounded-circle"><i
                        class="fab fa-instagram text-secondary"></i></a>
                <a href="" class="btn btn-light btn-sm-square rounded-circle me-0"><i
                        class="fab fa-linkedin-in text-secondary"></i></a>
            </div>
        </div>
    </div>
    <div class="container px-0">
        <nav class="navbar navbar-light navbar-expand-xl py-3">
            <a href="{{ url('/') }}" class="navbar-brand">
                <h1 class="text-primary display-6">
                    <img src="{{ asset('upload/setting/' . $settingApp->logoaplikasi_pengaturan) }}"
                        alt="{{ $settingApp->logoaplikasi_pengaturan }}" style="width: 80px;">
                </h1>
            </a>
            <button class="navbar-toggler py-2 px-3" type="button" data-bs-toggle="collapse"
                data-bs-target="#navbarCollapse">
                <span class="fa fa-bars text-primary"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarCollapse">
                <div class="navbar-nav mx-auto">
                    <a href="{{ url('/') }}" class="nav-item nav-link {{ request()->is('/') ? 'active' : '' }}">Home</a>
                    <a href="{{ url('/hasil') }}" class="nav-item nav-link {{ request()->is('/hasil') ? 'active' : '' }}">Hasil Permohonan</a>
                </div>
                <div class="d-flex me-4">
                    <div id="phone-tada" class="d-flex align-items-center justify-content-center">
                        <a href="" class="position-relative wow tada" data-wow-delay=".9s">
                            <i class="fa fa-phone-alt text-primary fa-2x me-4"></i>
                            <div class="position-absolute" style="top: -7px; left: 20px;">
                                <span><i class="fa fa-comment-dots text-secondary"></i></span>
                            </div>
                        </a>
                    </div>
                    <div class="d-flex flex-column pe-3">
                        <span class="text-primary">Jika ada pertanyaan ?</span>
                        <a href="tel:{{ $settingApp->notelepon_pengaturan }}">
                            <span class="text-secondary">Free:
                                {{ $settingApp->notelepon_pengaturan }}
                            </span>
                        </a>
                    </div>
                </div>
            </div>
        </nav>
    </div>
</div>
