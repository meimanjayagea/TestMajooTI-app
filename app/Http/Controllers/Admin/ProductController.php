<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Pesanan_detail;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\User;
use App\Models\Pesanan;
use Illuminate\Support\Facades\Storage;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::paginate(10);
        $pesanandetail = Pesanan_detail::get();
        $pesanan = Pesanan::get();
        $user = User::where('level', 'USER')->get();

        return view('Admin/Produk/index', compact('products','pesanandetail','pesanan','user'));
    }

    
    public function create()
    {
        return view('Admin/Produk/tambah');
    }

    
    public function store(Request $request)
    {
        $request->validate([
            'gambar_barang' => 'required|mimes:png,jpg,jpeg|max:5048',
            'nama_barang' => 'required|min:5|unique:products,nama_barang',
            'stok_barang' => 'required|integer',
            'harga_barang' => 'required|integer',
            'deskripsi_barang' => 'required|',
        ]);

        $image = $request->file('gambar_barang');
        $image->storeAs('public/images', $image->hashName());
        
        $product = Product::create([
            'gambar_barang' => $image->hashName(),
            'nama_barang' => $request->input('nama_barang'),
            'stok_barang' => $request->input('stok_barang'),
            'harga_barang' => $request->input('harga_barang'),
            'deskripsi_barang' => $request->input('deskripsi_barang'),
        ]);
                

        if(!$product){
            return back()->with('error', 'Data gagal disimpan!');
        }else{
            return redirect('admin/product')->with('success', 'Data Berhasil disimpan!');
        }
        
    }

   
    public function show($id)
    {
        

    }

    
    public function edit($id)
    {
        $product = Product::find($id);
        return view('Admin.Produk.edit', compact('product'));
    }

    
    public function update(Request $request, $id)
    {
        $request->validate([
            'nama_barang' => 'required|min:5|unique:products,nama_barang',
            'stok_barang' => 'required|integer',
            'harga_barang' => 'required|integer',
            'deskripsi_barang' => 'required|',
        ]);

        $product = Product::find($id);

        if($request->file('gambar_barang') == "") {

            $product->update([
                'nama_barang' => $request->input('nama_barang'),
                'stok_barang' => $request->input('stok_barang'),
                'harga_barang' => $request->input('harga_barang'),
                'deskripsi_barang' => $request->input('deskripsi_barang'),
        ]);
        }else{
        Storage::disk('local')->delete('public/images/'.$product->gambar_barang);

        $image = $request->file('gambar_barang');
        $image->storeAs('public/images', $image->hashName());

        $product->update([
                'gambar_barang' => $image->hashName(),
                'nama_barang' => $request->input('nama_barang'),
                'stok_barang' => $request->input('stok_barang'),
                'harga_barang' => $request->input('harga_barang'),
                'deskripsi_barang' => $request->input('deskripsi_barang'),
        ]);
        }

        if(!$product){
            return back()->with('error', 'Data gagal di perbaharui!');
        }else{
            return redirect('admin/product')->with('success', 'Data Berhasil di perbaharui!');
        }
    }

    
    public function destroy($id)
    {
        $product = Product::find($id);
        Storage::disk('local')->delete('public/images/'.$product->gambar_barang);
        $product->delete();

        if(!$product){
            return back()->with('error', 'Data gagal di hapus!');
        }else{
            return redirect('admin/product')->with('success', 'Data Berhasil di hapus!');
        }
    }
}
