<?php

namespace App\Http\Helpers;

use App\Models\Menu;
use App\Models\MenuPermissions;
use App\Models\Pembelian;
use App\Models\Pengaturan;
use App\Models\Penjualan;
use App\Models\User;
use Carbon\Carbon;
use DateTime;
use Illuminate\Support\Facades\DB;
use File;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use Spatie\Permission\Models\Permission;

class UtilsHelper
{
    public static function myProfile($users_id = null)
    {
        if ($users_id == null) {
            $users_id = Auth::id();
        }
        $getUser = User::with('profile')->find($users_id);
        return $getUser;
    }
    public static function myRoles($users_id = null)
    {
        $myProfile = UtilsHelper::myProfile($users_id);
        $myProfile = $myProfile->roles[0]->name;
        return strtolower($myProfile);
    }

    public static function settingApp()
    {
        $settingApp = '';
        $rowSetting = Pengaturan::first();
        if ($rowSetting != null) {
            $settingApp = $rowSetting;
        }
        return $settingApp;
    }

    public static function uploadFile($file, $lokasi, $id = null, $table = null, $nameAttribute = null)
    {
        if ($file != null) {
            // delete file
            UtilsHelper::deleteFile($id, $table, $lokasi, $nameAttribute);

            // nama file
            $fileExp =  explode('.', $file->getClientOriginalName());
            $name = $fileExp[0];
            $ext = $fileExp[1];
            $name = time() . '-' . str_replace(' ', '-', $name) . '.' . $ext;

            // isi dengan nama folder tempat kemana file diupload
            $tujuan_upload =  public_path() . '/upload/' . $lokasi . '/';

            // upload file
            $file->move($tujuan_upload, $name);
        } else {
            if ($id == null) {
                $name = 'default.png';
            } else {
                $data = DB::table($table)->where('id', $id)->first();
                $setData = (array) $data;
                $name = $setData[$nameAttribute];
            }
        }

        return $name;
    }

    public static function deleteFile($id = null, $table = null, $lokasi = null, $name = null)
    {
        if ($id != null) {
            $data = DB::table($table)->where('id', '=', $id)->first();
            $setData = (array) $data;
            $gambar = public_path() . '/upload/' . $lokasi . '/' . $setData[$name];
            if (file_exists($gambar)) {
                if ($setData[$name] != 'default.png') {
                    File::delete($gambar);
                }
            }
        }
    }

    public static function handleSidebar($treeData)
    {
        $pushData = [];
        function hiddenTree($data, $parentId = null)
        {
            $pushData = [];
            foreach ($data as $index => $item) {
                if ($item['children'] !== null && ($parentId === null || in_array($item['id'], $parentId))) {
                    $childIds = $item['children'];
                    $pushData[] = $childIds;
                    hiddenTree($data, $childIds);
                }
            }
            return $pushData;
        }
        $pushData = hiddenTree($treeData, null);
        $flattenedArray = [];
        foreach ($pushData as $subArray) {
            $flattenedArray = array_merge($flattenedArray, $subArray);
        }
        $hiddenData = [];
        foreach ($flattenedArray as $key => $value) {
            $hiddenData[$value] = $value;
        }

        return $hiddenData;
    }

    public static function tanggalBulanTahunKonversi($tanggal)
    {
        $tanggalWaktu = Carbon::createFromFormat('Y-m-d H:i:s', $tanggal);
        $tanggalIndonesia = $tanggalWaktu->isoFormat('D MMMM Y HH:mm', 'Do MMMM Y HH:mm');
        return $tanggalIndonesia;
    }

    public static function limitTextGlobal($text, $limit = 100)
    {
        if (strlen($text) > $limit) {
            $text = substr($text, 0, $limit);
            $text .= '...';
        }
        return $text;
    }

