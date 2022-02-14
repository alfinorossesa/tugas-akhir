@extends('layouts.admin')
@section('content')

<section>
  <div class="form-style-10">
  <h3>Edit Produk</h3>
    <form action="{{ route('produk.update',$produk->id) }}" method="POST" enctype="multipart/form-data">
      @csrf
      @method('PUT')
        <div class="inner-wrap">
          <div class="form-group">
            <label for="nama">Nama Produk</label>
            <input type="text" name="nama_produk" required="required" class="form-control"
              value="{{$produk->nama_produk}}">
          </div>
              <div class="form-group">
            <label for="brand">Brand</label>
            <select class="form-control" id="" name="brand_id">
              <option selected disabled>Pilih Brand
              </option>
              @foreach ($brand as $b)
              <option value="{{$b->id}}" 
              @if ($b->id == $produk->brand_id)
              selected
              @endif
                > {{ $b->nama }}
              </option>
              @endforeach
            </select>
          </div>
          <div class="form-group">
            <label for="stok">Stok</label>
            <input type="number" name="stok" required="required" class="form-control" value="{{$produk->stok}}">
          </div>
          <div class="form-group">
            <label for="deskripsi">Deskripsi</label>
            <textarea name="deskripsi" class="form-control" rows="3">{{$produk->deskripsi}}</textarea>
          </div>
          <div class="form-group">
            <label for="harga">Harga</label>
            <input type="number" name="harga" required="required" class="form-control" value="{{$produk->harga}}">
          </div>
          <div class="form-group">
            <label for="lokasi">Lokasi</label>
            <select class="form-control" id="" name="lokasi_id">
              <option selected disabled>Pilih Lokasi
              </option>
              @foreach ($lokasi as $l)
              <option value="{{$l->id}}" 
              @if ($l->id == $produk->lokasi_id)
              selected
              @endif
                > {{ $l->nama_lokasi }}
              </option>
              @endforeach
            </select>
          </div>
          <div class="form-group">
            <label for="foto">Foto Produk</label>
            <p>Gambar saat ini : 
              <img src="{{ asset('img/produk/'.$produk->foto_produk) }}" alt="" style="width:70px">
            </p>
            <input type="file" class="form-control-file" name="foto_produk">
          </div>              
        </div>
          <div class="button-section">
            <button type="submit" class="btn btn-warning">Update</button>
            <a href="{{ route('produk.index') }}" class="btn btn-secondary">Kembali</a>
          </div>
    </form>
  </div>
</section>

@endsection
