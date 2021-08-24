@extends('Admin.app')

@section('content')
@include('Admin.sidebar')
<div class="main-panel">
    <div class="content-wrapper">
        <div class="row">
            <div class="col-md-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <p class="card-title">+ Tambah Produk</p>
                        <div class="row">
                            <div class="col-12">
                                <form action="{{route('product.update', $product->id)}}" method="POST" enctype="multipart/form-data">
                                    @csrf
                                    @method('PUT')
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="gambar_barang">Gambar Produk</label>
                                                <input type="file" name="gambar_barang"
                                                    class="form-control-file  @error('kode') is-invalid @enderror"
                                                    id="gambar_barang" onchange="loadFile(event)">
                                                @error('gambar_barang')
                                                <div class="alert alert-danger">{{$message}} </div>
                                                @enderror
                                            </div>

                                            <div class="form-group">
                                                <img id="gambar" src="{{Storage::url('images')}}/{{'no_image.png'}}"
                                                    height="200px" width="240px">
                                            </div>

                                            <div class="form-group">
                                                <label for="nama_barang">Nama Produk</label>
                                                <input type="text" name="nama_barang"
                                                    class="form-control @error('nama_barang') is-invalid @enderror"
                                                    id="nama_barang" placeholder="Masukkan nama produk" value="{{old('nama_barang', $product->nama_barang)}}" required>
                                                @error('nama_barang')
                                                <div class="alert alert-danger">{{$message}} </div>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="stok_barang">Stok Produk</label>
                                                <input type="number" name="stok_barang" 
                                                    class="form-control  @error('stok_barang') is-invalid @enderror"
                                                    id="stok_barang" placeholder="Masukkan stok produk" value="{{old('stok_barang', $product->stok_barang)}}" required>
                                                @error('stok_barang')
                                                <div class="alert alert-danger">{{$message}} </div>
                                                @enderror
                                            </div>
                                            <div class="form-group">
                                                <label for="harga_barang">Harga Produk</label>
                                                <input type="number" name="harga_barang" 
                                                    class="form-control @error('harga_barang') is-invalid @enderror"
                                                    id="harga_barang" placeholder="Masukkan harga produk" value="{{old('harga_barang', $product->harga_barang)}}" required>
                                                @error('harga_barang')
                                                <div class="alert alert-danger">{{$message}} </div>
                                                @enderror
                                            </div>
                                            <div class="form-group">
                                                <label for="deskripsi_barang">Deskripsi Produk</label>
                                                <textarea type="text" name="deskripsi_barang"
                                                    class="form-control @error('deskripsi_barang') is-invalid @enderror"
                                                    id="deskripsi_barang" rows="9" required> {{old('deskripsi_barang', $product->deskripsi_barang)}} </textarea>
                                                @error('deskripsi_barang')
                                                <div class="alert alert-danger">{{$message}} </div>
                                                @enderror
                                            </div>
                                            <button type="submit" class="btn btn-primary ">Submit</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection

@push('scrips')
<script>
    var loadFile = function (event) {
        var gambar = document.getElementById('gambar');
        gambar.src = URL.createObjectURL(event.target.files[0]);
    };

</script>
@endpush
