var jsonDataDetail = $(".data_detail").data("value");
var tablePembelian;
var jsonDataPayment = $(".data_payment").data("value");
var body = $("body");
$(document).ready(function () {

    // tabel pembelian
    tablePembelian = $("#dataTablePembelian").DataTable();

    function formatPembelian(id) {
        const getFindData = jsonDataDetail.penjualan;
        const findData = getFindData.find((item) => item.id == id);

        const penjualan_product = findData.penjualan_product;
        const penjualan_pembayaran = findData.penjualan_pembayaran;
        const searchPayment = jsonDataPayment.find((item) => item.id == id);

        console.log("get search payment", searchPayment);
        let output = "";
        output = `
        <div class="table-responsive text-nowrap px-3">
            <table class="table">
                <thead>
                    <tr>
                        <th>Nama Barang</th>
                        <th>Harga</th>
                        <th>Qty</th>
                        <th>Sub total</th>
                    </tr>
                </thead>
                <tbody class="table-border-bottom-0">`;
        penjualan_product.map((v) => {
            output += `
                    <tr>
                        <td>${v.barang.nama_barang}</td>
                        <td>${formatUang(v.barang.hargajual_barang)}</td>
                        <td>${formatUang(v.jumlah_penjualanproduct)}</td>
                        <td>${formatUang(v.subtotal_penjualanproduct)}</td>
                    </tr>
                    `;
        });

        output += `</tbody>
                <tfoot>
                    <tr>
                        <td colspan="2"></td>
                        <td><strong>Total:</strong></td>
                        <td colspan="1" class="text-end">
                            <strong>${formatUang(
            findData.total_penjualan
        )}</strong>
                        </td>
                    </tr>`;
        penjualan_pembayaran.map((v) => {
            output += `
                        <tr>
                            <td colspan="2"></td>
                            <td><strong>${v.kategori_pembayaran.nama_kpembayaran
                }</strong></td>
                            <td colspan="1" class="text-end">
                                ${formatUang(v.bayar_ppembayaran)}
                            </td>
                        </tr>
                        `;
        });

        if (searchPayment.status_transaksi) {
            output += `
                    <tr>
                        <td colspan="2"></td>
                        <td><strong>Kembalian:</strong></td>
                        <td colspan="1" class="text-end">
                            ${formatUang(searchPayment.kembalian)}
                        </td>
                    </tr>`;
        }

        if (!searchPayment.status_transaksi) {
            output += `
                    <tr>
                        <td colspan="2"></td>
                        <td><strong>Hutang:</strong></td>
                        <td colspan="1" class="text-end">
                            ${formatUang(searchPayment.hutang)}
                        </td>
                    </tr>`;
        }

        output += `
                </tfoot>
            </table>
        </div>
            `;

        return output;
    }

    body.off("click", ".detail-pembelian");
    body.on("click", ".detail-pembelian", function (e) {
        e.preventDefault();
        const show = $(this).data("show");
        if (show === 1) {
            $(this).data("show", 0);
            $(this).html('<i class="fa-solid fa-eye-slash"></i>');
        } else {
            $(this).data("show", 1);
            $(this).html('<i class="fa-solid fa-eye"></i>');
        }
    });

    body.off("click", "td a.detail-pembelian");
    $("#dataTablePembelian tbody").on(
        "click",
        "td a.detail-pembelian",
        function () {
            var tr = $(this).closest("tr");
            var row = tablePembelian.row(tr);
            var id = $(this).data("id");

            if (row.child.isShown()) {
                // This row is already open - close it
                row.child.hide();
                tr.removeClass("shown");
            } else {
                // Open this row
                row.child(formatPembelian(id)).show();
                tr.addClass("shown");
            }
        }
    );
});
