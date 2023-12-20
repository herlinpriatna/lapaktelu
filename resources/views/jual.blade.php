
@extends('layouts.main')
@section('judul', 'Jual')

@section('content')
    <div class="container-flex justify-content-center align-items-center pt-5" style="padding: 70px 70px 0px 70px;">
        <div class="row">
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

            <div class="col-md-6 justify-content-center align-items-center">
                <form action="{{ route('jual') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group mb-3 mt-5">
                        <label for="nama" class="form-label">Nama Produk <span>*</span></label>
                        <input class="form-control" id="nama" placeholder="Masukan Nama Produk" name="nama" required />
                    </div>
                    <div class="form-group mb-3">
                        <label for="deskripsi">Deskripsi Produk <span>*</span></label>
                        <textarea class="form-control" placeholder="Masukkan Deskripsi Produk" id="deskripsi" name="deskripsi"></textarea>
                    </div>
                    <div class="form-group mb-3">
                        <label>Kategori Produk <span>*</span></label>
                        <select class="form-select" name="kategori" required>
                            @foreach(App\Models\Kategori::all() as $kategori)
                                <option value="{{ $kategori->id }}">{{ $kategori->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group mb-3">
                        <label for="harga">Harga Produk <span>*</span></label>
                        <input type="number" class="form-control " placeholder="Masukan Harga Produk" name="harga" />
                    </div>

                    <div class="form-group mb-3">
                        <label>Kondisi <span>*</span></label>
                        <select class="form-select" name="kondisi">
                            @foreach(App\Models\Kondisi::all() as $kondisi)
                                <option value="{{ $kondisi->id }}">{{ $kondisi->name }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                    <div class="col-md-6 justify-content-center align-items-center mt-5">
                        <div class="gambar">
                            <label for="gambar">Gambar <span>*</span></label>
                            <input type="file" id="gambar" name="gambar" accept="image/*" required />
                        </div>
                        <div class="mt-3 form-check">
                            <input type="checkbox" class="form-check-input" id="exampleCheck1" required>
                            <label class="form-check-label" for="exampleCheck1">*Semua yang diisi telah sesuai</label>
                        </div>
                        <button class="btn btn-primary w-100 mt-2 fs-5 fw-bold" type="submit">Jual Produk</button>
                    </div> 
                </form>
            </div>
        </div>
    </div>
@endsection