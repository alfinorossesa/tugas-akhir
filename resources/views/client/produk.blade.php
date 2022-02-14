@extends('layouts.client')
@section('konten')

<!-- produk -->
<section>
  <h3 class="text-center sec-title" style="margin-top: 50px;">Produk</h3>

  <div class="container">
      <div class="dropdown mb-5">
        <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown"
          aria-haspopup="true" aria-expanded="false">
          Pilih Brand
        </button>
        <!-- kategori dropdown here -->
        <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
          @foreach ($listBrand as $b)
            <a class="dropdown-item" href="{{route('produk.show_brand', $b->slug)}}">{{$b->nama}}</a>
          @endforeach
        </div>
      </div>
      @if(Request::is('produk/brand/*'))
        @if ($stok==0)
        <section>
          <p class="text-center">Maaf stok kosong</p>
        </section>
        @endif
      @endif

      @if(Request::is('produk/lokasi/*'))
        @if ($stok==0)
        <section>
          <p class="text-center">Maaf stok kosong</p>
        </section>
        @endif
      @endif
      
    <div class="row">
      @foreach ($produk as $p)
        <div class="col-md-3 col-sm-12 mt-4">
          <div class="card" style="width: 15rem;">
            <img src="{{ asset('img/produk/'.$p->foto_produk) }}" alt="foto" width="80px" class="card-img-top" alt="...">
            <div class="card-body">
              <h5 class="card-title">{{ $p->nama_produk }}</h5>
              <p class="card-text">
                <strong>Stok : </strong> {{$p->stok}} <br>
                <strong>Harga : </strong>Rp. {{number_format($p->harga)}} <br>
                <hr>
                {{$p->user->name}}, {{$p->lokasi->nama_lokasi}}
              </p>
              <a href="{{route('produk.beli_sekarang',$p->id)}}" class="btn btn-warning"><i class="fas fa-shopping-cart"></i> Beli</a>
              <a href="{{route('produk.show_detail',$p->id)}}" class="btn btn-warning"><i class="fas fa-info-circle"></i> Detail</a>
            </div>
          </div>
        </div>
      @endforeach
    </div>
  </div>
</section>
  <div class="d-flex justify-content-center warna">
    {{ $produk->links() }}
  </div>
<!-- end produk -->

@endsection