var owl = $('.owl-carousel');
var judul_fsurat = $('.judul_fsurat').data('value');
var id_fsurat = $('.id_fsurat').data('value');
var url_root = $('.url_root').data('value');
var indexInput = 0;

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

        const pemohon = $('select[name="pemohon"]').val();
        const akta = $('select[name="akta"]').val();
        const no_akta = $('input[name="no_akta"]').val();
        const kabupaten = $('input[name="kabupaten"]').val();
        const ket_salah = $('select[name="ket_salah"]').val();
        const data_salah = $('input[name="data_salah"]').val();
        const ket_benar = $('select[name="ket_benar"]').val();
        const data_benar = $('input[name="data_benar"]').val();
        const pilihan_kepentingan = $('select[name="pilihan_kepentingan"]').val();

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

            pemohon,
            akta,
            no_akta,
            kabupaten,
            ket_salah,
            data_salah,
            ket_benar,
            data_benar,
            pilihan_kepentingan,

            tempat_pemohon,
            tanggal_pemohon
        }
    }

    const getLoadIndex = () => {
        const namaDokumen = $('.nama_dokumen_pendukung').map(function () {
            return $(this).data('index');
        }).get();
        const lastIndex = Math.max(...namaDokumen);
        const nextIndex = lastIndex + 1;
        indexInput = nextIndex;
        return lastIndex;
    }
    getLoadIndex();

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
        if (!formData.pemohon) {
            message.push({
                key: 'pemohon',
                message: 'Pemohon tidak boleh kosong'
            });
        }
        if (!formData.akta) {
            message.push({
                key: 'akta',
                message: 'Akta tidak boleh kosong'
            });
        }
        if (!formData.no_akta) {
            message.push({
                key: 'no_akta',
                message: 'Nomor Akta tidak boleh kosong'
            });
        }
        if (!formData.kabupaten) {
            message.push({
                key: 'kabupaten',
                message: 'Kabupaten tidak boleh kosong'
            });
        }
        if (!formData.ket_salah) {
            message.push({
                key: 'ket_salah',
                message: 'Jenis data yang salah tidak boleh kosong'
            });
        }
        if (!formData.data_salah) {
            message.push({
                key: 'data_salah',
                message: 'Penulisan data yang salah tidak boleh kosong'
            });
        }
        if (!formData.ket_benar) {
            message.push({
                key: 'ket_benar',
                message: 'Jenis data yang benar tidak boleh kosong'
            });
        }
        if (!formData.data_benar) {
            message.push({
                key: 'data_benar',
                message: 'Data yang benar tidak boleh kosong'
            });
        }

        if (!formData.pilihan_kepentingan) {
            message.push({
                key: 'pilihan_kepentingan',
                message: 'Pilihan kepentingan tidak boleh kosong'
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

        let dokumen_pendukung = [];
        $('.area_array_input').each(function () {
            $(this).find('.nama_dokumen_pendukung').each(function (index) {
                let dokumen = {
                    nama_dokumen_pendukung: $(this).val(),
                    tanggal_dokumen_pendukung: formatDateToDb($(this).closest('.row.mb-2').find('.tanggal_dokumen_pendukung').val()),
                    yang_mengeluarkan_dokumen: $(this).closest('.row.mb-2').find('.yang_mengeluarkan_dokumen').val()
                };

                dokumen_pendukung.push(dokumen);
            });
        });

        formData.append('tanggal_lahir', formatDateToDb(formData.get('tanggal_lahir')));
        formData.append('tanggal_pemohon', formatDateToDb(formData.get('tanggal_pemohon')));
        formData.append('tanggal_surat', formatDateToDbSave());
        formData.append('dokumen_pendukung', JSON.stringify(dokumen_pendukung));
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
        if (value === 'Lain-lain') {
            $('.agama_input').html(`
                <input type="text" class="form-control mt-1" name="agama_input" placeholder="Masukan agama lainnya..." value="">
            `);
        }
    });

    $(document).on('click', '.btn-add-array_input', function () {
        indexInput++;
        const dataJson = [
            {
                type: 'text',
                label: 'Nama Dokumen Pendukung',
                name: 'nama_dokumen_pendukung',
                placeholder: 'Nama Dokumen Pendukung...',
                value: '',
                col: 'col-lg-5',
                'data-index': indexInput,
                class: 'nama_dokumen_pendukung',
            },
            {
                type: 'text',
                label: 'Tanggal Dokumen',
                name: 'tanggal_dokumen_pendukung',
                placeholder: 'Tanggal Dokumen...',
                value: '',
                col: 'col-lg-5',
                class: 'tanggal_dokumen_pendukung datepicker',
                'data-index': indexInput,
            },
            {
                type: 'button_remove_array_input',
                col: 'col-lg-2',
                title: '<i class="fas fa-trash"></i>',
                class: 'btn btn-danger btn-sm button_remove_array_input',
                style: 'margin-top: 30px;',
                'data-index': indexInput,
            },
            {
                type: 'text',
                label: 'Yang Mengeluarkan Dokumen',
                name: 'yang_mengeluarkan_dokumen',
                placeholder: 'Yang Mengeluarkan Dokumen...',
                value: '',
                col: 'col-lg-12',
                'data-index': indexInput,
                class: 'yang_mengeluarkan_dokumen',
            },
        ];

        $.ajax({
            type: 'get',
            url: `${url_root}/permohonanSurat/createDocument`,
            dataType: 'text',
            data: {
                'form': dataJson,
                'indexInput': indexInput
            },
            beforeSend: function () {
                $('.btn-add-array_input').attr('disabled', true);
                $('.btn-add-array_input').html(disableButton);
            },
            success: function (data) {
                $('.form_array_input').append(data);
                $('.datepicker').datepicker({
                    format: "dd/mm/yyyy",
                    todayButton: true,
                    highlight: true,
                    autoclose: true,
                    orientation: 'bottom'
                });
            },
            complete: function () {
                $('.btn-add-array_input').attr('disabled', false);
                $('.btn-add-array_input').html(`
                    <span>
                        <i class="fas fa-plus"></i> Tambah data
                    </span>
                    `);
            }
        })
    })

    $(document).on('click', '.button_remove_array_input', function () {
        const index = $(this).data('index');
        $('.nama_dokumen_pendukung[data-index="' + index + '"]').closest('.form-group').remove();
        $('.tanggal_dokumen_pendukung[data-index="' + index + '"]').closest('.form-group').remove();
        $('.yang_mengeluarkan_dokumen[data-index="' + index + '"]').closest('.form-group').remove();
        $('.button_remove_array_input[data-index="' + index + '"]').closest('.col-lg-2').remove();
    })
})