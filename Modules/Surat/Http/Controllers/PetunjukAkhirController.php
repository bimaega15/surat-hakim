<?php

namespace Modules\Surat\Http\Controllers;

use App\Http\Helpers\UtilsHelper;
use App\Models\FormSurat;
use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Modules\Surat\Http\Requests\FormListSuratRequest;
use DataTables;

class ListSuratController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $data = FormSurat::query();
            return DataTables::eloquent($data)
                ->addColumn('icon_fsurat', function ($row) {
                    $output = '';
                    if ($row->icon_fsurat == null) {
                        $output = '-';
                    } else {
                        $output = '
                    <a href="' . asset('upload/surat/' . $row->icon_fsurat) . '" target="_blank">
                        <img src="' . asset('upload/surat/' . $row->icon_fsurat) . '" alt="Kosong" style="height: 100px;" />
                    </a>
                    ';
                    }

                    return $output;
                })
                ->addColumn('action', function ($row) {
                    $output = '
                    <div class="dropdown">
                        <button class="btn btn-primary dropdown-toggle" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
                            Action
                        </button>
                        <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                            <li><a 
                            class="dropdown-item btn-edit" 
                            href="#" 
                            data-typemodal="mediumModal"
                            data-urlcreate="' . url('surat/listSurat/' . $row->id . '/edit') . '">Edit</a></li>

                            <li><a class="dropdown-item btn-delete" href="#" 
                            data-url="' . url('surat/listSurat/' . $row->id) . '?_method=delete">Delete</a></li>

                            <li><a class="dropdown-item" href="' . url('surat/petunjukAwal?formSuratId=' . $row->id) . '" target="_blank">Petunjuk Awal</a></li>

                            <li><a class="dropdown-item" href="' . url('surat/petunjukAkhir?formSuratId=' . $row->id) . '" target="_blank">Petunjuk Akhir</a></li>
                        </ul>
                    </div>
                    ';
                    return '
                    <div class="text-center">'
                        . $output .
                        '</div>';
                })
                ->rawColumns(['action', 'icon_fsurat'])
                ->toJson();
        }
        return view('surat::listSurat.index');
    }

    /**
     * Show the form for creating a new resource.
     * @return Renderable
     */
    public function create()
    {
        $action = url('surat/listSurat');
        return view('surat::listSurat.form', compact('action'));
    }

    /**
     * Store a newly created resource in storage.
     * @param Request $request
     * @return Renderable
     */
    public function store(FormlistSuratRequest $request)
    {
        $uploadFile = $request->file('icon_fsurat');
        $fileName = UtilsHelper::uploadFile($uploadFile, 'surat', null, 'form_surat', 'icon_fsurat');
        $data = $request->all();
        $mergeData = array_merge($data, ['icon_fsurat' => $fileName]);
        FormSurat::create($mergeData);
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
    public function edit($id)
    {
        $action = url('surat/listSurat/' . $id . '?_method=put');
        $row = FormSurat::find($id);
        return view('surat::listSurat.form', compact('action', 'row'));
    }

    /**
     * Update the specified resource in storage.
     * @param Request $request
     * @param int $id
     * @return Renderable
     */
    public function update(FormlistSuratRequest $request, $id)
    {
        $dataRequest = $request->except(['_method', '_token']);
        $data = $dataRequest;

        FormSurat::find($id)->update($data);
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
        UtilsHelper::deleteFile($id, 'form_surat', 'surat', 'icon_fsurat');
        FormSurat::destroy($id);
        return response()->json('Berhasil hapus data', 200);
    }
}
