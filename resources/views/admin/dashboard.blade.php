@extends('layouts.admin')
@section('content')

<!-- Content Header (Page header) -->
<section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Dashboard Admin</h1>
          </div>
        </div>
      </div>
</section>

<!-- Main content -->
<section class="content">
  <div class="container-fluid">
    <!-- Small boxes (Stat box) -->
    <div class="row">
      <div class="col-lg-6 col-6">
        <!-- small box -->
        <div class="small-box bg-success">
          <div class="inner">
          <?php
              $produk = \App\Models\Produk::count();
            ?>
            @if(!empty($produk))
            <h3>{{$produk}}</h3>
            @else
            <h3>0</h3>
            @endif          
            <p>Produk</p>
          </div>
          <div class="icon">
            <i class="ion ion-person-add"></i>
          </div>
          <a href="{{ route('produk.index') }}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
        </div>
      </div>

      <div class="col-lg-6 col-6">
        <!-- small box -->
        <div class="small-box bg-primary">
          <div class="inner">
          <?php
              $brand = \App\Models\Brand::count();
            ?>
            @if(!empty($brand))
            <h3>{{$brand}}</h3>
            @else
            <h3>0</h3>
            @endif          
            <p>Brand</p>
          </div>
          <div class="icon">
            <i class="ion ion-bag"></i>
          </div>
          <a href="{{ route('brand.index') }}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i>
          </a>
        </div>
      </div>
    </div>

    <!-- Small boxes (Stat box) -->
    <div class="row">
      <div class="col-lg-6 col-6">
        <!-- small box -->
        <div class="small-box bg-danger">
          <div class="inner">
          <?php
              $users = \App\User::count();
            ?>
            @if(!empty($users))
            <h3>{{$users}}</h3>
            @else
            <h3>0</h3>
            @endif        
            <p>Member</p>
          </div>
          <div class="icon">
            <i class="ion ion-stats-bars"></i>
          </div>
          <a href="{{ url('admin/member') }}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
        </div>
      </div>

      <div class="col-lg-6 col-6">
        <!-- small box -->
        <div class="small-box bg-secondary">
          <div class="inner">
          <?php
              $lokasi = \App\Models\Lokasi::count();
            ?>
            @if(!empty($lokasi))
            <h3>{{$lokasi}}</h3>
            @else
            <h3>0</h3>
            @endif
            <p>Lokasi</p>
          </div>
          <div class="icon">
            <i class="ion ion-person-add"></i>
          </div>
          <a href="{{ url('admin/lokasi') }}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
        </div>
      </div>
    </div>
  </div>
</section>
<!-- /.content -->

@endsection