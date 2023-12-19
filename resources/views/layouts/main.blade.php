<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('judul')</title>

    <!--Memanggil style, font dan boostrap-->
    @include('includes.stylehome')
    @include('includes.stylenavbar')
    @include('includes.font')
    @include('includes.bootstrap')
    <link rel="stylesheet" href="css/kategori.css">
</head>
<body>
    @include('includes.navbar')
    <div
      class="container-flex justify-content-center align-items-center mt-5"
      id="_container"
    >
      @yield('content')
    </div>
    @include('includes.footer')
    @include('includes.script')
</body>
</html>