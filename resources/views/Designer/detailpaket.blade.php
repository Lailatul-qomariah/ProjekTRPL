@extends('template.template')

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
        <ul class="list-group list-group-flush">
          <li class="list-group-item">Kategori      : {{ $paketdesign->Kategori}}</li>
          <li class="list-group-item">Jenis Ruangan : {{ $paketdesign->JenisRuang}}</li>
          <li class="list-group-item">Luas Ruangan   : {{ $paketdesign->Luas}}m</li>
          <li class="list-group-item">Tinggi Ruangan : {{ $paketdesign->TinggiRuang}}m</li>
          <li class="list-group-item">Range Harga    : {{ $paketdesign->RangeHarga}}</li>
          <li class="list-group-item">Waktu Pembuatan: {{ $paketdesign->WaktuPembuatan}} hari</li>
          <a href="/profilDesigner/{{$User->id}}">
          <li class="list-group-item">Nama Designer  : {{ $User->name }} {{ $User->last_name }} </li></a>
        </ul>

        @if (auth()->user()->role == 'Designers')
        <a href="{{$paketdesign->IdPaket}}/edit" class="btn btn-primary col-md-4">Ubah</a>
        @endif
        @if (auth()->user()->role == 'Customers')
        <a href="/fpdesigninterior/{{$paketdesign->IdPaket}}" class="btn btn-primary col-md-4">Pesan Paket Ini</a>
        @endif
      </div>

        <!-- <a href="/paketdesign" class="btn btn-danger col-md-4">Batalkan</a> -->
        <!-- Hapus data
        <form action="{{ $paketdesign->IdPaket }}" method="POST">
          @method('delete')
          @csrf
        <button type="submit" class="btn btn-danger py-3 px-4"> Hapus Data</button>
      </form> -->
      </div>
    </div>
  </div>
</section>


@stop
