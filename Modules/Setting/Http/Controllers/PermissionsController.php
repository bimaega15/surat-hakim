<?php

namespace Modules\Setting\Http\Controllers;

use App\Http\Helpers\UtilsHelper;
use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use App\Models\Menu;
use App\Models\MenuPermissions;
use Modules\Setting\Http\Requests\CreatePostMenuPermission;
use Spatie\Permission\Models\Role;

class PermissionsController extends Controller
{
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $createTree = UtilsHelper::createStructureTreePermission();
            return view('setting::permissions.renderTree', compact('createTree'))->render();
        }

        return view('setting::permissions.index');
    }

    public function create()
    {
        $daftarMenu = MenuPermissions::all();
        $action = url('setting/permissions');
        $daftarMenu = MenuPermissions::all();
        $array_menu = [];
        foreach ($daftarMenu as $key => $item) {
            $array_menu[] = [
                'label' => $item->nama_mpermissions ?? $item->link_mpermissions,
                'id' => $item->id,
            ];
        }
        return view('setting::permissions.form', compact('daftarMenu', 'action', 'array_menu'));
    }

    /**
     * Store a newly created resource in storage.
     * @param Request $request
     * @return Renderable
     */
    public function store(Request $request)
    {
        //
        MenuPermissions::create($request->all());
        return response()->json('Berhasil menambahkan data permissions', 201);
    }

    public function refresh(Request $request)
    {
        //
        $data = UtilsHelper::getUrlMenuPermission();
        $lengthData = count($data);
        $dataDb = [];
        $no = 1;
        MenuPermissions::truncate();
        foreach ($data as $key => $result) {
            $dataDb[] = [
                'root_mpermissions' => null,
                'no_mpermissions' => $no,
                'nama_mpermissions' => $result,
                'link_mpermissions' => $result,
                'isnode_mpermissions' => 0,
                'ischildren_mpermissions' => 1,
                'childrenmenu_mpermissions' => null,
            ];
            $no++;
        }
        MenuPermissions::insert($dataDb);
        return response()->json('Berhasil management ' . $lengthData . ' permission menu', 201);
    }

    /**
     * Show the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function show($id)
    {
        return view('setting::permissions.form');
    }

    /**
     * Show the form for editing the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function edit($id)
    {
        $menu = MenuPermissions::find($id);
        $daftarMenu = MenuPermissions::all();
        $menuRootId = MenuPermissions::where('childrenmenu_mpermissions', 'like', '%' . $id . '%')->first();
        $menuChildren = json_encode($menu->childrenmenu_mpermissions);
        $action = url('setting/permissions/' . $id . '?_method=PUT');
        $daftarMenu = MenuPermissions::all();
        $array_menu = [];
        foreach ($daftarMenu as $key => $item) {
            $array_menu[] = [
                'label' => $item->nama_mpermissions ?? $item->link_mpermissions,
                'id' => $item->id,
            ];
        }
        return view('setting::permissions.form', compact('menu', 'daftarMenu', 'menuRootId', 'menuChildren', 'action', 'array_menu'));
    }

    /**
     * Update the specified resource in storage.
     * @param Request $request
     * @param int $id
     * @return Renderable
     */
    public function update(CreatePostMenuPermission $request, $id)
    {
        //
        $data = $request->except(['_method']);

        MenuPermissions::find($id)->update($data);
        $menu_id = $id;

        $menu_root = $request->input('root_mpermissions');
        if ($menu_root != null) {
            $getMenu = MenuPermissions::find($menu_root);
            $getMenuChildren = json_decode($getMenu->childrenmenu_mpermissions, 1);
            $getMenuChildren = implode(',', $getMenuChildren);

            $children_menu_update = $menu_id;
            if ($getMenuChildren != null) {
                $children_menu_update = $getMenuChildren . ',' . $menu_id;
            }
            $children_menu_update = explode(',', $children_menu_update);
            $children_menu_update = json_encode($children_menu_update);

            $getMenu->childrenmenu_mpermissions = $children_menu_update;
            $getMenu->isnode_mpermissions = 1;
            $getMenu->ischildren_mpermissions = 0;
            $getMenu->save();
        }

        $queryLike = MenuPermissions::where('childrenmenu_mpermissions', 'like', '%' . $id . '%')
            ->where('id', '!=', $menu_root)->first();
        if ($queryLike != null) {
            if ($queryLike->id != $menu_id) {
                $getMenuLike = $queryLike->childrenmenu_mpermissions;
                $explodeData = json_decode($getMenuLike, true);

                $resultData = array_filter($explodeData, function ($value) use ($id) {
                    return $value !== $id;
                });
                $implodeData = null;
                $isNode = 0;
                $isChildren = 1;

                if (count($resultData) > 0) {
                    $implodeData = json_encode($resultData);
                    $isNode = 1;
                    $isChildren = 0;
                }
                $queryLike->childrenmenu_mpermissions = $implodeData;
                $queryLike->isnode_mpermissions = $isNode;
                $queryLike->ischildren_mpermissions = $isChildren;
                $queryLike->save();
            }
        }


        return response()->json('Berhasil mengubah data', 200);
    }

    /**
     * Remove the specified resource from storage.
     * @param int $id
     * @return Renderable
     */

    private function flattenData($data)
    {
        $result = [];
        foreach ($data as $key => $item) {
            $result[] = $item["id"];
            if (isset($item["children"])) {
                $result = array_merge($result, $this->flattenData($item["children"]));
            }
        }

        return $result;
    }

    private function flattenDataUpdate($data)
    {
        $result = [];
        foreach ($data as $key => $item) {
            $result[] = $item["id"];
            MenuPermissions::find($item['id'])->update([
                'childrenmenu_mpermissions' => null,
                'isnode_mpermissions' => 0,
                'ischildren_mpermissions' => 1
            ]);

            if (isset($item["children"])) {
                $implodeChildren =  $item['children'];
                $resultArrayId = [];
                foreach ($implodeChildren as $key => $value) {
                    $resultArrayId[] = $value['id'];
                }
                $implodeChildren = json_encode($resultArrayId);
                MenuPermissions::find($item['id'])->update([
                    'childrenmenu_mpermissions' => $implodeChildren,
                    'isnode_mpermissions' => 1,
                    'ischildren_mpermissions' => 0
                ]);

                $result = array_merge($result, $this->flattenDataUpdate($item["children"]));
            }
        }

        return $result;
    }

    public function destroy($id)
    {
        //
        $nestedTree = json_decode(request()->input('nestedTree'), true);
        $dataFlatten = (array) $this->flattenData($nestedTree);
        $getDataMenu = MenuPermissions::find($id);
        $arrayMerge = [];
        if ($getDataMenu->childrenmenu_mpermissions != null) {
            $childrenMenu = json_decode($getDataMenu->childrenmenu_mpermissions, true);
            $arrayMerge = array_merge([$id], $childrenMenu);
        } else {
            $arrayMerge = [$id];
        }

        $result = array_filter($dataFlatten, function ($value) use ($arrayMerge) {
            $dataFilter = true;
            if (in_array($value, $arrayMerge)) {
                $dataFilter = false;
            };
            return $dataFilter;
        });
        $someId = array_values($result);
        foreach ($someId as $key => $value) {
            $getMenu = MenuPermissions::find($value);
            if ($getMenu) {
                $getMenu->no_mpermissions = $key + 1;
                $getMenu->save();
            }
        }

        // check is node
        $queryLike = MenuPermissions::where('childrenmenu_mpermissions', 'like', '%' . $id . '%')
            ->first();
        if ($queryLike != null) {
            $childrenMenuData = json_decode($queryLike->childrenmenu_mpermissions, true);
            $resultData = array_filter($childrenMenuData, function ($value) use ($id) {
                return $value !== $id;
            });
            $implodeData = null;
            $isNode = 0;
            $isChildren = 1;
            if (count($resultData) > 0) {
                $implodeData = json_encode($resultData);
                $isNode = 1;
                $isChildren = 0;
            }

            $menuUpdate = MenuPermissions::find($queryLike->id);
            $menuUpdate->childrenmenu_mpermissions = $implodeData;
            $menuUpdate->isnode_mpermissions = $isNode;
            $menuUpdate->ischildren_mpermissions = $isChildren;
            $menuUpdate->save();
        }

        MenuPermissions::whereIn('id', $arrayMerge)->delete();
        return response()->json('Berhasil menghapus list menu');
    }

    public function renderTree()
    {
        $createTree = UtilsHelper::createStructureTreePermission();
        return view('setting::permissions.renderTreeAction', compact('createTree'))->render();
    }

    public function dataTable()
    {
        $data = MenuPermissions::where('ischildren_mpermissions', 1)->get();
        return response()->json($data);
    }

    public function sortAndNested()
    {
        $nestedTree = json_decode(request()->input('nestedTree'), true);
        $dataFlatten = (array) $this->flattenData($nestedTree);
        foreach ($dataFlatten as $key => $value) {
            $getMenu = MenuPermissions::find($value);
            if ($getMenu) {
                $getMenu->no_mpermissions = $key + 1;
                $getMenu->save();
            }
        }

        (array) $this->flattenDataUpdate($nestedTree);
        return response()->json('Berhasil sort and nested list menu');
    }

    public function accessRole()
    {
        $role = Role::all();
        $action = url('setting/permissions/storeRole');
        return view('setting::permissions.accessRole', compact('role', 'action'));
    }

    public function storeRole()
    {
        
    }
}
