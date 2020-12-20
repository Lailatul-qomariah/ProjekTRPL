@extends('template.template')

@section('content')

<section class="ftco-section contact-section">
  <div><center><h3> Form Tambah Data Paket Design </h3><center></div>
  <div class="row block-9 justify-content-center mb-5">
  <div class="col-md-6 align-items-stretch d-flex">
    <form method="POST" action="/designrumah" class="bg-light p-5 contact-form" enctype="multipart/form-data">
      @csrf
      <input type="text" name="DesignerR" value="{{auth()->user()->id}}" hidden>
      <div class="form-group{{$errors->has('NamaPaketRumah') ? 'has-error' : ''}}">
        <label for="NamaPaketRumah"> Masukkan Nama Paket Design Rumah Anda :</label>
        <input type="text" class="form-control" placeholder="Contoh : Paket Hemat" name="NamaPaketRumah"
        value="{{old('NamaPaketRumah')}}">
        @if($errors->has('NamaPaketRumah'))
        <button data-toggle="modal" data-target="#myModal3" style="display:none;" class="but"></button>
          <div class="modal fade" id="myModal3" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="false">
              <div class="modal-dialog">
                  <div class="modal-content">
                      <div class="modal-header">
                          <h4 class="modal-title" id="myModalLabel">Data Tidak Boleh Kosong</h4>
                      </div>
                      <div class="modal-body">
                          <h4>Masukkan Nama Paket Design Rumah Dengan Benar</h4>
                      </div>
                      <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                      </div>
                  </div>
              </div>
          </div>
        @endif
      </div>

      <div class="form-group{{$errors->has('KetegoriRumah') ? 'has-error' : ''}}">
        <label for="KetegoriRumah"> Masukkan Kategori Paket Design Rumah Anda :</label>
        <input type="text" class="form-control" placeholder="Contoh : Minimalis " name="KetegoriRumah"
        value="{{old('KetegoriRumah')}}">
        @if($errors->has('KetegoriRumah'))
        <button data-toggle="modal" data-target="#myModal3" style="display:none;" class="but"></button>
          <div class="modal fade" id="myModal3" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="false">
              <div class="modal-dialog">
                  <div class="modal-content">
                      <div class="modal-header">
                          <h4 class="modal-title" id="myModalLabel">Data Tidak Boleh Kosong</h4>
                      </div>
                      <div class="modal-body">
                          <h4>Masukkan Kategori Paket Design Rumah Dengan Benar</h4>
                      </div>
                      <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                      </div>
                  </div>
              </div>
          </div>
        @endif
      </div>

      <div class="form-group{{$errors->has('LuasBangun') ? 'has-error' : ''}}">
        <label for="LuasBangun"> Masukkan Luas Bangunan (dalam satuan m):</label>
        <input type="text" class="form-control" placeholder="Contoh : 7" name="LuasBangun"
        value="{{old('LuasBangun')}}">
        @if($errors->has('LuasBangun'))
        <button data-toggle="modal" data-target="#myModal3" style="display:none;" class="but"></button>
          <div class="modal fade" id="myModal3" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="false">
              <div class="modal-dialog">
                  <div class="modal-content">
                      <div class="modal-header">
                          <h4 class="modal-title" id="myModalLabel">Data Tidak Boleh Kosong</h4>
                      </div>
                      <div class="modal-body">
                          <h4>Data Luas Bangunan Harus Berupa Angka </h4>
                      </div>
                      <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                      </div>
                  </div>
              </div>
          </div>
        @endif
      </div>

      <div class="form-group{{$errors->has('JumlahLantai') ? 'has-error' : ''}}">
        <label for="JumlahLantai"> Masukkan Jumlah Lantai :</label>
        <input type="text" class="form-control" placeholder="Contoh : 3" name="JumlahLantai"
        value="{{old('JumlahLantai')}}">
        @if($errors->has('JumlahLantai'))
        <button data-toggle="modal" data-target="#myModal3" style="display:none;" class="but"></button>
          <div class="modal fade" id="myModal3" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="false">
              <div class="modal-dialog">
                  <div class="modal-content">
                      <div class="modal-header">
                          <h4 class="modal-title" id="myModalLabel">Data Tidak Boleh Kosong</h4>
                      </div>
                      <div class="modal-body">
                          <h4>Data Jumlah Lantai Harus Berupa Angka</h4>
                      </div>
                      <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                      </div>
                  </div>
              </div>
          </div>
        @endif
      </div>

      <div class="form-group{{$errors->has('TinggiBangun') ? 'has-error' : ''}}">
        <label for="TinggiBangun"> Masukkan Tinggi Ruangan(dalam satuan m) :</label>
        <input type="text" name="TinggiBangun" class="form-control" placeholder="Contoh : 7"
        value="{{old('TinggiBangun')}}">
        @if($errors->has('TinggiBangun'))
        <button data-toggle="modal" data-target="#myModal3" style="display:none;" class="but"></button>
          <div class="modal fade" id="myModal3" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="false">
              <div class="modal-dialog">
                  <div class="modal-content">
                      <div class="modal-header">
                          <h4 class="modal-title" id="myModalLabel">Data Tidak Boleh Kosong</h4>
                      </div>
                      <div class="modal-body">
                          <h4>Data Tinggi Bangunan Harus Berupa Angka</h4>
                      </div>
                      <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                      </div>
                  </div>
              </div>
          </div>
        @endif
      </div>

      <div class="form-group{{$errors->has('JumlahKamar') ? 'has-error' : ''}}">
        <label for="JumlahKamar"> Masukkan Jumlah Kamar :</label>
        <input type="text" name="JumlahKamar" class="form-control" placeholder="Contoh : 10"
        value="{{old('JumlahKamar')}}" >
        @if($errors->has('JumlahKamar'))
        <button data-toggle="modal" data-target="#myModal3" style="display:none;" class="but"></button>
          <div class="modal fade" id="myModal3" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="false">
              <div class="modal-dialog">
                  <div class="modal-content">
                      <div class="modal-header">
                          <h4 class="modal-title" id="myModalLabel">Data Tidak Boleh Kosong</h4>
                      </div>
                      <div class="modal-body">
                          <h4>Data Jumlah Kamar Harus Berupa Angk</h4>
                      </div>
                      <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                      </div>
                  </div>
              </div>
          </div>
        @endif
      </div>

      <div class="form-group{{$errors->has('RangeHarga') ? 'has-error' : ''}}">
        <label for="RangeHarga"> Masukkan Harga :</label>
        <input type="text" name="RangeHarga" class="form-control" placeholder="Contoh : 1000000"
        value="{{old('RangeHarga')}}">
        @if($errors->has('RangeHarga'))
        <button data-toggle="modal" data-target="#myModal3" style="display:none;" class="but"></button>
          <div class="modal fade" id="myModal3" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="false">
              <div class="modal-dialog">
                  <div class="modal-content">
                      <div class="modal-header">
                          <h4 class="modal-title" id="myModalLabel">Data Tidak Boleh Kosong</h4>
                      </div>
                      <div class="modal-body">
                          <h4>Data Harga Paket Harus Berupa Angka</h4>
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

      <div class="form-group{{$errors->has('GamabarRumah') ? 'has-error' : ''}}">
        <label for="GamabarRumah"> Masukkan Gambar Ruangan :</label> <br>
        <input type="file" name="GamabarRumah" class="form-control" value="{{old('GamabarRumah')}}" >
        @if($errors->has('GamabarRumah'))
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
        <a href="/designrumah" class="btn btn-danger py-3 px-5"> Batalkan</a>
      </div>

    </form>
  </div>
</div>
</section>



@stop
