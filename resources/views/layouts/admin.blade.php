<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Admin | Tukuemas</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="/adminlte/plugins/fontawesome-free/css/all.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="/adminlte/css/adminlte.min.css">

  <!-- css custom --> 
  <link rel="stylesheet" href="/layout-template/css/custom-tampilan.css">

  <script src="{{ asset('js/app.js') }}"></script>

</head>
<body class="hold-transition sidebar-mini">
<!-- Site wrapper -->
<div class="wrapper">
  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
        <a href="{{ url('/admin') }}" class="nav-link">Home</a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
        <a href="#" class="nav-link">Contact</a>
      </li>
    </ul>

    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
      <!-- Navbar Search -->
      <li class="nav-item">
        <a class="nav-link" data-widget="navbar-search" href="#" role="button">
          <i class="fas fa-search"></i>
        </a>
        <div class="navbar-search-block">
          <form class="form-inline">
            <div class="input-group input-group-sm">
              <input class="form-control form-control-navbar" type="search" placeholder="Search" aria-label="Search">
              <div class="input-group-append">
                <button class="btn btn-navbar" type="submit">
                  <i class="fas fa-search"></i>
                </button>
                <button class="btn btn-navbar" type="button" data-widget="navbar-search">
                  <i class="fas fa-times"></i>
                </button>
              </div>
            </div>
          </form>
        </div>
      </li>

      <!-- Customize Admin -->
      <li class="nav-item">
        <a class="nav-link" data-widget="control-sidebar" data-slide="true" href="#" role="button">
          <i class="fas fa-th-large"></i>
        </a>
      </li>
    </ul>
  </nav>
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="{{ url('/admin') }}" class="brand-link">
      <img src="/layout-template/img/logo.png" alt="AdminLTE Logo" class="brand-image " style="opacity: .8">
      <span class="brand-text font-weight-light">Tukuemas</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user (optional) -->      
      <div class="user-panel mt-1 d-flex">
        <!-- <div class="image">
          <img src="/adminlte/img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          @if(Auth::user())
          <a href="#" class="d-block">{{ Auth::user()->name }}</a>
          @else
          @endif
        </div> -->
        <nav>
          <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
            <li class="nav-item has-treeview menu-close d-block">
              <a href="{{ url('/admin') }}" class="nav-link image">
              <img src="/adminlte/img/user2-160x160.jpg" class="img-circle elevation-2 mx-auto" alt="User Image">
                @if(Auth::user())
                  <p class="ml-2">{{ Auth::user()->name }}</p>
                @else
                @endif
              </a>
              <ul class="nav nav-treeview">
                <li class="nav-item">
                  <a href="{{url('editprofileadmin')}}" class="nav-link">
                    <p>Edit Profile</p>
                  </a>
                </li>
                <li class="nav-item">
                <a class="nav-link" href="{{ route('logout') }}" onclick="event.preventDefault();
                                  document.getElementById('logout-form').submit();">
                  {{ __('Logout') }}
                </a>
                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                  @csrf
                </form>
                </li>
              </ul>
            </li>
          </ul>
        </nav>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-accordion="false">
          <li class="nav-item">
            <a href="{{ url('/admin') }}" class="nav-link">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Dashboard
              </p>
            </a>  
          </li>
          <li class="nav-item">
            <a href="{{ route('produk.index') }}" class="nav-link">
              <i class="nav-icon fas fa-th"></i>
              <p>Produk</p>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{ route('brand.index') }}" class="nav-link">
              <i class="nav-icon fas fa-copy"></i>
              <p>
                Brand
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{ url('admin/member') }}" class="nav-link">
              <i class="nav-icon fas fa-user"></i>
              <p>
                Member
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{ url('admin/lokasi') }}" class="nav-link">
              <i class="nav-icon fas fa-map-pin"></i>
              <p>
                Lokasi
              </p>
            </a>
          </li>
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    @yield('content')
  </div>
  <!-- /.content-wrapper -->

  <footer class="main-footer">
   Copyright &copy; 2021 Tukuemas
  </footer>

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->

<!-- jQuery -->
<script src="/adminlte/plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="/adminlte/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="/adminlte/js/adminlte.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="/adminlte/js/demo.js"></script>
<!-- Alert -->
@include('sweet::alert')

@yield('scripts')
</body>
</html>
