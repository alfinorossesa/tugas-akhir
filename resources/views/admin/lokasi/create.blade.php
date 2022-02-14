@extends('layouts.admin')
@section('content')

<section>
  <div class="form-style-10">
  <h3>Tambah Lokasi</h3>
    <form action="{{ route('lokasi.store') }}" method="POST">
    @csrf
        <div class="inner-wrap">
          <div class="form-group">
            <label for="nama_lokasi">Lokasi</label>
            <input type="text" name="nama_lokasi" required="required" class="form-control" id="lokasi"
              placeholder="Nama Lokasi">
          </div>
        </div>
        <div class="button-section">
          <button type="submit" class="btn btn-warning">Submit</button>
          <a href="{{ url()->previous() }}" class="btn btn-secondary">Kembali</a>
        </div>
    </form>
  </div>
</section>

@endsection
