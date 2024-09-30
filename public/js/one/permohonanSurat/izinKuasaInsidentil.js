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
        const agama = $('select[name="agama"]').val();
        const jenis_kelamin = $('select[name="jenis_kelamin"]').val();
        const pekerjaan = $('input[name="pekerjaan"]').val();
        const alamat = $('textarea[name="alamat"]').val();

        const nama_pihak = $('input[name="nama_pihak"]').val();
        const selaku_pihak = $('select[name="selaku_pihak"]').val();
        const nomor_perkara = $('input[name="nomor_perkara"]').val();
        const hubungan_dengan_pihak = $('select[name="hubungan_dengan_pihak"]').val();
        const surat_desa = $('input[name="surat_desa"]').val();
        const nomor_desa = $('input[name="nomor_desa"]').val();
        const tanggal_desa = $('input[name="tanggal_desa"]').val();
        const alasan_pihak = $('input[name="alasan_pihak"]').val();

        const tempat_pemohon = $('input[name="tempat_pemohon"]').val();
        const tanggal_pemohon = $('input[name="tanggal_pemohon"]').val();

        return {
            nik,
            nama,
            tempat_lahir,
            tanggal_lahir,
            agama,
            jenis_kelamin,
            pekerjaan,
            alamat,

            nama_pihak,
            selaku_pihak,
            nomor_perkara,
            hubungan_dengan_pihak,
            surat_desa,
            nomor_desa,
            tanggal_desa,
            alasan_pihak,

            tempat_pemohon,
            tanggal_pemohon
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
        if (!formData.agama) {
            message.push({
                key: 'agama',
                message: 'Agama tidak boleh kosong'
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
        if (!formData.nama_pihak) {
            message.push({
                key: 'nama_pihak',
                message: 'Nama pihak tidak boleh kosong'
            });
        }
        if (!formData.selaku_pihak) {
            message.push({
                key: 'selaku_pihak',
                message: 'Kedudukan pihak tidak boleh kosong'
            });
        }
        if (!formData.nomor_perkara) {
            message.push({
                key: 'nomor_perkara',
                message: 'Nomor perkara tidak boleh kosong'
            });
        }
        if (!formData.hubungan_dengan_pihak) {
            message.push({
                key: 'hubungan_dengan_pihak',
                message: 'Hubungan pihak tidak boleh kosong'
            });
        }
        if (!formData.surat_desa) {
            message.push({
                key: 'surat_desa',
                message: 'Desa/Kelurahan tidak boleh kosong'
            });
        }
        if (!formData.nomor_desa) {
            message.push({
                key: 'nomor_desa',
                message: 'Nomor surat keterangan tidak boleh kosong'
            });
        }
        if (!formData.tanggal_desa) {
            message.push({
                key: 'tanggal_desa',
                message: 'Tanggal surat keterangan tidak boleh kosong'
            });
        }
        if (!formData.alasan_pihak) {
            message.push({
                key: 'alasan_pihak',
                message: 'Alasan pihak tidak boleh kosong'
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
        formData.append('tanggal_pemohon', formatDateToDb(formData.get('tanggal_pemohon')));
        formData.append('tanggal_desa', formatDateToDb(formData.get('tanggal_desa')));
        formData.append('tanggal_surat', formatDateToDbSave());
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

    $(document).on('change', 'select[name="agama"]', function () {
        const value = $(this).val();
        console.log('check value ', value);
        if (value === 'Lain-lain') {
            $('.agama_input').html(`
                <input type="text" class="form-control mt-1" name="agama_input" placeholder="Masukan agama lainnya..." value="">
            `);
        }
    });
})