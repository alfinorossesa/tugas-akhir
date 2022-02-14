@extends('layouts.admin')
@section('content')

<!-- Content Header (Page header) -->
<section class="content-header">
      <div class="container-fluid">
        <div class="row mb-1">
          <div class="col-sm-6">
            <h1>Member</h1>
          </div>
        </div>
      </div>
</section>

<!-- Main content -->
<section class="content">
  <div class="table table-responsive">
    <table id="produkTable" class="table table-bordered table-hover styled-table">
      <thead>
        <tr class="text-center">
          <th>No.</th>
          <th>Nama</th>
          <th>Email</th>
          <th>Jenis Kelamin</th>
          <th>Alamat Lengkap</th>
          <th>No. HP</th>
          <th>Aksi</th>
        </tr>
      </thead>

      @foreach ($users as $key => $u)
      <tr>
      <td class="text-center">{{ $users->firstItem() + $key }}</td>
        <td>{{ $u->name }}</td>
        <td>{{$u->email}}</td>
        <td>{{$u->jenis_kelamin}}</td>
        <td>{{$u->alamat}}</td>
        <td>{{$u->no_hp}}</td>
        <td class="text-center">
          <form action="{{ route('member.destroy',$u->id) }}" method="POST">
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
      {{$users->firstItem()}} 
      to 
      {{$users->lastItem()}} 
      of 
      {{$users->total()}} 
      entries
    </div>
    <div class="float-right">
    {{ $users->links() }}
    </div>
  </div>
</section>
<!-- end Main content -->

@endsection