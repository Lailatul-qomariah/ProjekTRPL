@extends('template.template')

@section('content')

<section class="ftco-section goto-here">
  <div class="container">
    <div class="row">
      @foreach ( $User as $usr )
      <div class="col-md-3"></div>
     <div class="col-md-5">
        <div class="property-wrap">
          <div class="img align-items-center justify-content-center" >
            <img src="{{ asset ('assets/images/'. $usr->foto ) }}" class="  align-items-center content-center">
            <div class="list-agent d-flex align-items-center"></div>
          </div>
          <div class="text">
            <p class="price mb-3"><span class="orig-price">Nama Lengkap : {{ $usr->name }} {{ $usr->last_name }}</span></p>
            <h3 class="mb-0"> Email : {{ $usr->email }}</h3>
            <h3 class="mb-0"> No Telepon/Hp : {{$usr->phone }}</h3>
            <h3 class="mb-0"> Biodata : {{$usr->biodata }}</h3>

            <a href="/profilsaya/{{$usr->id}}/edit" class="btn btn-primary py-3 px-4">Ubah data</a>
          </div>
        </div>
      </div>
      @endforeach
    </div>
  </div>
</section>

@stop
