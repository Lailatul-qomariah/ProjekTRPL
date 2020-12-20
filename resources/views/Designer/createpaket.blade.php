@extends('template.template')

@section('content')

<section class="ftco-section contact-section">
  <div><center><h4> Form Tambah Data Paket Design </h3><center></div>
  <div class="row block-9 justify-content-center mb-5">
  <div class="col-md-6 align-items-stretch d-flex">
    <form method="POST" action="/paketdesign" class="bg-light p-5 contact-form" enctype="multipart/form-data">
      @csrf
      <div class="form-group{{$errors->has('NamaPaket') ? 'has-error' : ''}}">
        <label for="NamaPaket"> Masukkan Nama Paket Design Interior Anda :</label>
        <input type="text" class="form-control" placeholder="Contoh : Paket Hemat" name="NamaPaket" value="{{old('NamaPaket')}}">
        @if($errors->has('NamaPaket'))
        <button data-toggle="modal" data-target="#myModal3" style="display:none;" class="but"></button>
          <div class="modal fade" id="myModal3" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="false">
              <div class="modal-dialog">
                  <div class="modal-content">
                      <div class="modal-header">
                          <h4 class="modal-title" id="myModalLabel">Data Tidak Boleh Kosong</h4>
                      </div>
                      <div class="modal-body">
                          <h4>Masukkan Nama Paket Design Interior Dengan Benar</h4>
                      </div>
                      <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                      </div>
                  </div>
              </div>
          </div>
        @endif
      </div>

      <div class="form-group {{$errors->has('Kategori') ? 'has-error' : ''}}">
        <label for="NamaPaket"> Masukkan Kategori Paket Design Interior Anda :</label>
        <input type="text" class="form-control" placeholder="Contoh : Minimalis " name="Kategori" value="{{old('Kategori')}}">
        @if($errors->has('Kategori'))
        <button data-toggle="modal" data-target="#myModal3" style="display:none;" class="but"></button>
          <div class="modal fade" id="myModal3" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="false">
              <div class="modal-dialog">
                  <div class="modal-content">
                      <div class="modal-header">
                          <h4 class="modal-title" id="myModalLabel">Data Tidak Boleh Kosong</h4>
                      </div>
                      <div class="modal-body">
                          <h4>Masukkan Kategori Design Interior Dengan Benar</h4>
                      </div>
                      <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                      </div>
                  </div>
              </div>
          </div>
        @endif
      </div>

      <div class="form-group {{$errors->has('JenisRuang') ? 'has-error' : ''}}">
        <label for="JenisRuang"> Masukkan Jenis Ruangan :</label>
        <input type="text" class="form-control" placeholder="Contoh : ruang tamu" name="JenisRuang" value="{{old('JenisRuang')}}">
        @if($errors->has('JenisRuang'))
        <button data-toggle="modal" data-target="#myModal3" style="display:none;" class="but"></button>
          <div class="modal fade" id="myModal3" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="false">
              <div class="modal-dialog">
                  <div class="modal-content">
                      <div class="modal-header">
                          <h4 class="modal-title" id="myModalLabel">Data Tidak Boleh Kosong</h4>
                      </div>
                      <div class="modal-body">
                          <h4>Masukkan Jenis Ruang Paket Design Interior Dengan Benar</h4>
                      </div>
                      <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                      </div>
                  </div>
              </div>
          </div>
        @endif
      </div>

      <div class="form-group {{$errors->has('Luas') ? 'has-error' : ''}}">
        <label for="Luas"> Masukkan Luas Ruangan(dalam satuan m) :</label>
        <input type="text" class="form-control" placeholder="Contoh : 20" name="Luas" value="{{old('Luas')}}">
        @if($errors->has('Luas'))
        <button data-toggle="modal" data-target="#myModal3" style="display:none;" class="but"></button>
          <div class="modal fade" id="myModal3" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="false">
              <div class="modal-dialog">
                  <div class="modal-content">
                      <div class="modal-header">
                          <h4 class="modal-title" id="myModalLabel">Data Tidak Boleh Kosong</h4>
                      </div>
                      <div class="modal-body">
                          <h4>Data Luas Harus Berupa Angka</h4>
                      </div>
                      <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                      </div>
                  </div>
              </div>
          </div>
        @endif
      </div>

      <div class="form-group {{$errors->has('TinggiRuang') ? 'has-error' : ''}}">
        <label for="TinggiRuang"> Masukkan Tinggi Ruangan(dalam satuan m) :</label>
        <input type="text" name="TinggiRuang" class="form-control" placeholder="Contoh : 7" value="{{old('TinggiRuang')}}" >
        @if($errors->has('TinggiRuang'))
        <button data-toggle="modal" data-target="#myModal3" style="display:none;" class="but"></button>
          <div class="modal fade" id="myModal3" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="false">
              <div class="modal-dialog">
                  <div class="modal-content">
                      <div class="modal-header">
                          <h4 class="modal-title" id="myModalLabel">Data Tidak Boleh Kosong</h4>
                      </div>
                      <div class="modal-body">
                          <h4>Data Tinggi Ruangan Harus Berupa Angka</h4>
                      </div>
                      <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                      </div>
                  </div>
              </div>
          </div>
        @endif
      </div>

      <div class="form-group {{$errors->has('RangeHarga') ? 'has-error' : ''}}">
        <label for="RangeHarga"> Masukkan Harga Paket :</label>
        <input type="text" name="RangeHarga" class="form-control" placeholder="Contoh : 1000000" value="{{old('RangeHarga')}}">
        @if($errors->has('RangeHarga'))
        <button data-toggle="modal" data-target="#myModal3" style="display:none;" class="but"></button>
          <div class="modal fade" id="myModal3" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="false">
              <div class="modal-dialog">
                  <div class="modal-content">
                      <div class="modal-header">
                          <h4 class="modal-title" id="myModalLabel">Data Tidak Boleh Kosong</h4>
                      </div>
                      <div class="modal-body">
                          <h4>Masukkan Harga Paket Design Dengan Benar</h4>
                      </div>
                      <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                      </div>
                  </div>
              </div>
          </div>
        @endif
      </div>
      <div class="form-group{{$errors->has('WaktuPembuatan') ? 'has-error' : ''}}">
        <label for="WaktuPembuatan"> Masukkan Waktu Pembuatan(dalam satuan hari) :</label>
        <input type="text" name="WaktuPembuatan" class="form-control" placeholder="Contoh : 10"
        value="{{old('WaktuPembuatan')}}">
        @if($errors->has('WaktuPembuatan'))
        <button data-toggle="modal" data-target="#myModal3" style="display:none;" class="but"></button>
          <div class="modal fade" id="myModal3" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="false">
              <div class="modal-dialog">
                  <div class="modal-content">
                      <div class="modal-header">
                          <h4 class="modal-title" id="myModalLabel">Data Tidak Boleh Kosong</h4>
                      </div>
                      <div class="modal-body">
                          <h4>Data Waktu Pembuatan Harus Berupa Angka</h4>
                      </div>
                      <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                      </div>
                  </div>
              </div>
          </div>
        @endif
      </div>

      <div class="form-group {{$errors->has('Keterangan') ? 'has-error' : ''}}">
        <label for="Keterangan"> Masukkan Keterangan :</label>
        <textarea name="Keterangan" cols="30" rows="7" class="form-control" placeholder="Keterangan" >{{old('Keterangan')}}</textarea>
        @if($errors->has('Keterangan'))
        <button data-toggle="modal" data-target="#myModal3" style="display:none;" class="but"></button>
          <div class="modal fade" id="myModal3" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="false">
              <div class="modal-dialog">
                  <div class="modal-content">
                      <div class="modal-header">
                          <h4 class="modal-title" id="myModalLabel">Data Tidak Boleh Kosong</h4>
                      </div>
                      <div class="modal-body">
                          <h4>Masukkan Keterangan Paket Design Interior Dengan Benar</h4>
                      </div>
                      <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                      </div>
                  </div>
              </div>
          </div>
        @endif
      </div>

      <div class="form-group {{$errors->has('Gambar') ? 'has-error' : ''}}">
        <label for="Gambar"> Masukkan Gambar Ruangan :</label> <br>
        <input type="file" name="Gambar" class="masukkan" value="{{old('Gambar')}}" >
        @if($errors->has('Gambar'))
        <button data-toggle="modal" data-target="#myModal3" style="display:none;" class="but"></button>
          <div class="modal fade" id="myModal3" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="false">
              <div class="modal-dialog">
                  <div class="modal-content">
                      <div class="modal-header">
                          <h4 class="modal-title" id="myModalLabel">Data Tidak Boleh Kosong</h4>
                      </div>
                      <div class="modal-body">
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
        <input type="submit" value="Selesai" class="btn btn-primary py-3 px-5">
        <a href="/paketdesign" class="btn btn-danger py-3 px-5"> Batalkan</a>
      </div>

    </form>
  </div>
</div>
</section>

@stop
