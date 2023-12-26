@extends('layouts.main')
@section('title', 'Admin')
@section('content')
<div class=" mt-5 pt-5">
  <div class="container d-flex justify-content-center">
    <a href="#" class="btn btn-primary m-3" id="showRequests">Permintaan</a>
    <a href="#" class="btn btn-outline-primary m-3" id="showConfirmed">Terkonfirmasi</a>
    <a href="#" class="btn btn-outline-primary m-3" id="showReview">Tinjau Kembali</a>
    <a href="#" class="btn btn-outline-primary m-3" id="showReport">Laporan</a>
  </div>
</div>
<div class="container" id="requestsTable">
  <table class="table">
    <thead>
      <tr>
        <th>No Produk</th>
        <th>Nama</th>
        <th>Deskripsi</th>
        <th>Harga</th>
        <th>Kategori</th>
        <th>Kondisi</th>
        <th>Penjual</th>
        <th>Gambar</th>
        <th>Konfirmasi</th>
      </tr>
    </thead>
    <tbody>
      @foreach(App\Models\Produk::all() as $product)
      @if($product->status == 'pending')
      <tr>
        <td>{{ $product->id }}</td>
        <td>{{ $product->nama }}</td>
        <td>{{ $product->deskripsi }}</td>
        <td>{{ $product->harga }}</td>
        <td>{{ $product->kategori->name }}</td>
        <td>{{ $product->kondisi->name }}</td>
        <td>{{ $product->user->username }}</td>
        <td>
          <a href="{{ asset('images/' . $product->gambar) }}" target="_blank">Lihat Gambar</a>
        </td>
        <td>
          <form action="{{ route('admin.confirm.product', $product->id) }}" method="post">
            @csrf
            <button class="btn btn-success" type="submit">Ya</button>
          </form>
          <form action="{{ route('admin.reject.product', $product->id) }}" method="post">
            @csrf
            <button class="btn btn-danger" type="submit">Tidak</button>
          </form>

        </td>
      </tr>
      @endif
      @endforeach
    </tbody>
  </table>
</div>
<div class="container" id="confirmedTable">

  <table class="table">
    <thead>
      <tr>
        <th>No Produk</th>
        <th>Nama</th>
        <th>Deskripsi</th>
        <th>Harga</th>
        <th>Kategori</th>
        <th>Kondisi</th>
        <th>Penjual</th>
        <th>Gambar</th>
        <th>Konfirmasi</th>
      </tr>
    </thead>
    <tbody>
      @foreach(App\Models\Produk::all() as $product)
      @if($product->status == 'accepted')
      <tr>
        <td>{{ $product->id }}</td>
        <td>{{ $product->nama }}</td>
        <td>{{ $product->deskripsi }}</td>
        <td>{{ $product->harga }}</td>
        <td>{{ $product->kategori->name }}</td>
        <td>{{ $product->kondisi->name }}</td>
        <td>{{ $product->user->username }}</td>
        <td>
          <a href="{{ asset('images/' . $product->gambar) }}" target="_blank">Lihat Gambar</a>
        </td>
        <td>
          <form action="{{ route('admin.cancel.product', $product->id) }}" method="post">
            @csrf
            <button class="btn btn-danger" type="submit">Batalkan</button>
          </form>
        </td>
      </tr>
      @endif
      @endforeach
    </tbody>
  </table>
</div>
<div class="container" id="reviewTable">
  <table class="table">
    <thead>
      <tr>
        <th>No Produk</th>
        <th>Nama</th>
        <th>Deskripsi</th>
        <th>Harga</th>
        <th>Kategori</th>
        <th>Kondisi</th>
        <th>Penjual</th>
        <th>Gambar</th>
        <th>Konfirmasi</th>
      </tr>
    </thead>
    <tbody>
      @foreach(App\Models\Produk::all() as $product)
      @if($product->status == 'rejected')
      <tr>
        <td>{{ $product->id }}</td>
        <td>{{ $product->nama }}</td>
        <td>{{ $product->deskripsi }}</td>
        <td>{{ $product->harga }}</td>
        <td>{{ $product->kategori->name }}</td>
        <td>{{ $product->kondisi->name }}</td>
        <td>{{ $product->user->username }}</td>
        <td>
          <a href="{{ asset('images/' . $product->gambar) }}" target="_blank">Lihat Gambar</a>
        </td>
        <td>
          <form action="{{ route('admin.cancel.product', $product->id) }}" method="post">
            @csrf
            <button class="btn btn-success" type="submit">Tinjau Ulang</button>
          </form>
        </td>
      </tr>
      @endif
      @endforeach
    </tbody>
  </table>
