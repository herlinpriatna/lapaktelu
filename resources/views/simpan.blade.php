@extends('layouts.main')

@section('judul', 'Simpan')

@section('content')
<div class="container mt-5 d-flex col-md-12 pt-5">
    <div class="row">
        <div class="d-flex flex-column col-md-3 flex-shrink-0 p-3 text-white" style="width: 250px; margin-left: 10%; height: 80vh; border-radius: 10px; border: 1px solid #d8d8d8; background: #fff; color: black">
            <ul class="nav nav-pills flex-column">
                <li class="d-flex align-items-center justify-content-center">

                    @if(Auth::user()->id == $user->id)
                    {{-- Display user's profile when viewing own profile --}}
                    @if($user->fotoProfil === NULL)
                    <div class="user-profile text-center">
                        <img src="{{ url('img/profile-undefined.png') }}" alt="" class="img-fluid rounded-circle mb-4 text-center" width="80px" />
                        <div class="info-profile text-center">
                            <p class="mb-0 fs-4 fw-bold text-dark">{{ $user->namalengkap }}</p>
                            <p class="mb-0 fs-5 text-dark">{{ $user->username }}</p>
                            <p class="fs-5 text-dark">{{ $user->alamat }}</p>
                        </div>
                    </div>
                    @else
                    <div class="user-profile text-center">
                        <img src="{{ asset('images/' . $user->fotoProfil) }}" alt="" class="me-3 img-fluid" style="width: 80px; height: 80px" />
                        <div class="user-profile text-center">
                            <p class="mb-0 fs-4 fw-bold text-dark">{{ $user->namalengkap }}</p>
                            <p class="mb-0 fs-5 text-dark">{{ $user->username }}</p>
                            <p class="fs-5 text-dark">{{ $user->alamat }}</p>
                        </div>
                    </div>
                    @endif
                    @else
                    {{-- Display other user's profile when viewing someone else's profile --}}
                    @if($user->fotoProfil === NULL)
                    <div class="user-profile text-center">
                        <img src="{{ url('img/profile-undefined.png') }}" alt="" class="img-fluid rounded-circle mb-4 text-center" width="80px" />
                        <div class="info-profile text-center">
                            <p class="mb-0 fs-4 fw-bold text-dark">{{ $user->namalengkap }}</p>
                            <p class="mb-0 fs-5 text-dark">{{ $user->username }}</p>
                            <p class="fs-5 text-dark">{{ $user->alamat }}</p>
                        </div>
                    </div>
                    @else
                    <div class="user-profile text-center">
                        <img src="{{ asset('images/' . $user->fotoProfil) }}" alt="" class="me-3 img-fluid" style="width: 80px; height: 80px" />
                        <div class="user-profile text-center">
                            <p class="mb-0 fs-4 fw-bold text-dark">{{ $user->namalengkap }}</p>
                            <p class="mb-0 fs-5 text-dark">{{ $user->username }}</p>
                            <p class="fs-5 text-dark">{{ $user->alamat }}</p>
                        </div>
                    </div>
                    @endif
                    @endif
                </li>

                @if(Auth::id() == $user->id)
                <li class="nav-item">
                    <a href="{{ route('profil.edit', ['id' => $user->id]) }}" class="nav-link link-dark ps-0">
                        Edit Profil
                    </a>
                </li>
                <li>
                    <a href="{{ route('simpan.show') }}" class="nav-link link-dark ps-0 text-primary">

                        Tersimpan
                    </a>
                </li>
                <li>
                    <form action="{{ route('logout') }}" method="POST">
                        @csrf
                        <button type="submit" class="btn btn-primary">Logout</button>
                    </form>
                </li>
                @endif

            </ul>
            <hr />
        </div>
    </div>
    <div class="container col-md-6">
        <h2>Produk Tersimpan</h2>
        <div class="d-flex justify-content-between">
            @forelse ($simpanRecords as $simpan)
            @if ($simpan->produk)
            <div class="produk-item">
            <a href="{{route('produk.show', ['id' => $simpan->produk->id, 'nama' => $simpan->produk->nama])}}" class="text-decoration-none">
                <div class="card m-3" style="width: 18rem">
                    <img src="{{ asset('images/' . $simpan->produk->gambar) }}" class="card-img-top" style="max-height: 300px" />
                    <div class="card-body">
                        <h5 class="card-title">{{ $simpan->produk->nama }}</h5>
                        <p class="card-text">Rp{{ $simpan->produk->harga }}</p>
                    </div>
                </div>
            </div>
            @else
            <p>Tidak ada produk yang kamu simpan</p>
            @endif
            @empty
            <p>Tidak ada produk yang kamu simpan</p>
            @endforelse
        </div>
    </div>
</div>

@endsection