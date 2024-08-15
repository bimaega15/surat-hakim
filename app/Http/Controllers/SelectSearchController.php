<?php

namespace App\Http\Controllers;

use App\Http\Helpers\UtilsHelper;
use App\Models\Barang;
use App\Models\Customer;
use App\Models\KategoriPembayaran;
use App\Models\Supplier;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;


class SelectSearchController extends Controller
{
    public function kasir(Request $request)
    {
        $search = $request->input('search');
        $page = $request->input('page');
        $getUsers = new User();
        $dataUsers = $getUsers->getUsersKasir();
        if ($search != '') {
            $dataUsers->whereHas('roles', function ($query) use ($search) {
                $query->where('name', 'like', '%' . $search . '%');
            })
                ->orWhere('name', 'like', '%' . $search . '%');
        }
        $dataUsers = $dataUsers->paginate(10, ['*'], 'page', $page);

        $output = [];
        if ($page == 1) {
            $output[] = [
                'id' => '-',
                'text' => 'Pilih Semua',
            ];
        }

        foreach ($dataUsers as $key => $item) {
            $output[] = [
                'id' => $item->id,
                'text' => '<strong>Nama: ' . $item->name . '</strong><br />
                <span>Role: ' . $item->roles[0]->name . '</span>',
            ];
        }

        // count filtered
        $countFiltered = $getUsers->getUsersKasir();
        if ($search != '') {
            $countFiltered->whereHas('roles', function ($query) use ($search) {
                $query->where('name', 'like', '%' . $search . '%');
            })
                ->orWhere('name', 'like', '%' . $search . '%');
        }
        $countFiltered = $countFiltered->count();

        return response()->json([
            'results' => $output,
            'count_filtered' => $countFiltered,
        ]);
    }

    public function customer(Request $request)
    {
        $search = $request->input('search');
        $page = $request->input('page');
        $getCustomer = Customer::dataTable()
            ->where('status_customer', true);
        if ($search != '') {
            $getCustomer->where('nama_customer', 'like', '%' . $search . '%')
                ->orWhere('nowa_customer', 'like', '%' . $search . '%');
        }
        $getCustomer = $getCustomer->paginate(10, ['*'], 'page', $page);

        $output = [];
        if ($page == 1) {
            $output[] = [
                'id' => '-',
                'text' => 'Pilih Semua',
            ];
        }

        foreach ($getCustomer as $key => $item) {
            $output[] = [
                'id' => $item->id,
                'text' => '<strong>Nama: ' . $item->nama_customer . '</strong><br />
                <span>No. Whatsapp: ' . $item->nowa_customer . '</span>',
            ];
        }

        // count filtered
        $countFiltered = Customer::dataTable()
            ->where('status_customer', true);
        if ($search != '') {
            $countFiltered->where('nama_customer', 'like', '%' . $search . '%')
                ->orWhere('nowa_customer', 'like', '%' . $search . '%');
        }
        $countFiltered = $countFiltered->count();

        return response()->json([
            'results' => $output,
            'count_filtered' => $countFiltered,
        ]);
    }

    public function barang(Request $request)
    {
        $search = $request->input('search');
        $page = $request->input('page');
        $status_barang = explode(',', $request->input('status_barang'));

        $new_status_barang = [];
        if ($status_barang[0] != '') {
            foreach ($status_barang as $key => $item) {
                $new_status_barang[] = trim($item);
            }
        }


        $getBarang = Barang::select("*");
        if (count($new_status_barang) > 0) {
            $getBarang = $getBarang->whereIn('status_barang', $new_status_barang);
        }

        if ($search != '') {
            $getBarang = $getBarang->where(function ($query) use ($search) {
                $query->where('barcode_barang', 'like', '%' . $search . '%')
                    ->orWhere('nama_barang', 'like', '%' . $search . '%');
            });
        }
        $getBarang = $getBarang->paginate(10, ['*'], 'page', $page);
        if ($page == 1) {
            $output[] = [
                'id' => '-',
                'text' => 'Pilih Semua',
            ];
        }

        foreach ($getBarang as $key => $item) {
            $output[] = [
                'id' => $item->id,
                'text' => '<strong>[' . $item->barcode_barang . '] ' . $item->nama_barang . '</strong><br />
                <span>Stok Barang: ' . UtilsHelper::formatUang($item->stok_barang) . '</span>',
            ];
        }

        // count filtered
        $countFiltered = Barang::select('*');
        if (count($new_status_barang) > 0) {
            $countFiltered = $countFiltered->whereIn('status_barang', $new_status_barang);
        }
        if ($search != '') {
            $countFiltered = $countFiltered->where(function ($query) use ($search) {
                $query->where('barcode_barang', 'like', '%' . $search . '%')
                    ->orWhere('nama_barang', 'like', '%' . $search . '%');
            });
        }
        $countFiltered = $countFiltered->count();

        return response()->json([
            'results' => $output,
            'count_filtered' => $countFiltered,
        ]);
    }

