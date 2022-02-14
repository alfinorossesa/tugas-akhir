@extends('layouts.client')
@section('konten')

<!-- carousel -->
<div id="test" class="carousel slide bg-light" data-ride="carousel" style="margin-top: 65px;">
  <ol class="carousel-indicators">
    <li data-target="#test" data-slide-to="0" class="active"></li>
    <li data-target="#test" data-slide-to="1"></li>
    <li data-target="#test" data-slide-to="2"></li>
    <li data-target="#test" data-slide-to="3"></li>
  </ol>
  <div class="carousel-inner margintop">
    <div class="carousel-item active">
      <img class="d-block w-100" src="/layout-template/img/slides/emasbat.jpg" alt="First slide">
    </div>
    <div class="carousel-item">
      <img class="d-block w-100" src="/layout-template/img/slides/zz2.jpg" alt="Second slide">
    </div>
    <div class="carousel-item">
      <img class="d-block w-100" src="/layout-template/img/slides/zz3.jpg" alt="Third slide">
    </div>
    <div class="carousel-item">
      <img class="d-block w-100" src="/layout-template/img/slides/zz4.jpg" alt="Fourth slide">
    </div>
  </div>
  <a class="carousel-control-prev" href="#test" role="button" data-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="sr-only">Previous</span>
  </a>
  <a class="carousel-control-next" href="#test" role="button" data-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="sr-only">Next</span>
  </a>
</div>

<!-- end carousel -->

<!-- alur -->
<section class="bg-light">
  <div class="container">
    <h3 class="sec-title">Alur Pembelian</h3>
    <div class="row">
      <div class="col-sm-12 col-md-4">
        <div class="card">
          <div class="card-body">
            <h5 class="card-title"></i>1. Cari Emas</h5>
            <p class="card-text">Cari produk emas yang anda inginkan dan pastikan sesuai dengan lokasi anda.</p>
          </div>
        </div>
      </div>
      <div class="col-sm-12 col-md-4">
        <div class="card">
          <div class="card-body">
            <h5 class="card-title">2. Ketemuan (COD)</h5>
            <p class="card-text">Ketemuan dengan penjual emas yang akan anda beli untuk meminimalisir penipuan online.</p>
          </div>
        </div>
      </div>
      <div class="col-sm-12 col-md-4">
        <div class="card">
          <div class="card-body">
            <h5 class="card-title">3. Deal</h5>
            <p class="card-text">Setelah sepakat dengan penjual, bayar dengan harga yang telah ditentukan.</p>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
<!-- / alur -->

<!-- produk -->
<section>
  <div class="container">
    <h3 class="sec-title">Produk </h3>
    <div class="row">
      @foreach ($produk as $p)
        <div class="col-md-3 col-sm-12 mt-4">
          <div class="card" style="width: 15rem;">
            <img src="{{ asset('img/produk/'.$p->foto_produk) }}" alt="foto" width="80px" class="card-img-top" alt="...">
            <div class="card-body">
              <h5 class="card-title">{{ $p->nama_produk }}</h5>
              <p class="card-text">
                <strong>Stok : </strong> {{$p->stok}} <br>
                <strong>Harga : </strong>Rp. {{number_format($p->harga)}} <br>
                <hr>
                {{$p->user->name}}, {{$p->lokasi->nama_lokasi}}
              </p>
              <a href="{{route('produk.beli_sekarang',$p->id)}}" class="btn btn-warning"><i class="fas fa-shopping-cart"></i> Beli</a>
              <a href="{{route('produk.show_detail',$p->id)}}" class="btn btn-warning"><i class="fas fa-info-circle"></i> Detail</a>
            </div>
          </div>
        </div>
      @endforeach
    </div>
    <br>
    <a href="/produk" class="nav-item nav-link text-secondary float-right">
    Lihat Semua Produk <i class="fas fa-arrow-right ml-2"></i>
    </a>
  </div>
</section>
<!-- end produk -->

<!-- tentang kami -->
<section>
  <div class="container">
    <h3 class="sec-title">Tentang Kami</h3>
    <div class="row">
      <div class="col-md-5">
        <div class="tentang-imgBox">
          <img src="/layout-template/img/aboutme.jpg" alt="" class="rounded">
        </div>
      </div>
      <div class="col-md-7">
        <div class="tentang-konten">
          <h5>Tukuemas</h5>
          <p class="sec-content" style="text-align: justify;">Tukuemas merupakan sebuah marketplace yang melayani penjualan emas berdasarkan
            lokasi penjual, hal ini bertujuan untuk mengsinkronkan lokasi pembeli dan penjual agar memudahkan kedua
            belah pihak untuk bertemu, mengingat marketplace tukuemas ini menerapkan sistem transaksi COD.
            selain itu, produk emas bisa difilterkan menurut jenis brand emas yang diinginkan oleh pembeli.
          </p>
        </div>
      </div>
    </div>
  </div>
</section>
<!-- / tentang kami -->
@endsection
