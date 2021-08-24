<?php

namespace App\Http\Controllers;

use App\Models\Pesanan;
use App\Models\Pesanan_detail;
use Illuminate\Http\Request;
use App\Models\Product;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;

class PesanController extends Controller
{
    
   public function __construct()
    {
        $this->middleware('auth');
    }

    public function index($id)
    {
        $product = Product::where('id', $id)->first();
        return view('lihat_product', compact('product'));
    }

    
    public function pesan(Request $request, $id)
    {
        $product = Product::where('id', $id)->first();
        $tanggal = Carbon::now();

        if ($request->jumlah_pesan > $product->stok_barang) {
            return redirect('beli/' . $id);
        }

        $cek_pesanan = Pesanan::where('user_id', Auth::user()->id)->where('status', 0)->first();
        if (empty($cek_pesanan)){
            $pesanan = new Pesanan;
            $pesanan->user_id = Auth::user()->id;
            $pesanan->tanggal = $tanggal;
            $pesanan->status = 0;
            $pesanan->jumlah_harga = 0;
            $pesanan->save();
        }

        $pesanan_baru = Pesanan::where('user_id', Auth::user()->id)->where('status', 0)->first();

        $cek_pesanan_detail = Pesanan_detail::where('product_id', $product->id)->where(
            'pesanan_id',
            $pesanan_baru->id
        )->first();
        if (empty($cek_pesanan_detail)) {
            $pesanan_detail = new Pesanan_detail();
            $pesanan_detail->product_id = $product->id;
            $pesanan_detail->pesanan_id = $pesanan_baru->id;
            $pesanan_detail->jumlah_pesanan = $request->jumlah_pesan;
            $pesanan_detail->jumlah_harga = $product->harga_barang * $request->jumlah_pesan;
            $pesanan_detail->save();
        } else {
            $pesanan_detail = Pesanan_detail::where('product_id', $product->id)->where(
                'pesanan_id',
                $pesanan_baru->id
            )->first();

            $pesanan_detail->jumlah_pesanan = $pesanan_detail->jumlah + $request->jumlah_pesan;

            $harga_pesanan_detail_baru = $product->harga_barang * $request->jumlah_pesan;
            $pesanan_detail->jumlah_harga = $pesanan_detail->jumlah_harga + $harga_pesanan_detail_baru;
            $pesanan_detail->update();
        }

        $pesanan = Pesanan::where('user_id', Auth::user()->id)->where('status', 0)->first();
        $pesanan->jumlah_harga = $pesanan->jumlah_harga + $product->harga_barang * $request->jumlah_pesan;
        $pesanan->update();

        return redirect('detail_pesanan');
    }

    public function detail_pesanan()
    {
        $pesanan = Pesanan::where('user_id', Auth::user()->id)->where('status', 0)->first();
        $pesanan_details = [];
        if (!empty($pesanan)) {
            $pesanan_details = Pesanan_detail::where('pesanan_id', $pesanan->id)->get();
        }

        return view('pemesanan', compact('pesanan', 'pesanan_details'));
    }

    public function berhasil()
    {
        $pesanan = Pesanan::where('user_id', Auth::user()->id)->where('status', 0)->first();
        $pesanan_id = $pesanan->id;
        $pesanan->status = 1;
        $pesanan->update();

        $pesanan_details = Pesanan_detail::where('pesanan_id', $pesanan_id)->get();
        foreach ($pesanan_details as $pesanan_detail) {
            $product = Product::where('id', $pesanan_detail->product_id)->first();
            $product->stok_barang = $product->stok_barang - $pesanan_detail->jumlah_pesanan;
            $product->update();
        }

        return view('pesanan_berhasil');
    }
}
