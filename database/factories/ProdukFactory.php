<?php

namespace Database\Factories;

use App\Models\Produk;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Produk>
 */
class ProdukFactory extends Factory
{
    protected $model = Produk::class;
    public function definition()
    {
        return [
            'nama' => $this->faker->word,
            'deskripsi' => $this->faker->paragraph,
            'harga' => $this->faker->numberBetween(10000, 1000000),
            'kategori_id' => \App\Models\Kategori::factory(), // Assuming Kategori is another model
            'kondisi_id' => \App\Models\Kondisi::factory(), // Assuming Kondisi is another model
            'user_id' => \App\Models\User::factory(),
            'gambar' => $this->faker->imageUrl(),
            'status' => $this->faker->randomElement(['pending', 'accepted', 'rejected']),
            'created_at' => null,
            'updated_at' => null,
        ];
    }
}
