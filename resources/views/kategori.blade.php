@extends('layouts.main')
@section('judul','kategori')

@section('content')
<!-- nama dan kategori utama-->
<div class="nama-kategori-awal d-flex justify-content-between">    
    <h3 class="fw-bold">
        Sepatu
    </h3>
    <a class="lihat-semua" href="">
        Lihat Semua
    </a>
</div>

<!-- place holder card pakaian wakinta-->
<div class="slider">
    <section class="posisition scroll-horizontal">
        @foreach(App\Models\Produk::all() as $product)
            @if ($product->status == 'accepted')
                @if($product->kategori_id == '1')
                    <a href="">
                        <div class="produk-item">
                            <div class="card m-3" style="width: 15rem">
                            <img src="{{ asset('images/' . $product->gambar) }}" class="card-img-top"/>
                            <div class="card-body">
                                <a class="card-title" style="font-size: 20px; text-decoration: none;">{{ $product->nama }}</a>
                                <p class="card-text">Rp{{ $product->harga }}</p>
                            </div>
                            </div>
                        </div>    
                    </a>
                @endif
            @endif
        @endforeach
    </section>   
</div>

        

@endsection