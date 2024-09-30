<?php

namespace App\Http\Helpers;

use App\Models\Menu;
use App\Models\MenuPermissions;
use App\Models\Pengaturan;
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

    public static function permohonanEksekusi($params)
    {
        $array_jenis_kelamin = $params['array_jenis_kelamin'];
        $array_pembanding_terbanding = $params['array_pembanding_terbanding'];
        $array_data_pemohon_kasasi = $params['array_data_pemohon_kasasi'];
        $array_jenis_benda = $params['array_jenis_benda'];
        $array_dokumen_benda_tidak_gerak = $params['array_dokumen_benda_tidak_gerak'];
        $array_dokumen_benda_gerak = $params['array_dokumen_benda_gerak'];
        $array_jenis_benda_gerak = $params['array_jenis_benda_gerak'];
        $array_pernyataan_objek = $params['array_pernyataan_objek'];

        $row = $params['row'];

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
                'value' => isset($row) ? UtilsHelper::formatDateLaporan($row->tanggal_lahir) ?? '' : '',
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
                'value' => isset($row) ? UtilsHelper::formatDateLaporan($row->tanggal_putusan) ?? '' : '',
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
                'value' => isset($row) ? UtilsHelper::formatDateLaporan($row->tanggal_putusan_banding) ?? '' : '',
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
                'value' => isset($row) ? UtilsHelper::formatDateLaporan($row->tanggal_putusan_ma) ?? '' : '',
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
                'value' => isset($row) ? UtilsHelper::formatDateLaporan($row->tanggal_aanmaning) ?? '' : '',
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
                'value' => isset($row) ? UtilsHelper::formatDateLaporan($row->tanggal_pemohon) ?? '' : '',
                'col' => 'col-lg-6',
                'class' => 'datepicker',
            ],
        ];

        return [
            'structureBiodata' => $structureBiodata,
            'structureDataPemohon' => $structureDataPemohon,
            'structurePenutup' => $structurePenutup,
        ];
    }

    public static function izinKuasaInsidentil($params)
    {
        $array_jenis_kelamin = $params['array_jenis_kelamin'];
        $array_kedudukan_pihak = $params['array_kedudukan_pihak'];
        $array_hubungan_pihak = $params['array_hubungan_pihak'];
        $array_agama = $params['array_agama'];

        $row = $params['row'];

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
                'value' => isset($row) ? UtilsHelper::formatDateLaporan($row->tanggal_lahir) ?? '' : '',
                'col' => 'col-lg-6',
                'class' => 'datepicker',
            ],
            [
                'type' => 'select',
                'label' => 'Agama (*)',
                'name' => 'agama',
                'value' => isset($row) ? $row->agama ?? '' : '',
                'col' => 'col-lg-6',
                'array_data' => $array_agama,
                'expand_input' => 'agama_input',
            ],
            [
                'type' => 'select',
                'label' => 'Jenis kelamin (*)',
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
                'type' => 'text',
                'label' => 'Nama pihak yang menguasakan / berhalangan hadir (*)',
                'name' => 'nama_pihak',
                'placeholder' => 'Nama pihak yang menguasakan / berhalangan hadir...',
                'value' => isset($row) ? $row->nama_pihak ?? '' : '',
                'col' => 'col-lg-6',
            ],
            [
                'type' => 'select',
                'label' => 'Kedudukan pihak yang berhalangan hadir (*)',
                'name' => 'selaku_pihak',
                'value' => isset($row) ? $row->selaku_pihak ?? '' : '',
                'col' => 'col-lg-6',
                'array_data' => $array_kedudukan_pihak,
            ],
            [
                'type' => 'text',
                'label' => 'No. Perkara (*)',
                'name' => 'nomor_perkara',
                'placeholder' => 'Nomor perkara yang sedang dijalani...',
                'value' => isset($row) ? $row->nomor_perkara ?? '' : '',
                'col' => 'col-lg-6',
            ],

            [
                'type' => 'select',
                'label' => 'Hubungan pihak yang berhalangan hadir (*)',
                'name' => 'hubungan_dengan_pihak',
                'value' => isset($row) ? $row->hubungan_dengan_pihak ?? '' : '',
                'col' => 'col-lg-6',
                'array_data' => $array_hubungan_pihak,
                'expand_input' => 'hubungan_pihak_input',
            ],
            [
                'type' => 'text',
                'label' => 'Desa / Kelurahan (*)',
                'name' => 'surat_desa',
                'placeholder' => 'Desa atau kelurahan yang menerbitkan surat keterangan adanya hubungan keluarga...',
                'value' => isset($row) ? $row->surat_desa ?? '' : '',
                'col' => 'col-lg-6',
            ],

            [
                'type' => 'text',
                'label' => 'No. Surat Keterangan (*)',
                'name' => 'nomor_desa',
                'placeholder' => 'No. Surat Keterangan...',
                'value' => isset($row) ? $row->nomor_desa ?? '' : '',
                'col' => 'col-lg-6',
            ],
            [
                'type' => 'text',
                'label' => 'Tanggal Surat keterangan (*)',
                'name' => 'tanggal_desa',
                'placeholder' => 'Tanggal Surat keterangan...',
                'value' => isset($row) ? UtilsHelper::formatDateLaporan($row->tanggal_desa) ?? '' : '',
                'col' => 'col-lg-6',
                'class' => 'datepicker',
            ],

            [
                'type' => 'text',
                'label' => 'Alasan pihak berhalangan hadir (*)',
                'name' => 'alasan_pihak',
                'placeholder' => 'Alasan pihak tersebut tidak dapat hadir ...',
                'value' => isset($row) ? $row->alasan_pihak ?? '' : '',
                'col' => 'col-lg-6',
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
                'value' => isset($row) ? UtilsHelper::formatDateLaporan($row->tanggal_pemohon) ?? '' : '',
                'col' => 'col-lg-6',
                'class' => 'datepicker',
            ],
        ];

        return [
            'structureBiodata' => $structureBiodata,
            'structureDataPemohon' => $structureDataPemohon,
            'structurePenutup' => $structurePenutup,
        ];
    }

    public static function pembetulanAktaCatatanSipil($params)
    {
        $array_jenis_kelamin = $params['array_jenis_kelamin'];
        $array_pemohon = $params['array_pemohon'];
        $array_akta = $params['array_akta'];
        $array_agama = $params['array_agama'];
        $array_data_ket = $params['array_data_ket'];
        $array_pilihan_kepentingan = $params['array_pilihan_kepentingan'];

        $row = $params['row'];

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
                'value' => isset($row) ? UtilsHelper::formatDateLaporan($row->tanggal_lahir) ?? '' : '',
                'col' => 'col-lg-6',
                'class' => 'datepicker',
            ],
            [
                'type' => 'select',
                'label' => 'Agama (*)',
                'name' => 'agama',
                'value' => isset($row) ? $row->agama ?? '' : '',
                'col' => 'col-lg-6',
                'array_data' => $array_agama,
                'expand_input' => 'agama_input',
            ],
            [
                'type' => 'select',
                'label' => 'Jenis kelamin (*)',
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

        $dokumenPendukung = isset($row) ? json_decode($row->dokumen_pendukung, true) ?? '' : [];
        $arrayDataPendukung = [
            [
                [
                    'type' => 'text',
                    'label' => 'Nama Dokumen Pendukung',
                    'name' => 'nama_dokumen_pendukung',
                    'placeholder' => 'Nama Dokumen Pendukung...',
                    'value' => '',
                    'col' => 'col-lg-5',
                    'class' => 'nama_dokumen_pendukung',
                    'data-index' => 0,
                ],
                [
                    'type' => 'text',
                    'label' => 'Tanggal Dokumen',
                    'name' => 'tanggal_dokumen_pendukung',
                    'placeholder' => 'Tanggal Dokumen...',
                    'value' => '',
                    'col' => 'col-lg-5',
                    'class' => 'tanggal_dokumen_pendukung datepicker',
                    'data-index' => 0,
                ],
                [
                    'type' => 'button_remove_array_input',
                    'col' => 'col-lg-2',
                    'title' => '<i class="fas fa-trash"></i>',
                    'class' => 'btn btn-danger btn-sm button_remove_array_input',
                    'style' => 'margin-top: 30px;',
                    'data-index' => 0,
                    'disabled' => 'disabled',
                ],
                [
                    'type' => 'text',
                    'label' => 'Yang Mengeluarkan Dokumen',
                    'name' => 'yang_mengeluarkan_dokumen',
                    'placeholder' => 'Yang Mengeluarkan Dokumen...',
                    'value' => '',
                    'col' => 'col-lg-12',
                    'class' => 'yang_mengeluarkan_dokumen',
                    'data-index' => 0,
                ],
            ]
        ];
        if (count($dokumenPendukung) > 0) {
            $arrayDataPendukung = [];
            foreach ($dokumenPendukung as $key => $item) {
                $index0Disabled = $key == 0 ? 'disabled' : '';
                $arrayDataPendukung[] = [
                    [
                        'type' => 'text',
                        'label' => 'Nama Dokumen Pendukung',
                        'name' => 'nama_dokumen_pendukung',
                        'placeholder' => 'Nama Dokumen Pendukung...',
                        'value' => $item['nama_dokumen_pendukung'] ?? '',
                        'col' => 'col-lg-5',
                        'data-index' => $key,
                        'class' => 'nama_dokumen_pendukung',
                    ],
                    [
                        'type' => 'text',
                        'label' => 'Tanggal Dokumen',
                        'name' => 'tanggal_dokumen_pendukung',
                        'placeholder' => 'Tanggal Dokumen...',
                        'value' => UtilsHelper::formatDateLaporan($item['tanggal_dokumen_pendukung']) ?? '',
                        'col' => 'col-lg-5',
                        'class' => 'datepicker',
                        'data-index' => $key,
                        'class' => 'tanggal_dokumen_pendukung datepicker',
                    ],
                    [
                        'type' => 'button_remove_array_input',
                        'col' => 'col-lg-2',
                        'title' => '<i class="fas fa-trash"></i>',
                        'class' => 'btn btn-danger btn-sm button_remove_array_input',
                        'style' => 'margin-top: 30px;',
                        'data-index' => $key,
                        'disabled' => $index0Disabled,
                    ],
                    [
                        'type' => 'text',
                        'label' => 'Yang Mengeluarkan Dokumen',
                        'name' => 'yang_mengeluarkan_dokumen',
                        'placeholder' => 'Yang Mengeluarkan Dokumen...',
                        'value' => $item['yang_mengeluarkan_dokumen'] ?? '',
                        'col' => 'col-lg-12',
                        'data-index' => $key,
                        'class' => 'yang_mengeluarkan_dokumen',
                    ],
                ];
            }
        }

        $structureDataPemohon = [
            [
                'type' => 'select',
                'label' => 'Pemohon (*)',
                'name' => 'pemohon',
                'value' => isset($row) ? $row->pemohon ?? '' : '',
                'col' => 'col-lg-6',
                'array_data' => $array_pemohon,
                'expand_input' => 'pemohon_input',
            ],
            [
                'type' => 'select',
                'label' => 'Akta Catatan Sipil yang Terdapat Kesalahan (*)',
                'name' => 'akta',
                'value' => isset($row) ? $row->akta ?? '' : '',
                'col' => 'col-lg-6',
                'array_data' => $array_akta,
            ],
            [
                'type' => 'text',
                'label' => 'No. Akta (*)',
                'name' => 'no_akta',
                'placeholder' => 'No. Akta...',
                'value' => isset($row) ? $row->no_akta ?? '' : '',
                'col' => 'col-lg-6',
            ],
            [
                'type' => 'text',
                'label' => 'Kabupaten (*)',
                'name' => 'kabupaten',
                'placeholder' => 'Kabupaten...',
                'value' => isset($row) ? $row->kabupaten ?? 'Rokan Hulu' : '',
                'col' => 'col-lg-6',
            ],
            [
                'type' => 'select',
                'label' => 'Jenis Data yang Salah (*)',
                'name' => 'ket_salah',
                'value' => isset($row) ? $row->ket_salah ?? '' : '',
                'col' => 'col-lg-6',
                'array_data' => $array_data_ket,
            ],
            [
                'type' => 'text',
                'label' => 'Penulisan data yang salah (*)',
                'name' => 'data_salah',
                'placeholder' => 'Penulisan data yang salah...',
                'value' => isset($row) ? $row->data_salah ?? '' : '',
                'col' => 'col-lg-6',
            ],
            [
                'type' => 'select',
                'label' => 'Jenis Data yang Benar (*)',
                'name' => 'ket_benar',
                'value' => isset($row) ? $row->ket_benar ?? '' : '',
                'col' => 'col-lg-6',
                'array_data' => $array_data_ket,
            ],
            [
                'type' => 'text',
                'label' => 'Penulisan data yang benar (*)',
                'name' => 'data_benar',
                'placeholder' => 'Penulisan data yang benar...',
                'value' => isset($row) ? $row->data_benar ?? '' : '',
                'col' => 'col-lg-6',
            ],
            [
                'type' => 'array_input',
                'col' => 'col-lg-12',
                'array_data' => $arrayDataPendukung,
            ],
            [
                'type' => 'select',
                'label' => 'Pilihan kepentingan (*)',
                'name' => 'pilihan_kepentingan',
                'value' => isset($row) ? $row->pilihan_kepentingan ?? '' : '',
                'col' => 'col-lg-6',
                'array_data' => $array_pilihan_kepentingan,
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
                'value' => isset($row) ? UtilsHelper::formatDateLaporan($row->tanggal_pemohon) ?? '' : '',
                'col' => 'col-lg-6',
                'class' => 'datepicker',
            ],
        ];

        return [
            'structureBiodata' => $structureBiodata,
            'structureDataPemohon' => $structureDataPemohon,
            'structurePenutup' => $structurePenutup,
        ];
    }
}
