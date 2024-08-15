<?php

namespace Modules\Report\Http\Controllers;

use App\Http\Helpers\UtilsHelper;
use App\Models\Pembelian;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use DataTables;
use Illuminate\Support\Facades\Config;

class PeriodePembelianController extends Controller
{
    private $datastatis;
    public function __construct()
    {
        $this->datastatis = Config::get('datastatis');
    }
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $dari_tanggal = $request->input('dari_tanggal');
            $sampai_tanggal = $request->input('sampai_tanggal');
            $tipe_pembelian = $request->input('tipe_pembelian');

            $getPembelian = new pembelian();
            $dataPembelian = $getPembelian->getReportpembelian();
            if ($dari_tanggal != null) {
                $dataPembelian = $dataPembelian->whereDate('pembelian.created_at', '>=', $dari_tanggal);
            }
            if ($sampai_tanggal != null) {
                $dataPembelian = $dataPembelian->whereDate('pembelian.updated_at', '<=', $sampai_tanggal);
            }
            if ($tipe_pembelian != null) {
                $dataPembelian = $dataPembelian->where('pembelian.tipe_pembelian', '=', $tipe_pembelian);
            }

            return DataTables::eloquent($dataPembelian)
                ->addColumn('transaksi_pembelian', function ($row) {
                    return UtilsHelper::tanggalBulanTahunKonversi($row->transaksi_pembelian);
                })
                ->addColumn('total_pembelian', function ($row) {
                    $bayarPembelian = $row->bayar_pembelian;
                    $kembalianPembelian = $row->kembalian_pembelian;
                    $calculate = $bayarPembelian - $kembalianPembelian;
                    return UtilsHelper::formatUang($calculate);
                })
                ->rawColumns(['transaksi_pembelian', 'total_pembelian'])
                ->toJson();;
        }

        $dari_tanggal = date('d/m/Y');
        $sampai_tanggal = date('d/m/Y');
        $array_tipe_pembayaran = [];
        foreach ($this->datastatis['tipe_pembayaran'] as $key => $item) {
            $array_tipe_pembayaran[] = [
                'label' => $item,
                'id' => $key
            ];
        }
        $data = [
            'dari_tanggal' => $dari_tanggal,
            'sampai_tanggal' => $sampai_tanggal,
            'array_tipe_pembayaran' => $array_tipe_pembayaran,
        ];
        return view('report::periodePembelian.index', $data);
    }
}
