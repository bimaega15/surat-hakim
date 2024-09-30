<?php

namespace App\Http\Controllers;

use App\Http\Helpers\UtilsHelper;
use App\Models\FormSurat;
use App\Models\InformasiSebelum;
use App\Models\PermintaanSurat;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Config;

class PermohonanSuratController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public $datastatis;
    public function __construct()
    {
        $this->datastatis = Config::get('datastatis');
    }

    public function index()
    {
        //
        $slug = request()->input('slug');
        $slug = str_replace('-', ' ', $slug);
        $formSurat = FormSurat::where('judul_fsurat', 'like', '%' . $slug . '%')->first();
        $informasiSebelum = $formSurat->informasiSebelum()->get();
        $informasiSetelah = $formSurat->informasiSetelah()->get();

        $array_agama = [];
        foreach ($this->datastatis['agama'] as $value => $item) {
            $array_agama[] = [
                'id' => $value,
                'label' => $item
            ];
        }
        $array_jenis_kelamin = [];
        foreach ($this->datastatis['jenis_kelamin'] as $value => $item) {
            $array_jenis_kelamin[] = [
                'id' => $value,
                'label' => $item
            ];
        }
        $array_pemohon = [];
        foreach ($this->datastatis['pemohon'] as $value => $item) {
            $array_pemohon[] = [
                'id' => $value,
                'label' => $item
            ];
        }
        $array_akta = [];
        foreach ($this->datastatis['akta'] as $value => $item) {
            $array_akta[] = [
                'id' => $value,
                'label' => $item
            ];
        }
        $array_data_ket = [];
        foreach ($this->datastatis['data_salah'] as $value => $item) {
            $array_data_ket[] = [
                'id' => $value,
                'label' => $item
            ];
        }
        $array_pembanding_terbanding = [];
        foreach ($this->datastatis['data_pembanding_terbanding'] as $value => $item) {
            $array_pembanding_terbanding[] = [
                'id' => $value,
                'label' => $item
            ];
        }
        $array_data_pemohon_kasasi = [];
        foreach ($this->datastatis['data_pemohon_kasasi'] as $value => $item) {
            $array_data_pemohon_kasasi[] = [
                'id' => $value,
                'label' => $item
            ];
        }
        $array_jenis_benda = [];
        foreach ($this->datastatis['jenis_benda_tidak_gerak'] as $value => $item) {
            $array_jenis_benda[] = [
                'id' => $value,
                'label' => $item
            ];
        }
        $array_dokumen_benda_tidak_gerak = [];
        foreach ($this->datastatis['dokumen_benda_tidak_gerak'] as $value => $item) {
            $array_dokumen_benda_tidak_gerak[] = [
                'id' => $value,
                'label' => $item
            ];
        }
        $array_jenis_benda_gerak = [];
        foreach ($this->datastatis['jenis_benda_gerak'] as $value => $item) {
            $array_jenis_benda_gerak[] = [
                'id' => $value,
                'label' => $item
            ];
        }
        $array_dokumen_benda_gerak = [];
        foreach ($this->datastatis['dokumen_benda_gerak'] as $value => $item) {
            $array_dokumen_benda_gerak[] = [
                'id' => $value,
                'label' => $item
            ];
        }
        $array_pernyataan_objek = [];
        foreach ($this->datastatis['pernyataan_objek'] as $value => $item) {
            $array_pernyataan_objek[] = [
                'id' => $value,
                'label' => $item
            ];
        }
        $array_kedudukan_pihak = [];
        foreach ($this->datastatis['kedudukan_pihak'] as $value => $item) {
            $array_kedudukan_pihak[] = [
                'id' => $value,
                'label' => $item
            ];
        }
        $array_hubungan_pihak = [];
        foreach ($this->datastatis['hubungan_pihak'] as $value => $item) {
            $array_hubungan_pihak[] = [
                'id' => $value,
                'label' => $item
            ];
        }
        $array_pilihan_kepentingan = [];
        foreach ($this->datastatis['pilihan_kepentingan'] as $value => $item) {
            $array_pilihan_kepentingan[] = [
                'id' => $value,
                'label' => $item
            ];
        }

        $structurForm = [];
        $structureBiodata = [];
        $structureDataPemohon = [];
        $structurePenutup = [];
        $id = request()->input('id');
        $row = null;
        if ($id) {
            $row = PermintaanSurat::find($id);
            $id = $row->id;
            $row = json_decode($row->data_permintaan_surat);
        }
        $judulSurat = strtolower($formSurat->judul_fsurat);
        if ($judulSurat == 'permohonan pembetulan akta catatan sipil') {
            $responseSuratHakim = UtilsHelper::pembetulanAktaCatatanSipil([
                'array_jenis_kelamin' => $array_jenis_kelamin,
                'array_pemohon' => $array_pemohon,
                'array_akta' => $array_akta,
                'array_agama' => $array_agama,
                'array_data_ket' => $array_data_ket,
                'array_pilihan_kepentingan' => $array_pilihan_kepentingan,
                'row' => $row,
            ]);

            $structureBiodata = $responseSuratHakim['structureBiodata'];
            $structureDataPemohon = $responseSuratHakim['structureDataPemohon'];
            $structurePenutup = $responseSuratHakim['structurePenutup'];
        } else if ($judulSurat == 'permohonan eksekusi') {
            $responseSuratHakim = UtilsHelper::permohonanEksekusi([
                'array_jenis_kelamin' => $array_jenis_kelamin,
                'array_pembanding_terbanding' => $array_pembanding_terbanding,
                'array_data_pemohon_kasasi' => $array_data_pemohon_kasasi,
                'array_jenis_benda' => $array_jenis_benda,
                'array_dokumen_benda_tidak_gerak' => $array_dokumen_benda_tidak_gerak,
                'array_dokumen_benda_gerak' => $array_dokumen_benda_gerak,
                'array_jenis_benda_gerak' => $array_jenis_benda_gerak,
                'array_pernyataan_objek' => $array_pernyataan_objek,
                'row' => $row,
            ]);

            $structureBiodata = $responseSuratHakim['structureBiodata'];
            $structureDataPemohon = $responseSuratHakim['structureDataPemohon'];
            $structurePenutup = $responseSuratHakim['structurePenutup'];
        } else if ($judulSurat == 'permohonan izin sebagai kuasa insidentil') {
            $responseSuratHakim = UtilsHelper::izinKuasaInsidentil([
                'array_jenis_kelamin' => $array_jenis_kelamin,
                'array_kedudukan_pihak' => $array_kedudukan_pihak,
                'array_hubungan_pihak' => $array_hubungan_pihak,
                'array_agama' => $array_agama,
                'row' => $row,
            ]);

            $structureBiodata = $responseSuratHakim['structureBiodata'];
            $structureDataPemohon = $responseSuratHakim['structureDataPemohon'];
            $structurePenutup = $responseSuratHakim['structurePenutup'];
        }

        $action = url('permohonanSurat');
        if ($id) {
            $action = url('permohonanSurat/' . $id . '?_method=PUT');
        }
        $dataFormSurat = FormSurat::all();
        if($slug != null){
            return view('one.permohonanSurat.index', compact('formSurat', 'informasiSebelum', 'informasiSetelah', 'array_agama', 'array_jenis_kelamin', 'array_pemohon', 'array_akta', 'array_data_ket', 'structurForm', 'structureBiodata', 'structureDataPemohon', 'structurePenutup', 'action', 'dataFormSurat', 'slug'));
        }
        return view('one.permohonanSurat.listSurat', compact('dataFormSurat', 'slug', 'formSurat'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $nama = $request->input('nama');
        $nik = $request->input('nik');
        $users_permintaan_surat = $nama . '|' . $nik;
        $form_surat_id = $request->input('form_surat_id');
        $data_permintaan_surat = json_encode($request->all());
        $data = [
            'users_permintaan_surat' => $users_permintaan_surat,
            'form_surat_id' => $form_surat_id,
            'data_permintaan_surat' => $data_permintaan_surat,
        ];
        PermintaanSurat::create($data);

        $slug = strtolower(str_replace(' ', '-', $users_permintaan_surat));
        return response()->json([
            'status' => true,
            'message' => 'Permohonan Surat Berhasil Dikirim',
            'result' => $slug,
        ], 201);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        $nama = $request->input('nama');
        $nik = $request->input('nik');
        $users_permintaan_surat = $nama . '|' . $nik;
        $form_surat_id = $request->input('form_surat_id');
        $data_permintaan_surat = json_encode($request->all());
        $data = [
            'users_permintaan_surat' => $users_permintaan_surat,
            'form_surat_id' => $form_surat_id,
            'data_permintaan_surat' => $data_permintaan_surat,
        ];
        PermintaanSurat::find($id)->update($data);

        $slug = strtolower(str_replace(' ', '-', $users_permintaan_surat));
        return response()->json([
            'status' => true,
            'message' => 'Permohonan Surat Berhasil Dikirim',
            'result' => $slug,
        ], 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        PermintaanSurat::destroy($id);
        return response()->json([
            'status' => true,
            'message' => 'Permohonan Surat Berhasil Dihapus',
        ], 200);
    }

    public function createDocument()
    {
        $form = request()->input('form');
        $indexInput = request()->input('indexInput');
        return view('one.permohonanSurat.createDocument', [
            'form' => $form,
            'indexInput' => $indexInput,
        ])->render();
    }
}
