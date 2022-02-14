@extends('layouts.admin')
@section('content')

<!-- Content Header (Page header) -->
<section class="content-header">
      <div class="container-fluid">
        <div class="row mb-1">
          <div class="col-sm-6">
            <h1>Produk</h1>
          </div>
        </div>
      </div>
</section>

<!-- Main content -->
<section class="content">
  <div class="container-fluid">
    <div class="mb-3">
      <a href="{{ route('produk.create') }}" class="btn btn-primary mt-2 mb-1 float-left"><i class="fa fa-plus"></i> Tambah Produk</a>
    </div>

    <div class="table table-responsive">
      <table id="produkTable" class="table table-bordered table-hover styled-table">
        <thead>
          <tr class="text-center">
            <th>No.</th>
            <th>Nama Produk</th>
            <th>Brand</th>
            <th>Stok</th>
            <th>Deskripsi</th>
            <th>Harga</th>
            <th>Lokasi</th>
            <th>Foto Produk</th>
            <th>Aksi</th>
          </tr>
        </thead>

        @foreach ($produk as $key => $p)
        <tr>
          <td class="text-center">{{ $produk->firstItem() + $key }}</td>
            <td>{{ $p->nama_produk }}</td>
            <td>{{$p->brand->nama}}</td>
            <td>{{$p->stok}}</td>
            <td>{{$p->deskripsi}}</td>
            <td>Rp. {{number_format($p->harga)}}</td>
            <td>{{$p->lokasi->nama_lokasi}}</td>
            <td class="text-center"><img src="{{ asset('img/produk/'.$p->foto_produk) }}" alt="foto" width="80px"></td>
            <td class="text-center">
              <form action="{{ route('produk.destroy',$p->id) }}" method="POST">
                <a href="{{ route('produk.edit',$p->id) }}" class="btn btn-success btn-sm mr-3 mb-1"><i
                    class="fa fa-edit"></i>
                  Edit</a>
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger btn-sm mr-3" onclick="return confirm('Hapus Data?');"><i
                    class="fa fa-trash"></i> Hapus</button>
              </form>
            </td>
        </tr>
        @endforeach
      </table>
        <div>
          Showing 
          {{$produk->firstItem()}} 
          to 
          {{$produk->lastItem()}} 
          of 
          {{$produk->total()}} 
          entries
      </div>
      <div class="float-right">
        {{ $produk->links() }}
      </div>
    </div>
  </div>
</section>

@endsection