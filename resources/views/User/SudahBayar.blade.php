@extends('template.template')

@section('content')
<section class="ftco-section goto-here">
  <div class="container">
    @if (session('status'))
    <div class="alert alert-success">
      {{ session('status')}}
    </div>
    @endif
    <div class="row">
      @foreach ( $m_PesananDesign as $pesanan )
     <div class="col-md-4">
        <div class="property-wrap">
          <div class="img align-items-center justify-content-center" >
            <img src="{{ asset ('assets/images/'. $pesanan->Gambar ) }}" class="img align-items-center justify-content-center">
            <div class="list-agent d-flex align-items-center">
              <a href="/paketdesign/{{ $pesanan->IdPaket }}" class="icon d-flex align-items-center justify-content-center btn-custom">
                <span class="ion-ios-link"></span>
              </a>
            </div>
          </div>
          <div class="text">
            <p class="price mb-3"><span class="orig-price">Nama Paket : {{ $pesanan->NamaPaket }}{{ $pesanan->NamaPaketRumah }}</span></p>
            @if($pesanan->IdPaketRumah == null)
            <h3 class="mb-0">Jenis Ruangan : {{ $pesanan->Jenisruangan }}</h3>
            @endif
            <h3 class="mb-0">Luas Bangun / Ruang : {{ $pesanan->Luasruangan }}{{ $pesanan->LuasBangunan }}</h3>
            <h3 class="mb-0">Tinggi Bangun / Ruang : {{ $pesanan->TinggiRuangan }}{{ $pesanan->TinggiBangunan }}</h3>
            <h3 class="mb-0">Status Pembayaran : {{ $pesanan->StatusPembayaran }}</h3>
            <h3 class="mb-0">Status Pesanan : {{ $pesanan->StatusPesanan }}</h3>
            <h3 class="mb-0">Keterangan : {{ $pesanan->Keterangan }}</h3>
            <!-- <h3 class="mb-0">Keterangan Verifikasi : {{ $pesanan->Kete }}</h3> -->
            <ul class="property_list">
              @if($pesanan->IdPaket == null)
              <li><span class="flaticon-bed">Jumlah Kamar : {{ $pesanan->JumlahKamar }} </span></li>
              <li><span class="flaticon-floor-plan"></span>Jumlah Lantai :{{ $pesanan->JumlahLantai }} </li>
              @endif
            </ul>
            <p class="price mb-3"><span class="orig-price">Jumlah Bayar : {{ $pesanan->Hargatotal }}</span></p>
            <p class="price mb-3"><span class="orig-price">Sudah Di Bayar, Dalam Proses Design</span></p>
          </div>
        </div>
      </div>
      @endforeach
    </div>



  </div>
</section>

@stop
