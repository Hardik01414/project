<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>@yield('title')</title>
        <link href="{{ asset('resources/css/styles.css') }}" rel="stylesheet" />
        {{-- <link href="{{ asset('resources/fontawesome-free-6.4.0-web/css/fontawesome.min.css') }}" rel="stylesheet" /> --}}
        <link href="{{ asset('resources/css/bootstrap.min.css') }}" rel="stylesheet" />
        <script src="{{ asset('resources/jquery/jquery-3.7.0.min.js') }}"></script>
    </head>
<body>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <a class="navbar-brand" href="{{ route('dashboard') }}">
        @if (session()->has('uname'))
            {{ session()->get('uname') }}
        @else
            Navbar
        @endif</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNavDropdown">
          <ul class="navbar-nav">
            <li class="nav-item">
              <a class="nav-link" href="{{ route('new.add') }}"><b><i class="fa fa-user" aria-hidden="true"></i>->નવું દાળિયું ઉમેરો</b></a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{ route('select.date') }}"><b>->તારીખ અને દાળિયા ઉમેરો</b></a>
              </li>
            <li class="nav-item">
              <a class="nav-link" href="{{ route('seen.daliya') }}"><b>->તારીખ ઉપર થી દાળિયા જોવો</b></a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#"><b>->ઍક દાળિયા ની દાળી</b></a>
            </li>
            <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <b>*પૈસા ની માહિતી</b>
              </a>
              <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                <a class="dropdown-item" href="#">તારીખ ઉપર થી</a>
                <a class="dropdown-item" href="#">ઍક દાળિયા ના</a>
              </div>
            </li>
            <li class="nav-item">
                <a href="{{ route('logout') }}" class="btn btn-danger">LogOut</a>
            </li>
          </ul>
        </div>
      </nav>
<div class="container-fluid">
    @yield('content')
</div>
{{-----------------------------------------------------------------------------------------------------}}
<script src="{{ asset('resources/js/bootstrap.bundle.min.js') }}"></script>
<script src="{{ asset('resources/js/scripts.js') }}"></script>
@yield('script')
</body>
</html>
