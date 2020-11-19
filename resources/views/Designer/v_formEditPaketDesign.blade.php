@extends('template.template')

@section('content')
<section class="ftco-section contact-section">
  <div><center><h3> Form Ubah Data Paket Design Rumah </h3></center></div>
  <div class="row block-9 justify-content-center mb-5">
  <div class="col-md-6 align-items-stretch d-flex">
    <form method="POST" action="/designrumah/{{ $m_DataPaketDesign->idPaketRumah}}" class="bg-light p-5 contact-form" enctype="multipart/form-data">
      @method('patch')
      @csrf
      <div class="form-group">
        <label for="NamaPaketRumah"> Masukkan Nama Paket Design Rumah Anda :</label>
        <input type="text" class="form-control" placeholder="Ex : Paket Hemat" name="NamaPaketRumah"
        value="{{$m_DataPaketDesign->NamaPaketRumah}}">
      </div>
      <div class="form-group">
        <label for="KetegoriRumah"> Masukkan Kategori Paket Design Rumah Anda :</label>
        <input type="text" class="form-control" placeholder="Ex : Minimalis " name="KetegoriRumah"
        value="{{$m_DataPaketDesign->KetegoriRumah}}" >
      </div>
      <div class="form-group">
        <label for="LuasBangun"> Masukkan Luas Bangunan :</label>
        <input type="text" class="form-control" placeholder="Ex : ruang tamu" name="LuasBangun"
        value="{{$m_DataPaketDesign->LuasBangun}}">
      </div>
      <div class="form-group">
        <label for="JumlahLantai"> Masukkan Jumlah Lantai :</label>
        <input type="text" class="form-control" placeholder="Ex : 20m x 20m" name="JumlahLantai"
        value="{{$m_DataPaketDesign->JumlahLantai}}">
      </div>
      <div class="form-group">
        <label for="TinggiBangun"> Masukkan Tinggi Ruangan :</label>
        <input type="text" name="TinggiBangun" class="form-control" placeholder="Ex : 7m"
          value="{{$m_DataPaketDesign->TinggiBangun}}">
      </div>
      <div class="form-group">
        <label for="JumlahKamar"> Masukkan Jumlah Kamar :</label>
        <input type="text" name="JumlahKamar" class="form-control" placeholder="Ex : 10-20"
          value="{{$m_DataPaketDesign->JumlahKamar}}">
      </div>
      <div class="form-group">
        <label for="RangeHarga"> Masukkan Range Harga :</label>
        <input type="text" name="RangeHarga" class="form-control" placeholder="Ex : 10-20"
          value="{{$m_DataPaketDesign->RangeHarga}}" >
      </div>
      <div class="form-group">
        <label for="WaktuPembuatan"> Masukkan Waktu Pembuatan :</label>
        <input type="text" name="WaktuPembuatan" class="form-control" placeholder="Ex : 10-20"
          value="{{$m_DataPaketDesign->WaktuPembuatan}}" >
      </div>
      <div class="form-group">
        <label for="Keterangan"> Masukkan Keterangan :</label>
        <textarea name="Keterangan" cols="30" rows="7" class="form-control" placeholder="Keterangan" >
          {{$m_DataPaketDesign->Keterangan}}</textarea>
      </div>
      <div class="form-group{{$errors->has('GamabarRumah') ? 'has-error' : ''}}">
        <label for="GamabarRumah"> Masukkan Gambar Ruangan :</label> <br>
        <img src="{{ asset ('assets/images/'. $m_DataPaketDesign->GamabarRumah )}}" width="50" height="50">
        <input type="file" name="GamabarRumah"  class="masukkan" value="{{$m_DataPaketDesign->GamabarRumah}}">
        @if($errors->has('GamabarRumah'))
        <button data-toggle="modal" data-target="#myModal3" style="display:none;" class="but"></button>
          <div class="modal fade" id="myModal3" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="false">
              <div class="modal-dialog">
                  <div class="modal-content">
                      <div class="modal-header">
                        <h4>Diharapkan Mengupload File Berupa Gambar dengan Extention jpeg, jpg, png, atau webp</h4>
                      </div>
                      <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                      </div>
                  </div>
              </div>
          </div>
        @endif
      </div>
      <div class="form-group">
        <input type="submit" value="Simpan" class="btn btn-primary py-3 px-5">
        <a href="/designrumah" class="btn btn-danger py-3 px-5"> Batalkan</a>
      </div>

    </form>
  </div>
</div>
</section>


@stop
