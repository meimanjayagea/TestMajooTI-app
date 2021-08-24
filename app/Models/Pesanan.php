<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pesanan extends Model
{
    public $table = "pesanans";
    use HasFactory;
    protected $fillable = [
        'id', 'user_id', 'tanggal', 'status', 'jumlah_harga',
    ];

    public function user()
    {
        return $this->belongsTo('App\Models\User', 'user_id', 'id');
    }

    public function pesanan_detail()
    {
        return $this->hasMany('App\Models\pesanan_detail', 'pesanan_id', 'id');
    }
}
