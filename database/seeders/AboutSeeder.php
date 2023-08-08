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
            'isi' => 'Selamat Datang di HummaCook!


            HummaCook adalah online media portal yang menyajikan kumpulan aneka resep masakan untuk menginspirasi para pehobi masak. Menyajikan resep-resep rumahan yang mudah dibuat oleh semua orang, dan bahan-bahan masakan yang mudah didapatkan.

            Resep-resep ditulis oleh teman-teman food blogger seantero Nusantara yang sudah berpengalaman di bidang masak memasak. Harapan kami semua orang bisa memasak dengan mudah dan berhasil, supaya dapat disajikan dengan sempurna untuk keluarga tercinta. Semua resep di sini telah teruji dapur dan foto yang ditampilkan adalah original/hasil aslinya.


            Terima Kasih.'
        ]);
    }
}
