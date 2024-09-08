<?php

namespace Modules\Surat\Http\Controllers;

use App\Http\Helpers\UtilsHelper;
use App\Models\InformasiSetelah;
use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use DataTables;

class PetunjukAkhirController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $formSuratId = $request->formSuratId;
            $data = InformasiSetelah::query()->where('form_surat_id', $formSuratId);
            return DataTables::eloquent($data)
                ->addColumn('gambar_isetelah', function ($row) {
                    $output = '';
                    if ($row->gambar_isetelah == null) {
                        $output = '-';
                    } else {
                        $output = '
                    <a href="' . asset('upload/informasiSetelah/' . $row->gambar_isetelah) . '" target="_blank">
                        <img src="' . asset('upload/informasiSetelah/' . $row->gambar_isetelah) . '" alt="Kosong" style="height: 100px;" />
                    </a>
                    ';
                    }

                    return $output;
                })
                ->addColumn('action', function ($row) use ($formSuratId) {
                    $buttonUpdate = '
                    <a class="btn btn-warning btn-edit btn-sm" 
                    data-typemodal="mediumModal"
                    data-urlcreate="' . url('surat/petunjukAkhir/' . $row->id . '/edit?formSuratId=' . $formSuratId) . '"
                    data-modalId="mediumModal"
                    >
                        <i class="fa-solid fa-pencil"></i>
                    </a>
                    ';
                    $buttonDelete = '
                    <button type="button" class="btn-delete btn btn-danger btn-sm" data-url="' . url('surat/petunjukAkhir/' . $row->id) . '?_method=delete">
                        <i class="fa-solid fa-trash"></i>
                    </button>
                    ';

                    $button = '
                <div class="text-center">
                    ' . $buttonUpdate . '
                    ' . $buttonDelete . '
                </div>
                ';
                    return $button;
                })
                ->rawColumns(['action', 'gambar_isetelah'])
                ->toJson();
        }
        return view('surat::InformasiSetelah.index', [
            'formSuratId' => $request->formSuratId
        ]);
    }

    /**
     * Show the form for creating a new resource.
     * @return Renderable
     */
    public function create(Request $request)
    {
        $formSuratId = $request->formSuratId;
        $action = url('surat/petunjukAkhir?formSuratId=' . $formSuratId);
        return view('surat::InformasiSetelah.form', compact('action'));
    }

    /**
     * Store a newly created resource in storage.
     * @param Request $request
     * @return Renderable
     */
    public function store(Request $request)
    {
        $uploadFile = $request->file('gambar_isetelah');
        $fileName = UtilsHelper::uploadFile($uploadFile, 'InformasiSetelah', null, 'informasi_setelah', 'gambar_isetelah');
        $data = $request->post();
        $mergeData = array_merge($data, [
            'gambar_isetelah' => $fileName,
            'form_surat_id' => $request->input('formSuratId')
        ]);
        InformasiSetelah::create($mergeData);
        return response()->json('Berhasil tambah data', 201);
    }

    /**
     * Show the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function show($id)
    {
        return view('surat::show');
    }

    /**
     * Show the form for editing the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function edit(Request $request, $id)
    {
        $formSuratId = $request->formSuratId;
        $action = url('surat/petunjukAkhir/' . $id . '?_method=put&formSuratId=' . $formSuratId);
        $row = InformasiSetelah::find($id);
        return view('surat::InformasiSetelah.form', compact('action', 'row'));
    }

    /**
     * Update the specified resource in storage.
     * @param Request $request
     * @param int $id
     * @return Renderable
     */
    public function update(Request $request, $id)
    {
        $formSuratId = $request->formSuratId;
        $uploadFile = $request->file('gambar_isetelah');
        $fileName = UtilsHelper::uploadFile($uploadFile, 'InformasiSetelah', $id, 'informasi_setelah', 'gambar_isetelah');

        $dataRequest = $request->except(['_method', '_token', 'formSuratId']);
        $data = $dataRequest;
        $mergeData = array_merge($data, [
            'gambar_isetelah' => $fileName,
            'form_surat_id' => $formSuratId,
        ]);

        InformasiSetelah::find($id)->update($mergeData);
        return response()->json('Berhasil update data', 200);
    }

    /**
     * Remove the specified resource from storage.
     * @param int $id
     * @return Renderable
     */
    public function destroy($id)
    {
        //
        UtilsHelper::deleteFile($id, 'informasi_setelah', 'informasiSetelah', 'gambar_isetelah');
        InformasiSetelah::destroy($id);
        return response()->json('Berhasil hapus data', 200);
    }
}
