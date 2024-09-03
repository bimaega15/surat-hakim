<?php

namespace Modules\Surat\Http\Controllers;

use App\Http\Helpers\UtilsHelper;
use App\Models\InformasiSebelum;
use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use DataTables;

class PetunjukAwalController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $formSuratId = $request->formSuratId;
            $data = InformasiSebelum::query()->where('form_surat_id', $formSuratId);
            return DataTables::eloquent($data)
                ->addColumn('gambar_isebelum', function ($row) {
                    $output = '';
                    if ($row->gambar_isebelum == null) {
                        $output = '-';
                    } else {
                        $output = '
                    <a href="' . asset('upload/informasiSebelum/' . $row->gambar_isebelum) . '" target="_blank">
                        <img src="' . asset('upload/informasiSebelum/' . $row->gambar_isebelum) . '" alt="Kosong" style="height: 100px;" />
                    </a>
                    ';
                    }

                    return $output;
                })
                ->addColumn('action', function ($row) {
                    $buttonUpdate = '
                    <a class="btn btn-warning btn-edit btn-sm" 
                    data-typemodal="mediumModal"
                    data-urlcreate="' . url('surat/informasiSebelum/' . $row->id . '/edit') . '"
                    data-modalId="mediumModal"
                    >
                        <i class="fa-solid fa-pencil"></i>
                    </a>
                    ';
                    $buttonDelete = '
                    <button type="button" class="btn-delete btn btn-danger btn-sm" data-url="' . url('surat/informasiSebelum/' . $row->id) . '?_method=delete">
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
                ->rawColumns(['action', 'gambar_isebelum'])
                ->toJson();
        }
        return view('surat::informasiSebelum.index', [
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
        $action = url('surat/petunjukAwal?formSuratId=' . $formSuratId);
        return view('surat::informasiSebelum.form', compact('action'));
    }

    /**
     * Store a newly created resource in storage.
     * @param Request $request
     * @return Renderable
     */
    public function store(Request $request)
    {
        $uploadFile = $request->file('gambar_isebelum');
        $fileName = UtilsHelper::uploadFile($uploadFile, 'informasiSebelum', null, 'informasi_sebelum', 'gambar_isebelum');
        $data = $request->all();
        $mergeData = array_merge($data, ['gambar_isebelum' => $fileName]);
        InformasiSebelum::create($mergeData);
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
        $action = url('surat/petunjukAwal/' . $id . '?_method=put');
        $row = InformasiSebelum::find($id);
        return view('surat::informasiSebelum.form', compact('action', 'row'));
    }

    /**
     * Update the specified resource in storage.
     * @param Request $request
     * @param int $id
     * @return Renderable
     */
    public function update(Request $request, $id)
    {

        $uploadFile = $request->file('gambar_isebelum');
        $fileName = UtilsHelper::uploadFile($uploadFile, 'informasiSebelum', $id, 'informasi_sebelum', 'gambar_isebelum');

        $dataRequest = $request->except(['_method', '_token']);
        $data = $dataRequest;
        $mergeData = array_merge($data, ['gambar_isebelum' => $fileName]);

        InformasiSebelum::find($id)->update($mergeData);
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
        UtilsHelper::deleteFile($id, 'informasi_sebelum', 'informasiSebelum', 'gambar_isebelum');
        InformasiSebelum::destroy($id);
        return response()->json('Berhasil hapus data', 200);
    }
}
