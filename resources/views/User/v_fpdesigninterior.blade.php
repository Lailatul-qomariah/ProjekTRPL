@extends('template.template')

@section('content')
<section class="ftco-section contact-section">
  <div><center><h3> Form Pemesanan Design Interior </h3><center></div>
  <div class="row block-9 justify-content-center mb-5">
  <div class="col-md-6 align-items-stretch d-flex">
    <form method="POST" action="/pdesigninterior" class="bg-light p-5 contact-form" enctype="multipart/form-data">
      @csrf
      <input type="text" name="IdPaket" value="{{ $paketdesign->IdPaket}}" hidden>
      <input type="text" name="IdUSer" value="{{auth()->user()->id}}" hidden>
      <input type="text" name="Hargatotal" value="{{$paketdesign->RangeHarga }}" hidden>
      <div class="form-group{{$errors->has('JenisRuangan') ? 'has-error' : ''}}">
        <label for="JenisRuangan"> Masukkan Jenis Ruangan Yang Diinginkan :</label>
        <input type="text" class="form-control" placeholder="Contoh : Paket Hemat" name="JenisRuangan"
        value="{{old('JenisRuangan')}}">
        @if($errors->has('JenisRuangan'))
        <button data-toggle="modal" data-target="#myModal3" style="display:none;" class="but"></button>
          <div class="modal fade" id="myModal3" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="false">
              <div class="modal-dialog">
                  <div class="modal-content">
                      <div class="modal-header">
                          <h4 class="modal-title" id="myModalLabel">Data Tidak Boleh Kosong</h4>
                      </div>
                      <div class="modal-body">
                          <h4>Masukkan Jenis Ruangan Dengan Benar</h4>
                      </div>
                      <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                      </div>
                  </div>
              </div>
          </div>
        @endif
      </div>

      <div class="form-group{{$errors->has('LuasRuangan') ? 'has-error' : ''}}">
        <label for="LuasRuangan"> Masukkan Luas Ruangan Design Interior Anda :</label>
        <input type="text" class="form-control" placeholder="Contoh : Minimalis " name="LuasRuangan"
        value="{{old('LuasRuangan')}}">
        @if($errors->has('LuasRuangan'))
        <button data-toggle="modal" data-target="#myModal3" style="display:none;" class="but"></button>
          <div class="modal fade" id="myModal3" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="false">
              <div class="modal-dialog">
                  <div class="modal-content">
                      <div class="modal-header">
                          <h4 class="modal-title" id="myModalLabel">Data Tidak Boleh Kosong</h4>
                      </div>
                      <div class="modal-body">
                          <h4>Masukkan Luas Ruangan Design Interior Dengan Benar</h4>
                      </div>
                      <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                      </div>
                  </div>
              </div>
          </div>
        @endif
      </div>

      <div class="form-group{{$errors->has('TinggiRuangan') ? 'has-error' : ''}}">
        <label for="TinggiRuangan"> Masukkan Tinggi Ruangan :</label>
        <input type="text" class="form-control" placeholder="Contoh : 7" name="TinggiRuangan"
        value="{{old('TinggiRuangan')}}">
        @if($errors->has('TinggiRuangan'))
        <button data-toggle="modal" data-target="#myModal3" style="display:none;" class="but"></button>
          <div class="modal fade" id="myModal3" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="false">
              <div class="modal-dialog">
                  <div class="modal-content">
                      <div class="modal-header">
                          <h4 class="modal-title" id="myModalLabel">Data Tidak Boleh Kosong</h4>
                      </div>
                      <div class="modal-body">
                          <h4>Data Luas Ruangan Harus Berupa Angka </h4>
                      </div>
                      <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                      </div>
                  </div>
              </div>
          </div>
        @endif
      </div>

      <div class="form-group{{$errors->has('Keterangan') ? 'has-error' : ''}}">
        <label for="Keterangan"> Masukkan Keterangan :</label>
        <textarea name="Keterangan" cols="30" rows="7" class="form-control" placeholder="Keterangan" >
          {{old('Keterangan')}}</textarea>
          @if($errors->has('Keterangan'))
          <button data-toggle="modal" data-target="#myModal3" style="display:none;" class="but"></button>
            <div class="modal fade" id="myModal3" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="false">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h4 class="modal-title" id="myModalLabel">Data Tidak Boleh Kosong</h4>
                        </div>
                        <div class="modal-body">
                            <h4>Masukkan Keterangan Paket Design Rumah Dengan Benar</h4>
                        </div>
                        <div class="modal-footer">
                          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        </div>
                    </div>
                </div>
            </div>
          @endif
      </div>

      <div class="form-group{{$errors->has('Gambar') ? 'has-error' : ''}}">
        <label for="Gambar"> Masukkan Foto Ruangan :</label> <br>
        <input type="file" name="Gambar" class="form-control" value="{{old('Gambar')}}" >
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
        <input type="submit" value="Buat Pesanan" class="btn btn-primary py-3 px-5">
        <a href="/paketdesign" class="btn btn-danger py-3 px-5"> Batalkan</a>
      </div>
    </form>
  </div>
</div>
</section>


@stop
