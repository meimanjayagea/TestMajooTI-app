<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    public $table = "products";
    use HasFactory;

    protected $fillable = [
        'id', 'gambar_barang', 'nama_barang', 'stok_barang', 'harga_barang', 'deskripsi_barang',
    ];

    public function pesanan_detail()
    {
        return $this->hasMany('App\Models\pesanan_detail', 'product_id', 'id');
    }
}
