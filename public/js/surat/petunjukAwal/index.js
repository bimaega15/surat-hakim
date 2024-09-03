// "use strict";
var urlRoot = $('.url_root').data('url');
var formSuratId = $('.formSuratId').data('value');
var datatable;
var myModal;

$(document).ready(function () {
    function initDatatable() {
        datatable = basicDatatable({
            tableId: $("#dataTable"),
            ajaxUrl: `${urlRoot}/surat/petunjukAwal?formSuratId=${formSuratId}`,
            columns: [
                {
                    data: null,
                    orderable: false,
                    searchable: false,
                    className: "text-center",
                },
                {
                    data: "judul_isebelum",
                    name: "judul_isebelum",
                    searchable: true,
                },
                {
                    data: "deskripsi_isebelum",
                    name: "deskripsi_isebelum",
                    searchable: true,
                },
                {
                    data: "gambar_isebelum",
                    name: "gambar_isebelum",
                    searchable: true,
                },
                {
                    data: "action",
                    name: "action",
                    searchable: false,
                    orderable: false,
                },
            ],
            dataAjaxUrl: {},
        });
    }
    initDatatable();

    var body = $("body");
    // handle btn add data
    body.on("click", ".btn-add", function () {
        showModal({
            url: $(this).data("urlcreate"),
            modalId: $(this).data("typemodal"),
            title: "Form Petunjuk Awal",
            type: "get",
        });
    });

    body.on("click", ".btn-delete", function (e) {
        e.preventDefault();
        basicDeleteConfirmDatatable({
            urlDelete: $(this).data("url"),
            data: {},
            text: "Apakah anda yakin ingin menghapus item ini?",
        });
    });

    body.on("click", ".btn-edit", function (e) {
        e.preventDefault();
        showModal({
            url: $(this).data("urlcreate"),
            modalId: $(this).data("typemodal"),
            title: "Form Petunjuk Awal",
            type: "get",
        });
    });
});
