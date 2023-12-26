@extends('layouts.main')
@section('judul','kategori')

@section('content')
<!-- nama dan kategori utama-->
<div class="container mt-5 pt-5">

    @foreach($kategori as $kate)
    <div class="nama-kategori-awal d-flex justify-content-between">
        <h3 class="fw-bold">
            {{ $kate->name }}
        </h3>
        <a class="lihat-semua" href="">
            Lihat Semua
        </a>
    </div>

    <!-- place holder card pakaian wakinta-->
    <div class="slider d-flex justify-space-between">
        <section class="d-flex posisition scroll-horizontal">
            @foreach(App\Models\Produk::all() as $product)
            @if ($product->status == 'accepted'  || $product->status == 'reported')
            @if($product->kategori_id == $kate->id)
            <a href="">
                <div class="produk-item">
                    <a href="{{route('produk.show', ['id' => $product->id, 'nama' => $product->nama])}}" class="text-decoration-none">
                        <div class="card m-3" style="width: 15rem">
                            <img src="{{ asset('images/' . $product->gambar) }}" class="card-img-top" />
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
    @endforeach
</div>



@endsection