{{-- CSS Link --}}

<link rel="stylesheet" href="{{asset('css/home.css')}}" />


<style>
  /* Mengkustomisasi tombol navigasi carousel */
  .carousel-control-prev,
  .carousel-control-next {
      border-radius: 20px;
      max-width: 50px;
      background-color: #3570d6;
  }
  .carousel-item img {
      border-radius: 20px;
  }

  .carousel {
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.2); /* Bayangan tipis dengan warna hitam */
    border-radius: 20px;
  }
  /* Warna latar belakang tombol navigasi saat dihover */
  .carousel-control-prev:hover,
  .carousel-control-next:hover {
    background-color: #89a8de; /* Warna latar belakang biru lebih gelap saat dihover */
  }
</style>