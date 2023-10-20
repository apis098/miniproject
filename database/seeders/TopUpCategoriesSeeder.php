<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\TopUpCategories;

class TopUpCategoriesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        TopUpCategories::create([
            'name' => 'Kecil',
            'price' => '20000',
            'foto' => 'image1.png',
           ],
        );
        TopUpCategories::create([
            'name' => 'Sedang',
            'price' => '50000',
            'foto' => 'image2.png',
           ],
        );
        TopUpCategories::create([
            'name' => 'Besar',
            'price' => '100000',
            'foto' => 'image3.png',
           ],
        );
    }
}
