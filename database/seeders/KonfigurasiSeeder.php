<?php

namespace Database\Seeders;

use App\Models\Pengaturan;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class KonfigurasiSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        Pengaturan::create([
            'namaaplikasi_pengaturan' => 'Sistem Surat Menyurat',
            'namainstansi_pengaturan' => 'Pengadilan Negeri',
            'alamat_pengaturan' => 'Alamat Surat Menyurat',
            'notelepon_pengaturan' => '082277506232',
            'deskripsi_pengaturan' => 'Deskripsi Surat Menyurat',
            'logoaplikasi_pengaturan' => 'profile.jpg',
            'video_pengaturan' => '',
        ]);
    }
}
