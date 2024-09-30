<nav class="navbar navbar-expand-lg fixed-top navbar-custom sticky-dark" id="navbar-sticky">
    <div class="container">
        <!-- LOGO -->
        <a class="logo text-uppercase" href="{{ url('/') }}">
            <img src="{{ asset('upload/setting/' . $settingApp->logoaplikasi_pengaturan) }}"
                alt="{{ $settingApp->logoaplikasi_pengaturan }}" style="height: 80px;" />
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse"
            aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
            <i class="mdi mdi-menu"></i>
        </button>
        <div class="collapse navbar-collapse" id="navbarCollapse">
            <ul class="navbar-nav ms-auto navbar-center" id="mySidenav">
                <li class="nav-item">
                    <a href="{{ url('/') }}" class="nav-link {{ request()->is('/') ? 'active' : '' }}">Home</a>
                </li>
                <li class="nav-item">
                    <a href="{{ url('/permohonanSurat') }}" class="nav-link {{ request()->is('permohonanSurat') ? 'active' : '' }}">Form Pengajuan</a>
                </li>
                <li class="nav-item">
                    <a href="{{ url('/hasilPermohonan') }}" class="nav-link {{ request()->is('hasilPermohonan') ? 'active' : '' }}">Cari Data</a>
                </li>
                <li class="nav-item">
                    <a href="{{ url('/login') }}" class="nav-link {{ request()->is('/login') ? 'active' : '' }}">Login</a>
                </li>

            </ul>
        </div>
    </div>
</nav>
