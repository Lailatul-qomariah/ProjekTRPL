@extends('template.template')

@section('content')
<section class="ftco-section contact-section">
  <div><center><h3> Form Ubah Data Profil </h3></center></div>
  <div class="row block-9 justify-content-center mb-5">
  <div class="col-md-6 align-items-stretch d-flex">
    <form method="POST" action="/profilsaya/{{ $User->id}}" class="bg-light p-5 contact-form" enctype="multipart/form-data">
      @method('patch')
      @csrf
      <div class="form-group{{$errors->has('name') ? 'has-error' : ''}}">
        <label for="name"> Masukkan Nama Depan Anda :</label>
        <input type="text" class="form-control" placeholder="Contoh : Anisa" name="name"
        value="{{$User->name}}">
        @if($errors->has('name'))
        <button data-toggle="modal" data-target="#myModal3" style="display:none;" class="but"></button>
          <div class="modal fade" id="myModal3" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="false">
              <div class="modal-dialog">
                  <div class="modal-content">
                      <div class="modal-header">
                          <h4 class="modal-title" id="myModalLabel">Data Tidak Boleh Kosong</h4>
                      </div>
                      <div class="modal-body">
                          <h4>Masukkan Nama Depan Anda Dengan Benar</h4>
                      </div>
                      <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                      </div>
                  </div>
              </div>
          </div>
        @endif
      </div>

      <div class="form-group{{$errors->has('last_name') ? 'has-error' : ''}}">
        <label for="last_name"> Masukkan Nama Belakang Anda :</label>
        <input type="text" class="form-control" placeholder="Contoh : Rahmawati " name="last_name"
        value="{{$User->last_name}}">
        @if($errors->has('last_name'))
        <button data-toggle="modal" data-target="#myModal3" style="display:none;" class="but"></button>
          <div class="modal fade" id="myModal3" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="false">
              <div class="modal-dialog">
                  <div class="modal-content">
                      <div class="modal-header">
                          <h4 class="modal-title" id="myModalLabel">Data Tidak Boleh Kosong</h4>
                      </div>
                      <div class="modal-body">
                          <h4>Masukkan Nama Belakang Anda Dengan Benar</h4>
                      </div>
                      <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                      </div>
                  </div>
              </div>
          </div>
        @endif
      </div>

      <div class="form-group{{$errors->has('email') ? 'has-error' : ''}}">
        <label for="email"> Masukkan Email Anda:</label>
        <input type="text" class="form-control" placeholder="Contoh : anisa@gmail" name="email"
        value="{{$User->email}}">
        @if($errors->has('email'))
        <button data-toggle="modal" data-target="#myModal3" style="display:none;" class="but"></button>
          <div class="modal fade" id="myModal3" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="false">
              <div class="modal-dialog">
                  <div class="modal-content">
                      <div class="modal-header">
                          <h4 class="modal-title" id="myModalLabel">Data Tidak Boleh Kosong</h4>
                      </div>
                      <div class="modal-body">
                          <h4>Masukkan Email Anda Dengan Benar </h4>
                      </div>
                      <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                      </div>
                  </div>
              </div>
          </div>
        @endif
      </div>

      <div class="form-group{{$errors->has('phone') ? 'has-error' : ''}}">
        <label for="phone"> Masukkan Nomor Telepon anda (Harus Diawali 62):</label>
        <input type="text" class="form-control" placeholder="Contoh : 6287654321" name="phone"
        value="{{$User->phone}}">
        @if($errors->has('phone'))
        <button data-toggle="modal" data-target="#myModal3" style="display:none;" class="but"></button>
          <div class="modal fade" id="myModal3" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="false">
              <div class="modal-dialog">
                  <div class="modal-content">
                      <div class="modal-header">
                          <h4 class="modal-title" id="myModalLabel">Data Tidak Boleh Kosong</h4>
                      </div>
                      <div class="modal-body">
                          <h4>Data Nomor Telepon Harus Berupa Angka</h4>
                      </div>
                      <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                      </div>
                  </div>
              </div>
          </div>
        @endif
      </div>


      <div class="form-group{{$errors->has('biodata') ? 'has-error' : ''}}">
        <label for="biodata"> Masukkan biodata :</label>
        <textarea name="biodata" cols="30" rows="7" class="form-control" placeholder="biodata" >
          {{$User->biodata}}</textarea>
          @if($errors->has('biodata'))
          <button data-toggle="modal" data-target="#myModal3" style="display:none;" class="but"></button>
            <div class="modal fade" id="myModal3" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="false">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h4 class="modal-title" id="myModalLabel">Data Tidak Boleh Kosong</h4>
                        </div>
                        <div class="modal-body">
                            <h4>Masukkan biodata Anda Dengan Benar</h4>
                        </div>
                        <div class="modal-footer">
                          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        </div>
                    </div>
                </div>
            </div>
          @endif
      </div>

      <div class="form-group{{$errors->has('foto') ? 'has-error' : ''}}">
        Gambar lama  : <img src="{{ asset ('assets/images/'. $User->foto )}} " width="100" height="100">
        <br><label for="foto"> Masukkan Foto Identitas Anda :</label> <br>
        <input type="file" name="foto" class="form-control" value="{{$User->foto}}" >
        @if($errors->has('foto'))
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
        <input type="submit" value="Simpan" class="btn btn-primary py-3 px-5">
        <a href="/profilsaya" class="btn btn-danger py-3 px-5"> Batalkan</a>
      </div>

    </form>
  </div>
</div>
</section>


@stop
