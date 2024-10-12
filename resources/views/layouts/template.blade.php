<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title', 'Products')</title>

    @vite(['resources/sass/app.scss', 'resources/css/app.css'])
</head>


<nav class="navbar navbar-expand-sm bg-black text-white navbar-dark fixed-top">
    <div class="container-fluid">
      <!-- Tombol collapse bar -->
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#collapsibleNavbar">
        <span class="navbar-toggler-icon"></span>
      </button>
      <!-- Dropdown link with collapse bar -->
      <div class="collapse navbar-collapse" id="collapsibleNavbar">
        <ul class="navbar-nav">
          <li class="nav-item">
            <a class="nav-link" href="{{ route('home') }}">HOME</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="{{ route('products.index') }}">PRODUCT</a>
          </li>
        </ul>
      </div>
    </div>
  </nav>


<body>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <a class="navbar-brand" href="{{ route('home') }}">Home</a>
        <button
            class="navbar-toggler" type="button"
            type="button"
            data-bs-toggle="collapse"
            data-bs-target="#navbarSupportedContent"
            aria-controls="false"
            aria-label="Toggle navigation"
        >
            <span class="navbar-toogler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <a href="{{ route('products.index') }}" class="nav-link">
                    Guests
                    </a>
                </li>
            </ul>
        </div>

    </nav>
    @yield('body')


    @vite(['resources/js/app.js'])
</body>

</html>
