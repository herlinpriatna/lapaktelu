@extends('layouts.main')

@section('judul', 'Search')

@section('content')
@if ($produkList->isEmpty())
<img src="{{url('img/icon-notfound.png')}}" class="img-fluid mx-auto d-block pt-5" width="700" />
@else
@foreach($produkList as $product)
@if ($product->status == 'accepted' || $product->status == 'reported')
<div class="container produk-item pt-5">
    <h2 class="mb-4 mt-4">Hasil Pencarian</h1>
    <a href="{{route('produk.show', ['id' => $product->id, 'nama' => $product->nama])}}" class="text-decoration-none">
        <div class="card m-3" style="width: 18rem">
            <img src="{{ asset('images/' . $product->gambar) }}" class="card-img-top" style="max-height: 300px" />
            <div class="card-body">
                <h5 class="card-title">{{ $product->nama }}</h5>
                <p class="card-text">Rp{{ $product->harga }}</p>
            </div>
        </div>
    </a>
</div>
@endif

@endforeach
@endif

@endsection