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
      @foreach ( $paketdesigns as $paketdesign )
     <div class="col-md-4">
        <div class="property-wrap">
          <div class="img align-items-center justify-content-center" >
            <img src="{{ asset ('assets/images/'. $paketdesign->Gambar ) }}" class="img align-items-center justify-content-center">
            <div class="list-agent d-flex align-items-center">
              <a href="/paketdesign/{{ $paketdesign->IdPaket }}" class="icon d-flex align-items-center justify-content-center btn-custom">
                <span class="ion-ios-link"></span>
              </a>
            </div>
          </div>
          <div class="text">
            <p class="price mb-3"><span class="orig-price">Nama Paket : {{ $paketdesign->NamaPaket }}</span></p>
            <h3 class="mb-0"> Design : {{ $paketdesign->Kategori }}</h3>
            <h3 class="mb-0">Harga : {{ $paketdesign->RangeHarga }}</h3>
            <ul class="property_list">
              <li><span class="flaticon-bed">Luas : {{ $paketdesign->Luas }} </span></li>
              <li><span class="flaticon-floor-plan"></span>Tinggi :{{ $paketdesign->TinggiRuang }} </li>
            </ul>
          </div>
        </div>
      </div>
      @endforeach
    </div>
    @if (auth()->user()->role == 'Designers')
    <a href="/paketdesign/create" class="btn btn-primary py-3 px-4">Tambah Data</a>
    @endif
  </div>
</section>

@stop
