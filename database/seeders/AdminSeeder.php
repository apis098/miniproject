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
       User::create([
        'name' => 'Admin',
        'email' => 'admin@gmail.com',
        'password' => Hash::make('admin123'),
        'role' => 'admin'
       ],
    );
    User::create([
        'name' => 'koki',
        'email' => 'koki@gmail.com',
        'password' => Hash::make('koki123'),
        'role' => 'koki'
       ],
    );
    User::create([
        'name' => 'dummy',
        'email' => 'dummy@gmail.com',
        'password' => Hash::make('dummy123'),
        'role' => 'koki'
       ],
    );
    User::create([
        'name' => 'user',
        'email' => 'user@gmail.com',
        'password' => Hash::make('user123'),
        'role' => 'koki'
       ],
    );
    }
}