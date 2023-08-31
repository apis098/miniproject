<?php

namespace Database\Seeders;

use App\Models\footer;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class FooterSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        footer::create([
        'facebook'=>'https://facebook.com/@hummacook.fb',
        'youtube'=>'https://youtube.com/@hummacook.ytb',
        'twitter'=>'https://twitter/@hummacook.tweet',
        'instagram'=>'https://instagram/@hummacook.official',
        'kontak'=>'wa.me/081233876131',
        'telegram'=>'t.me/hummacookstele',
        'email'=>'hummacook@gmail.com',
        'lokasi'=>'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3951.952145574648!2d112.60431107429163!3d-7.900068678606525!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e7881c2c4637501%3A0x10433eaf1fb2fb4c!2sHummasoft%20Technology!5e0!3m2!1sid!2sid!4v1693025443065!5m2!1sid!2sid',
        ]);
    }
}