</div>
<div class="container" id="reportedTable">
  <table class="table">
    <thead>
      <tr>
        <th>No Produk</th>
        <th>Nama</th>
        <th>Deskripsi</th>
        <th>Harga</th>
        <th>Kategori</th>
        <th>Kondisi</th>
        <th>Penjual</th>
        <th>Gambar</th>
        <th>Status</th>
      </tr>
    </thead>
    <tbody>
      @foreach(App\Models\Produk::all() as $product)
      @if($product->status == 'reported')
      <tr>
        <td>{{ $product->id }}</td>
        <td>{{ $product->nama }}</td>
        <td>{{ $product->deskripsi }}</td>
        <td>{{ $product->harga }}</td>
        <td>{{ $product->kategori->name }}</td>
        <td>{{ $product->kondisi->name }}</td>
        <td>{{ $product->user->username }}</td>
        <td>
          <a href="{{ asset('images/' . $product->gambar) }}" target="_blank">Lihat Gambar</a>
        </td>
        <td>
          <form action="{{ route('admin.confirm.product', $product->id) }}" method="post">
            @csrf
            <button class="btn btn-success" type="submit">Tolak Laporan</button>
          </form>
          <form action="{{ route('admin.reject.product', $product->id) }}" method="post">
            @csrf
            <button class="btn btn-danger" type="submit">Hapus</button>
          </form>
        </td>
      </tr>
      @endif
      @endforeach
    </tbody>
  </table>
</div>


<form action="{{ route('logout') }}" method="POST">
  @csrf
  <button type="submit">Logout</button>
</form>
<script>
  const showRequestsButton = document.getElementById("showRequests");
  const showConfirmedButton = document.getElementById("showConfirmed");
  const showReviewButton = document.getElementById("showReview");
  const showReportButton = document.getElementById("showReport");
  const requestsTable = document.getElementById("requestsTable");
  const confirmedContent = document.getElementById("confirmedTable");
  const reviewContent = document.getElementById("reviewTable");
  const reportedTable = document.getElementById("reportedTable");


  requestsTable.style.display = "block";
  confirmedContent.style.display = "none";
  reviewContent.style.display = "none";
  reportedTable.style.display = "none";

  showRequestsButton.addEventListener("click", () => {
    requestsTable.style.display = "block";
    confirmedContent.style.display = "none";
    reviewContent.style.display = "none";
    reportedTable.style.display = "none";
    showRequestsButton.classList.replace(
      "btn-outline-primary",
      "btn-primary"
    );
    showConfirmedButton.classList.replace(
      "btn-primary",
      "btn-outline-primary"
    );
    showReviewButton.classList.replace(
      "btn-primary",
      "btn-outline-primary"
    );
    showReportButton.classList.replace(
      "btn-primary",
      "btn-outline-primary"
    );
  });

  showConfirmedButton.addEventListener("click", () => {
    requestsTable.style.display = "none";
    confirmedContent.style.display = "block";
    reviewContent.style.display = "none";
    reportedTable.style.display = "none";
    showConfirmedButton.classList.replace(
      "btn-outline-primary",
      "btn-primary"
    );
    showRequestsButton.classList.replace(
      "btn-primary",
      "btn-outline-primary"
    );

    showReviewButton.classList.replace(
      "btn-primary",
      "btn-outline-primary"
    );
    showReportButton.classList.replace(
      "btn-primary",
      "btn-outline-primary"
    );
  });

  showReviewButton.addEventListener("click", () => {
    requestsTable.style.display = "none";
    confirmedContent.style.display = "none";
    reviewContent.style.display = "block";
    reportedTable.style.display = "none";
    showReviewButton.classList.replace(
      "btn-outline-primary",
      "btn-primary"
    );
    showConfirmedButton.classList.replace(
      "btn-primary",
      "btn-outline-primary"
    );
    showRequestsButton.classList.replace(
      "btn-primary",
      "btn-outline-primary"
    );
    showReportButton.classList.replace(
      "btn-primary",
      "btn-outline-primary"
    );
  });

  showReportButton.addEventListener("click", () => {
    requestsTable.style.display = "none";
    confirmedContent.style.display = "none";
    reviewContent.style.display = "none";
    reportedTable.style.display = "block";
    showReviewButton.classList.replace(
      "btn-primary",
      "btn-outline-primary"
    );
    showConfirmedButton.classList.replace(
      "btn-primary",
      "btn-outline-primary"
    );
    showRequestsButton.classList.replace(
      "btn-primary",
      "btn-outline-primary"
    );
    showReportButton.classList.replace(
      "btn-outline-primary",
      "btn-primary"
    );
  });

  $(document).ready(function() {
    $(".data").DataTable();
  });
</script>
@endsection