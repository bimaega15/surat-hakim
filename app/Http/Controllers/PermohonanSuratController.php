<?php

namespace App\Http\Controllers;

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
        if ($formSurat->judul_fsurat == 'Permohonan Pembetulan Akta Catatan Sipil') {
            $structurForm = [
                [
                    'type' => 'text',
                    'label' => 'Nama',
                    'name' => 'nama',
                    'placeholder' => 'Nama...',
                    'value' => isset($row) ? $row->nama ?? '' : '',
                    'col' => 'col-lg-6',
                ],
                [
                    'type' => 'text',
                    'label' => 'Tempat Lahir',
                    'name' => 'tempat_lahir',
                    'placeholder' => 'Tempat Lahir...',
                    'value' => isset($row) ? $row->tempat_lahir ?? '' : '',
                    'col' => 'col-lg-6',
                ],
                [
                    'type' => 'text',
                    'label' => 'Tanggal Lahir',
                    'name' => 'tanggal_lahir',
                    'placeholder' => 'Tanggal Lahir...',
                    'value' => isset($row) ? $row->tanggal_lahir ?? '' : '',
                    'col' => 'col-lg-6',
                    'class' => 'datepicker',
                ],
                [
                    'type' => 'select',
                    'label' => 'Agama',
                    'name' => 'agama',
                    'value' => isset($row) ? $row->agama ?? '' : '',
                    'col' => 'col-lg-6',
                    'array_data' => $array_agama,
                ],
                [
                    'type' => 'select',
                    'label' => 'Jenis Kelamin',
                    'name' => 'jenis_kelamin',
                    'value' => isset($row) ? $row->jenis_kelamin ?? '' : '',
                    'col' => 'col-lg-6',
                    'array_data' => $array_jenis_kelamin,
                ],
                [
                    'type' => 'text',
                    'label' => 'Pekerjaan',
                    'name' => 'pekerjaan',
                    'placeholder' => 'Pekerjaan...',
                    'value' => isset($row) ? $row->pekerjaan ?? '' : '',
                    'col' => 'col-lg-6',
                ],
                [
                    'type' => 'textarea',
                    'label' => 'Alamat',
                    'name' => 'alamat',
                    'placeholder' => 'alamat...',
                    'value' => isset($row) ? $row->alamat ?? '' : '',
                    'col' => 'col-lg-6',
                ],
                [
                    'type' => 'select',
                    'label' => 'Pemohon',
                    'name' => 'pemohon',
                    'value' => isset($row) ? $row->pemohon ?? '' : '',
                    'col' => 'col-lg-6',
                    'array_data' => $array_pemohon,
                    'expand_input' => 'pemohon_input',
                ],
                [
                    'type' => 'select',
                    'label' => 'Akta Catatan Sipil yang Terdapat Kesalahan',
                    'name' => 'akta',
                    'value' => isset($row) ? $row->akta ?? '' : '',
                    'col' => 'col-lg-6',
                    'array_data' => $array_akta,
                ],
                [
                    'type' => 'text',
                    'label' => 'No. Akta',
                    'name' => 'no_akta',
                    'placeholder' => 'No. Akta...',
                    'value' => isset($row) ? $row->no_akta ?? '' : '',
                    'col' => 'col-lg-6',
                ],
                [
                    'type' => 'text',
                    'label' => 'Kabupaten',
                    'name' => 'kabupaten',
                    'placeholder' => 'Kabupaten...',
                    'value' => isset($row) ? $row->kabupaten ?? 'Rokan Hulu' : '',
                    'col' => 'col-lg-6',
                ],
                [
                    'type' => 'select',
                    'label' => 'Jenis Data yang Salah',
                    'name' => 'ket_salah',
                    'value' => isset($row) ? $row->ket_salah ?? '' : '',
                    'col' => 'col-lg-6',
                    'array_data' => $array_data_ket,
                ],
                [
                    'type' => 'text',
                    'label' => 'Penulisan data yang salah',
                    'name' => 'data_salah',
                    'placeholder' => 'Penulisan data yang salah...',
                    'value' => isset($row) ? $row->data_salah ?? '' : '',
                    'col' => 'col-lg-6',
                ],
                [
                    'type' => 'select',
                    'label' => 'Jenis Data yang Benar',
                    'name' => 'ket_benar',
                    'value' => isset($row) ? $row->ket_benar ?? '' : '',
                    'col' => 'col-lg-6',
                    'array_data' => $array_data_ket,
                ],
                [
                    'type' => 'text',
                    'label' => 'Penulisan data yang benar',
                    'name' => 'data_benar',
                    'placeholder' => 'Penulisan data yang benar...',
                    'value' => isset($row) ? $row->data_benar ?? '' : '',
                    'col' => 'col-lg-6',
                ],
            ];
        } else if ($formSurat->judul_fsurat == 'Permohonan Eksekusi') {
            $structureBiodata = [
                [
                    'type' => 'number',
                    'label' => 'NIK (Nomor Induk KTP) (*)',
                    'name' => 'nik',
                    'placeholder' => 'NIK (Nomor Induk KTP)...',
                    'value' => isset($row) ? $row->nik ?? '' : '',
                    'col' => 'col-lg-12',
                ],
                [
                    'type' => 'text',
                    'label' => 'Nama (*)',
                    'name' => 'nama',
                    'placeholder' => 'Nama...',
                    'value' => isset($row) ? $row->nama ?? '' : '',
                    'col' => 'col-lg-12',
                ],
                [
                    'type' => 'text',
                    'label' => 'Tempat Lahir (*)',
                    'name' => 'tempat_lahir',
                    'placeholder' => 'Tempat Lahir...',
                    'value' => isset($row) ? $row->tempat_lahir ?? '' : '',
                    'col' => 'col-lg-6',
                ],
                [
                    'type' => 'text',
                    'label' => 'Tanggal Lahir (*)',
                    'name' => 'tanggal_lahir',
                    'placeholder' => 'Tanggal Lahir...',
                    'value' => isset($row) ? $row->tanggal_lahir ?? '' : '',
                    'col' => 'col-lg-6',
                    'class' => 'datepicker',
                ],
                [
                    'type' => 'select',
                    'label' => 'Jenis Kelamin (*)',
                    'name' => 'jenis_kelamin',
                    'value' => isset($row) ? $row->jenis_kelamin ?? '' : '',
                    'col' => 'col-lg-6',
                    'array_data' => $array_jenis_kelamin,
                ],
                [
                    'type' => 'text',
                    'label' => 'Pekerjaan (*)',
                    'name' => 'pekerjaan',
                    'placeholder' => 'Pekerjaan...',
                    'value' => isset($row) ? $row->pekerjaan ?? '' : '',
                    'col' => 'col-lg-6',
                ],
                [
                    'type' => 'textarea',
                    'label' => 'Alamat (*)',
                    'name' => 'alamat',
                    'placeholder' => 'alamat...',
                    'value' => isset($row) ? $row->alamat ?? '' : '',
                    'col' => 'col-lg-6',
                ],
            ];

            $structureDataPemohon = [
                [
                    'type' => 'select',
                    'label' => 'Dahulu sebagai (Pembanding) (*)',
                    'name' => 'pembanding_terbanding',
                    'value' => isset($row) ? $row->pembanding_terbanding ?? '' : '',
                    'col' => 'col-lg-12',
                    'array_data' => $array_pembanding_terbanding,
                ],
                [
                    'type' => 'text',
                    'label' => 'No. Putusan Pengadilan Negeri (*)',
                    'name' => 'nomor_putusan',
                    'placeholder' => 'Nomor Putusan...',
                    'value' => isset($row) ? $row->nomor_putusan ?? '' : '',
                    'col' => 'col-lg-6',
                ],
                [
                    'type' => 'text',
                    'label' => 'Tanggal Putusan Pengadilan Negeri (*)',
                    'name' => 'tanggal_putusan',
                    'placeholder' => 'Tanggal Putusan Pengadilan Negeri...',
                    'value' => isset($row) ? $row->tanggal_putusan ?? '' : '',
                    'col' => 'col-lg-6',
                    'class' => 'datepicker'
                ],

                [
                    'type' => 'select',
                    'label' => 'Dahulu sebagai (Kasasi) (*)',
                    'name' => 'pemohon_termohon_kasasi',
                    'value' => isset($row) ? $row->pemohon_termohon_kasasi ?? '' : '',
                    'col' => 'col-lg-12',
                    'array_data' => $array_data_pemohon_kasasi,
                ],
                [
                    'type' => 'text',
                    'label' => 'No. Putusan Pengadilan Negeri (*)',
                    'name' => 'nomor_putusan_banding',
                    'placeholder' => 'Nomor Putusan Pengadilan Negeri...',
                    'value' => isset($row) ? $row->nomor_putusan_banding ?? '' : '',
                    'col' => 'col-lg-6',
                ],
                [
                    'type' => 'text',
                    'label' => 'Tanggal Putusan Banding (*)',
                    'name' => 'tanggal_putusan_banding',
                    'placeholder' => 'Tanggal Putusan Banding...',
                    'value' => isset($row) ? $row->tanggal_putusan_banding ?? '' : '',
                    'col' => 'col-lg-6',
                    'class' => 'datepicker'
                ],

                [
                    'type' => 'text',
                    'label' => 'No. Putusan Mahkamah Agung',
                    'name' => 'nomor_putusan_ma',
                    'placeholder' => 'Nomor Putusan Mahkamah Agung...',
                    'value' => isset($row) ? $row->nomor_putusan_ma ?? '' : '',
                    'col' => 'col-lg-6',
                ],

                [
                    'type' => 'text',
                    'label' => 'Tanggal Putusan Mahkamah Agung',
                    'name' => 'tanggal_putusan_ma',
                    'placeholder' => 'Tanggal Putusan Mahkamah Agung...',
                    'value' => isset($row) ? $row->tanggal_putusan_ma ?? '' : '',
                    'col' => 'col-lg-6',
                    'class' => 'datepicker'
                ],
                [
                    'type' => 'select',
                    'label' => 'Jenis benda (tidak bergerak)',
                    'name' => 'jenis_benda',
                    'value' => isset($row) ? $row->jenis_benda ?? '' : '',
                    'col' => 'col-lg-12',
                    'array_data' => $array_jenis_benda,
                    'expand_input' => 'jenis_benda_input',
                ],
                [
                    'type' => 'text',
                    'label' => 'Alamat letak objek',
                    'name' => 'wilayah_benda',
                    'placeholder' => 'Alamat letak objek...',
                    'value' => isset($row) ? $row->wilayah_benda ?? '' : '',
                    'col' => 'col-lg-6',
                ],
                [
                    'type' => 'select',
                    'label' => 'Dokumen benda',
                    'name' => 'dokumen_benda',
                    'value' => isset($row) ? $row->dokumen_benda ?? '' : '',
                    'col' => 'col-lg-6',
                    'array_data' => $array_dokumen_benda_tidak_gerak,
                    'expand_input' => 'dokumen_benda_input',
                ],
                [
                    'type' => 'select',
                    'label' => 'Jenis benda (bergerak)',
                    'name' => 'jenis_benda_gerak',
                    'value' => isset($row) ? $row->jenis_benda_gerak ?? '' : '',
                    'col' => 'col-lg-12',
                    'array_data' => $array_jenis_benda_gerak,
                    'expand_input' => 'jenis_benda_gerak_input',
                ],
                [
                    'type' => 'text',
                    'label' => 'Alamat letak objek',
                    'name' => 'wilayah_benda_gerak',
                    'placeholder' => 'Alamat letak objek...',
                    'value' => isset($row) ? $row->wilayah_benda_gerak ?? '' : '',
                    'col' => 'col-lg-6',
                ],
                [
                    'type' => 'select',
                    'label' => 'Dokumen benda',
                    'name' => 'dokumen_benda_gerak',
                    'value' => isset($row) ? $row->dokumen_benda_gerak ?? '' : '',
                    'col' => 'col-lg-6',
                    'array_data' => $array_dokumen_benda_gerak,
                    'expand_input' => 'dokumen_benda_gerak_input',
                ],
                [
                    'type' => 'select',
                    'label' => 'Apakah sudah melakukan sita eksekusi atau sita jaminan ?',
                    'name' => 'pernyataan_objek',
                    'value' => isset($row) ? $row->pernyataan_objek ?? '' : '',
                    'col' => 'col-lg-6',
                    'array_data' => $array_pernyataan_objek,
                ],
                [
                    'type' => 'text',
                    'label' => 'Tanggal dilakukan aanmaning',
                    'name' => 'tanggal_aanmaning',
                    'placeholder' => 'Tanggal dilakukan aanmaning...',
                    'value' => isset($row) ? $row->tanggal_aanmaning ?? '' : '',
                    'col' => 'col-lg-6',
                    'class' => 'datepicker',
                ],
            ];

            $structurePenutup = [
                [
                    'type' => 'text',
                    'label' => 'Tempat pemohon (*)',
                    'name' => 'tempat_pemohon',
                    'placeholder' => 'Tempat pemohon...',
                    'value' => isset($row) ? $row->tempat_pemohon ?? '' : '',
                    'col' => 'col-lg-6',
                ],
                [
                    'type' => 'text',
                    'label' => 'Tanggal pemohon (*)',
                    'name' => 'tanggal_pemohon',
                    'placeholder' => 'Tanggal pemohon...',
                    'value' => isset($row) ? $row->tanggal_pemohon ?? '' : '',
                    'col' => 'col-lg-6',
                    'class' => 'datepicker',
                ],
            ];
        }
        $action = url('permohonanSurat');
        if ($id) {
            $action = url('permohonanSurat/' . $id . '?_method=PUT');
        }

        return view('one.permohonanSurat.index', compact('formSurat', 'informasiSebelum', 'informasiSetelah', 'array_agama', 'array_jenis_kelamin', 'array_pemohon', 'array_akta', 'array_data_ket', 'structurForm', 'structureBiodata', 'structureDataPemohon', 'structurePenutup', 'action'));
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
}
