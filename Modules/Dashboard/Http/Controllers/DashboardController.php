<?php

namespace Modules\Dashboard\Http\Controllers;

use App\Models\FormSurat;
use App\Models\PermintaanSurat;
use Illuminate\Contracts\Support\Renderable;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    public function index()
    {
        $formSurat = FormSurat::all();
        $formSuratGroupByFormSuratId = $formSurat->groupBy('form_surat_id');

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
        $permintaanSurat = PermintaanSurat::all();
        return view('dashboard::permintaanSurat', [
            'permintaanSurat' => $permintaanSurat,
        ]);
    }
}