    public static function insertPermissions()
    {
        $countPermissions = Permission::all()->count();
        if ($countPermissions > 0) {
            DB::table('permissions')->delete();
        }

        $routes = \Route::getRoutes();
        $routesName = [];
        foreach ($routes as $route) {
            if (!str_contains($route->getName(), 'unisharp')) {
                if (!str_contains($route->getName(), 'sanctum')) {
                    if (!str_contains($route->getName(), 'ignition')) {
                        if ($route->getName() != null) {
                            $routesName[] = [
                                'name' => $route->getName(),
                                'guard_name' => 'web'
                            ];
                        }
                    }
                }
            }
        }
        Permission::insert($routesName);
    }

    public static function getUrlPermission()
    {
        $routes = Route::getRoutes();
        $dataRoutes = [];
        $throughRoutes = ['sanctum.csrf-cookie', 'ignition.healthCheck', 'ignition.executeSolution', 'ignition.updateConfig'];
        foreach ($routes as $route) {
            if ($route->getName() != null) {
                if (!in_array($route->getName(), $throughRoutes)) {
                    $dataRoutes[] = $route->getName();
                }
            }
        }
        return $dataRoutes;
    }

    public static function getUrlMenuPermission()
    {
        $routes = Route::getRoutes();
        $dataRoutes = [];
        $throughRoutes = ['sanctum.csrf-cookie', 'ignition.healthCheck', 'ignition.executeSolution', 'ignition.updateConfig'];
        foreach ($routes as $route) {
            if ($route->getName() != null) {
                if (!in_array($route->getName(), $throughRoutes)) {
                    $dataRoutes[] = $route->getName();
                }
            }
        }
        return $dataRoutes;
    }

    public static function formatDate($tanggal_transaction)
    {
        $dateNow = $tanggal_transaction;
        $tanggal = Carbon::parse($dateNow);
        $formattedDate = $tanggal->format('j F Y');
        return $formattedDate;
    }
    public static function formatDateV2($tanggal_transaction)
    {
        $date = DateTime::createFromFormat('d/m/Y', $tanggal_transaction);
        $tanggal = $date->format('Y-m-d');
        return UtilsHelper::formatDate($tanggal);
    }

    public static function formatDateLaporan($tanggal_transaction)
    {
        $dateNow = $tanggal_transaction;
        $tanggal = Carbon::parse($dateNow);
        $formattedDate = $tanggal->format('d/m/Y');
        return $formattedDate;
    }

    public static function formatDateBirthdate($tanggal_transaction)
    {
        $dateNow = $tanggal_transaction;
        $tanggal = Carbon::parse($dateNow);
        $formattedDate = $tanggal->format('d-m-Y');
        return $formattedDate;
    }

    public static function formatHumansDate($tanggal_transaction)
    {
        $dateNow = $tanggal_transaction;
        $tanggal = Carbon::createFromFormat('Y-m-d', $dateNow);
        $formattedDate = $tanggal->diffForHumans();
        return $formattedDate;
    }

    public static function integerMonth($month)
    {
        switch ($month) {
            case 1:
                return 'Januari';
                break;
            case 2:
                return 'Februari';
                break;
            case 3:
                return 'Maret';
                break;
            case 4:
                return 'April';
                break;
            case 5:
                return 'Mei';
                break;
            case 6:
                return 'Juni';
                break;
            case 7:
                return 'Juli';
                break;
            case 8:
                return 'Agustus';
                break;
            case 9:
                return 'September';
                break;
            case 10:
                return 'Oktober';
                break;
            case 11:
                return 'November';
                break;
            case 12:
                return 'Desember';
                break;
            default:
                return 'Januari';
                break;
        }
    }

    public static function monthData()
    {
        return ['Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni', 'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember'];
    }

    public static function stringMonth($month)
    {
        switch ($month) {
            case 'Januari':
                return 1;
                break;
            case 'Februari':
                return 2;
                break;
            case 'Maret':
                return 3;
                break;
            case 'April':
                return 4;
                break;
            case 'Mei':
                return 5;
                break;
            case 'Juni':
                return 6;
                break;
            case 'Juli':
                return 7;
                break;
            case 'Agustus':
                return 8;
                break;
            case 'September':
                return 9;
                break;
            case 'Oktober':
                return 10;
                break;
            case 'November':
                return 11;
                break;
            case 'Desember':
                return 12;
                break;
            default:
                return 1;
                break;
        }
    }
    public static function formatUang($nominal)
    {
        return number_format($nominal, 0, '.', ',');
    }

