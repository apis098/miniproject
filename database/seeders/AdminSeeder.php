<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::create(
            [
                'name' => 'Admin',
                'email' => 'admin_laporan@gmail.com',
                'password' => Hash::make('admin123'),
                'role' => 'admin',
                'isSuperUser' => 'admin_laporan'
            ],
        );

        User::create(
            [
                'name' => 'Admin',
                'email' => 'admin_informasi_web@gmail.com',
                'password' => Hash::make('admin123'),
                'role' => 'admin',
                'isSuperUser' => 'admin_informasi_web'
            ],
        );

        User::create(
            [
                'name' => 'Admin',
                'email' => 'admin_keuangan@gmail.com',
                'password' => Hash::make('admin123'),
                'role' => 'admin',
                'isSuperUser' => 'admin_keuangan'
            ],
        );

        User::create(
            [
                'name' => 'Admin',
                'email' => 'admin_approval@gmail.com',
                'password' => Hash::make('admin123'),
                'role' => 'admin',
                'isSuperUser' => 'admin_approval'
            ],
        );

        User::create(
            [
                'name' => 'koki',
                'email' => 'koki@gmail.com',
                'password' => Hash::make('koki123'),
                'role' => 'koki',
                'isSuperUser' => 'yes',
            ],
        );
        User::create(
            [
                'name' => 'dummy',
                'email' => 'dummy@gmail.com',
                'password' => Hash::make('dummy123'),
                'role' => 'koki',
                'isSuperUser' => 'yes',
            ],
        );
        User::create(
            [
                'name' => 'user',
                'email' => 'user@gmail.com',
                'password' => Hash::make('user123'),
                'role' => 'koki',
                'isSuperUser' => 'yes',
            ],
        );
        User::create(
            [
                'name' => 'Arif',
                'email' => 'arif@gmail.com',
                'password' => Hash::make('arif123'),
                'role' => 'koki',
            ],
        );
        User::create(
            [
                'name' => 'Reno',
                'email' => 'reno@gmail.com',
                'password' => Hash::make('reno123'),
                'role' => 'koki',
            ],
        );
        User::create(
            [
                'name' => 'Clara',
                'email' => 'clara@gmail.com',
                'password' => Hash::make('clara123'),
                'role' => 'koki',
            ],
        );
        User::create(
            [
                'name' => 'Hamdan',
                'email' => 'hamdan@gmail.com',
                'password' => Hash::make('hamdan123'),
                'role' => 'koki',
            ],
        );
        User::create(
            [
                'name' => 'Rahmat',
                'email' => 'rahmat@gmail.com',
                'password' => Hash::make('rahmat123'),
                'role' => 'koki',
            ],
        );
        User::create(
            [
                'name' => 'Daffa',
                'email' => 'daffa@gmail.com',
                'password' => Hash::make('daffa123'),
                'role' => 'koki',
            ],
        );
    }
}
