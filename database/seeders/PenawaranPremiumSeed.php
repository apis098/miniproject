<?php

namespace Database\Seeders;

use App\Models\DetailPremiums;
use App\Models\Premiums;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PenawaranPremiumSeed extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $premiums1 = Premiums::create([
            'nama_paket' => 'Premium Biasa',
            'harga_paket' => 12000,
            'durasi_paket' => 30,
        ]);
        $premiums2 = Premiums::create([
            'nama_paket' => 'Premium Dasar',
            'harga_paket' => 24000,
            'durasi_paket' => 60,
        ]);
        $premiums3 = Premiums::create([
            'nama_paket' => 'Premium Standar',
            'harga_paket' => 36000,
            'durasi_paket' => 90,
        ]);
        DetailPremiums::create([
            'premium_id' => $premiums1->id,
            'detail' => 'Mengakses resep premium'
        ]);
        DetailPremiums::create([
            'premium_id' => $premiums1->id,
            'detail' => 'Mengakses feed premium',
        ]);
        DetailPremiums::create([
            'premium_id' => $premiums2->id,
            'detail' => 'Akses premium selama 1 bulan',
        ]);
        DetailPremiums::create([
            'premium_id' => $premiums2->id,
            'detail' => 'Mengakses resep premium'
        ]);
        DetailPremiums::create([
            'premium_id' => $premiums2->id,
            'detail' => 'Mengakses feed premium',
        ]);
        DetailPremiums::create([
            'premium_id' => $premiums1->id,
            'detail' => 'Akses premium selama 1 bulan',
        ]);
        DetailPremiums::create([
            'premium_id' => $premiums3->id,
            'detail' => 'Mengakses resep premium'
        ]);
        DetailPremiums::create([
            'premium_id' => $premiums3->id,
            'detail' => 'Mengakses feed premium',
        ]);
        DetailPremiums::create([
            'premium_id' => $premiums3->id,
            'detail' => 'Akses premium selama 1 bulan',
        ]);
    }
}
