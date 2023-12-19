@extends('layouts.main')

@section('judul', 'Home Page')

@section('content')
<header class="container pt-5">
      <div id="myCarousel" class="carousel slide" data-ride="carousel">
        <!-- Indicators -->
        <ul class="carousel-indicators" style="list-style: none">
          <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
          <li data-target="#myCarousel" data-slide-to="1"></li>
          <li data-target="#myCarousel" data-slide-to="2"></li>
        </ul>

        <!-- Wrapper for slides -->
        <div class="carousel-inner">
          <div class="carousel-item active">
            <img class="img-fluid" src="{{url('img/banner-1.png')}}" alt="Gambar 1" />
          </div>
          <div class="carousel-item">
            <img class="img-fluid" src="{{url('img/banner-2.png')}}" alt="Gambar 2" />
          </div>
          <div class="carousel-item">
            <img class="img-fluid" src="{{url('img/banner-2.png')}}" alt="Gambar 3" />
          </div>
        </div>

        <!-- Left and right controls -->
        <a class="carousel-control-prev" href="#myCarousel" data-slide="prev">
          <span class="carousel-control-prev-icon"></span>
        </a>
        <a class="carousel-control-next" href="#myCarousel" data-slide="next">
          <span class="carousel-control-next-icon"></span>
        </a>
      </div>
    </header>

    <section class="container d-flex justify-content-between align-item-center text-center card-group">
      <div class="container d-flex justify-content-between">
        <h1>Kategori</h1>
        <a href="" class="btn btn-link text-decoration-none">Lihat Semua</a>
      </div>
      <div class="card-item">
        <a href="{{ route('kategori.show', ['slug' => 'pakaian-wanita']) }}" class="text-decoration-none">
          <div class="card p-1 card-kategori m-3 shadow" style="width: 8rem; align-items: center">
            <img src="{{url('img/icon-pakaian-wanita.png')}}" class="card-img mt-2 img-fluid" style="max-width: 50px"/>
            <div class="card-body">
              <p class="card-text fs-6 text-nowrap">Pakaian Wanita</p>
            </div>
          </div>
        </a>
      </div>
      <div class="card-item">
        <a href="{{ route('kategori.show', ['slug' => 'pakaian-pria']) }}" class="text-decoration-none">
          <div class="card p-1 card-kategori m-3 shadow" style="width: 8rem; align-items: center">
            <img src="img/icon-pakaian-pria.png" class="card-img mt-2" style="max-width: 50px" />
            <div class="card-body">
              <p class="card-text fs-6">Pakaian Pria</p>
            </div>
          </div>
        </a>
      </div>
      <div class="card-item">
        <a href="{{ route('kategori.show', ['slug' => 'elektronik']) }}" class="text-decoration-none">
          <div class="card p-1 card-kategori m-3 shadow" style="width: 8rem; align-items: center">
            <img src="img/icon-elektronik.png" class="card-img mt-2" style="max-width: 50px"/>
            <div class="card-body">
              <p class="card-text fs-6 text-nowrap">Elektronik</p>
            </div>
          </div>
        </a>
      </div>
      <div class="card-item">
        <a href="{{ route('kategori.show', ['slug' => 'tas']) }}" class="text-decoration-none">
          <div class="card p-1 card-kategori m-3 shadow" style="width: 8rem; align-items: center">
            <img src="{{url('img/icon-tas.png')}}" class="card-img mt-2"  style="max-width: 50px"/>
            <div class="card-body">
              <p class="card-text fs-6 text-nowrap">Tas</p>
            </div>
          </div>
        </a>
      </div>
      <div class="card-item">
        <a href="{{ route('kategori.show', ['slug' => 'Sepatu']) }}" class="text-decoration-none">
          <div class="card p-1 card-kategori m-3 shadow" style="width: 8rem; align-items: center">
            <img src="{{url('img/icon-sepatu.png')}}" class="card-img mt-2" style="max-width: 50px" />
            <div class="card-body">
              <p class="card-text fs-6 text-nowrap">Sepatu</p>
            </div>
          </div>
        </a>
      </div>
      <div class="card-item">
        <a href="{{ route('kategori.show', ['slug' => 'smartphone']) }}" class="text-decoration-none">
          <div class="card p-1 card-kategori m-3 shadow" style="width: 8rem; align-items: center">
            <img src="{{url('img/icon-smartphone.png')}}" class="card-img mt-2" style="max-width: 50px"/>
            <div class="card-body">
              <p class="card-text fs-6 text-nowrap">Smartphone</p>
            </div>
          </div>
        </a>
      </div>
      <div class="card-item">
        <a href="{{ route('kategori.show', ['slug' => 'buku']) }}" class="text-decoration-none">
          <div class="card p-1 card-kategori m-3 shadow" style="width: 8rem; align-items: center">
            <img src="img/icon-atk.png" class="card-img mt-2" style="max-width: 50px" />
            <div class="card-body">
              <p class="card-text fs-6 text-nowrap">Buku</p>
            </div>
          </div>
        </a>
      </div>
      <div class="card-item">
        <a href="{{ route('kategori.show', ['slug' => 'aksesoris']) }}" class="text-decoration-none">
          <div class="card p-1 card-kategori m-3 shadow" style="width: 8rem; align-items: center">
            <img src="{{url('img/icon-aksesoris.png')}}" class="card-img mt-2" style="max-width: 50px" />
            <div class="card-body">
              <p class="card-text fs-6 text-nowrap">Aksesoris</p>
            </div>
          </div>
        </a>
      </div>
    </section>

    <section class="container d-flex justify-content-between align-item-center card-group">
      <div class="container d-flex justify-content-between mb-2">
        <h1>Terbaru</h1>
      </div>
      @foreach(App\Models\Produk::all() as $product)
        @if ($product->status == 'accepted')
            <div class="produk-item">
              <a href="detail_produk.html" class="text-decoration-none">
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
      
    </section>
    <form action="{{ route('logout') }}" method="POST">
      @csrf
      <button type="submit" class="btn btn-primary">Logout</button>
    </form>
@endsection