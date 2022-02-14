<!doctype html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="/layout-template/css/bootstrap.min.css">
  <!-- css -->
  <link rel="stylesheet" href="/layout-template/css/style.css">
  <link rel="stylesheet" href="/layout-template/css/produk.css">
  <link rel="stylesheet" href="/layout-template/css/profile.css">
  <link rel="stylesheet" href="/layout-template/css/custom-tampilan.css">

  <!-- fa -->
  <link rel="stylesheet" href="/layout-template/fontawesome-free/css/all.min.css">
  <style>
    .badge {
      font-size: 8px;
      vertical-align: top;
      margin-left: -0.8em;
    }

    .scrollable-menu {
    height: auto;
    max-height: 200px;
    overflow-x: hidden;
    }
    
  </style>
  <title>Tukuemas</title>

</head>

<body>
  <nav class="navbar navbar-expand-lg navbar-light bg-light fixed-top">
    <div class="container">
      <!-- Left navbar links -->
      <a class="navbar-brand" href="/home">
        <img src="/layout-template/img/tukuemas1.png" alt="">
      </a>

      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
        <ul class="navbar-nav">
          <li class="nav-item d-none d-sm-inline-block">
            <a class="nav-link" href="/home">Home</a>
          </li>
          <li class="nav-item d-none d-sm-inline-block">
            <a class="nav-link" href="/produk">Produk</a>
          </li>
          <li class="nav-item dropdown d-none d-sm-inline-block">

            <?php
            use App\Models\Lokasi;
            $lokasi = Lokasi::all();
            ?>

            <a class="nav-link dropdown-toggle" id="navbarDropdown" data-toggle="dropdown" href="#">Atur Lokasi</a>
              <div class="dropdown-menu scrollable-menu" aria-labelledby="dropdownMenuButton">
              @foreach($lokasi as $l)
              <a class="dropdown-item" href="{{route('produk.atur_lokasi', $l->slug)}}">{{$l->nama_lokasi}}</a>
              @endforeach
              </div>
          </li>
          <li class="nav-item d-none d-sm-inline-block">
            <a class="nav-link" href="/about">About</a> 
          </li>
          @if(Auth::user())
          <li class="nav-item d-none d-sm-inline-block">
            <a class="nav-link btn btn-outline-warning btn-sm" href="{{route('jualemas.create')}}">Jual Emas</a>
          </li>
          @endif

        </ul>

        <!-- Right navbar links -->
        <ul class="navbar-nav ml-auto">
          <!-- Authentication Links -->
          @guest
            <a class="nav-item nav-link btn btn-warning mr-2" data-toggle="modal" data-target="#loginModal">
              {{ __('Login') }}
            </a>
            @if (Route::has('register'))

            <a class="nav-item nav-link btn btn-warning" href="{{ route('register') }}">{{ __('Register') }}</a>

            @endif
          @else
            <li class="nav-item dropdown">
              <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                {{ Auth::user()->name }} <span class="caret"></span>
              </a>

              <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                <a class="btn btn-xs btn-secondary mb-1 w-100" href="{{url('editprofile')}}">
                  {{ __('Edit Profile') }}
                </a>
                <a class="btn btn-xs btn-danger w-100" href="{{ route('logout') }}" onclick="event.preventDefault();
                                  document.getElementById('logout-form').submit();">
                  {{ __('Logout') }}
                </a>
                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                  @csrf
                </form>
              </div>
            </li>
          @endguest
        </ul>

      </div>
    </div>
  </nav>
  @yield('konten')




  <!-- Modal -->
  <div class="modal fade" id="loginModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Login</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <form method="POST" action="{{ route('login') }}">
            @csrf

            <div class="form-group row">
              <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('Email') }}</label>

              <div class="col-md-6">
                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                @error('email')
                <span class="invalid-feedback" role="alert">
                  <strong>{{ $message }}</strong>
                </span>
                @enderror
              </div>
            </div>

            <div class="form-group row">
              <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>

              <div class="col-md-6">
                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                @error('password')
                <span class="invalid-feedback" role="alert">
                  <strong>{{ $message }}</strong>
                </span>
                @enderror
              </div>
            </div>

            <div class="form-group row">
              <div class="col-md-6 offset-md-4">
                <div class="form-check">
                  <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                  <label class="form-check-label" for="remember">
                    {{ __('Ingat Saya') }}
                  </label>
                </div>
              </div>
            </div>

            <div class="form-group row mb-0">
              <div class="col-md-8 offset-md-4">
                <button type="submit" class="btn btn-warning">
                  {{ __('Login') }}
                </button>
                @if (Route::has('password.request'))
                <a class="btn-link" href="{{ route('password.request') }}">
                  {{ __('Lupa Password?') }}
                </a>
                @endif
              </div>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
  <!-- end modal -->

  <!-- footer -->
  <footer class="mt-5 bg-light">
    <span>Copyright © 2021 Tukuemas</span>
  </footer>
  <!-- end footer -->

  <!-- Optional JavaScript -->
  <!-- jQuery first, then Popper.js, then Bootstrap JS -->
  <script src="/layout-template/js/jquery.js"></script>
  <script src="/layout-template/js/popper.min.js"></script>
  <script src="/layout-template/js/bootstrap.min.js"></script>
  
  @yield('scripts')
</body>

</html>

