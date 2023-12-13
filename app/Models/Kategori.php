<?php

namespace App\Models;

use App\Models\Produk;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Kategori extends Model
{
    use HasFactory;
    use HasFactory;
    protected $table = 'kategoris';
    protected $fillable = ['name'];
    public function produk(){
        return $this->hasMany(Produk::class);
    }
}