    public function kategoriPembayaran(Request $request)
    {
        $search = $request->input('search');
        $page = $request->input('page');

        $getKategoriPembayaran = KategoriPembayaran::dataTable()
            ->where('status_kpembayaran', true);
        if ($search != '') {
            $getKategoriPembayaran->where('nama_kpembayaran', 'like', '%' . $search . '%');
        }
        $getKategoriPembayaran = $getKategoriPembayaran->paginate(10, ['*'], 'page', $page);

        $output = [];
        if ($page == 1) {
            $output[] = [
                'id' => '-',
                'text' => 'Pilih Semua',
            ];
        }
        foreach ($getKategoriPembayaran as $key => $item) {
            $output[] = [
                'id' => $item->id,
                'text' => $item->nama_kpembayaran,
            ];
        }

        // count filtered
        $countFiltered = kategoriPembayaran::dataTable()
            ->where('status_kpembayaran', true);
        if ($search != '') {
            $countFiltered->where('nama_kpembayaran', 'like', '%' . $search . '%');
        }
        $countFiltered = $countFiltered->count();

        return response()->json([
            'results' => $output,
            'count_filtered' => $countFiltered,
        ]);
    }

    public function supplier(Request $request)
    {
        $search = $request->input('search');
        $page = $request->input('page');

        $getSupplier = Supplier::dataTable()
            ->where('status_supplier', true);
        if ($search != '') {
            $getSupplier->where('nama_supplier', 'like', '%' . $search . '%')
                ->orWhere('nowa_supplier', 'like', '%' . $search . '%');
        }
        $getSupplier = $getSupplier->paginate(10, ['*'], 'page', $page);

        $output = [];
        if ($page == 1) {
            $output[] = [
                'id' => '-',
                'text' => 'Pilih Semua',
            ];
        }
        foreach ($getSupplier as $key => $item) {
            $output[] = [
                'id' => $item->id,
                'text' => '
                    <strong>Nama Supplier: ' . $item->nama_supplier . '</strong><br />
                    <span>No. Whats\'app: ' . $item->nowa_supplier . '</span>
                ',
            ];
        }

        // count filtered
        $countFiltered = Supplier::dataTable()
            ->where('status_supplier', true);
        if ($search != '') {
            $countFiltered->where('nama_supplier', 'like', '%' . $search . '%')
                ->orWhere('nowa_supplier', 'like', '%' . $search . '%');
        }
        $countFiltered = $countFiltered->count();

        return response()->json([
            'results' => $output,
            'count_filtered' => $countFiltered,
        ]);
    }

    public function users(Request $request)
    {
        $search = $request->input('search');
        $page = $request->input('page');
        $role = $request->input('role');

        $getUsers = User::dataTable()->with('profile')
            ->whereHas('roles', function ($query) use ($role) {
                $query->where('name', 'like', '%' . $role . '%');
            });
        if ($search != '') {
            $getUsers->whereHas('profile', function ($query) use ($search) {
                $query->where('nama_profile', 'like', '%' . $search . '%')
                    ->orWhere('nohp_profile', 'like', '%' . $search . '%');
            });
        }
        $getUsers = $getUsers->where('status_users', true)
            ->paginate(10, ['*'], 'page', $page);

        $output = [];
        if ($page == 1) {
            $output[] = [
                'id' => '-',
                'text' => 'Pilih Semua',
            ];
        }
        foreach ($getUsers as $key => $item) {
            $output[] = [
                'id' => $item->id,
                'text' => '
                    <strong>Nama: ' . $item->profile->nama_profile . '</strong><br />
                    <span>No. Telepon: ' . $item->profile->nohp_profile . '</span>
                ',
            ];
        }

        // count filtered
        $countFiltered = User::dataTable()
            ->whereHas('roles', function ($query) use ($role) {
                $query->where('name', 'like', '%' . $role . '%');
            });
        if ($search != '') {
            $countFiltered->whereHas('profile', function ($query) use ($search) {
                $query->where('nama_profile', 'like', '%' . $search . '%')
                    ->orWhere('nohp_profile', 'like', '%' . $search . '%');
            });
        }

        $countFiltered = $countFiltered->where('status_users', true)
            ->count();

        return response()->json([
            'results' => $output,
            'count_filtered' => $countFiltered,
        ]);
    }
}
