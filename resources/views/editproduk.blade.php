@extends('layouts.main')
@section('judul', 'Update Produk')

@section('content')
<div class="container-flex justify-content-center align-items-center pt-5" style="padding: 70px 70px 0px 70px;">
        <div class="row">
            <div class="col-md-6 justify-content-center align-items-center">
                @if(session('success'))
                    <div style="color: green;">
                        {{ session('success') }}
                    </div>
                @endif

                @if($errors->any())
                    <div style="color: red;">
                        <ul>
                            @foreach($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <form action="{{ route('jual.update', $product->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('POST')

                    <div class="form-group mb-3 mt-5">
                        <label for="nama" class="form-label">Nama Produk <span>*</span></label>
                        <input class="form-control" id="nama" placeholder="Masukan Nama Produk" name="nama" value="{{ $product->nama }}" required />
                    </div>
                    <div class="form-group mb-3">
                        <label for="deskripsi">Deskripsi Produk <span>*</span></label>
                        <textarea class="form-control" placeholder="Masukkan Deskripsi Produk" id="deskripsi" name="deskripsi">{{ $product->deskripsi }}</textarea>
                    </div>
                    <div class="form-group mb-3">
                        <label>Kategori Produk <span>*</span></label>
                        <select class="form-select" name="kategori" required>
                            @foreach(App\Models\Kategori::all() as $kategori)
                                <option value="{{ $kategori->id }}" {{ $product->kategori_id == $kategori->id ? 'selected' : '' }}>{{ $kategori->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group mb-3">
                        <label for="harga">Harga Produk <span>*</span></label>
                        <input type="number" class="form-control " placeholder="Masukan Harga Produk" name="harga" value="{{ $product->harga }}" />
                    </div>

                    <div class="form-group mb-3">
                        <label>Kondisi <span>*</span></label>
                        <select class="form-select" name="kondisi">
                            @foreach(App\Models\Kondisi::all() as $kondisi)
                                <option value="{{ $kondisi->id }}" {{ $product->kondisi_id == $kondisi->id ? 'selected' : '' }}>{{ $kondisi->name }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                    <div class="col-md-6 justify-content-center align-items-center mt-5">
                        <div class="gambar">
                            <label for="gambar">Gambar <span>*</span></label>
                            <input type="file" id="gambar" name="gambar" accept="image/*" />
                        </div>
                        <div class="mt-3 form-check">
                            <input type="checkbox" class="form-check-input" id="exampleCheck1" required>
                            <label class="form-check-label" for="exampleCheck1">*Semua yang diisi telah sesuai</label>
                        </div>
                        <button class="btn btn-primary w-100 mt-2 fs-5 fw-bold" type="submit">Update Produk</button>
                    </div> 
                </form>
            </div>
        </div>
    </div>
@endsection