@extends('layouts.app')

@section('content')
    <div class="container">
    <div class="row">        
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h3></i>Pemesanan Berhasil</h3>
                </div>
                <div class="card-body ">
                    <a href="{{'/'}}"><i class="fas fa-arrow-circle-left"></i>Kembali</a>
                    <div class="justify-content-center align-content-center text-center">
                    <H1>Pesanan anda berhasil di order</H1>
                    <img src="{{ Storage::url('images') }}/{{'centang.png'}}"
                                                width="300px" height="300px" />
                    
                    </div>
                </div>
            </div>
        </div>


    </div>
</div>
@endsection
