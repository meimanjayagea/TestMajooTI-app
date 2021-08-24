@extends('Admin.app')

@section('content')
@include('Admin.sidebar')
<div class="main-panel">
    <div class="content-wrapper">
        <div class="row">
            <div class="col-md-12 grid-margin">
                <div class="row">
                    <div class="col-12 col-xl-8 mb-4 mb-xl-0">
                        <h3 class="font-weight-bold">Welcome {{ Auth::user()->name }}</h3>
                        <h6 class="font-weight-normal mb-0">Admin / <b>Dashboard </b></h6>
                    </div>
                    <div class="col-12 col-xl-4">
                        <div class="justify-content-end d-flex">
                            <div class="dropdown flex-md-grow-1 flex-xl-grow-0">
                                <button class="btn btn-sm btn-light bg-white dropdown-toggle" type="button"
                                    id="dropdownMenuDate2" data-toggle="dropdown" aria-haspopup="true"
                                    aria-expanded="true">
                                    <i class="mdi mdi-calendar"></i> Today (10 Jan 2021)
                                </button>
                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdownMenuDate2">
                                    <a class="dropdown-item" href="#">January - March</a>
                                    <a class="dropdown-item" href="#">March - June</a>
                                    <a class="dropdown-item" href="#">June - August</a>
                                    <a class="dropdown-item" href="#">August - November</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12 grid-margin transparent">
                <div class="row">
                    <div class="col-md-6 mb-4 stretch-card transparent">
                        <div class="card card-tale">
                            <div class="card-body">
                                <p class="mb-4">Total Pendapatan</p>
                                <p class="fs-30 mb-2">Rp. {{$pesanandetail->sum('jumlah_harga')}}</p>
                                <p>24.00% (30 days)</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 mb-4 stretch-card transparent">
                        <div class="card card-dark-blue">
                            <div class="card-body">
                                <p class="mb-4">Total Penjualan</p>
                                <p class="fs-30 mb-2">{{$pesanandetail->count()}} Product</p>
                                <p>22.00% (30 days)</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6 mb-4 mb-lg-0 stretch-card transparent">
                        <div class="card card-light-blue">
                            <div class="card-body">
                                <p class="mb-4">Total User</p>
                                <p class="fs-30 mb-2">{{$user->count()}} User</p>
                                <p>2.00% (30 days)</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 stretch-card transparent">
                        <div class="card card-light-danger">
                            <div class="card-body">
                                <p class="mb-4">Total Pesanan Tertunda</p>
                                <p class="fs-30 mb-2">{{$pesanan->count()}} Pesanan</p>
                                <p>0.22% (30 days)</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <p class="card-title">Monitoring Orderan</p>
                        <div class="row">
                            <div class="col-12">
                                <div class="table-responsive">
                                    <table class="display expandable-table" style="width:100%">
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
                                    </table>
                                    
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- content-wrapper ends -->

</div>
<!-- main-panel ends -->


@endsection
