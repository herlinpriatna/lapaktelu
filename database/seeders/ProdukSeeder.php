<?php

namespace Database\Seeders;

use App\Models\Produk;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class ProdukSeeder extends Seeder
{
    public function run()
    {
        // Menggunakan DB Facade
        DB::table('produks')->insert([
            'nama' => 'Nama Produk',
            'deskripsi' => 'Deskripsi Produk',
            'harga' => 100, // Ganti dengan harga yang sesuai
            'kategori_id' => 1, // Ganti dengan ID kategori yang sesuai
            'kondisi_id' => 1, // Ganti dengan ID kondisi yang sesuai
            'user_id' => 1, // Ganti dengan ID user yang sesuai
            'gambar' => 'path/gambar.jpg', // Ganti dengan path gambar yang sesuai
            'status' => 'accepted',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        // Menggunakan model Eloquent
        Produk::create([
            'nama' => 'Nama Produk 2',
            'deskripsi' => 'Deskripsi Produk 2',
            'harga' => 200, // Ganti dengan harga yang sesuai
            'kategori_id' => 2, // Ganti dengan ID kategori yang sesuai
            'kondisi_id' => 2, // Ganti dengan ID kondisi yang sesuai
            'user_id' => 2, // Ganti dengan ID user yang sesuai
            'gambar' => 'path/gambar2.jpg', // Ganti dengan path gambar yang sesuai
            'status' => 'accepted',
        ]);
    }
}