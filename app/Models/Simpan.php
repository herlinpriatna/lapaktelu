<?php

namespace App\Models;

use App\Models\User;
use App\Models\Produk;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Simpan extends Model
{
    use HasFactory;

    protected $table = 'simpans';

    protected $fillable = ['user_id', 'produk_id'];

    public function user(){
        return $this->belongsTo(User::class);
    }

    public function produk(){
        return $this->belongsTo(Produk::class);
    }
}
