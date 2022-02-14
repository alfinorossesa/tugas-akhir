@extends('layouts.admin')
@section('content')

<section>
  <div class="form-style-10">
  <h3>Tambah Brand</h3>
    <form action="{{ route('brand.store') }}" method="POST">
    @csrf
        <div class="inner-wrap">
          <div class="form-group">
            <label for="nama">Brand</label>
            <input type="text" name="nama" required="required" class="form-control" id="brand"
              placeholder="Nama Brand">
          </div>
        </div>
        <div class="button-section">
          <button type="submit" class="btn btn-warning">Submit</button>
          <a href="{{ route('brand.index') }}" class="btn btn-secondary">Kembali</a>
        </div>
    </form>
  </div>
</section>

@endsection
