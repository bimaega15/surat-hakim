@php
    $settingApp = UtilsHelp::settingApp();
    $myRoles = UtilsHelp::myRoles();
@endphp
<aside id="layout-menu" class="layout-menu menu-vertical menu bg-menu-theme">
    <div class="app-brand demo">
        <a href="index.html" class="app-brand-link">
            <span class="app-brand-logo demo">

            </span>
            <span class="app-brand-text demo menu-text fw-bold ms-0"
                style="text-transform: capitalize; font-size: 22px;">{{ $settingApp->namaaplikasi_pengaturan }}</span>
        </a>

        <a href="javascript:void(0);" class="layout-menu-toggle menu-link text-large ms-auto d-block d-xl-none">
            <i class="bx bx-chevron-left bx-sm align-middle"></i>
        </a>
    </div>

    <div class="menu-inner-shadow"></div>

    <ul class="menu-inner py-1">
        @php
            $allowedDashboard = ['admin', 'pelanggan', 'kasir', 'karyawan gudang'];
        @endphp
        @if (in_array($myRoles, $allowedDashboard))
            <li class="menu-item {{ request()->is('dashboard') ? 'active' : '' }}">
                <a href="{{ url('dashboard') }}" class="menu-link">
                    <i class="menu-icon tf-icons bx bx-home-circle"></i>
                    <div data-i18n="Basic">Dashboard</div>
                </a>
            </li>
        @endif
        @php
        $allowedMyProfile = ['admin', 'pelanggan', 'kasir', 'karyawan gudang'];
        @endphp
        @if (in_array($myRoles, $allowedMyProfile))
        <li class="menu-item {{ request()->is('myProfile') ? 'active' : '' }}">
            <a href="{{ url('myProfile') }}" class="menu-link">
                <i class='menu-icon tf-icons bx bxs-user-circle'></i>
                <div data-i18n="Basic">My Profile</div>
            </a>
        </li>
        @endif
        
        @php
            $activeRoutePurchase = ['purchase/kasir', 'purchase/penjualan', 'purchase/belumLunas', 'purchase/lunas'];
        @endphp

        @php
        $allowedPenjualan = ['admin', 'kasir', 'pelanggan'];
        @endphp

        @if (in_array($myRoles, $allowedPenjualan))
        <li class="menu-header small text-uppercase">
            <span class="menu-header-text">Transaksi Toko</span>
        </li>
        <li
            class="menu-item {{ collect($activeRoutePurchase)->contains(function ($route) {
                return request()->is($route) || str_starts_with(request()->url(), url($route));
            })
                ? 'active open'
                : '' }}">
            <a href="javascript:void(0);" class="menu-link menu-toggle">
                <i class="menu-icon tf-icons bx bx-money"></i>
                <div data-i18n="Penjualan">Penjualan</div>
            </a>
            <ul class="menu-sub">
                <li class="menu-item {{ request()->is('purchase/kasir') ? 'active' : '' }}">
                    <a href="{{ url('purchase/kasir') }}" class="menu-link">
                        <div data-i18n="Kasir">Kasir</div>
                    </a>
                </li>
                <li class="menu-item {{ request()->is('purchase/penjualan') ? 'active' : '' }}">
                    <a href="{{ url('purchase/penjualan') }}" class="menu-link">
                        <div data-i18n="Invoice Penjualan">Invoice Penjualan</div>
                    </a>
                </li>
                <li class="menu-item {{ request()->is('purchase/belumLunas') ? 'active' : '' }}">
                    <a href="{{ url('purchase/belumLunas') }}" class="menu-link">
                        <div data-i18n="Belum Lunas">Invoice Hutang</div>
                    </a>
                </li>
                <li class="menu-item {{ request()->is('purchase/lunas') ? 'active' : '' }}">
                    <a href="{{ url('purchase/lunas') }}" class="menu-link">
                        <div data-i18n="Invoice Lunas">Invoice Lunas</div>
                    </a>
                </li>
            </ul>
        </li>
        @endif

        @php
            $activeRouteTransaction = [
                'transaction/kasir',
                'transaction/pembelian',
                'transaction/belumLunas',
                'transaction/lunas',
            ];
        @endphp
        @php
        $allowedPembelian = ['admin', 'kasir', 'pelanggan'];
        @endphp

        @if (in_array($myRoles, $allowedPembelian))
        <li
            class="menu-item {{ collect($activeRouteTransaction)->contains(function ($route) {
                return request()->is($route) || str_starts_with(request()->url(), url($route));
            })
                ? 'active open'
                : '' }}">
            <a href="javascript:void(0);" class="menu-link menu-toggle">
                <i class="menu-icon tf-icons bx bx-cart-alt"></i>
                <div data-i18n="Pembelian">Pembelian</div>
            </a>
            <ul class="menu-sub">
                <li class="menu-item {{ request()->is('transaction/kasir') ? 'active' : '' }}">
                    <a href="{{ url('transaction/kasir') }}" class="menu-link">
                        <div data-i18n="Pembelian">Pembelian</div>
                    </a>
                </li>
                <li class="menu-item {{ request()->is('transaction/pembelian') ? 'active' : '' }}">
                    <a href="{{ url('transaction/pembelian') }}" class="menu-link">
                        <div data-i18n="Invoice Pembelian">Invoice Pembelian</div>
                    </a>
                </li>
                <li class="menu-item {{ request()->is('transaction/belumLunas') ? 'active' : '' }}">
                    <a href="{{ url('transaction/belumLunas') }}" class="menu-link">
                        <div data-i18n="Belum Lunas">Invoice Hutang</div>
                    </a>
                </li>
                <li class="menu-item {{ request()->is('transaction/lunas') ? 'active' : '' }}">
                    <a href="{{ url('transaction/lunas') }}" class="menu-link">
                        <div data-i18n="Invoice Lunas">Invoice Lunas</div>
                    </a>
                </li>
            </ul>
        </li>
        @endif

        @php
            $activeRoutesMaster = [
                'master/kategori',
                'master/satuan',
                'master/barang',
                'master/serialBarang',
                'master/generateBarcode',
                'master/customer',
                'master/supplier',
                'master/kategoriPembayaran',
                'master/subPembayaran',
                'master/kategoriPendapatan',
                'master/kategoriPengeluaran',
            ];
        @endphp
        @php
        $allowedMaster = ['admin', 'karyawan gudang', 'kasir'];
        @endphp

        @if (in_array($myRoles, $allowedMaster))
        <li class="menu-header small text-uppercase">
            <span class="menu-header-text">Data Master</span>
        </li>
        <li
            class="menu-item {{ collect($activeRoutesMaster)->contains(function ($route) {
                return request()->is($route) || str_starts_with(request()->url(), url($route));
            })
                ? 'active open'
                : '' }}">
            <a href="javascript:void(0);" class="menu-link menu-toggle">
                <i class="menu-icon tf-icons bx bx-dock-top"></i>
                <div data-i18n="Data Master">Data Master</div>
            </a>
            <ul class="menu-sub">
                @if (in_array($myRoles, ['admin']))
                <li class="menu-item {{ request()->is('master/kategori') ? 'active' : '' }}">
                    <a href="{{ url('master/kategori') }}" class="menu-link">
                        <div data-i18n="Kategori">Kategori</div>
                    </a>
                </li>
                @endif
                @if (in_array($myRoles, ['admin']))
                <li class="menu-item {{ request()->is('master/satuan') ? 'active' : '' }}">
                    <a href="{{ url('master/satuan') }}" class="menu-link">
                        <div data-i18n="Satuan">Satuan</div>
                    </a>
                </li>
                @endif
                <li class="menu-item {{ request()->is('master/barang') ? 'active' : '' }}">
                    <a href="{{ url('master/barang') }}" class="menu-link">
                        <div data-i18n="Barang">Barang</div>
                    </a>
                </li>
                @if (in_array($myRoles, ['admin']))
                <li class="menu-item {{ request()->is('master/customer') ? 'active' : '' }}">
                    <a href="{{ url('master/customer') }}" class="menu-link">
                        <div data-i18n="Customer">Customer</div>
                    </a>
                </li>
                @endif
                @if (in_array($myRoles, ['admin', 'kasir']))
                <li class="menu-item {{ request()->is('master/supplier') ? 'active' : '' }}">
                    <a href="{{ url('master/supplier') }}" class="menu-link">
                        <div data-i18n="Supplier">Supplier</div>
                    </a>
                </li>
                @endif

                {{-- <li class="menu-item {{ request()->is('master/kategoriPembayaran') ? 'active' : '' }}">
                    <a href="{{ url('master/kategoriPembayaran') }}" class="menu-link">
                        <div data-i18n="Kategori Pembayaran">Kategori Pembayaran</div>
                    </a>
                </li> --}}
                @if (in_array($myRoles, ['admin']))
                <li class="menu-item {{ request()->is('master/subPembayaran') ? 'active' : '' }}">
                    <a href="{{ url('master/subPembayaran') }}" class="menu-link">
                        <div data-i18n="Sub Pembayaran">Pembayaran</div>
                    </a>
                </li>
                @endif
                @if (in_array($myRoles, ['admin']))
                <li class="menu-item {{ request()->is('master/kategoriPendapatan') ? 'active' : '' }}">
                    <a href="{{ url('master/kategoriPendapatan') }}" class="menu-link">
                        <div data-i18n="Kategori Pendapatan">Kategori Pendapatan</div>
                    </a>
                </li>
                @endif
                @if (in_array($myRoles, ['admin']))
                <li class="menu-item {{ request()->is('master/kategoriPengeluaran') ? 'active' : '' }}">
                    <a href="{{ url('master/kategoriPengeluaran') }}" class="menu-link">
                        <div data-i18n="Kategori Pengeluaran">Kategori Pengeluaran</div>
                    </a>
                </li>
                @endif
            </ul>
        </li>
        @endif


        @php
            $activeRoutesLaporan = ['report/pendapatan', 'report/pengeluaran', 'report/labaBersih'];
        @endphp
        @php
        $allowedLaporan = ['admin'];
        @endphp
        
        @if (in_array($myRoles, $allowedLaporan))
        <li class="menu-header small text-uppercase">
            <span class="menu-header-text">Laporan</span>
        </li>
        <li
            class="menu-item {{ collect($activeRoutesLaporan)->contains(function ($route) {
                return request()->is($route) || str_starts_with(request()->url(), url($route));
            })
                ? 'active open'
                : '' }}">
            <a href="javascript:void(0);" class="menu-link menu-toggle">
                <i class="menu-icon tf-icons bx bxs-report"></i>
                <div data-i18n="Laba Bersih">Laba Bersih</div>
            </a>
            <ul class="menu-sub">
                <li class="menu-item {{ request()->is('report/pendapatan') ? 'active' : '' }}">
                    <a href="{{ url('report/pendapatan') }}" class="menu-link">
                        <div data-i18n="Pendapatan">Pendapatan</div>
                    </a>
                </li>
                <li class="menu-item {{ request()->is('report/pengeluaran') ? 'active' : '' }}">
                    <a href="{{ url('report/pengeluaran') }}" class="menu-link">
                        <div data-i18n="Pengeluaran">Pengeluaran</div>
                    </a>
                </li>
                <li class="menu-item {{ request()->is('report/labaBersih') ? 'active' : '' }}">
                    <a href="{{ url('report/labaBersih') }}" class="menu-link">
                        <div data-i18n="Laba Bersih">Laba Bersih</div>
                    </a>
                </li>
            </ul>
        </li>
        @endif

        @php
            $activeRoutesLaporanToko = [
                'report/kasir',
                'report/customer',
                'report/periode',
                'report/produk',
                'report/supplier',
                'report/pembelianProduk',
                'report/periodePembelian',
                'report/barangTerlaris',
                'report/stokTerkecil',
            ];
        @endphp
 
        @php
        $allowedLaporanToko = ['admin'];
        @endphp
        @if (in_array($myRoles, $allowedLaporanToko))
        <li
            class="menu-item {{ collect($activeRoutesLaporanToko)->contains(function ($route) {
                return request()->is($route) || str_starts_with(request()->url(), url($route));
            })
                ? 'active open'
                : '' }}">
            <a href="javascript:void(0);" class="menu-link menu-toggle">
                <i class="menu-icon tf-icons bx bxs-report"></i>
                <div data-i18n="Laporan Toko">Laporan Toko</div>
            </a>
            <ul class="menu-sub">
                <li class="menu-item {{ request()->is('report/kasir') ? 'active' : '' }}">
                    <a href="{{ url('report/kasir') }}" class="menu-link">
                        <div data-i18n="Kasir">Kasir</div>
                    </a>
                </li>
                <li class="menu-item {{ request()->is('report/customer') ? 'active' : '' }}">
                    <a href="{{ url('report/customer') }}" class="menu-link">
                        <div data-i18n="Customer">Customer</div>
                    </a>
                </li>
                <li class="menu-item {{ request()->is('report/periode') ? 'active' : '' }}">
                    <a href="{{ url('report/periode') }}" class="menu-link">
                        <div data-i18n="Periode">Periode</div>
                    </a>
                </li>
                <li class="menu-item {{ request()->is('report/produk') ? 'active' : '' }}">
                    <a href="{{ url('report/produk') }}" class="menu-link">
                        <div data-i18n="Produk">Produk</div>
                    </a>
                </li>
                <li class="menu-item {{ request()->is('report/supplier') ? 'active' : '' }}">
                    <a href="{{ url('report/supplier') }}" class="menu-link">
                        <div data-i18n="Supplier">Supplier</div>
                    </a>
                </li>
                <li class="menu-item {{ request()->is('report/pembelianProduk') ? 'active' : '' }}">
                    <a href="{{ url('report/pembelianProduk') }}" class="menu-link">
                        <div data-i18n="Pembelian Produk">Pembelian Produk</div>
                    </a>
                </li>
                <li class="menu-item {{ request()->is('report/periodePembelian') ? 'active' : '' }}">
                    <a href="{{ url('report/periodePembelian') }}" class="menu-link">
                        <div data-i18n="Periode Pembelian">Periode Pembelian</div>
                    </a>
                </li>
                <li class="menu-item {{ request()->is('report/barangTerlaris') ? 'active' : '' }}">
                    <a href="{{ url('report/barangTerlaris') }}" class="menu-link">
                        <div data-i18n="B   arang Terlaris">Barang Terlaris</div>
                    </a>
                </li>
                <li class="menu-item {{ request()->is('report/stokTerkecil') ? 'active' : '' }}">
                    <a href="{{ url('report/stokTerkecil') }}" class="menu-link">
                        <div data-i18n="Stok Terkecil">Stok Terkecil</div>
                    </a>
                </li>
            </ul>
        </li>
        @endif


        @php
        $activeRoutesPengaturan = [
            'setting/menu',
            'setting/permissions',
            'setting/user',
            'setting/roles',
            'setting/pengaturan',
        ];
    @endphp
    @php
    $allowedPengaturan = ['admin', 'kasir'];
    @endphp
    @if (in_array($myRoles, $allowedPengaturan))
        <li class="menu-header small text-uppercase"><span class="menu-header-text">Konfigurasi</span></li>
        <li class="menu-item {{ collect($activeRoutesPengaturan)->contains(function ($route) {
                return request()->is($route) || str_starts_with(request()->url(), url($route));
            })
                ? 'active open'
                : '' }}">
            <a href="javascript:void(0);" class="menu-link menu-toggle">
                <i class="menu-icon tf-icons bx bxs-lock"></i>
                <div data-i18n="Pengaturan">Pengaturan</div>
            </a>
            <ul class="menu-sub">
                @if (in_array($myRoles, ['admin']))
                <li class="menu-item {{ request()->is('setting/menu') ? 'active' : '' }}">
                    <a href="{{ url('setting/menu') }}" class="menu-link">
                        <div data-i18n="Menu">Menu</div>
                    </a>
                </li>
                @endif
                @if (in_array($myRoles, ['admin']))
                <li class="menu-item {{ request()->is('setting/permissions') ? 'active' : '' }}">
                    <a href="{{ url('setting/permissions') }}" class="menu-link">
                        <div data-i18n="Permission">Permission</div>
                    </a>
                </li>
                @endif
                <li class="menu-item {{ request()->is('setting/user') ? 'active' : '' }}">
                    <a href="{{ url('setting/user') }}" class="menu-link">
                        <div data-i18n="User">User</div>
                    </a>
                </li>
                @if (in_array($myRoles, ['admin']))
                <li class="menu-item {{ request()->is('setting/roles') ? 'active' : '' }}">
                    <a href="{{ url('setting/roles') }}" class="menu-link">
                        <div data-i18n="Role">Role</div>
                    </a>
                </li>
                @endif
                @if (in_array($myRoles, ['admin']))
                <li class="menu-item {{ request()->is('setting/pengaturan') ? 'active' : '' }}">
                    <a href="{{ url('setting/pengaturan') }}" class="menu-link">
                        <div data-i18n="Profile">Profile</div>
                    </a>
                </li>
                @endif
    
            </ul>
        </li>
    @endif

        <li class="menu-item {{ request()->is('setting/logout') ? 'active' : '' }}">
            <a href="{{ url('setting/logout') }}" class="menu-link">
                <i class='menu-icon tf-icons bx bx-log-out'></i>
                <div data-i18n="Logout">Logout</div>
            </a>
        </li>
    </ul>
</aside>
