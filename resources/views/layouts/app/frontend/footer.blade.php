<section class="footer bg-light">
    <div class="container">
        <div class="row">
            <div class="col-lg-3 text-center text-lg-start">
                <div class="footer-logo mb-4">
                    <a href="{{ url('/') }}">
                        <img src="{{ asset('upload/setting/' . $settingApp->logoaplikasi_pengaturan) }}"
                            alt="{{ $settingApp->logoaplikasi_pengaturan }}" style="height: 70px;" />
                    </a>
                </div>
            </div>
            <div class="col-lg-9">
                <div class="d-flex justify-content-end align-items-center">
                    <a href="tel:{{ $settingApp->notelepon_pengaturan }}"
                        class="me-1">{{ $settingApp->notelepon_pengaturan }}</a>
                    <a href="mailto:{{ $settingApp->email_pengaturan }}"
                        class="text-muted">{{ $settingApp->email_pengaturan }}</a>
                </div>
            </div>
        </div>
    </div>
</section>
