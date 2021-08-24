@extends('admin.app')

@section('content')
    <div class="content-wrapper">
        <!-- Main content -->
        <section class="content">
            <!-- Default box -->
            <div class="row">
                <!-- /.Pendapatan -->
                <div class="col-12 col-sm-6 col-md-3">
                    <a href="" class="text-decoration-none text-body">
                        <div class="info-box">
                            <span class="info-box-icon bg-info elevation-1"><i class="fas fa-cog"></i></span>

                            <div class="info-box-content">
                                <span class="info-box-text">Total Pendapatan</span>
                                <span class="info-box-number">
                                    Rp. {{$pesanandetail->sum('jumlah_harga')}}
                                </span>
                            </div>
                        </div>
                    </a>
                </div>
                <!-- /.User -->
                <div class="col-12 col-sm-6 col-md-3">
                    <a href="" class="text-decoration-none text-body">
                        <div class="info-box mb-3">

                            <span class="info-box-icon bg-warning elevation-1"><i class="fas fa-users"></i></span>

                            <div class="info-box-content">
                                <span class="info-box-text">Member Baru</span>
                                <span class="info-box-number">{{$user->count()}} User</span>
                            </div>
                        </div>
                    </a>
                </div>
                <!-- /.Product -->
                <div class="col-12 col-sm-6 col-md-3">
                    <a href="" class="text-decoration-none text-body">
                        <div class="info-box mb-3">

                            <span class="info-box-icon card-dark elevation-1"><i class="fas fa-box-open"></i></span>

                            <div class="info-box-content">
                                <span class="info-box-text">Total Produk</span>
                                <span class="info-box-number">{{$pesanandetail->count()}} Product</span>
                            </div>
                        </div>
                    </a>
                </div>
                <!-- /.Penjualan -->
                <div class="clearfix hidden-md-up"></div>
                <div class="col-12 col-sm-6 col-md-3">
                    <a href="" class="text-decoration-none text-body">
                        <div class="info-box mb-3">
                            <span class="info-box-icon bg-success elevation-1"><i class="fas fa-shopping-cart"></i></span>
                            <div class="info-box-content">
                                <span class="info-box-text">Total Pesanan</span>
                                <span class="info-box-number">{{$pesanan->count()}} Pesanan</span>
                            </div>
                        </div>
                    </a>
                </div>
            </div>

            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-header border-0 bg-dark">
                            <h3 class="card-title">Penjualan Product</h3>
                            <div class="card-tools">
                                <a href="#" class="btn btn-tool btn-sm">
                                    <i class="fas fa-download"></i>
                                </a>
                                <a href="#" class="btn btn-tool btn-sm">
                                    <i class="fas fa-bars"></i>
                                </a>
                            </div>
                        </div>
                        <div class="card-body p-0">
                            <table class="table table-striped table-valign-middle">
                                <thead>
                                     <tr>
                                                <th>NO</th>
                                                <th>Gambar Produk</th>
                                                <th>Nama Produk</th>
                                                <th>Stock</th>
                                                <th>Harga Produk</th>
                                                <th>Harga Total Penjualan</th>
                                                <th>Jumlah Pesanan</th>
                                            </tr>
                                </thead>
                                <tbody>
                                  <tbody>
                                            @foreach ($pesanandetail as $no=>$item)
                                            <tr>
                                                <td>{{$no+1}}</td>
                                                <td><img src="{{ Storage::url('images') }}/{{ $item->product->gambar_barang }}"
                                                        width="120px" height="120px" />
                                                </td>
                                                <td>{{$item->product->nama_barang}}</td>
                                                <td>{{$item->jumlah_pesanan}}</td>
                                                <td>Rp. {{number_format($item->product->harga_barang)}}
                                                </td>
                                                <td>Rp. {{number_format($item->jumlah_harga)}}</td>
                                                <td>{{$no+1}}</td>
                                            </tr>
                                            @endforeach
                                        <tbody>
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <!-- /.card -->
                </div>

            </div>

            <div class="card-footer">
                Footer
            </div>
            <!-- /.card-footer-->
        </section>
        <!-- /.content -->
    </div>

@endsection
