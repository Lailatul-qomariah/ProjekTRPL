@extends('template.templateUser')

@section('content')

<section class="ftco-section goto-here">
  <div class="container">
    <div class="row">
      @foreach ( $m_DataPaketDesign as $derum )
     <div class="col-md-4">
        <div class="property-wrap">
          <div class="img align-items-center justify-content-center" >
            <img src="{{ asset ('assets/images/'.$derum->GamabarRumah ) }}" class="img align-items-center justify-content-center">
            <div class="list-agent d-flex align-items-center">
              <a href="/designrumahUser/{{ $derum->idPaketRumah }}" class="icon d-flex align-items-center justify-content-center btn-custom">
                <span class="ion-ios-link"></span>
              </a>
            </div>
          </div>
          <div class="text">
            <p class="price mb-3"><span class="orig-price">Nama Paket : {{ $derum->NamaPaketRumah }}</span></p>
            <h3 class="mb-0"> Design : {{ $derum->KetegoriRumah }}</h3>
            <h3 class="mb-0">Harga : {{ $derum->RangeHarga }}</h3>
            <ul class="property_list">
              <li><span class="flaticon-bed">Luas : {{ $derum->LuasBangun }} </span></li>
              <li><span class="flaticon-floor-plan"></span>Tinggi :{{ $derum->TinggiBangun }} </li>
            </ul>
          </div>
        </div>
      </div>
      @endforeach
    </div>
  </div>
</section>

@stop