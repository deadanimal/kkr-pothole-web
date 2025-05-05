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
            'doc_type' => 'NRIC',
            'doc_no' => '888888888888',
            'organisasi' => 'JKR',
            'jawatan' => 'Pengawai',
            'email_verified_at' => "2021-11-30T10:00:41.000000Z"
        ]);
        User::create([
            'name' => 'Super Admin 1',
            'email' => 'superadmin1@email.com',
            'password' => Hash::make('password'),
            'role' => 'super_admin',
            'doc_type' => 'NRIC',
            'doc_no' => '888888888888',
            'organisasi' => 'JKR',
            'jawatan' => 'Pengawai',
            'email_verified_at' => "2021-11-30T10:00:41.000000Z"
        ]);
        User::create([
            'name' => 'Pengadu 1',
            'email' => 'pengadu1@email.com',
            'password' => Hash::make('password'),
            'role' => 'pengadu',
            'doc_type' => 'NRIC',
            'doc_no' => '888888888888',
            'organisasi' => 'ABC Sdn Bhd',
            'email_verified_at' => "2021-11-30T10:00:41.000000Z"
        ]);
    }
}
