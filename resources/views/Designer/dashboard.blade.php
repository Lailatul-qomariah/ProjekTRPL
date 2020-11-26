@extends('template.template')

@section('content')
    @if (session('status'))
        <div class="alert alert-success" role="alert">
            {{ session('status') }}
            <button data-toggle="modal" data-target="#modalregis" style="display:none;" class="but"></button>
            <div class="modal fade" id="modalregis" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="false">
              <div class="modal-dialog">
                <div class="modal-content">
                  <div class="modal-header">
                    <h4>Selamat Anda Berhasil Melakukan Registrasi. Selamat Datang Di Design.In</h4>
                  </div>
                  <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                  </div>
                </div>
              </div>
            </div>
        </div>
    @endif

  @if(auth()->user()->role == 'Designers')
  <h1>INI HALAMAN ADMIN</h1>
  @endif

  @if(auth()->user()->role == 'Customers')
  <h1>INI HALAMAN CUSTOMERs</h1>
  @endif
@endsection
