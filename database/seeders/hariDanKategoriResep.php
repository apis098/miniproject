<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class hariDanKategoriResep extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('kategori_makanans')->insert([
            'nama_makanan' => 'Appetizers'
        ]);
        DB::table('kategori_makanans')->insert([
            'nama_makanan' => 'Main Food'
        ]);
        DB::table('kategori_makanans')->insert([
            'nama_makanan' => 'Desserts'
        ]);
        DB::table('kategori_makanans')->insert([
            'nama_makanan' => 'Health Food'
        ]);
        DB::table('kategori_makanans')->insert([
            'nama_makanan' => 'Fast Food'
        ]);
        DB::table('special_days')->insert([
            'nama' => 'Lebaran'
        ]);
        DB::table('special_days')->insert([
            'nama' => 'Arisan'
        ]);
        DB::table('special_days')->insert([
            'nama' => 'Natal'
        ]);
        DB::table('special_days')->insert([
            'nama' => 'Ulang Tahun'
        ]);
        DB::table('special_days')->insert([
            'nama' => 'Valentine'
        ]);
    }
}
