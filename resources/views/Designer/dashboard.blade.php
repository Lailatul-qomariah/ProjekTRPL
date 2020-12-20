@extends('template.template')

@section('content')

  @if(auth()->user()->role == 'Designers')
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
                <!-- <a href="/paketdesign/{{ $pesanan->IdPaket }}" class="icon d-flex align-items-center justify-content-center btn-custom">
                  <span class="ion-ios-link"></span>
                </a> -->
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
              <h3 class="price mb-3"><span class="orig-price">
              <a href="/profilUser/{{$pesanan->IdPesanan}}">Nama Customer  : {{ $pesanan->name }}
              </a></span></h3>

              <ul class="property_list">
                @if($pesanan->IdPaket == null)
                <li><span class="flaticon-bed">Jumlah Kamar : {{ $pesanan->JumlahKamar }} </span></li>
                <li><span class="flaticon-floor-plan"></span>Jumlah Lantai :{{ $pesanan->JumlahLantai }} </li>
                @endif
              </ul>
                @if($pesanan->StatusPesanan == 'Proses')
                <p class="price mb-3"><span class="orig-price">Sudah Di Bayar, Silahkan diProses Designnya!!</span></p>
                <p class="price mb-3"><span class="orig-price">Deadline proses Design : {{ $pesanan->deadline }}

                <a href="/dashboard/{{ $pesanan->IdPesanan}}"
                class="btn btn-primary" data-toggle="modal" data-target="#ModalSelesai">
                  Pesanan Selesai <a/>
                @endif

                  <div class="modal fade" id="ModalSelesai" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                      <div class="modal-content">
                        <div class="modal-header">
                          <h5 class="modal-title" id="exampleModalLabel">New message</h5>
                        </div>
                        <form method="POST" action="/dashboard/{{ $pesanan->IdPesanan}}" enctype="multipart/form-data">
                          @method('patch')
                          @csrf
                        <div class="modal-body">
                            <div class="form-group">

                              <textarea name="KetVerifikasi" class="form-control" id="KetVerifikasi"
                               required oninvalid="this.setCustomValidity(‘Data Tidak Boleh Kosong')" oninput="setCustomValidity('')"></textarea>
                             </div>

                        </div>
                        <div class="modal-footer">
                          <button type="button" class="btn btn-secondary" data-dismiss="modal">Batalkan</button>
                          <button type="submit" class="btn btn-primary">Verifikasi</button>
                        </div>
                      </form>
                    </div>
                  </div>
                </div>
            </div>
          </div>
        </div>
        @endforeach
      </div>
    </div>
  </section>
  @endif

  @if(auth()->user()->role == 'Customers')
  <section class="ftco-section goto-here">
    <div class="container">
      <div class="row">
        @foreach ( $designInterior as $dInterior )
       <div class="col-md-4">
          <div class="property-wrap">
            <div class="img align-items-center justify-content-center" >
              <img src="{{ asset ('assets/images/'. $dInterior->Gambar ) }}" class="img align-items-center justify-content-center">
              <div class="list-agent d-flex align-items-center">
                <a href="#" class="icon d-flex align-items-center justify-content-center btn-custom">
                  <span class="ion-ios-link"></span>
                </a>
              </div>
            </div>
            <div class="text">
              <p class="price mb-3"><span class="orig-price">Nama Paket : {{ $dInterior->NamaPaket }}</span></p>
              <h3 class="mb-0"> Design : {{ $dInterior->Kategori }}</h3>
              <h3 class="mb-0">Harga : {{ $dInterior->RangeHarga }}</h3>
              <ul class="property_list">
                <li><span class="flaticon-bed">Luas : {{ $dInterior->Luas }} </span></li>
                <li><span class="flaticon-floor-plan"></span>Tinggi :{{ $dInterior->TinggiRuang }} </li>

              </ul>
            </div>
          </div>
        </div>
        @endforeach
      </div>

      <div class="row">
        @foreach ( $designrumah as $derum )
       <div class="col-md-4">
          <div class="property-wrap">
            <div class="img align-items-center justify-content-center" >
              <img src="{{ asset ('assets/images/'.$derum->GamabarRumah ) }}" class="img align-items-center justify-content-center">
              <div class="list-agent d-flex align-items-center">
                <a href="#" class="icon d-flex align-items-center justify-content-center btn-custom">
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





  @endif
@endsection
