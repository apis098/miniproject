<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AboutSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('abouts')->insert([
            'judul' => 'Tentang',
            'isi' => 'Lorem ipsum dolor, sit amet consectetur adipisicing elit. Repellendus delectus odio explicabo ducimus aperiam praesentium, molestias dignissimos. Facilis tempore commodi eligendi fugiat itaque eaque hic.'
        ]);
    }
}
