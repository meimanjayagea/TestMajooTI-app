@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="container mt-2 bordered">
                <h3>Produk</h3>
            </div>
            <div class="row justify-content-center">
                @foreach ($products as $product )
                <div class="card m-2" style="width: 18rem;">
                    <img class="card-img-top" src="{{ Storage::url('images') }}/{{ $product->gambar_barang }}"
                        width="120px" height="200px" />
                    <h5 class="text-center">{{$product->nama_barang}}</h5>
                    <h5 class="text-center">Rp. {{$product->harga_barang }}</h5>
                    <div class="card-body">
                        <p class="card-text fa-align-justify">{{Str::limit($product->deskripsi_barang, 130)}}</p>
                    </div>
                    <div class="text-center mb-3">
                        <a href="{{url('beli')}}/{{$product->id}}" class="btn btn-primary ">Beli</a>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </div>
</div>
@endsection
