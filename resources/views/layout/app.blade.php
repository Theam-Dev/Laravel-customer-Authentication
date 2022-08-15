<!DOCTYPE html>
<html lang="en">
  <head>
    <title>Laravel 9 Customer Auth</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css">
    <meta name="csrf-token" content="{{ csrf_token() }}">
  </head>
  <body>
    <nav class="navbar navbar-expand-sm bg-dark navbar-dark">
      <div class="navbar-brand">Laravel 9 Custom Auth</div>
      <ul class="navbar-nav ml-auto">
        @if(Session::has('loginId'))
        <li class="nav-item">
          <a class="nav-link" href="{{route('logout')}}">Logout</a>
        </li> 
        @else
        <li class="nav-item">
          <a class="nav-link" href="{{route('register')}}">Register</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="{{route('login')}}">Login</a>
        </li>
        @endguest
      </ul>
    </nav>
    <br>
    <div class="container">
      @yield("content")
    </div>
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.0/dist/jquery.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js"></script>
  </body>
</html>
