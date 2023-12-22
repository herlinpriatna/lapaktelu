@extends('layouts.main')

@section('judul', 'Detail Produk')

@section('content')

<div class="container pt-4 mt-4">

    <div id="produkCarousel" class="carousel slide my-4" data-ride="carousel">
        <div class="carousel-inner">
            <div class="carousel-item active">
                <img src="{{ asset('images/' . $produk->gambar) }}" alt="Foto Produk" class="rounded img-fluid" style="height: 100%; width: 100%" />
            </div>
        </div>
        <a class="carousel-control-prev" href="#produkCarousel" role="button" data-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="sr-only"></span>
        </a>
        <a class="carousel-control-next" href="#produkCarousel" role="button" data-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="sr-only"></span>
        </a>
    </div>

    <div class="d-flex justify-content-between">
        <div class="text-md-start">
            <a href="{{ route('kategori.show', ['slug' => $kategori->name]) }}" class="btn btn-lg btn-outline-primary mb-3">{{ $kategori->name }}</a>
        </div>
        <div class="text-md-end">
            <button type="button" class="btn btn-lg btn-outline-dark" data-bs-toggle="modal" data-bs-target="#bagikan"><i class="fas fa-share"></i> Bagikan</button>
            <button type="button" class="btn btn-lg btn-outline-dark" data-bs-toggle="modal" data-bs-target="#laporkan"><i class="fas fa-flag"></i> Laporkan</button>
        </div>
    </div>

    <div style="line-height: 45px">
        <h5 class="card-title fs-3">{{ $produk->nama }}</h5>
        <p class="card-text fs-5">Rp{{ $produk->harga }}</p>
    </div>

    <div class="mt-4">
        <div class="pt-3 pb-2 fs-5">
            <img src="{{url('img/icon-kondisi.png')}}" alt="" />
            Kondisi
        </div>
        <div class="d-flex justify-content-between">
            <div>
                <button type="button" class="btn btn-lg btn-outline-secondary text-start" style="width: auto" disabled>{{ $kondisi->name }}</button>
            </div>
            <div class="d-flex">
                <a href="https://wa.me/{{$user->nomorHP}}" type="button" class="btn btn-lg btn-primary fw-bold">Chat Sekarang</a>

                @php
                    $isProductSaved = false;

                    foreach (App\Models\Simpan::all() as $product) {
                        if ($product->user_id == auth()->id() && $product->produk_id == $produk->id) {
                            $isProductSaved = true;
                            break;
                        }
                    }
                @endphp

                @if ($isProductSaved)
                <form action="{{ route('simpan.destroy', $product->id) }}" method="POST">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-lg btn-outline-primary ms-1 fw-bold">Batal Simpan</button>
                </form>
                @else
                <form action="{{ route('simpan.create', $produk->id) }}" method="post">
                    @csrf
                    <button type="submit" class="btn btn-lg btn-outline-primary ms-1 fw-bold">Simpan</button>
                </form>
                @endif

            </div>
        </div>
    </div>

    <div class="box-profil d-flex justify-content-between p-3 align-items-center border rounded my-4">
        <div class="profil d-flex align-items-center">
            @if($user->fotoProfil === NULL)
            <img src="{{ url('img/profile-undefined.png') }}" alt="" class="me-3 img-fluid rounded-circle" style="width: 80px; height: 80px" />
            <div class="text">
                <p class="m-0 fs-4 fw-bold">{{ $user->namalengkap }}</p>
                <p class="m-0 fs-5">{{ $user->username }}</p>
                <p class="m-0 fs-5">{{ $user->alamat }}</p>
            </div>
            @else
            <img src="{{ asset('images/' . $user->fotoProfil) }}" alt="" class="me-3 img-fluid" style="width: 80px; height: 80px" />
            <div class="text">
                <p class="m-0 fs-4 fw-bold">{{ $user->namalengkap }}</p>
                <p class="m-0 fs-5">{{ $user->username }}</p>
                <p class="m-0 fs-5">{{ $user->alamat }}</p>
            </div>
            @endif
        </div>
        <a href="{{ route('profil.user', ['id' => $user->id] ) }}" class="btn btn-primary my-3 fw-bold me-3" style="width: 120px; height: 50px; background-color: #3570d6; display: flex; align-items: center; justify-content: center">Lihat Profil</a>
    </div>

    <p class="fs-2 fw-bold py-2">Deskripsi</p>
    <p class="fs-4 pb-5">
        {{ $produk->deskripsi }}
    </p>
