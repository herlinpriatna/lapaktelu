@extends('layouts.main')
@section('judul', 'Edit Profil')
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
                    <a href="{{ route('profil.edit', ['id' => $user->id]) }}" class="nav-link link-dark ps-0 text-primary">
                        Edit Profil
                    </a>
                </li>
                <li>
                    <a href="{{ route('simpan.show') }}" class="nav-link link-dark ps-0">

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
        @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
        @endif

        @if($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach($errors->all() as $error)
                <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
        @endif
        <h2>Edit Profil</h2>
        <div class="d-flex justify-content-between">
            <form action="{{ route('profil.update', ['id'=> $user->id]) }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="container">
                    <div class="row">
                        <div class="">
                            <div class="">
                                @if(Auth::user()->id == $user->id)
                                {{-- Display user's profile when viewing own profile --}}
                                @if($user->fotoProfil === NULL)
                                <div class="user-profile text-center">
                                    <img src="{{ url('img/profile-undefined.png') }}" alt="" class="img-fluid rounded-circle mb-4 text-center" width="80px" />
                                </div>
                                @else
                                <div class="user-profile text-center">
                                    <img src="{{ asset('images/' . $user->fotoProfil) }}" alt="" class="me-3 img-fluid" style="width: 80px; height: 80px" />
                                </div>
                                @endif
                                @endif
                                <div class="mb-3">
                                    <label for="fotoProfil" class="form-label">Update Foto Profil</label>
                                    <input type="file" name="fotoProfil" class="form-control">
                                </div>
                            </div>
                            <div class="mb-3">
                                <label for="namalengkap" class="form-label">Nama Lengkap</label>
                                <input type="text" id="namalengkap" name="namalengkap" class="form-control" value="{{ Auth::user()->namalengkap }}">
                            </div>
                            <div class="mb-3">
                                <label for="username" class="form-label">Username</label>
                                <input type="text" id="username" name="username" class="form-control" value="{{ Auth::user()->username }}">
                            </div>
                            <div class="mb-3">
                                <label for="email" class="form-label">Email</label>
                                <input type="email" id="email" name="email" class="form-control" value="{{ Auth::user()->email }}">
                            </div>
                            <div class="mb-3">
                                <label for="alamat" class="form-label">Alamat</label>
                                <textarea id="alamat" name="alamat" class="form-control">{{ Auth::user()->alamat }}</textarea>
                            </div>
                            <div class="mb-3">
                                <label for="nomorHP" class="form-label">Nomor Telepon</label>
                                <input id="nomorHP" type="text" name="nomorHP" class="form-control" value="{{ Auth::user()->nomorHP }}">
                            </div>
                            <button type="submit" class="btn btn-primary">Update Profile</button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection