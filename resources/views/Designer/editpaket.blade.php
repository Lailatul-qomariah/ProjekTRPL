@extends('template.template')

@section('content')
<section class="ftco-section contact-section">
  <div><center><h3> Form Ubah Data Paket Design </h3></center></div>
  <div class="row block-9 justify-content-center mb-5">
  <div class="col-md-6 align-items-stretch d-flex">
    <form method="POST" action="/paketdesign/{{ $paketdesign->IdPaket}}" class="bg-light p-5 contact-form" enctype="multipart/form-data">
      @method('patch')
      @csrf
      <div class="form-group">
        <label for="NamaPaket"> Masukkan Nama Paket Design Anda :</label>
        <input type="text" class="form-control" placeholder="Ex : Paket Hemat" name="NamaPaket"
        value="{{ $paketdesign->NamaPaket}}">
      </div>
      <div class="form-group">
        <label for="NamaPaket"> Masukkan Kategori Paket Design Anda :</label>
        <input type="text" class="form-control" placeholder="Ex : Minimalis " name="Kategori"
          value="{{ $paketdesign->Kategori}}">
      </div>
      <div class="form-group">
        <label for="JenisRuang"> Masukkan Jenis Ruangan :</label>
        <input type="text" class="form-control" placeholder="Ex : ruang tamu" name="JenisRuang"
        value="{{ $paketdesign->JenisRuang}}">
      </div>
      <div class="form-group">
        <label for="Luas"> Masukkan Luas Ruangan :</label>
        <input type="text" class="form-control" placeholder="Ex : 20m x 20m" name="Luas"
        value="{{ $paketdesign->Luas}}">
      </div>
      <div class="form-group">
        <label for="TinggiRuang"> Masukkan Tinggi Ruangan :</label>
        <input type="text" name="TinggiRuang" class="form-control" placeholder="Ex : 7m"
        value="{{ $paketdesign->TinggiRuang}}">
      </div>
      <div class="form-group">
        <label for="RangeHarga"> Masukkan Range Harga :</label>
        <input type="text" name="RangeHarga" class="form-control" placeholder="Ex : 10-20"
        value="{{ $paketdesign->RangeHarga}}">
      </div>
      <div class="form-group">
        <label for="WaktuPembuatan"> Masukkan Waktu Pembuatan :</label>
        <input type="text" name="WaktuPembuatan" class="form-control" placeholder="Ex : 10-20"
          value="{{$m_DataPaketDesign->WaktuPembuatan}}" required >
      </div>
      <div class="form-group">
        <label for="Keterangan"> Masukkan Keterangan :</label>
        <textarea name="Keterangan" id="" cols="30" rows="7" class="form-control" placeholder="Keterangan"
        >{{ $paketdesign->Keterangan}}</textarea>
      </div>
      <div class="form-group {{$errors->has('Gambar') ? 'has-error' : ''}}">
        <label for="Gambar"> Masukkan Gambar Ruangan :</label> <br>
        <img src="{{ asset ('assets/images/'. $paketdesign->Gambar ) }}" width="50" height="50">
        <input type="file" name="Gambar" class="masukkan" value="{{ $paketdesign->Gambar}}">
        @if($errors->has('Gambar'))
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
        <input type="submit" value="Simpan Data" class="btn btn-primary py-3 px-5">
        <a href="/paketdesign" class="btn btn-danger py-3 px-5"> Batalkan</a>
      </div>

    </form>
  </div>
</div>
</section>


@stop
