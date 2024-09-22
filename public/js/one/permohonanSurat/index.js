var owl = $('.owl-carousel');
var judul_fsurat = $('.judul_fsurat').data('value');
var id_fsurat = $('.id_fsurat').data('value');
var url_root = $('.url_root').data('value');

$(document).ready(function () {
    $('.datepicker').datepicker({
        format: "dd/mm/yyyy",
        todayButton: true,
        highlight: true,
        autoclose: true,
        orientation: 'bottom'
    });

    owl.owlCarousel({
        items: 1,
        margin: 10,
        nav: true,
        navText: [`
            <button type="button" class="btn btn-primary btn-prev">
                <i class='fas fa-arrow-left'></i> Sebelumnya
            </button>
            `, `
            <button type="button" class="btn btn-primary btn-next">
                Selanjutnya <i class='fas fa-arrow-right'></i>
            </button>
            `]
    })

    const getForm = () => {
        const nik = $('input[name="nik"]').val();
        const nama = $('input[name="nama"]').val();
        const tempat_lahir = $('input[name="tempat_lahir"]').val();
        const tanggal_lahir = $('input[name="tanggal_lahir"]').val();
        const jenis_kelamin = $('select[name="jenis_kelamin"]').val();
        const pekerjaan = $('input[name="pekerjaan"]').val();
        const alamat = $('textarea[name="alamat"]').val();

        const pembanding_terbanding = $('select[name="pembanding_terbanding"]').val();
        const nomor_putusan = $('input[name="nomor_putusan"]').val();
        const tanggal_putusan = $('input[name="tanggal_putusan"]').val();
        const pemohon_termohon_kasasi = $('select[name="pemohon_termohon_kasasi"]').val();
        const nomor_putusan_banding = $('input[name="nomor_putusan_banding"]').val();
        const tanggal_putusan_banding = $('input[name="tanggal_putusan_banding"]').val();

        const tempat_pemohon = $('input[name="tempat_pemohon"]').val();
        const tanggal_pemohon = $('input[name="tanggal_pemohon"]').val();

        return {
            nik,
            nama,
            tempat_lahir,
            tanggal_lahir,
            jenis_kelamin,
            pekerjaan,
            alamat,

            pembanding_terbanding,
            nomor_putusan,
            tanggal_putusan,
            pemohon_termohon_kasasi,
            nomor_putusan_banding,
            tanggal_putusan_banding,

            tempat_pemohon,
            tanggal_pemohon,
        }
    }

    const validationForm = (formData) => {
        let message = [];
        if (!formData.nik) {
            message.push({
                key: 'nik',
                message: 'NIK tidak boleh kosong'
            });
        }
        if (!formData.nama) {
            message.push({
                key: 'nama',
                message: 'Nama tidak boleh kosong'
            });
        }
        if (!formData.tempat_lahir) {
            message.push({
                key: 'tempat_lahir',
                message: 'Tempat lahir tidak boleh kosong'
            });
        }
        if (!formData.tanggal_lahir) {
            message.push({
                key: 'tanggal_lahir',
                message: 'Tanggal lahir tidak boleh kosong'
            });
        }
        if (!formData.jenis_kelamin) {
            message.push({
                key: 'jenis_kelamin',
                message: 'Jenis kelamin tidak boleh kosong'
            });
        }
        if (!formData.pekerjaan) {
            message.push({
                key: 'pekerjaan',
                message: 'Pekerjaan tidak boleh kosong'
            });
        }
        if (!formData.alamat) {
            message.push({
                key: 'alamat',
                message: 'Alamat tidak boleh kosong'
            });
        }

        if (!formData.pembanding_terbanding) {
            message.push({
                key: 'pembanding_terbanding',
                message: 'Pembanding terbanding tidak boleh kosong'
            });
        }
        if (!formData.nomor_putusan) {
            message.push({
                key: 'nomor_putusan',
                message: 'Nomor putusan tidak boleh kosong'
            });
        }
        if (!formData.tanggal_putusan) {
            message.push({
                key: 'tanggal_putusan',
                message: 'Tanggal putusan tidak boleh kosong'
            });
        }
        if (!formData.pemohon_termohon_kasasi) {
            message.push({
                key: 'pemohon_termohon_kasasi',
                message: 'Pemohon termohon kasasi tidak boleh kosong'
            });
        }
        if (!formData.nomor_putusan_banding) {
            message.push({
                key: 'nomor_putusan_banding',
                message: 'Nomor putusan banding tidak boleh kosong'
            });
        }
        if (!formData.tanggal_putusan_banding) {
            message.push({
                key: 'tanggal_putusan_banding',
                message: 'Tanggal putusan banding tidak boleh kosong'
            });
        }

        if (!formData.tempat_pemohon) {
            message.push({
                key: 'tempat_pemohon',
                message: 'Tempat pemohon tidak boleh kosong'
            });
        }
        if (!formData.tanggal_pemohon) {
            message.push({
                key: 'tanggal_pemohon',
                message: 'Tanggal pemohon tidak boleh kosong'
            });
        }
        return message;
    }

    const resetError = () => {
        $('input').removeClass('border border-danger');
        $('select').removeClass('border border-danger');
        $('textarea').removeClass('border border-danger');
        $('.text-danger.error').remove();
    }

    const owlItem = () => {
        const owlItem = $('.owl-item').length - 1;
        const owlCurrent = $('.owl-item.active').index();

        if (owlItem === owlCurrent) {
            $('.btn-next').addClass('btn-finish');
        } else {
            $('.btn-next').removeClass('btn-finish');
        }
    }

    owl.on('changed.owl.carousel', function (event) {
        var currentIndex = event.relatedTarget.current();
        var totalItems = event.relatedTarget.items().length;

        if (currentIndex === totalItems - 1) {
            $('.btn-next').html('Finish <i class="fas fa-paper-plane"></i>');
        } else {
            $('.btn-next').html(`
                Selanjutnya <i class='fas fa-arrow-right'></i>
                `);
        }
    });

    $(document).on('click', '.btn-next', function (e) {
        owlItem();
    });
    $(document).on('click', '.btn-prev', function (e) {
        owlItem();
    });

    $(document).on('click', '.btn-finish', function (e) {
        e.preventDefault();
        const getDataForm = getForm();
        const getValidation = validationForm(getDataForm);
        resetError();

        Swal.fire({
            title: "Konfirmasi",
            text: 'Apakah anda yakin ingin submit seluruh data yang telah diisi?',
            icon: "warning",
            dangerMode: true,
            showCancelButton: true,
            confirmButtonText: "Ya",
            cancelButtonText: "Tidak",
        }).then((result) => {
            if (result.isConfirmed) {
                if (getValidation.length > 0) {
                    getValidation.map((item) => {
                        const errorMessage = `<span class="text-danger error" style="font-size: 12px;">${item.message}</span>`;

                        $(`input[name="${item.key}"]`).addClass('border border-danger').after(errorMessage);
                        $(`select[name="${item.key}"]`).addClass('border border-danger').after(errorMessage);
                        $(`textarea[name="${item.key}"]`).addClass('border border-danger').after(errorMessage);

                        return Swal.fire({
                            icon: "error",
                            title: "Oops...",
                            text: "Periksa kembali form inputan anda, ada inputan yang harus diisi",
                        });
                    });
                } else {
                    $('#form-submit').submit();
                }
            }
        });
    })

    $(document).on('submit', '#form-submit', function (e) {
        e.preventDefault();

        const formSubmit = $('#form-submit')[0];
        const formData = new FormData(formSubmit);

        formData.append('tanggal_lahir', formatDateToDb(formData.get('tanggal_lahir')));
        formData.append('tanggal_putusan', formatDateToDb(formData.get('tanggal_putusan')));
        formData.append('tanggal_putusan_banding', formatDateToDb(formData.get('tanggal_putusan_banding')));
        formData.append('tanggal_putusan_ma', formatDateToDb(formData.get('tanggal_putusan_ma')));
        formData.append('tanggal_aanmaning', formatDateToDb(formData.get('tanggal_aanmaning')));
        formData.append('tanggal_pemohon', formatDateToDb(formData.get('tanggal_pemohon')));
        formData.append('form_surat_id', id_fsurat);

        $.ajax({
            type: "post",
            url: $("#form-submit").attr("action"),
            data: formData,
            dataType: "json",
            contentType: false,
            processData: false,
            beforeSend: function () {
                clearError422();
                $(".btn-next").attr("disabled", true);
                $(".btn-next").html(disableButton);
            },
            success: function (data) {
                const { result } = data;
                Swal.fire({
                    title: "Successfully!",
                    text: data.message,
                    icon: "success"
                });
                window.location.href = `${url_root}/hasilPermohonan?slug=${result}`;
            },
            error: function (jqXHR, exception) {
                $(".btn-next").attr("disabled", false);
                $(".btn-next").html(enableButton);
                if (jqXHR.status === 422) {
                    showErrors422(jqXHR);
                }
            },
            complete: function () {
                $(".btn-next").attr("disabled", false);
                $(".btn-next").html(`
                    Finish <i class="fas fa-paper-plane"></i>
                `);
            },
        });
    })

    $(document).on('change', 'select[name="jenis_benda"]', function () {
        const value = $(this).val();
        if (value === 'Lain-lain') {
            $('.jenis_benda_input').html(`
                <input type="text" class="form-control mt-1" name="jenis_benda_input" placeholder="Masukan jenis benda (tidak bergerak) lainnya..." value="">
            `);
        }
    });

    $(document).on('change', 'select[name="jenis_benda_gerak"]', function () {
        const value = $(this).val();
        if (value === 'Lain-lain') {
            $('.jenis_benda_gerak_input').html(`
                <input type="text" class="form-control mt-1" name="jenis_benda_gerak_input" placeholder="Masukan jenis benda (bergerak) lainnya..." value="">
            `);
        }
    });

    $(document).on('change', 'select[name="dokumen_benda"]', function () {
        const value = $(this).val();
        if (value === 'Lain-lain') {
            $('.dokumen_benda_input').html(`
                <input type="text" class="form-control mt-1" name="dokumen_benda_input" placeholder="Masukan dokumen lainnya..." value="">
            `);
        }
    });

    $(document).on('change', 'select[name="dokumen_benda_gerak"]', function () {
        const value = $(this).val();
        if (value === 'Lain-lain') {
            $('.dokumen_benda_gerak_input').html(`
                <input type="text" class="form-control mt-1" name="dokumen_benda_gerak_input" placeholder="Masukan dokumen lainnya..." value="">
            `);
        }
    });
})