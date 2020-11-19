@extends('template.templateUser')

@section('content')

<section class="ftco-section goto-here">
  <div class="container valign">
    <div class="row">
      <div class="col-md-3"></div>
      <div class="card" style="width: 30rem;">
        <img src="{{ asset ('assets/images/'. $paketdesign->Gambar ) }}" class="card-img-top" alt="...">
        <div class="card-body">
          <h5 class="card-title">{{ $paketdesign->NamaPaket}}</h5>
          <p class="card-text">{{ $paketdesign->Keterangan}}</p>
        </div>
        <ul class="list-group list-group-flush">
          <li class="list-group-item"> Jenis Ruangan : {{ $paketdesign->JenisRuang}}</li>
          <li class="list-group-item"> Kategori      : {{ $paketdesign->Kategori}}</li>
          <li class="list-group-item">Tinggi Ruangan : {{ $paketdesign->TinggiRuang}}</li>
          <li class="list-group-item">Luas Ruangan   : {{ $paketdesign->Luas}}</li>
          <li class="list-group-item">Range Harga    : {{ $paketdesign->RangeHarga}}</li>
          <li class="list-group-item">Range Harga    : {{ $paketdesign->RangeHarga}}</li>
        </ul>
      </div>
    </div>
  </div>
</section>


@stop
