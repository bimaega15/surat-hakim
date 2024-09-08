// "use strict";
var urlRoot = $('.url_root').data('url');
var datatable;
var myModal;

$(document).ready(function () {
    function initDatatable() {
        datatable = basicDatatable({
            tableId: $("#dataTable"),
            ajaxUrl: `${urlRoot}/surat/listSurat`,
            columns: [
                {
                    data: null,
                    orderable: false,
                    searchable: false,
                    className: "text-center",
                },
                {
                    data: "judul_fsurat",
                    name: "judul_fsurat",
                    searchable: true,
                },
                {
                    data: "deskripsi_fsurat",
                    name: "deskripsi_fsurat",
                    searchable: true,
                },
                {
                    data: "icon_fsurat",
                    name: "icon_fsurat",
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
    body.on("click", ".btn-delete", function (e) {
        e.preventDefault();
        basicDeleteConfirmDatatable({
            urlDelete: $(this).data("url"),
            data: {},
            text: "Apakah anda yakin ingin menghapus item ini?",
        });
    });
});

