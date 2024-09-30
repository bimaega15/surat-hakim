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
});
