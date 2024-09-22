var urlRoot = $('.url_root').data('value');
var slug = $('.slug').data('value');

function initDatatable() {
    $.ajax({
        url: `${urlRoot}/hasilPermohonan?slug=${slug}`,
        type: "get",
        dataType: "json",
        success: function (result) {
            const { data } = result;
            $('#dataTable').DataTable().destroy();

            datatable = $('#dataTable').DataTable({
                data: data,
                columns: [
                    {
                        data: null, render: function (data, type, row, meta) {
                            return meta.row + 1;
                        }, width: '5%'
                    },
                    { data: 'nik', width: '15%' },
                    { data: 'nama', width: '30%' },
                    { data: 'jenis_surat', width: '20%' },
                    { data: 'action', width: '30%' }
                ],
                autoWidth: true,
                responsive: true,
            });

        }
    })
}
$(document).ready(function () {
    initDatatable();

    var body = $("body");
    // handle btn add data
    body.on("click", ".btn-delete", function (e) {
        e.preventDefault();
        basicDeleteConfirmDatatable({
            urlDelete: $(this).attr("href"),
            data: {},
            text: "Apakah anda yakin ingin menghapus item ini?",
            dataFunction: initDatatable,
            isRenderView: true,
            isDataTable: false,
            isRunToast: false,
        });
    });
})