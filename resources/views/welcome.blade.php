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

           <!-- content -->
            <section class="ftco-section goto-here">
            	<div class="container">
            		<div class="row justify-content-center">
                  <div class="col-md-12 heading-section text-center ftco-animate mb-5">
                  	<span class="subheading">What we offer</span>
                    <h2 class="mb-2">Exclusive Design For You</h2>
                  </div>
                </div>
                <div class="row">
                	<div class="col-md-4">
                		<div class="property-wrap ftco-animate">
                			<div class="img d-flex align-items-center justify-content-center" style="background-image: url('assets/images/work-9.jpg');">
                				<a href="{{ route('login') }}" class="icon d-flex align-items-center justify-content-center btn-custom">
                					<span class="ion-ios-link"></span>
                				</a>
                			</div>
                			<div class="text">
                				<p class="price mb-3"><span class="orig-price">120.000</span></p>
                				<h3 class="mb-0"><a href="properties-single.html">Paket Murah Meriah</a></h3>
                				<ul class="property_list">
                					<li><span class="flaticon-bed"></span>3 Kamar Tidur</li>
                					<li><span class="flaticon-floor-plan"></span>2 Lantai</li>
                				</ul>
                			</div>
                		</div>
                	</div>

                  <div class="col-md-4">
                		<div class="property-wrap ftco-animate">
                			<div class="img d-flex align-items-center justify-content-center" style="background-image: url('assets/images/image_4.jpg');">
                				<a href="{{ route('login') }}" class="icon d-flex align-items-center justify-content-center btn-custom">
                					<span class="ion-ios-link"></span>
                				</a>
                			</div>
                			<div class="text">
                				<p class="price mb-3"><span class="orig-price">300.000</span></p>
                				<h3 class="mb-0"><a href="properties-single.html">Paket Ruang Minimalis</a></h3>
                				<ul class="property_list">
                					<li><span class="flaticon-bed"></span>1 Ruang Tamu</li>
                					<li><span class="flaticon-floor-plan"></span>Luas 5m x 5m</li>
                				</ul>
                			</div>
                		</div>
                	</div>

                  <div class="col-md-4">
                		<div class="property-wrap ftco-animate">
                			<div class="img d-flex align-items-center justify-content-center" style="background-image: url('assets/images/listing-2.jpg');">
                				<a href="{{ route('login') }}" class="icon d-flex align-items-center justify-content-center btn-custom">
                					<span class="ion-ios-link"></span>
                				</a>
                			</div>
                			<div class="text">
                				<p class="price mb-3"><span class="orig-price">200.000</span></p>
                				<h3 class="mb-0"><a href="properties-single.html">Paket Rumah Kuno</a></h3>
                				<ul class="property_list">
                					<li><span class="flaticon-bed"></span>10 Kamar Tidur</li>
                					<li><span class="flaticon-floor-plan"></span>1 Lantai</li>
                				</ul>
                			</div>
                		</div>
                	</div>
            </section>

            <section class="ftco-section ftco-fullwidth">
              <div class="overlay"></div>
              <div class="container">
                <div class="row justify-content-center">
                  <div class="col-md-12 heading-section text-center ftco-animate mb-5">
                    <span class="subheading">Services</span>
                    <h2 class="mb-2">Why Choose Us?</h2>
                  </div>
                </div>
              </div>
              <div class="container-fluid px-0">
                <div class="row d-md-flex text-wrapper align-items-stretch">
                  <div class="one-half mb-md-0 mb-4 img d-flex align-self-stretch" style="background-image: url('assets/images/about.jpg');"></div>
                  <div class="one-half half-text d-flex justify-content-end align-items-center">
                    <div class="text-inner pl-md-5">
                      <div class="row d-flex">
                        <div class="col-md-12 d-flex align-self-stretch ftco-animate">
                          <div class="media block-6 services-wrap d-flex">
                            <div class="icon d-flex justify-content-center align-items-center"><span class="flaticon-piggy-bank"></span></div>
                            <div class="media-body pl-4">
                              <h3>Peningkatan Pendapatan </h3>
                              <p>Meningkatkan pendapatan dan kreatifitas, inovatif designer.</p>
                            </div>
                          </div>
                        </div>
                        <div class="col-md-12 d-flex align-self-stretch ftco-animate">
                          <div class="media block-6 services-wrap d-flex">
                            <div class="icon d-flex justify-content-center align-items-center"><span class="flaticon-wallet"></span></div>
                            <div class="media-body pl-4">
                              <h3>Pembayaran Online</h3>
                              <p>Pembayaran dapat dilakukan melalui website dengan sangat mudah dan praktis.</p>
                            </div>
                          </div>
                        </div>
                        <div class="col-md-12 d-flex align-self-stretch ftco-animate">
                          <div class="media block-6 services-wrap d-flex">
                            <div class="icon d-flex justify-content-center align-items-center"><span class="flaticon-file"></span></div>
                            <div class="media-body pl-4">
                              <h3>Kemudahan</h3>
                              <p>Mempermudah designer rumah dan interior dalam menjual hasil karyanya.</p>
                            </div>
                          </div>
                        </div>
                        <div class="col-md-12 d-flex align-self-stretch ftco-animate">
                          <div class="media block-6 services-wrap d-flex">
                            <div class="icon d-flex justify-content-center align-items-center"><span class="flaticon-locked"></span></div>
                            <div class="media-body pl-4">
                              <h3>Harga Terjangkau</h3>
                              <p>Harga Design sangat terjangkau namun tetap berkualitas dan menguntungkan berbagai pihak.</p>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </section>

            <section class="ftco-section testimony-section bg-light">
              <div class="container">
                <div class="row justify-content-center mb-5">
                  <div class="col-md-7 text-center heading-section ftco-animate">
                  	<span class="subheading">Testimonial</span>
                    <h2 class="mb-3">Happy Clients</h2>
                  </div>
                </div>
                <div class="row ftco-animate">
                  <div class="col-md-12">
                    <div class="carousel-testimony owl-carousel ftco-owl">
                      <div class="item">
                        <div class="testimony-wrap py-4">
                          <div class="text">
                            <p class="mb-4">Terimakasih Design.In Designin sangat bagus, saya suka sekali sangat cocok dengan style saya.</p>
                            <div class="d-flex align-items-center">
                            	<div class="user-img" style="background-image: url('assets/images/person_1.jpg')"></div>
                            	<div class="pl-3">
        		                    <p class="name">Roger Scott</p>
        		                  </div>
        	                  </div>
                          </div>
                        </div>
                      </div>
                      <div class="item">
                        <div class="testimony-wrap py-4">
                          <div class="text">
                            <p class="mb-4">Designin ter-luvv The Best For you. Thanks. Saya Yakin Design.In Menghasilkan yang Terbaik</p>
                            <div class="d-flex align-items-center">
                            	<div class="user-img" style="background-image: url('assets/images/team-4.jpg')"></div>
                            	<div class="pl-3">
        		                    <p class="name">Anna Elizabeth</p>
        		                  </div>
        	                  </div>
                          </div>
                        </div>
                      </div>
                      <div class="item">
                        <div class="testimony-wrap py-4">
                          <div class="text">
                            <p class="mb-4">Sukses selalu Design.In Saya Jadi Punya Hunian yang Nyaman Aman dan Damai.</p>
                            <div class="d-flex align-items-center">
                            	<div class="user-img" style="background-image: url('assets/images/person_4.jpg')"></div>
                            	<div class="pl-3">
        		                    <p class="name">Derry Scott</p>
        		                  </div>
        	                  </div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </section>





    {{--INI ADALAH KONTENNYA--}}
      @yield('content')
      @include('template.footer')
      <!-- loader -->
      <div id="ftco-loader" class="show fullscreen"><svg class="circular" width="48px" height="48px"><circle class="path-bg" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke="#eeeeee"/><circle class="path" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke-miterlimit="10" stroke="#F96D00"/></svg></div>

    @include('template.script')


      </body>
    </html>
