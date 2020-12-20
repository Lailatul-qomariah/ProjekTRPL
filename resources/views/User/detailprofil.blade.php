@extends('template.template')

@section('content')

<section class="ftco-section goto-here">
  <div class="container">
    <div class="row">

      <div class="col-md-3"></div>
     <div class="col-md-6">
        <div class="property-wrap">
          <div class="img align-items-center justify-content-center" >
            <img src="{{ asset ('assets/images/'. $User->foto ) }}" class="img align-items-center justify-content-center">
            <div class="list-agent d-flex align-items-center"></div>
          </div>
          <div class="text">
            <p class="price mb-3"><span class="orig-price">Nama Lengkap : {{ $User->name }}{{ $User->last_name }}</span></p>
            <h3 class="mb-0"> Email : {{ $User->email }}</h3>
            <h3 class="mb-0"> No Telepon/Hp : {{$User->phone }}</h3>
            <h3 class="mb-0"> Biodata : {{$User->biodata }}</h3>
            <a href="https://api.whatsapp.com/send?phone=({{$User->phone}})" class="btn btn-success">Chat WhatsApp</a>
          </div>

        </div>
      </div>
    </div>
  </div>
</section>

@stop
