<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class jualModel extends Model
{
    use HasFactory;

    protected $fillable = [
        'nama',
        'deskripsi',
        'kategori',
        'harga',
        'kondisi',
        'fotoOrvideo'
    ];
}
