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
        'role' => 'koki',
        'isSuperUser' => 'yes',
        'biodata' => 'Koki sikoki, Diana 10 Desember 2000 Jalan Kenanga 1 Cijantung Nomor 0821394444666 andianaputri@omail.com Hobi Membaca dan Memasak Sarjana Strata - 1 Universitas Merdeka Indonesia Ilmu Ekonomi Belum Ada Pengalaman Ketua UKM Tari Fakultas Ilmu Ekonomi UMIndo 2021-2022 Motto Hidup: Jadilah diri sendiri meskipun jadi orang lain kelihatan lebih mudah.',
       ],
    );
    User::create([
        'name' => 'dummy',
        'email' => 'dummy@gmail.com',
        'password' => Hash::make('dummy123'),
        'role' => 'koki',
        'biodata' => 'Goyang Dummy, Diana 10 Desember 2000 Jalan Kenanga 1 Cijantung Nomor 0821394444666 andianaputri@omail.com Hobi Membaca dan Memasak Sarjana Strata - 1 Universitas Merdeka Indonesia Ilmu Ekonomi Belum Ada Pengalaman Ketua UKM Tari Fakultas Ilmu Ekonomi UMIndo 2021-2022 Motto Hidup: Jadilah diri sendiri meskipun jadi orang lain kelihatan lebih mudah.',
       ],
    );
    User::create([
        'name' => 'user',
        'email' => 'user@gmail.com',
        'password' => Hash::make('user123'),
        'role' => 'koki',
        'biodata' => 'User Diana Putri, Diana 10 Desember 2000 Jalan Kenanga 1 Cijantung Nomor 0821394444666 andianaputri@omail.com Hobi Membaca dan Memasak Sarjana Strata - 1 Universitas Merdeka Indonesia Ilmu Ekonomi Belum Ada Pengalaman Ketua UKM Tari Fakultas Ilmu Ekonomi UMIndo 2021-2022 Motto Hidup: Jadilah diri sendiri meskipun jadi orang lain kelihatan lebih mudah.',
       ],
    );
    User::create([
        'name' => 'Arif',
        'email' => 'arif@gmail.com',
        'password' => Hash::make('arif123'),
        'role' => 'koki',
        'biodata' => 'King Arif udin, Diana 10 Desember 2000 Jalan Kenanga 1 Cijantung Nomor 0821394444666 andianaputri@omail.com Hobi Membaca dan Memasak Sarjana Strata - 1 Universitas Merdeka Indonesia Ilmu Ekonomi Belum Ada Pengalaman Ketua UKM Tari Fakultas Ilmu Ekonomi UMIndo 2021-2022 Motto Hidup: Jadilah diri sendiri meskipun jadi orang lain kelihatan lebih mudah.',
       ],
    );
    User::create([
        'name' => 'Reno',
        'email' => 'reno@gmail.com',
        'password' => Hash::make('reno123'),
        'role' => 'koki',
        'biodata' => 'Reno Zulham Zamrud, Diana 10 Desember 2000 Jalan Kenanga 1 Cijantung Nomor 0821394444666 andianaputri@omail.com Hobi Membaca dan Memasak Sarjana Strata - 1 Universitas Merdeka Indonesia Ilmu Ekonomi Belum Ada Pengalaman Ketua UKM Tari Fakultas Ilmu Ekonomi UMIndo 2021-2022 Motto Hidup: Jadilah diri sendiri meskipun jadi orang lain kelihatan lebih mudah.',
       ],
    );
    User::create([
        'name' => 'Clara',
        'email' => 'clara@gmail.com',
        'password' => Hash::make('clara123'),
        'role' => 'koki',
        'biodata' => 'Clara Mongstar, Diana 10 Desember 2000 Jalan Kenanga 1 Cijantung Nomor 0821394444666 andianaputri@omail.com Hobi Membaca dan Memasak Sarjana Strata - 1 Universitas Merdeka Indonesia Ilmu Ekonomi Belum Ada Pengalaman Ketua UKM Tari Fakultas Ilmu Ekonomi UMIndo 2021-2022 Motto Hidup: Jadilah diri sendiri meskipun jadi orang lain kelihatan lebih mudah.',
       ],
    );
    User::create([
        'name' => 'Hamdan',
        'email' => 'hamdan@gmail.com',
        'password' => Hash::make('hamdan123'),
        'role' => 'koki',
        'biodata' => 'Hamdan Himdun, Diana 10 Desember 2000 Jalan Kenanga 1 Cijantung Nomor 0821394444666 andianaputri@omail.com Hobi Membaca dan Memasak Sarjana Strata - 1 Universitas Merdeka Indonesia Ilmu Ekonomi Belum Ada Pengalaman Ketua UKM Tari Fakultas Ilmu Ekonomi UMIndo 2021-2022 Motto Hidup: Jadilah diri sendiri meskipun jadi orang lain kelihatan lebih mudah.',
       ],
    );
    User::create([
        'name' => 'Rahmat',
        'email' => 'rahmat@gmail.com',
        'password' => Hash::make('rahmat123'),
        'role' => 'koki',
        'biodata' => 'Rahmat Supri adi, Diana 10 Desember 2000 Jalan Kenanga 1 Cijantung Nomor 0821394444666 andianaputri@omail.com Hobi Membaca dan Memasak Sarjana Strata - 1 Universitas Merdeka Indonesia Ilmu Ekonomi Belum Ada Pengalaman Ketua UKM Tari Fakultas Ilmu Ekonomi UMIndo 2021-2022 Motto Hidup: Jadilah diri sendiri meskipun jadi orang lain kelihatan lebih mudah.',
       ],
    );
    User::create([
        'name' => 'Daffa',
        'email' => 'daffa@gmail.com',
        'password' => Hash::make('daffa123'),
        'role' => 'koki',
        'biodata' => 'Lord daffa, Diana 10 Desember 2000 Jalan Kenanga 1 Cijantung Nomor 0821394444666 andianaputri@omail.com Hobi Membaca dan Memasak Sarjana Strata - 1 Universitas Merdeka Indonesia Ilmu Ekonomi Belum Ada Pengalaman Ketua UKM Tari Fakultas Ilmu Ekonomi UMIndo 2021-2022 Motto Hidup: Jadilah diri sendiri meskipun jadi orang lain kelihatan lebih mudah.',
       ],
    );
    }
}
