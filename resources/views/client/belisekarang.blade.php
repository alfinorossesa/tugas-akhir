@extends('layouts.client')
@section('konten')

<section style="margin-top: 50px;">
    <h3 class="text-center sec-title">Beli Emas</h3>
    <div class="container">
        <div class="col-md-4 m-auto">
            <a href="/produk" class="nav-item nav-link text-secondary">
            <i class="fas fa-arrow-left mr-3"></i>Kembali
            </a> 
            <div class="card styled-table">
                <div class="card-body">
                    <h4 class="card-title text-center">{{$produk->brand->nama_brand}} {{$produk->nama_produk}}</h4>
                    <br>
                    <div class="row">
                        <div class="col-md-12">
                            <table class="table">
                            <tbody>
                                <tr>
                                <td>Nama Penjual</td>
                                <td>:</td>
                                <td>{{$produk->user->name}}</td>
                                </tr>
                                <tr>
                                <td>No. HP</td>
                                <td>:</td>
                                <td>{{$produk->user->no_hp}}</td>
                                </tr>
                                <tr>
                                <td>Lokasi</td>
                                <td>:</td>
                                <td>{{$produk->lokasi->nama_lokasi}}</td>
                                </tr>
                            </tbody>
                            </table>
                            <div class="text-center">
                                <a class="btn btn-warning" href="https://api.whatsapp.com/send?phone={{$produk->user->no_hp}}&text=Saya+Berminat"  target="_blank" title="Hubungi Penjual"><i class="fab fa-whatsapp"></i> Hubungi Penjual</a>
                            </div>
                            
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
