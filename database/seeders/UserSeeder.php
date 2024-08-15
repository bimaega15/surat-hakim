<?php

namespace Database\Seeders;

use App\Models\Profile;
use App\Models\Roles;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $roles = Roles::create([
            'name' => 'Admin',
            'guard_name' => 'web',
        ]);

        $user = User::create([
            'name' => 'admin',
            'email' => 'admin@gmail.com',
            'username' => 'admin',
            'password' => Hash::make('password'),
            'roles_id' => $roles->id,
        ]);
        $user->assignRole('Admin');

        Profile::create([
            'nama_profile' => 'admin',
            'nohp_profile' => '082277506232',
            'alamat_profile' => "Jakarta pusat",
            'jeniskelamin_profile' => "L",
            'users_id' => $user->id,
        ]);
    }
}
