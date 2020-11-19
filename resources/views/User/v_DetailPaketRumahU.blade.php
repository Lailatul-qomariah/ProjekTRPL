@extends('template.templateUser')

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
          <li class="list-group-item"> Luas Bangunan : {{ $m_DataPaketDesign->LuasBangun}}</li>
          <li class="list-group-item"> Jenis Ruangan : {{ $m_DataPaketDesign->JumlahLantai}}</li>
          <li class="list-group-item">Tinggi Ruangan : {{ $m_DataPaketDesign->TinggiBangun}}</li>
          <li class="list-group-item">Luas Ruangan   : {{ $m_DataPaketDesign->JumlahKamar}}</li>
          <li class="list-group-item">Range Harga    : {{ $m_DataPaketDesign->RangeHarga}}</li>
          <li class="list-group-item">Range Harga    : {{ $m_DataPaketDesign->WaktuPembuatan}}</li>
        </ul>
      </div>
    </div>
  </div>
</section>


@stop
