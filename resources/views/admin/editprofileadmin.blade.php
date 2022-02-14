@extends('layouts.admin')
@section('content')

<section>
  <div class="container">
      <div class="row justify-content-center">
          <div class="col-md-8">
            <a href="/admin" class="nav-item nav-link text-secondary">
                <i class="fas fa-arrow-left mr-3 mt-4"></i>Kembali
            </a>
              <div class="card profile">
                  <div class="card-header"><i class="fas fa-user"></i> {{ __('Profile Saya') }}</div>

                  <div class="card-body">
                      <form action="{{ route('editprofileadmin.update',$user->id) }}" method="POST">
                          @csrf
                          <div class="form-group row">
                              <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Nama Lengkap') }}</label>
                              <div class="col-md-6">
                                <input id="name" type="text" name="name" required="required" readonly class="form-control" value="{{$user->name}}">
                              </div>
                              <a href="javascript:void()" id="btn-name"><i class="fa fa-pen icon-edit"></i></a>
                          </div>
                          <div class="form-group row">
                              <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('Email') }}</label>
                              <div class="col-md-6">
                                <input type="text" name="email" required="required" readonly class="form-control" value="{{$user->email}}">
                              </div>
                          </div>
                          <div class="form-group row">
                              <label for="jenis_kelamin" class="col-md-4 col-form-label text-md-right">{{ __('Jenis Kelamin') }}</label>
                              <div class="col-md-6">
                                <input type="text" name="jenis_kelamin" required="required" readonly class="form-control" value="{{$user->jenis_kelamin}}">
                              </div>
                          </div>
                          <div class="form-group row">
                              <label for="alamat" class="col-md-4 col-form-label text-md-right">{{ __('Alamat Lengkap') }}</label>
                              <div class="col-md-6">
                                <input id="alamat" type="text" name="alamat" required="required" readonly class="form-control" value="{{$user->alamat}}">
                              </div>
                              <a href="javascript:void()" id="btn-alamat"><i class="fa fa-pen icon-edit"></i></a>
                          </div>
                          <div class="form-group row">
                              <label for="no_hp" class="col-md-4 col-form-label text-md-right">{{ __('No. Handphone') }}</label>
                              <div class="col-md-6">
                                <input id="no_hp" type="text" name="no_hp" required="required" readonly class="form-control" value="{{$user->no_hp}}">
                              </div>
                              <a href="javascript:void()" id="btn-no_hp"><i class="fa fa-pen icon-edit"></i></a>
                          </div>

                          <div class="form-group row mb-0">
                              <div class="col-md-6 offset-md-4">
                                <button id="submit-btn" type="submit" class="btn btn-color-custom" disabled>
                                {{ __('Save') }}
                                </button>
                                <button id="cancel-btn" type="button" onclick="window.location.href='/admin'" class="btn btn-secondary" disabled>
                                {{ __('Cancel') }}
                                </button>
                              </div>
                          </div>
                      </form>
                  </div>
              </div>
          </div>
      </div>
  </div>
</section>

@endsection

@section('scripts')
<script>
    $(document).ready(function(){
        $('#btn-name').click(function(){
            $('#name').removeAttr('readonly');
            $('#submit-btn').removeAttr('disabled');
            $('#cancel-btn').removeAttr('disabled');
        });
        $('#btn-alamat').click(function(){
            $('#alamat').removeAttr('readonly');
            $('#submit-btn').removeAttr('disabled');
            $('#cancel-btn').removeAttr('disabled');
        });
        $('#btn-no_hp').click(function(){
            $('#no_hp').removeAttr('readonly');
            $('#submit-btn').removeAttr('disabled');
            $('#cancel-btn').removeAttr('disabled');
        });
    });
</script>
@endsection
