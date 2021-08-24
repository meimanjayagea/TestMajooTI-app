@extends('Admin.app')

@section('content')
@include('Admin.sidebar')
<div class="main-panel">
    <div class="content-wrapper">
        <div class="row">
            <div class="col-md-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-header">
                     <p class="card-title">List Product</p>
                    </div>
                    <div class="card-body">
                        <a href="{{url('admin/product/create') }}" class="btn btn-sm btn-primary mb-2"><i
                                class="fas fa-plus"></i> Tambah Produk</a>
                        <div class="row">
                            <div class="col-12">
                                <div class="table-responsive">
                                    <table class="display expandable-table" style="width:100%">
                                        <thead>
                                            <tr>
                                                <th>No</th>
                                                <th>Gambar Produk</th>
                                                <th>Nama Produk</th>
                                                <th>Stok Produk</th>
                                                <th>Harga Produk</th>
                                                <th>Deskripsi Produk</th>
                                                <th>Aksi</th>
                                            </tr>
                                        </thead>
                                        <tbody>

                                            @forelse ($products as $no=>$product)
                                            <tr>
                                                <td>{{ $no + 1 }}</td>
                                                <td><img src="{{ Storage::url('images') }}/{{ $product->gambar_barang }}"
                                                        width="120px" height="120px" />
                                                </td>
                                                <td>{{ $product->nama_barang }}</td>
                                                <td>{{ $product->stok_barang }}</td>
                                                <td>{{ $product->harga_barang }}</td>
                                                <td>{{ Str::limit($product->deskripsi_barang, 50) }}</td>
                                                <td class="text-center">
                                                    {{-- <a href="{{route('product.destroy', $product->id)}}" onsubmit="return confirm('Apakah Anda Yakin ?');">
                                                    <i class="fas fa-trash"></i>
                                                    </a> --}}
                                                    <form action="{{route('product.destroy', $product->id)}}"
                                                        method="POST">
                                                            <a href="{{route('product.edit', $product->id)}}/">
                                                        <i class="fas fa-edit"></i>
                                                    </a> 
                                                        @csrf
                                                        @method('delete') 
                                                        <button type="submit"
                                                            class="btn btn-link"><i class="fas fa-trash"></i>
                                                        </button>
                                                    </form>
    
                                                    
                                                </td>
                                            </tr>
                                            @empty
                                            <div class="alert alert-danger">Tidak ada data Product!</div>
                                            @endforelse
                                        </tbody>
                                    </table>
                                    <div class="float-right">
                                        {{ $products->links() }}
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