</div>

<!-- Modal Bagikan-->
<div class="modal" id="bagikan">
    <div class="modal-dialog modal-dialog-centered" style="max-width: 650px">
        <div class="modal-content">
            <div class="modal-body">
                <p class="text-center fs-2 fw-bold">Bagikan</p>
                <p class="text-center fs-5 fst-italic">"Hayu, bagikeun supados seueur anu terang"</p>
                <div class="container d-flex">
                    <a href="https://wa.me/" target="_blank" class="btn text-dark"><img src="{{url('img/icon-whatsapp.png')}}" alt="WhatsApp" height="65px" class="pb-2" /> WhatsApp</a>
                    <a href="https://www.instagram.com/" target="_blank" class="btn text-dark"><img src="{{url('img/icon-instagram.png')}}" alt="Instagram" height="65px" class="pb-2" /> Instagram</a>
                    <a href="https://www.facebook.com/" target="_blank" class="btn text-dark"><img src="{{url('img/icon-facebook.png')}}" alt="Facebook" height="65px" class="pb-2" />Facebook</a>
                    <a href="https://twitter.com/" target="_blank" class="btn text-dark"><img src="{{url('img/icon-twitter.png')}}" alt="Twitter" height="65px" class="pb-2" />Twitter </a>
                </div>
                <div class="container border border-secondary rounded-pill d-flex justify-content-between mt-3" style="width: 500px; height: 48px">
                    <p class="kolom text-center fs-6 align-item-center text-secondary py-2"></p>
                    <button id="copy-button" class="btn btn-link ms-2"><img src="{{url('img/icon-copy.png')}}" alt="Salin" width="25"></button>
                </div>
            </div>
        </div>
    </div>
</div>

<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>

<script>
    $(document).ready(function() {
        var currentURL = window.location.href;

        $(".kolom").text(currentURL);

        $("#copy-button").click(function() {
            var copyText = document.querySelector(".kolom");
            var range = document.createRange();
            range.selectNode(copyText);
            window.getSelection().addRange(range);
            document.execCommand("copy");
            window.getSelection().removeAllRanges();
        });
    });
</script>
<!-- Akhir Modal Bagikan-->

<!-- Awal Modal Laporkan -->
<div class="modal" id="laporkan">
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
        <div class="modal-content">
            <div class="modal-body">
                <p class="text-center fs-2 fw-bold">Laporkan</p>
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="alasan-laporan" id="produk-palsu" />
                    <label class="form-check-label" for="produk-palsu"> Produk Palsu </label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="alasan-laporan" id="produk-ilegal" />
                    <label class="form-check-label" for="produk-ilegal"> Produk ilegal/dilarang </label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="alasan-laporan" id="penipuan" />
                    <label class="form-check-label" for="penipuan"> Indikasi penipuan </label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="alasan-laporan" id="kata-tidak-pantas" />
                    <label class="form-check-label" for="kata-tidak-pantas"> Mengandung kata yang tidak pantas </label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="alasan-laporan" id="salah-kategori" />
                    <label class="form-check-label" for="salah-kategori"> Salah kategori </label>
                </div>
                <div class="d-flex justify-content-between mt-4 px-3">
                    <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Batal</button>
                    <button type="button" class="btn btn-primary" id="submit-button">Submit</button>
                </div>
            </div>
        </div>
    </div>
</div>

<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>

<script>
    document.getElementById("submit-button").addEventListener("click", function() {
        var selectedOption = document.querySelector(
            'input[name="alasan-laporan"]:checked'
        );

        if (selectedOption) {
            alert("Laporan Anda telah dikirimkan");
        } else {
            alert("Silahkan pilih alasan lapor");
        }
    });
</script>
<!-- Akhir Modal Laporkan -->

@endsection