<?php

namespace App\Http\Controllers;

use App\Http\Helpers\UtilsHelper;
use App\Models\FormSurat;
use App\Models\InformasiSebelum;
use App\Models\PermintaanSurat;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Config;

use Illuminate\Support\Facades\App;
use Barryvdh\DomPDF\Facade\Pdf;

class HasilPermohonanController extends Controller
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
        if (request()->ajax()) {
            $slug = str_replace('-', ' ', $slug);
            $permintaanSurat = PermintaanSurat::with('formSurat')->where('users_permintaan_surat', 'like', '%' . $slug . '%')->get();

            $data = [];
            foreach ($permintaanSurat as $key => $item) {
                $usersPermintaanSurat = $item->users_permintaan_surat;
                $explode = explode('|', $usersPermintaanSurat);
                $nama = $explode[0];
                $nik = $explode[1];

                $formSurat = $item->formSurat;
                $slug = strtolower(str_replace(' ', '-', $formSurat->judul_fsurat));
                $slugData = strtolower(str_replace(' ', '-', $usersPermintaanSurat));

                $output = '
                <a href="' . url('/permohonanSurat?slug=' . $slug . '&id=' . $item->id) . '" class="badge bg-warning"> <i class="fas fa-pencil-alt"></i> Edit </a>

                <a href="' . url('permohonanSurat/' . $item->id . '?_method=delete') . '" class="badge bg-danger btn-delete"> <i class="fas fa-trash-alt"></i> Delete </a>

                <a href="' . url('/hasilPermohonan/cetakPdf?id=' . $item->id) . '" class="badge bg-info"> <i class="fas fa-file-pdf"></i> Cetak PDF </a>
                ';

                $data[] = [
                    'nik' => $nik,
                    'nama' => $nama,
                    'jenis_surat' => $formSurat->judul_fsurat,
                    'action' => $output,
                ];
            }

            $totalRecords = count($permintaanSurat->toArray());
            $recordsFiltered = count($permintaanSurat->toArray());
            $draw = isset($_GET['draw']) ? intval($_GET['draw']) : 0;
            $response = array(
                "draw" => intval($draw),
                "recordsTotal" => $totalRecords,
                "recordsFiltered" => $recordsFiltered,
                "data" => $data,
            );
            return response()->json($response);
        }
        if ($slug) {
            $slug = str_replace('-', ' ', $slug);
            $permintaanSurat = PermintaanSurat::with('formSurat')->where('users_permintaan_surat', 'like', '%' . $slug . '%')->get();
            $slug = request()->input('slug');
            return view('one.hasilPermohonan.result', compact('permintaanSurat', 'slug'));
        }
        return view('one.hasilPermohonan.index', [
            'slug' => $slug,
        ]);
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
    }

    public function cetakPdf()
    {
        $id = request()->input('id');
        $permintaanSurat = PermintaanSurat::with('formSurat')->find($id);
        $dataPermintaanSurat = json_decode($permintaanSurat->data_permintaan_surat, true);
        $formSurat = $permintaanSurat->formSurat;
        $judul_fsurat = strtolower($formSurat->judul_fsurat);

        $content = $formSurat->content_fsurat;
        $data = $dataPermintaanSurat;
        if ($judul_fsurat == 'permohonan eksekusi') {
            unset($data['tanggal_putusan']);
            unset($data['tanggal_putusan_banding']);
            unset($data['tanggal_putusan_ma']);
            unset($data['tanggal_aanmaning']);
            unset($data['tanggal_pemohon']);
            unset($data['jenis_kelamin']);
            $data = array_merge([
                'tempat_tanggal_lahir' => $dataPermintaanSurat['tempat_lahir'] . ', ' .
                    UtilsHelper::formatDateBirthdate($dataPermintaanSurat['tanggal_lahir']),
                'jenis_kelamin' => $dataPermintaanSurat['jenis_kelamin'] == 'L' ? 'Laki-laki' : 'Perempuan',
                'tanggal_putusan' => UtilsHelper::formatDateBirthdate($dataPermintaanSurat['tanggal_putusan']),
                'tanggal_putusan_banding' => UtilsHelper::formatDateBirthdate($dataPermintaanSurat['tanggal_putusan_banding']),
                'tanggal_putusan_ma' => UtilsHelper::formatDateBirthdate($dataPermintaanSurat['tanggal_putusan_ma']),
                'tanggal_aanmaning' => UtilsHelper::formatDateBirthdate($dataPermintaanSurat['tanggal_aanmaning']),
                'tanggal_pemohon' => UtilsHelper::formatDateBirthdate($dataPermintaanSurat['tanggal_pemohon']),

            ], $data);
        } else if ($judul_fsurat == 'permohonan izin sebagai kuasa insidentil') {
            unset($data['tanggal_pemohon']);
            unset($data['jenis_kelamin']);
            unset($data['tanggal_desa']);
            unset($data['tanggal_surat']);
            $data = array_merge([
                'tempat_tanggal_lahir' => $dataPermintaanSurat['tempat_lahir'] . ', ' .
                    UtilsHelper::formatDateBirthdate($dataPermintaanSurat['tanggal_lahir']),
                'jenis_kelamin' => $dataPermintaanSurat['jenis_kelamin'] == 'L' ? 'Laki-laki' : 'Perempuan',
                'tanggal_pemohon' => UtilsHelper::formatDateBirthdate($dataPermintaanSurat['tanggal_pemohon']),
                'tanggal_desa' => UtilsHelper::formatDateBirthdate($dataPermintaanSurat['tanggal_desa']),
                'tanggal_surat' => UtilsHelper::formatDateBirthdate($dataPermintaanSurat['tanggal_surat']),
            ], $data);
        } else if ($judul_fsurat == 'permohonan pembetulan akta catatan sipil') {
            unset($data['tanggal_pemohon']);
            unset($data['jenis_kelamin']);
            unset($data['tanggal_surat']);
            $data = array_merge([
                'tempat_tanggal_lahir' => $dataPermintaanSurat['tempat_lahir'] . ', ' .
                    UtilsHelper::formatDateBirthdate($dataPermintaanSurat['tanggal_lahir']),
                'jenis_kelamin' => $dataPermintaanSurat['jenis_kelamin'] == 'L' ? 'Laki-laki' : 'Perempuan',
                'tanggal_pemohon' => UtilsHelper::formatDateBirthdate($dataPermintaanSurat['tanggal_pemohon']),
                'tanggal_surat' => UtilsHelper::formatDateBirthdate($dataPermintaanSurat['tanggal_surat']),
            ], $data);
        }

        foreach ($data as $key => $value) {
            $content = str_replace('--' . $key . '--', $value, $content);
        }

        $searchText = '--area_dokumen_pendukung--';
        if (strpos($content, $searchText) !== false) {
            $contentReplace = '
        <ol style="list-style-position: inside; margin-top: 5px; margin-bottom: 15px;">';
            $dokumenPendukung = json_decode($dataPermintaanSurat['dokumen_pendukung'], true);
            foreach ($dokumenPendukung as $key => $value) {
                $contentReplace .= '<li style="vertical-align: top; line-height: 15px; padding-top: 10px;">
                    <table style="padding: 0px; margin: 0px; vertical-align: top; display: inline-table;">
                        <tr>
                            <td style="padding: 0px; margin: 0px; vertical-align: top;">
                                <span style="font-family: Arial, Helvetica, sans-serif; font-size: 12px">
                                    Nama Dokumen Pendukung
                                </span>
                            </td>
                            <td style="padding: 0px; margin: 0px; vertical-align: top;">
                                <span style="font-family: Arial, Helvetica, sans-serif; font-size: 12px">
                                :
                                </span>
                            </td>
                            <td style="padding: 0px; margin: 0px; vertical-align: top;">
                                <span style="font-family: Arial, Helvetica, sans-serif; font-size: 12px">
                                ' . $value['nama_dokumen_pendukung'] . '
                                </span>
                            </td>
                        </tr>
                        <tr>
                            <td style="padding: 0px; margin: 0px; vertical-align: top;">
                                <span style="font-family: Arial, Helvetica, sans-serif; font-size: 12px">
                                    Tanggal Dokumen
                                </span>
                            </td>
                            <td style="padding: 0px; margin: 0px; vertical-align: top;">
                                <span style="font-family: Arial, Helvetica, sans-serif; font-size: 12px">
                                :
                                </span>
                            </td>
                            <td style="padding: 0px; margin: 0px; vertical-align: top;">
                                <span style="font-family: Arial, Helvetica, sans-serif; font-size: 12px">
                                ' . UtilsHelper::formatDate($value['tanggal_dokumen_pendukung']) . '
                                </span>
                            </td>
                        </tr>
                        <tr>
                            <td style="padding: 0px; margin: 0px; vertical-align: top;">
                                <span style="font-family: Arial, Helvetica, sans-serif; font-size: 12px">
                                Yang Mengeluarkan
                                </span>
                            </td>
                            <td style="padding: 0px; margin: 0px; vertical-align: top;">
                                <span style="font-family: Arial, Helvetica, sans-serif; font-size: 12px">
                                :
                                </span>
                            </td>
                            <td style="padding: 0px; margin: 0px; vertical-align: top;">
                                <span style="font-family: Arial, Helvetica, sans-serif; font-size: 12px">
                                ' . $value['yang_mengeluarkan_dokumen'] . '
                                </span>
                            </td>
                        </tr>
                    </table>
                </li>
        ';
            }
            $contentReplace .= '</ol>
            </p>
            <p style="font-size: 12px; padding-left: 35px; margin:0;">';
            $content = str_replace($searchText, $contentReplace, $content);
        }


        $pdf = App::make('dompdf.wrapper');
        $pdf = Pdf::loadView('pdf.result', [
            'data' => $formSurat,
            'content' => $content,
        ]);
        $pdf->setPaper('A4', 'portrait');
        return $pdf->stream($formSurat->judul_fsurat . '.pdf');
    }
}
