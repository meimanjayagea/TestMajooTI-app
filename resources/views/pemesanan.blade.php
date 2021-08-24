@extends('layouts.app')

@section('content')
    <div class="container">
    <div class="row">        
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h3>Detai Pemesanan</h3>
                </div>
                <div class="card-body">
                    <div class="col-md-12">
                        <a href="{{'/'}}"><i class="fas fa-arrow-circle-left"></i>Kembali</a>
                        @if (!empty($pesanan))
                        <p align="right">Tanggal Pesanan : {{$pesanan->tanggal}} </p>
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Gambar Product</th>
                                    <th>Nama Product</th>
                                    <th>Jumlah Pesanan</th>
                                    <th>Harga Product</th>
                                    <th>Total Harga</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $num = 1;?>
                                @foreach ($pesanan_details as $pdetail)
                                <tr>
                                    <td scope="row">{{$num++}}</td>
                                    <td>
                                       <img src="{{ Storage::url('images') }}/{{ $pdetail->product->gambar_barang }}"
                                                width="120px" height="120px" />
                                    </td>
                                    <td>{{$pdetail->product->nama_barang}}</td>
                                    <td>{{$pdetail->jumlah_pesanan}}</td>
                                    <td align="left">Rp. {{number_format($pdetail->product->harga_barang)}}</td>
                                    <td align="left">Rp. {{number_format($pdetail->jumlah_harga)}}</td>
                                </tr>
                                @endforeach
                                <tr>
                                    <td colspan="4" align="right"><strong>Total Belanja :</strong></td>
                                    <td><strong>Rp. {{number_format($pesanan->jumlah_harga)}}</strong></td>
                                    <td>
                                        <a href="{{url('berhasil_order')}}" class="btn btn-success" onclick="
                                            return confirm('Anda Yakin Ingin Chack Out?');">
                                            <i class="fa fa-shopping-cart"></i>Check Out
                                        </a>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                        @endif
                    </div>
                </div>
            </div>
        </div>


    </div>
</div>
@endsection