    public static function paymentStatisPenjualan($id)
    {
        $penjualan = new Penjualan();
        $getPenjualan = $penjualan->invoicePenjualan($id);

        $hutang = 0;
        $kembalian = 0;
        $bayar = 0;
        $tipeTransaksi = '';
        $statusTransaksi = false;
        $cicilan = 0;

        if (count($getPenjualan->penjualanCicilan) > 0) {
            $statusTransaksi = $getPenjualan->tipe_penjualan;

            $getPenjualanCicilan = $getPenjualan->penjualanCicilan;
            $countPenjualanCicilan = count($getPenjualanCicilan);

            $getPenjualanCicilan = $getPenjualanCicilan[0];
            $getBayarCicilan = $getPenjualan->penjualanCicilan->pluck('bayar_pcicilan')->toArray();
            $totalBayar = array_sum($getBayarCicilan);

            $hutang = $getPenjualanCicilan->bayar_pcicilan + $getPenjualanCicilan->hutang_pcicilan;
            if ($statusTransaksi == 'cash' && $countPenjualanCicilan > 1) {
                $hutang = $getPenjualanCicilan->bayar_pcicilan + $getPenjualanCicilan->hutang_pcicilan - $getPenjualan->kembalian_pcicilan;
            } else if ($statusTransaksi == 'cash' && $countPenjualanCicilan == 1) {
                $hutang = $getPenjualanCicilan->bayar_pcicilan - $getPenjualanCicilan->kembalian_pcicilan;
            }
            $kembalian = $getPenjualan->kembalian_penjualan;
            $bayar = $totalBayar;
            if ($statusTransaksi == 'cash') {
                $bayar = $totalBayar - $getPenjualan->kembalian_pcicilan;
            }
            $tipeTransaksi = 'hutang';
        } else {
            $hutang = $getPenjualan->hutang_penjualan;
            $kembalian = $getPenjualan->kembalian_penjualan;
            $bayar = $getPenjualan->tipe_penjualan == 'hutang' ? 0 : $getPenjualan->bayar_penjualan;
            $tipeTransaksi = $getPenjualan->tipe_penjualan;
        }

        $calc = $bayar - $hutang;
        if ($calc < 0) {
            $statusTransaksi = false;
            $cicilan = abs($calc);
        } else {
            $statusTransaksi = true;
            $cicilan = 0;
        }

        return [
            'hutang' => $hutang,
            'kembalian' => $kembalian,
            'bayar' => $bayar,
            'tipe_transaksi' => $tipeTransaksi,
            'status_transaksi' => $statusTransaksi,
            'cicilan' => $cicilan,
            'id' => $id,
        ];
    }

