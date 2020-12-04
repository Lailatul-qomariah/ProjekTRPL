@extends('template.template')

@section('content')

<section class="ftco-section goto-here">
  <div class="container valign">
    <div class="row">
      <div class="col-md-3"></div>
      <div class="card" style="width: 30rem;">
        <img src="{{ asset ('assets/images/'. $m_DataPaketDesign->GamabarRumah ) }}" class="card-img-top" alt="...">
        <div class="card-body">
          <h5 class="card-title">{{ $m_DataPaketDesign->NamaPaketRumah}}</h5>
          <p class="card-text">{{ $m_DataPaketDesign->Keterangan}}</p>
        </div>
        <ul class="list-group list-group-flush">
          <li class="list-group-item"> Kategori      : {{ $m_DataPaketDesign->KetegoriRumah}}</li>
          <li class="list-group-item"> Luas Bangunan : {{ $m_DataPaketDesign->LuasBangun}}m</li>
          <li class="list-group-item"> Jumlah Lantai : {{ $m_DataPaketDesign->JumlahLantai}}</li>
          <li class="list-group-item">Tinggi Ruangan : {{ $m_DataPaketDesign->TinggiBangun}}m</li>
          <li class="list-group-item">Luas Ruangan   : {{ $m_DataPaketDesign->JumlahKamar}}m</li>
          <li class="list-group-item">Range Harga    : {{ $m_DataPaketDesign->RangeHarga}}</li>
          <li class="list-group-item">Waktu Pembuatan: {{ $m_DataPaketDesign->WaktuPembuatan}}</li>
        </ul>
        @if (auth()->user()->role == 'Designers')
        <a href="/designrumah/{{$m_DataPaketDesign->idPaketRumah}}/edit" class="btn btn-primary col-md-4">Edit Data</a>
        @endif

        @if (auth()->user()->role == 'Customers')
        <a href="/fpdesignrumah/{{$m_DataPaketDesign->idPaketRumah}}" class="btn btn-primary col-md-4">Pesan Paket</a>
        @endif
      </div>
    </div>
  </div>
</section>


@stop
