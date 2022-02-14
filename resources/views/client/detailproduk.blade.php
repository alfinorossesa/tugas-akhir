@extends('layouts.client')
@section('konten')

<section style="margin-top: 50px;">
  <div class="container mt-1 ">
    <div class="col-md-10 m-auto">
      <a href="{{ url()->previous() }}" class="nav-item nav-link text-secondary">
        <i class="fas fa-arrow-left mr-3"></i>Kembali
      </a> 
      <div class="card styled-table">
        <div class="card-body">
          <h4 class="card-title">{{$produk->brand->nama_brand}} {{$produk->nama_produk}}</h4>
          <div class="row">
            <div class="col-md-5 m-auto">
              <div class="rental-imgBox">
                <img src="{{ asset('img/produk/'.$produk->foto_produk) }}" alt="">
              </div>
            </div>
            <div class="col-md-7">
              <table class="table">
                <tbody>
                  <tr>
                    <td>Nama Produk</td>
                    <td>:</td>
                    <td>{{$produk->nama_produk}}</td>
                  </tr>
                  <tr>
                    <td>Nama Penjual</td>
                    <td>:</td>
                    <td>{{$produk->user->name}}</td>
                  </tr>
                  <tr>
                    <td>Brand</td>
                    <td>:</td>
                    <td>{{$produk->brand->nama}}</td>
                  </tr>
                  <tr>
                    <td>Deskripsi</td>
                    <td>:</td>
                    <td>{{$produk->deskripsi}}</td>
                  </tr>
                  <tr>
                    <td>Stok</td>
                    <td>:</td>
                    @if($produk->stok == 0)
                    <td>Stok Habis</td>
                    @else
                    <td>{{$produk->stok}}</td>
                    @endif
                  </tr>
                  <tr>
                    <td>Lokasi</td>
                    <td>:</td>
                    <td>{{$produk->lokasi->nama_lokasi}}</td>
                  </tr>
                  <tr>
                    <td>Harga /pcs.</td>
                    <td>:</td>
                    <td>Rp. {{number_format($produk->harga)}}</td>
                  </tr>
                </tbody>
              </table>
              <a class="btn btn-warning" href="{{route('produk.beli_sekarang',$produk->id)}}"><i class="fas fa-shopping-cart"></i> Beli</a>
              
            </div>
          </div> 
        </div>
      </div>
    </div>
  </div>
  </div>
</section>
@endsection
