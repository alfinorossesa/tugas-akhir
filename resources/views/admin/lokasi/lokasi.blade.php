@extends('layouts.admin')
@section('content')

<!-- Content Header (Page header) -->
<section class="content-header">
      <div class="container-fluid">
        <div class="row mb-1">
          <div class="col-sm-6">
            <h1>Lokasi</h1>
          </div>
        </div>
      </div>
</section>

<!-- Main content -->
<section class="content">
  <div class="table table-responsive">
    <div class="container-fluid">
      <div class="mb-3">
        <a href="{{route('lokasi.create')}}" class="btn btn-primary mt-2 mb-4 float-left"><i class="fa fa-plus"></i> Tambah Lokasi</a>
      </div>
        <table id="produkTable" class="table table-bordered table-hover styled-table">
          <thead>
            <tr class="text-center">
              <th>No.</th>
              <th>Lokasi</th>
              <th>Aksi</th>
            </tr>
          </thead>

          @foreach ($lokasi as $key => $l)
          <tr>
          <td class="text-center">{{ $lokasi->firstItem() + $key }}</td>
            <td>{{ $l->nama_lokasi }}</td>
            <td class="text-center">
              <form action="{{ route('lokasi.destroy',$l->id) }}" method="POST">
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
        {{$lokasi->firstItem()}} 
        to 
        {{$lokasi->lastItem()}} 
        of 
        {{$lokasi->total()}} 
        entries
      </div>
      <div class="float-right">
      {{ $lokasi->links() }}
      </div>
    </div>
  </div>
</section>
<!-- end Main content -->

@endsection