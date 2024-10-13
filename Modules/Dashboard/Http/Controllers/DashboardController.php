<?php

namespace Modules\Dashboard\Http\Controllers;

use App\Models\FormSurat;
use App\Models\PermintaanSurat;
use Illuminate\Contracts\Support\Renderable;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\DB;
use DataTables;

class DashboardController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    public function index()
    {
        $formSurat = FormSurat::all();
        $dataGroup = PermintaanSurat::select('form_surat_id', DB::raw('count(*) as total'))
            ->groupBy('form_surat_id')
            ->get();
        return view('dashboard::index', [
            'formSurat' => $formSurat,
            'dataGroup' => $dataGroup,
        ]);
    }

    public function permintaanSurat()
    {
        $permintaanSurat = PermintaanSurat::with('formSurat')->orderBy('updated_at', 'desc')->get();
        return DataTables::of($permintaanSurat)
            ->addColumn('nama_permintaan_surat', function ($row) {
                $output = explode('|', $row->users_permintaan_surat);
                return $output[0];
            })
            ->addColumn('nik_permintaan_surat', function ($row) {
                $output = explode('|', $row->users_permintaan_surat);
                return $output[1];
            })
            ->addColumn('judul_fsurat', function ($row) {
                $output = $row->formSurat->judul_fsurat;
                return $output;
            })
            ->addColumn('action', function ($row) {
                $output = '
                <a target="_blank" href="' . url('hasilPermohonan/cetakPdf?id=' . $row->id) . '" class="btn btn-danger">
                    <i class="fas fa-file-pdf me-1"></i> PDF
                </a>
                ';
                return $output;
            })
            ->rawColumns(['action'])
            ->make(true);;
    }
}
