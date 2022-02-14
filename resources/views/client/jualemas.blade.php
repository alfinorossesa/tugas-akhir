@extends('layouts.client')
@section('konten')

<section style="margin-top: 50px;">
  <div class="form-style-10">
  <h3>Form Jual Emas</h3>
    <form action="{{ route('jualemas.store') }}" method="POST" enctype="multipart/form-data">
    @csrf
        <div class="inner-wrap">
        <div class="form-group">
                <label for="nama">Nama Produk</label>
                <input type="text" name="nama_produk" required="required" class="form-control" id="nama_produk"
                  placeholder="Nama Produk">
              </div>
              <div class="form-group">
                <label for="brand">Brand</label>
                <select class="form-control" id="brand_id" name="brand_id">
                  <option selected disabled>Pilih Brand
                  </option>
                  @foreach ($brand as $b)
                  <option value="{{$b->id}}">{{ $b->nama }}</option>
                  @endforeach
                </select>
              </div>
              <div class="form-group">
                <label for="stok">Stok</label>
                <input type="number" name="stok" required="required" class="form-control" id="stok" placeholder="Jumlah Stok">
              </div>
              <div class="form-group">
                <label for="deskripsi">Deskripsi</label>
                <textarea name="deskripsi" class="form-control" id="deskripsi" rows="3" placeholder="Deskripsi Produk"></textarea>
              </div>
              <div class="form-group">
                <label for="harga">Harga</label>
                <input type="number" name="harga" required="required" class="form-control" id="harga" placeholder="Harga">
              </div>
              <div class="form-group">
              <label for="brand">Lokasi</label>
              <select class="form-control" id="lokasi_id" name="lokasi_id">
                <option selected disabled>Pilih Lokasi
                </option>
                @foreach ($lokasi as $l)
                <option value="{{$l->id}}">{{ $l->nama_lokasi }}</option>
                @endforeach
              </select>
            </div>
            <div class="form-group">
              <label for="foto">Foto Produk (max 2Mb)</label>
              <input type="file" class="form-control-file" id="foto" name="foto_produk">
            </div>
        </div>
        <div class="button-section">
        <button type="submit" class="btn btn-warning">Submit</button>
              <a href="/produk" class="btn btn-secondary">Kembali</a>
        </div>
    </form>
  </div>
</section>

@endsection
