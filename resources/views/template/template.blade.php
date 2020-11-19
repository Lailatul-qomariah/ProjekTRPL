<!DOCTYPE html>
<html lang="en">
  <head>
    @include('template.head')
    <!-- <script type="text/javascript">
        $(document).ready(function()
          {
          $('#myModal3').modal("show");
        });
    </script> -->

    <script>
      setTimeout(function(){
        $('#myModal3').modal('show')
      }, 1000);
    </script>
  </head>
  <body>
    <!-- NAVBAR  -->
	  <nav class="navbar navbar-expand-lg navbar-dark ftco_navbar bg-dark ftco-navbar-light" id="ftco-navbar">
	    <div class="container">
	      <a class="navbar-brand" href="index.html">Design.in</a>
	      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#ftco-nav" aria-controls="ftco-nav" aria-expanded="false" aria-label="Toggle navigation">
	        <span class="oi oi-menu"></span> Menu
	      </button>

	      <div class="collapse navbar-collapse" id="ftco-nav">
	        <ul class="navbar-nav ml-auto">
	          <li class="nav-item"><a href="index.html" class="nav-link">Home</a></li>
	          <li class="nav-item"><a href="about.html" class="nav-link">About</a></li>
	          <li class="nav-item"><a href="services.html" class="nav-link">Services</a></li>
	          <li class="nav-item"><a href="{{route ('designrumah')}}" class="nav-link">Design rumah</a></li>
	          <li class="nav-item"><a href="{{route('paketdesign1')}}" class="nav-link">Design Interior</a></li>
	             @guest
                <li class="nav-item"><a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a></li>
                @if (Route::has('register'))
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                    </li>
                @endif
            @else
                <li class="nav-item dropdown">
                    <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                        {{ Auth::user()->name }} <span class="caret"></span>
                    </a>

                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item" href="{{ route('logout') }}"
                           onclick="event.preventDefault();
                                         document.getElementById('logout-form').submit();">
                            {{ __('Logout') }}
                        </a>

                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                            @csrf
                        </form>
                    </div>
                </li>
            @endguest
	        </ul>
	      </div>
	    </div>
	  </nav>
    <!-- END nav -->

    <!-- SLIDERS -->

        <div id="carouselExampleCaptions" class="carousel slide" data-ride="carousel">
          <ol class="carousel-indicators">
          </ol>
          <div class="carousel-inner">
            <div class="carousel-item active ftco-animate overlay-2">
              <img src="{{ asset('assets/images/bg_2.jpg')}}" class="d-block w-100" alt="...">
              <div class="carousel-caption d-none d-md-block">
                <div class="row no-gutters slider-text justify-content-center align-items-center">
                  <div class="col-lg-8 col-md-6 ftco-animate d-flex align-items-end">
                  	<div class="text text-center w-100">
        	            <h1 class="mb-4">Selamat Datang di Design.in</h1>
        	            <p><form method="GET" action="/paketdesign">
                        <input name="cari" class="form-control mr-sm-1" type="search" placeholder="Search" aria-label="Search">
                        <button class="btn btn-primary my-2 my-sm-0" type="submit">Search</button>
                      </form></p>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="carousel-item ftco-animate overlay-2">
              <img src="{{ asset('assets/images/about.jpg')}}" class="d-block w-100" alt="...">
              <div class="carousel-caption d-none d-md-block">
                <div class="row no-gutters slider-text justify-content-center align-items-center">
                  <div class="col-lg-8 col-md-6 ftco-animate d-flex align-items-end">
                  	<div class="text text-center w-100">
        	            <h1 class="mb-4">Selamat Datang di Design.in</h1>
        	            <p> <input class="form-control mr-sm-1" type="search" placeholder="Search" aria-label="Search">
                        <button class="btn btn-primary my-2 my-sm-0" type="submit">Search</button></p>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="carousel-item ftco-animate overlay-2">
              <img src="{{ asset('assets/images/work-6.jpg')}}" class="d-block w-100" alt="...">
              <div class="carousel-caption d-none d-md-block">
                <div class="row no-gutters slider-text justify-content-center align-items-center">
                  <div class="col-lg-8 col-md-6 ftco-animate d-flex align-items-end">
                  	<div class="text text-center w-100">
        	            <h1 class="mb-4">Selamat Datang di Design.in</h1>
        	            <p> <input class="form-control mr-sm-1" type="search" placeholder="Search" aria-label="Search">
                        <button class="btn btn-primary my-2 my-sm-0" type="submit">Search</button></p>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <a class="carousel-control-prev" href="#carouselExampleCaptions" role="button" data-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
          </a>
          <a class="carousel-control-next" href="#carouselExampleCaptions" role="button" data-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
          </a>
        </div>


{{--INI ADALAH KONTENNYA--}}
  @yield('content')

  @include('template.footer')



  <!-- loader -->
  <div id="ftco-loader" class="show fullscreen"><svg class="circular" width="48px" height="48px"><circle class="path-bg" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke="#eeeeee"/><circle class="path" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke-miterlimit="10" stroke="#F96D00"/></svg></div>

@include('template.script')

  </body>
</html>
