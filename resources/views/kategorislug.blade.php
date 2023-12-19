@extends('layouts.main')
@section('judul', $kategori->name)
@section('content')
<div class="container mt-5 pt-5">
    <h1 class="mt-5">{{ $kategori->name }}</h1>
    @foreach(App\Models\Produk::all() as $product)
        @if ($product->status == 'accepted')
            @if($product->kategori->slug == $kategori->slug)
                
                <a href="">
                    <div class="produk-item mt-5">
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
</div> 
@endsection
