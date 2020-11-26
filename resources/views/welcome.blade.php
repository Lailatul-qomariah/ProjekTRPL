<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
      @include('template.head')
    </head>
    <body>
      <nav class="navbar navbar-expand-lg navbar-dark ftco_navbar bg-dark ftco-navbar-light" id="ftco-navbar">
        <div class="container">
          <a class="navbar-brand" href="index.html">Design.in</a>
          <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#ftco-nav" aria-controls="ftco-nav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="oi oi-menu"></span> Menu
          </button>

          <div class="collapse navbar-collapse" id="ftco-nav">

            @if (Route::has('login'))
                <ul class="navbar-nav ml-auto">
                    @auth
                    <li class="nav-item"><a href="{{ route ('dashboard') }}"class="nav-link">Dashboard</a></li>
                    @else
                      <li class="nav-item"><a href="{{ route('login') }}" class="nav-link">Login</a></li>

                        @if (Route::has('register'))
                            <li class="nav-item"><a href="{{ route('register') }}" class="nav-link">Register</a></li>
                        @endif
                    @endauth
                </ul>
            @endif
          </ul>
          </div>
        </div>
      </nav>

          <div id="carouselExampleCaptions" class="carousel slide" data-ride="carousel">
              <ol class="carousel-indicators">
              </ol>
              <div class="carousel-inner">
                <div class="carousel-item active">
                  <img src="{{ asset('assets/images/bg_2.jpg')}}" class="d-block w-100" alt="...">
                  <div class="carousel-caption d-none d-md-block">
                    <div class="row no-gutters slider-text justify-content-center align-items-center">
                      <div class="col-lg-8 col-md-6 ftco-animate d-flex align-items-end">
                      	<div class="text text-center w-100">
            	            <h1 class="mb-4">Selamat Datang di Design.in</h1>
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

      <!-- loader -->
      <div id="ftco-loader" class="show fullscreen"><svg class="circular" width="48px" height="48px"><circle class="path-bg" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke="#eeeeee"/><circle class="path" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke-miterlimit="10" stroke="#F96D00"/></svg></div>

    @include('template.script')

      </body>
    </html>
