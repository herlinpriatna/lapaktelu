<nav class="navbar navbar-expand-lg fixed-top">
    <div class="container-fluid justify-content-center">
        <!-- logo -->
        <a class="navbar-brand d-flex ps-4" href="/home">
            <img src="{{url('img/logo-lapak-telu.png')}}" alt="" width="60">
        </a>

        <div class="d-flex flex-column">
            <a class="text-white fs-5 fw-bold text-start text-decoration-none" href="/home">
                LAPAK TEL-U
            </a>
        </div>

        <!-- navbar tonggle -->
        <button class="navbar-toggler shadow-none border-0" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasNavbar" aria-controls="offcanvasNavbar" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <!-- sidebar -->
        <div class="sidebar offcanvas offcanvas-end" tabindex="-1" id="offcanvasNavbar" aria-labelledby="offcanvasNavbarLabel">
            <!-- sidebar header -->
            <div class="offcanvas-header text-white border-bottom">
                <h5 class="offcanvas-title" id="offcanvasNavbarLabel">LAPAK TELU</h5>
                <button type="button" class="btn-close btn-close-white shadow-none" data-bs-dismiss="offcanvas" aria-label="Close"></button>
            </div>

            <!-- sidebar body -->
            <div class="offcanvas-body">
                <ul class="navbar-nav justify-content-center align-item-center flex-grow-1 pe-3">
                    <form action="{{ route('produk.search') }}" method="GET">
                        <div class="input-group">
                            <button class="input-group-text" type="submit"><img src="{{ url('img/icon-cari.png') }}" alt=""></button>
                            <input class="form-control" type="text" name="query" placeholder="Cari">
                        </div>
                    </form>
                </ul>

                <div class="d-flex justify-content-center gap-3 pe-4">

                    @auth
                    <!-- Jika pengguna sudah login -->
                    <a href="{{ route('jual') }}" class="text-white text-decoration-none px-3 py-2">
                        Upload
                    </a>
                    @else
                    <!-- Jika pengguna belum login -->
                    <a href="{{ route('login') }}" class="text-white text-decoration-none px-3 py-2">
                        Upload
                    </a>
                    @endauth
                    @guest
                    <!-- Jika pengguna belum login -->
                    <a href="{{ route('login') }}" class="text-white text-decoration-none px-4 py-2" id="upload-login">
                        Login
                    </a>
                    @else
                    <!-- Jika pengguna sudah login -->
                    <a href="#" class="text-white text-decoration-none px-4 py-2">
                        {{ Auth::user()->username }}
                    </a>

                    @endguest
                </div>
            </div>
        </div>
    </div>
</nav>