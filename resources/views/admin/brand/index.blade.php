@extends('layouts.admin')
@section('content')

<!-- Content Header (Page header) -->
<section class="content-header">
      <div class="container-fluid">
        <div class="row mb-1">
          <div class="col-sm-6">
            <h1>Brand</h1>
          </div>
        </div>
      </div>
</section>

<!-- Main content -->
<section class="content">
  <div class="container-fluid">
    <div class="mb-3">
      <a href="{{route('brand.create')}}" class="btn btn-primary mt-2 mb-1 float-left"><i class="fa fa-plus"></i> Tambah Brand</a>
    </div>

    <div class="table table-responsive">
      <table id="produkTable" class="table table-bordered table-hover styled-table">
        <thead>
          <tr class="text-center">
            <th>No.</th>
            <th>Brand</th>
            <th>Aksi</th>
          </tr>
        </thead>

        @foreach ($brand as $key => $b)
        <tr>
          <td class="text-center">{{ $brand->firstItem() + $key }}</td>
          <td class="text-center">{{ $b->nama }}</td>
          <td class="text-center"><form action="{{ route('brand.destroy',$b->id) }}" method="POST">
            <a href="{{ route('brand.edit',$b->id) }}" class="btn btn-success btn-sm mr-3 mb-1"><i
                class="fa fa-edit"></i>
              Edit</a>
            @csrf
            @method('DELETE')
            <button type="submit" class="btn btn-danger btn-sm mr-3" onclick="return confirm('Hapus Data?');"><i
                class="fa fa-trash"></i> Hapus</button>
          </form></td>
        </tr>
        @endforeach
      </table>
      <div>
      Showing 
      {{$brand->firstItem()}} 
      to 
      {{$brand->lastItem()}} 
      of 
      {{$brand->total()}} 
      entries
    </div>
    <div class="float-right">
    {{ $brand->links() }}
    </div>
    </div>
  </div>
</section>

@endsection