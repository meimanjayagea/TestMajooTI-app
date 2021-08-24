<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Product;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $product = [
            [
                'gambar_barang' => 'standard_repo.png',
                'nama_barang' => 'Majo Pro',
                'stok_barang' => 10,
                'harga_barang' => 150000,
                'deskripsi_barang' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit.
                                        Maxime mollitia, molestiae quas vel sint commodi repudiandae 
                                        consequuntur voluptatum laborum numquam',
            ]
        ];
        foreach ($product as $key => $value) {
            Product::create($value);
        }
    }
}