    public static function paymentStatisPembelian($id)
    {
        $pembelian = new Pembelian();
        $getPembelian = $pembelian->invoicePembelian($id);

        $hutang = 0;
        $kembalian = 0;
        $bayar = 0;
        $tipeTransaksi = '';
        $statusTransaksi = false;
        $cicilan = 0;

        if ($getPembelian != null) {
            if (count($getPembelian->pembelianCicilan) > 0) {
                $statusTransaksi = $getPembelian->tipe_pembelian;

                $getPembelianCicilan = $getPembelian->pembelianCicilan;
                $countPembelianCicilan = count($getPembelianCicilan);

                $getPembelianCicilan = $getPembelianCicilan[0];

                $getBayarCicilan = $getPembelian->pembelianCicilan->pluck('bayar_pbcicilan')->toArray();
                $totalBayar = array_sum($getBayarCicilan);

                $hutang = $getPembelianCicilan->bayar_pbcicilan + $getPembelianCicilan->hutang_pbcicilan;
                if ($statusTransaksi == 'cash' && $countPembelianCicilan > 1) {
                    $hutang = $getPembelianCicilan->bayar_pcicilan + $getPembelianCicilan->hutang_pcicilan - $getPembelian->kembalian_pcicilan;
                } else if ($statusTransaksi == 'cash' && $countPembelianCicilan == 1) {
                    $hutang = $getPembelianCicilan->bayar_pcicilan - $getPembelianCicilan->kembalian_pcicilan;
                }
                $kembalian = $getPembelian->kembalian_pembelian;
                $bayar = $totalBayar;
                if ($statusTransaksi == 'cash') {
                    $bayar = $totalBayar - $getPembelian->kembalian_pcicilan;
                }
                $tipeTransaksi = 'hutang';
            } else {
                $hutang = $getPembelian->hutang_pembelian;
                $kembalian = $getPembelian->kembalian_pembelian;
                $bayar = $getPembelian->tipe_pembelian == 'hutang' ? 0 : $getPembelian->bayar_pembelian;
                $tipeTransaksi = $getPembelian->tipe_pembelian;
            }
        }

        $calc = $bayar - $hutang;
        if ($calc < 0) {
            $statusTransaksi = false;
            $cicilan = abs($calc);
        } else {
            $statusTransaksi = true;
            $cicilan = ($calc);
        }

        return [
            'hutang' => $hutang,
            'kembalian' => $kembalian,
            'bayar' => $bayar,
            'tipe_transaksi' => $tipeTransaksi,
            'status_transaksi' => $statusTransaksi,
            'cicilan' => $cicilan,
        ];
    }

    public static function createdApp()
    {
        return 'Surat Menyurat Hakim';
    }

    public static function createStructureTree()
    {
        $daftarMenu = Menu::orderBy('no_menu', 'asc')->orderBy('id', 'asc')->get();
        $listMenu = [];
        foreach ($daftarMenu as $key => $value) {
            if ($value->is_node == '1') {
                if ($value->children_menu != null || $value->children_menu != '') {
                    $explodeMenu = json_decode($value->children_menu, true);
                    $listMenu[] = [
                        'id' => $value->id,
                        'children' => $explodeMenu
                    ];
                } else {
                    $listMenu[] = [
                        'id' => $value->id,
                        'children' => null
                    ];
                }
            } else {
                $listMenu[] = [
                    'id' => $value->id,
                    'children' => null,
                ];
            }
        }
        return $listMenu;
    }

    public static function createStructureTreePermission()
    {
        $daftarPermissions = MenuPermissions::orderBy('no_mpermissions', 'asc')->orderBy('id', 'asc')->get();
        $listMenu = [];
        foreach ($daftarPermissions as $key => $value) {
            if ($value->isnode_mpermissions == '1') {
                if ($value->childrenmenu_mpermissions != null || $value->childrenmenu_mpermissions != '') {
                    $explodeMenu = json_decode($value->childrenmenu_mpermissions, true);
                    $listMenu[] = [
                        'id' => $value->id,
                        'children' => $explodeMenu
                    ];
                } else {
                    $listMenu[] = [
                        'id' => $value->id,
                        'children' => null
                    ];
                }
            } else {
                $listMenu[] = [
                    'id' => $value->id,
                    'children' => null,
                ];
            }
        }
        return $listMenu;
    }

