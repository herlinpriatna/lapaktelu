@extends('layouts.main')
@section('judul', "Profil")
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
                                <img src="{{ url('img/profile-undefined.png') }}" alt="" class="img-fluid rounded-circle mb-4 text-center" width="80px"/>
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
                                <img src="{{ url('img/profile-undefined.png') }}" alt="" class="img-fluid rounded-circle mb-4 text-center" width="80px"/>
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
                <a href="editProfil.html" class="nav-link link-dark ps-0" aria-current="page">
                    Edit Profil
                </a>
            </li>
            <li>
                <a href="produk_tersimpan.html" class="nav-link link-dark ps-0">
                    Tersimpan
                </a>
            </li>
            <li>
                <a href="home_page.html" class="nav-link link-dark ps-0" data-bs-toggle="modal" data-bs-target="#logout">
                    Logout
                </a>
            </li>
          @endif
           
          </ul>
          <hr />
        </div>
      </div>
      <div class="container col-md-6">
        <h2>List Barang</h2>
        <div class="d-flex justify-content-between">
        @foreach ($produk as $prod)
          @if($prod->user_id === $user->id)
              <div class="produk-item">
                <div class="card m-3" style="width: 18rem">
                  <img src="{{ asset('images/' . $prod->gambar) }}" class="card-img-top" alt="" />
                  <div class="card-body">
                    <h3 class="card-title">{{ $prod->nama }}</h3>
                    <div class="d-flex justify-content-between">
                      <p class="card-text">{{ $prod->harga }}</p>
                      @if(Auth::user()->id == $user->id)
                        <a href="{{ route('jual.edit', $prod->id) }}" class="bi bi-pencil-fill" style="text-decoration: none"> Edit</a>
                      @endif
                    </div>
                  </div>
                </div>
              </div>
              @endif
              @endforeach
            </div>
      </div>
    </div>
@endsection