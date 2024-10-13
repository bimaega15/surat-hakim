var urlRoot = $(".url_root").data("value");
var body = $("body");
var datatable;

$(document).ready(function () {
    function initDatatable() {
        datatable = basicDatatable({
            tableId: $("#dataTable"),
            ajaxUrl: `${urlRoot}/dashboard/permintaanSurat`,
            columns: [
                {
                    data: null,
                    orderable: false,
                    searchable: false,
                    className: "text-center",
                },
                {
                    data: "nik_permintaan_surat",
                    name: "nik_permintaan_surat",
                    searchable: true,
                },
                {
                    data: "nama_permintaan_surat",
                    name: "nama_permintaan_surat",
                    searchable: true,
                },
                {
                    data: "judul_fsurat",
                    name: "judul_fsurat",
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
});
