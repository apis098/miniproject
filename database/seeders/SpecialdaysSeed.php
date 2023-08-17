<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SpecialdaysSeed extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('special_days')->insert([
            "name" => "valentine",
            "description" => "hari spesial bagi pasangan kekasih setiap 14 februari."
        ]);
        DB::table('special_days')->insert([
            "name" => "ulang tahun",
            "description" => "hari spesial setiap tahunnya."
        ]);
        DB::table('special_days')->insert([
            "name" => "tahun baru",
            "description" => "hari spesial setiap tahunnya."
        ]);
    }
}