    public static function renderSidebar($data, $parentId = null, $pushData = null)
    {
        foreach ($data as $index => $item) {
            if (isset($pushData[$item['id']])) {
                if ($pushData[$item['id']]) {
                    continue;
                }
            }

            $menuData = UtilsHelper::menuFilterById($item['id']);


            $urlUri = UtilsHelper::getUrlPermission();
            if (isset($urlUri[$menuData->link_menu])) {
                $convertData = $urlUri[$menuData->link_menu];
                $itemId = $item['id'];

                $getDataPermission = Permission::where('name', 'like', '%' . $convertData . '%')->first();
                if ($getDataPermission == null) {
                    continue;
                }

                $checkPermission = Auth::user()->hasPermissionTo($convertData);
                if (!$checkPermission) {
                    continue;
                }
            }

            $btnClassSpecified = '';
            if ($menuData->link_menu == 'logout') {
                $btnClassSpecified = 'btn-logout';
            }

            if ($item['children'] === null && ($parentId === null || in_array($item['id'], $parentId))) {
                echo  '
                <li>
                    <a href="' . url($menuData->link_menu) . '" class="side-menu ' . $btnClassSpecified . '">
                        <div class="side-menu__icon"> ' . $menuData->icon_menu . ' </div>
                        <div class="side-menu__title"> ' . $menuData->nama_menu . ' </div>
                    </a>
                </li>
    
                ';
            } elseif ($item['children'] !== null && ($parentId === null || in_array($item['id'], $parentId))) {
                $hasVisibleChildren = false;

                // Loop melalui anak-anak untuk memeriksa izin dan menghitung yang visible
                foreach ($item['children'] as $childId) {
                    $childMenuData = UtilsHelper::menuFilterById($childId);

                    if (isset($urlUri[$childMenuData->link_menu])) {
                        $childConvertData = $urlUri[$childMenuData->link_menu];
                        $childCheckPermission = Auth::user()->hasPermissionTo($childConvertData);

                        if ($childCheckPermission) {
                            $hasVisibleChildren = true;
                            break;
                        }
                    }
                }

                if ($hasVisibleChildren) {
                    echo '
                    <li>
                        <a href="javascript:;" class="side-menu">
                            <div class="side-menu__icon"> ' . $menuData->icon_menu . ' </div>
                            <div class="side-menu__title">
                                ' . $menuData->nama_menu . '
                                <div class="side-menu__sub-icon "> <i data-lucide="chevron-down"></i> </div>
                            </div>
                        </a>
                        <ul class="">';
                    $childIds = $item['children'];
                    UtilsHelper::renderSidebar($data, $childIds);
                    echo '
                        </ul>
                    </li>';
                }
            }
        }
    }

    public static function menuFilterById($id)
    {
        $menu = Menu::find($id);
        return $menu;
    }
    public static function menuPermissionsFilterById($id)
    {
        $menu = MenuPermissions::find($id);
        return $menu;
    }

    public static function renderTree($data, $parentId = null, $pushData = null)
    {
        echo  '
            <ol class="dd-list">';
        foreach ($data as $index => $item) {
            if (isset($pushData[$item['id']])) {
                if ($pushData[$item['id']]) {
                    continue;
                }
            }

            $menu_item = UtilsHelper::menuFilterById($item['id']);
            $buttonUpdate = '
                <a href="' . route('menu.edit', $menu_item->id) . '" class="btn btn-warning btn-edit btn-sm" style="padding: 5px 5px;" data-typemodal="largeModal">
                    <i class="fa-solid fa-pencil"></i>
                </a>
                ';
            $buttonDelete = '
                <button type="button" class="btn-delete btn btn-danger btn-sm" data-url="' . url('setting/menu/' . $menu_item->id . '?_method=delete') . '" style="padding: 5px 5px;">
                    <i class="fa-solid fa-trash"></i>
                </button>
                ';

            if ($item['children'] === null && ($parentId === null || in_array($item['id'], $parentId))) {
                echo  '
                <li class="dd-item dd3-item" data-id="' . $item['id'] . '">
                    <div class="dd-handle dd3-handle"></div>
                    <div class="dd3-content" style="padding: 3px 10px 3px 45px">
                        <div class="d-flex justify-content-between align-items-center">
                            <div>
                                <a href="' . url($menu_item->link_menu) . '">
                                ' . $menu_item->icon_menu . ' &nbsp; ' . $menu_item->nama_menu . '
                                </a>
                            </div>
                            <div>
                                ' . $buttonUpdate . '
                                ' . $buttonDelete . '
                            </div>
                        </div>
                    </div>
                </li>
                ';
            } elseif ($item['children'] !== null && ($parentId === null || in_array($item['id'], $parentId))) {
                echo  '
                    <li class="dd-item dd3-item" data-id="' . $item['id'] . '">
                        <div class="dd-handle dd3-handle"></div>
                            <div class="dd3-content" style="padding: 3px 10px 3px 45px">
                                <div class="d-flex justify-content-between align-items-center">
                                <div>
                                    <a href="' . url($menu_item->link_menu) . '">
                                    ' . $menu_item->icon_menu . ' &nbsp; ' . $menu_item->nama_menu . '
                                    </a>
                                </div>
                                <div>
                                    ' . $buttonUpdate . '
                                    ' . $buttonDelete . '
                                </div>
                            </div>
                        </div>';
                $childIds = $item['children'];
                UtilsHelper::renderTree($data, $childIds);
                echo '
                    </li>
                ';
            }
        }
        echo  '
            </ol>';
    }

