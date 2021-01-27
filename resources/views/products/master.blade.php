@php
$products = 'Products'
@endphp

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>@yield('title')</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
  <link rel="stylesheet" href="{{ asset('css/style.css') }}">

</head>

<body>

  {{-- start of navbar --}}
  <nav class="navbar navbar-expand-lg navbar-light sticky-top justify-content-between"
    style="background-color: #e3f2fd;">
    <div class="container-fluid">
      <a class="navbar-brand" href="#">Navbar</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
        aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav mb-2 mb-lg-0">
          <li class="nav-item">
            <a class="nav-link active ml-md-auto" aria-current="page" href="{{ route('products.index') }}">All
              {{ $products }}</a>
          </li>
          <li class="nav-item">
            <a class="nav-link active ml-md-auto" aria-current="page" href="{{ route('products.create') }}">Create
              {{ $products }}</a>
          </li>
      </div>
    </div>
  </nav>
  {{-- end of navbar --}}

  {{-- start of content --}}
  @yield('content')
  {{-- end of content --}}



  {{-- footer --}}
  <div class="container-fluid ">
    <footer class="py-4 px-5 mt-md-5 border-top" style="background-color: #e3f2fd;">
      <div class="row">
        <div class="col-8 col-md">
          <small class="d-block text">© YisWeb 2021</small>
        </div>

        <div class="col-4 col-md">
          <small class="d-block text">© elsayed elbeshry</small>
        </div>

      </div>
    </footer>
  </div>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW" crossorigin="anonymous">
  </script>
</body>

</html>
