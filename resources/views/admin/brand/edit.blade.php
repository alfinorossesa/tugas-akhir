@extends('layouts.admin')
@section('content')

<section>
  <div class="form-style-10">
  <h3>Edit Brand</h3>
    <form action="{{ route('brand.update',$brand->id) }}" method="POST">
    @csrf
    @method('PUT')
        <div class="inner-wrap">
          <div class="form-group">
            <label for="nama">Nama Brand</label>
            <input type="text" name="nama" required="required" class="form-control"
              value="{{$brand->nama}}">
          </div>
        </div>
        <div class="button-section">
          <button type="submit" class="btn btn-warning">Update</button>
          <a href="{{ route('brand.index') }}" class="btn btn-secondary">Kembali</a>
        </div>
    </form>
  </div>
</section>

@endsection
