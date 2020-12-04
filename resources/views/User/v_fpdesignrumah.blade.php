@extends('template.template')

@section('content')
<section class="ftco-section contact-section">
  <div><center><h3> Form Pemesanan Design Rumah </h3><center></div>
  <div class="row block-9 justify-content-center mb-5">
  <div class="col-md-6 align-items-stretch d-flex">
    <form method="POST" action="/pdesignrumah" class="bg-light p-5 contact-form" enctype="multipart/form-data">
      @csrf
      <input type="text" name="IdPaketRumah" value="{{ $m_DataPaketDesign->idPaketRumah}}" hidden>
      <input type="text" name="IdUSer" value="{{auth()->user()->id}}" hidden>
      <input type="text" name="Hargatotal" value="{{ $m_DataPaketDesign->RangeHarga}}" hidden>
      <div class="form-group{{$errors->has('LuasBangunan') ? 'has-error' : ''}}">
        <label for="LuasBangunan"> Masukkan Luas Bangunan Yang Diinginkan :</label>
        <input type="text" class="form-control" placeholder="Contoh : 10 m" name="LuasBangunan"
        value="{{old('LuasBangunan')}}">
        @if($errors->has('LuasBangunan'))
        <button data-toggle="modal" data-target="#myModal3" style="display:none;" class="but"></button>
          <div class="modal fade" id="myModal3" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="false">
              <div class="modal-dialog">
                  <div class="modal-content">
                      <div class="modal-header">
                          <h4 class="modal-title" id="myModalLabel">Data Tidak Boleh Kosong</h4>
                      </div>
                      <div class="modal-body">
                          <h4>Masukkan Luas Bangunan Dengan Benar</h4>
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
        <label for="JumlahLantai"> Masukkan Jumlah Lantai Yang Anda Inginkan :</label>
        <input type="text" class="form-control" placeholder="Contoh : 2 " name="JumlahLantai"
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
                          <h4>Masukkan Jumlah Lantai Dengan Benar</h4>
                      </div>
                      <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                      </div>
                  </div>
              </div>
          </div>
        @endif
      </div>

      <div class="form-group{{$errors->has('TinggiBangunan') ? 'has-error' : ''}}">
        <label for="TinggiBangunan"> Masukkan Tinggi Bangunan :</label>
        <input type="text" class="form-control" placeholder="Contoh : 7 m" name="TinggiBangunan"
        value="{{old('TinggiBangunan')}}">
        @if($errors->has('TinggiBangunan'))
        <button data-toggle="modal" data-target="#myModal3" style="display:none;" class="but"></button>
          <div class="modal fade" id="myModal3" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="false">
              <div class="modal-dialog">
                  <div class="modal-content">
                      <div class="modal-header">
                          <h4 class="modal-title" id="myModalLabel">Data Tidak Boleh Kosong</h4>
                      </div>
                      <div class="modal-body">
                          <h4>Masukkan Tinggi Bangunan Dengan Benar </h4>
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
        <input type="text" class="form-control" placeholder="Contoh : 7 " name="JumlahKamar"
        value="{{old('JumlahKamar')}}">
        @if($errors->has('JumlahKamar'))
        <button data-toggle="modal" data-target="#myModal3" style="display:none;" class="but"></button>
          <div class="modal fade" id="myModal3" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="false">
              <div class="modal-dialog">
                  <div class="modal-content">
                      <div class="modal-header">
                          <h4 class="modal-title" id="myModalLabel">Data Tidak Boleh Kosong</h4>
                      </div>
                      <div class="modal-body">
                          <h4>Data Hanya Dapat Diisi Dengan Angka </h4>
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
        <label for="Gambar"> Masukkan Foto Rumah :</label> <br>
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
        <a href="" class="btn btn-danger py-3 px-5"> Batalkan</a>
      </div>
    </form>
  </div>
</div>
</section>


@stop