    public static function renderTreePermissions($data, $parentId = null, $pushData = null)
    {
        echo  '
            <ol class="dd-list">';
        foreach ($data as $index => $item) {
            if (isset($pushData[$item['id']])) {
                if ($pushData[$item['id']]) {
                    continue;
                }
            }

            $menu_item = UtilsHelper::menuPermissionsFilterById($item['id']);
            $dataChildren = $menu_item->childrenmenu_mpermissions != null ? json_encode($menu_item->childrenmenu_mpermissions) : null;
            $safeDataChildren = htmlspecialchars($dataChildren, ENT_QUOTES, 'UTF-8');
            $buttonCheckbox = '
            <div class="form-check">
                <input class="form-check-input input-checkbox" type="checkbox" value="' . $item['id'] . '" id="checkbox-' . $item['id'] . '" data-id="' . $item['id'] . '" data-children="' . $safeDataChildren . '">
                <label class="form-check-label" for="checkbox-' . $item['id'] . '">
                </label>
            </div>
                ';
            $buttonUpdate = '
                <a href="' . route('permissions.edit', $menu_item->id) . '" class="btn btn-warning btn-edit btn-sm" style="padding: 5px 5px;" data-typemodal="largeModal">
                    <i class="fa-solid fa-pencil"></i>
                </a>
                ';
            $buttonDelete = '
                <button type="button" class="btn-delete btn btn-danger btn-sm" data-url="' . url('setting/permissions/' . $menu_item->id . '?_method=delete') . '" style="padding: 5px 5px;">
                    <i class="fa-solid fa-trash"></i>
                </button>
                ';

            if ($item['children'] === null && ($parentId === null || in_array($item['id'], $parentId))) {
                $namePermissions = $menu_item->nama_mpermissions != null ? $menu_item->nama_mpermissions : $menu_item->link_mpermissions;
                echo  '
                <li class="dd-item dd3-item" data-id="' . $item['id'] . '">
                    <div class="dd-handle dd3-handle"></div>
                    <div class="dd3-content" style="padding: 3px 10px 3px 45px">
                        <div class="d-flex justify-content-between align-items-center">
                            <div>
                                <a href="' . url($menu_item->link_mpermissions) . '">
                                 &nbsp; ' . $namePermissions . '
                                </a>
                            </div>
                            <div class="d-flex">
                                ' . $buttonCheckbox . '
                                ' . $buttonUpdate . '
                                ' . $buttonDelete . '
                            </div>
                        </div>
                    </div>
                </li>
                ';
            } elseif ($item['children'] !== null && ($parentId === null || in_array($item['id'], $parentId))) {
                $namePermissions = $menu_item->nama_mpermissions != null ? $menu_item->nama_mpermissions : $menu_item->link_mpermissions;
                echo  '
                    <li class="dd-item dd3-item" data-id="' . $item['id'] . '">
                        <div class="dd-handle dd3-handle"></div>
                            <div class="dd3-content" style="padding: 3px 10px 3px 45px">
                                <div class="d-flex justify-content-between align-items-center">
                                <div>
                                    <a href="' . url($menu_item->link_mpermissions) . '">
                                    ' . $namePermissions . '
                                    </a>
                                </div>
                                <div class="d-flex">
                                    ' . $buttonCheckbox . '
                                    ' . $buttonUpdate . '
                                    ' . $buttonDelete . '
                                </div>
                            </div>
                        </div>';
                $childIds = $item['children'];
                UtilsHelper::renderTreePermissions($data, $childIds);
                echo '
                    </li>
                ';
            }
        }
        echo  '
            </ol>';
    }
}
