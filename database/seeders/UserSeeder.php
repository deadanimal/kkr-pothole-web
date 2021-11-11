<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

use App\Models\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'name' => 'Admin Jalan 1',
            'email' => 'adminjalan1@email.com',
            'password' => Hash::make('password'),
            'role' => 'admin',
        ]);
        User::create([
            'name' => 'Super Admin 1',
            'email' => 'superadmin1@email.com',
            'password' => Hash::make('password'),
            'role' => 'super_admin',
        ]);
        User::create([
            'name' => 'Pengadu 1',
            'email' => 'pengadu1@email.com',
            'password' => Hash::make('password'),
            'role' => 'pengadu',
        ]);
    }
}
