<?php

namespace Modules\Setting\Http\Controllers;

use App\Http\Helpers\UtilsHelper;
use App\Models\Pengaturan;
use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Modules\Setting\Http\Requests\CreatePengaturanRequest;

class PengaturanController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $row = Pengaturan::first();
            $action = url('setting/pengaturan');
            if ($row != null) {
                $action = url('setting/pengaturan/' . $row->id . '?_method=put');
            }
            return view('setting::pengaturan.form', compact('row', 'action'));
        }
        return view('setting::pengaturan.index');
    }

    /**
     * Show the form for creating a new resource.
     * @return Renderable
     */
    public function create()
    {
        $action = url('setting/pengaturan');
        return view('setting::pengaturan.form', compact('action'));
    }

    /**
     * Store a newly created resource in storage.
     * @param Request $request
     * @return Renderable
     */
    public function store(CreatePengaturanRequest $request)
    {
        //
        $uploadFile = $request->file('logoaplikasi_pengaturan');
        $fileName = UtilsHelper::uploadFile($uploadFile, 'setting', null, 'pengaturan', 'logoaplikasi_pengaturan');

        
        $uploadFile = $request->file('video_pengaturan');
        $fileNameVideo = UtilsHelper::uploadFile($uploadFile, 'settingVideo', null, 'pengaturan', 'video_pengaturan');

        $data = $request->all();
        $mergeData = array_merge($data, [
            'logoaplikasi_pengaturan' => $fileName,
            'video_pengaturan' => $fileNameVideo,
        ]);
        Pengaturan::create($mergeData);
        return response()->json('Berhasil tambah data', 201);
    }

    /**
     * Show the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function show($id)
    {
        return view('setting::show');
    }

    /**
     * Show the form for editing the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function edit($id)
    {
        $action = url('setting/pengaturan/' . $id . '?_method=put');
        $row = Pengaturan::find($id);
        return view('setting::pengaturan.form', compact('action', 'row'));
    }

    /**
     * Update the specified resource in storage.
     * @param Request $request
     * @param int $id
     * @return Renderable
     */
    public function update(CreatepengaturanRequest $request, $id)
    {
        //
        $uploadFile = $request->file('logoaplikasi_pengaturan');
        $fileName = UtilsHelper::uploadFile($uploadFile, 'setting', $id, 'pengaturan', 'logoaplikasi_pengaturan');

        $uploadFile = $request->file('video_pengaturan');
        $fileNameVideo = UtilsHelper::uploadFile($uploadFile, 'settingVideo', $id, 'pengaturan', 'video_pengaturan');

        $dataRequest = $request->except(['_method', '_token']);
        $data = $dataRequest;
        $dataMerge = array_merge($data, [
            'logoaplikasi_pengaturan' => $fileName,
            'video_pengaturan' => $fileNameVideo,
        ]);

        Pengaturan::find($id)->update($dataMerge);
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
        Pengaturan::destroy($id);
        return response()->json('Berhasil hapus data', 200);
    }
}
