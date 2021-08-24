@extends('layouts.app')

@section('content')
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h3>Pesanan</h3>
                    </div>
                    <div class="container-fluid mt-3">
                         <a href="{{'/'}}"><i class="fas fa-arrow-circle-left"></i> Kembali</a>
                    </div>
                   
                    <div class="card-body d-flex justify-content-center">
                        <div class="table-responsive">
                            <table class="table table-bordered" style="width:100%">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Gambar Produk</th>
                                        <th>Nama Produk</th>
                                        <th>Harga Produk</th>
                                        <th>Stok Produk</th>
                                        <th>Deskripsi</th>
                                        <th>Jumlah Pesanan</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $no = 1; ?>
                                    <tr>
                                        <td>{{ $no++ }}</td>
                                        <td><img src="{{ Storage::url('images') }}/{{ $product->gambar_barang }}"
                                                width="120px" height="120px" />
                                        </td>
                                        <td>{{ $product->nama_barang }}</td>
                                        <td>{{ $product->harga_barang }}</td>
                                        <td>{{ $product->stok_barang }}</td>
                                        <td>{{ $product->deskripsi_barang }}</td>
                                        <td>

                                            <form action="{{url('beli')}}/{{$product->id}}" method="post">
                                                @csrf
                                                <input type="number" name="jumlah_pesan" class="form-control" required>
                                                <button type="submit" class="btn btn-success mt-2"><i
                                                        class="fa fa-shopping-cart">
                                                    </i>Lihat Pesanan</button>
                                            </form>

                                        </td>
                                    </tr>

                                </tbody>
                            </table>
                        </div>



                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
