<!DOCTYPE html>
<html lang="en">
  <head>
    <title>Ini Cafe</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    
    <link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Josefin+Sans:400,700" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Great+Vibes" rel="stylesheet">

    <link rel="stylesheet" href="{{asset('cafe/css/open-iconic-bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{asset('cafe/css/animate.css')}}">
    
    <link rel="stylesheet" href="{{asset('cafe/css/owl.carousel.min.css')}}">
    <link rel="stylesheet" href="{{asset('cafe/css/owl.theme.default.min.css')}}">
    <link rel="stylesheet" href="{{asset('cafe/css/magnific-popup.css')}}">

    <link rel="stylesheet" href="{{asset('cafe/css/aos.css')}}">

    <link rel="stylesheet" href="{{asset('cafe/css/ionicons.min.css')}}">

    <link rel="stylesheet" href="{{asset('cafe/css/bootstrap-datepicker.css')}}">
    <link rel="stylesheet" href="{{asset('cafe/css/jquery.timepicker.css')}}">

    
    <link rel="stylesheet" href="{{asset('cafe/css/flaticon.css')}}">
    <link rel="stylesheet" href="{{asset('cafe/css/icomoon.css')}}">
    <link rel="stylesheet" href="{{asset('cafe/css/style.css')}}">
  </head>
  <body>
  	<nav class="navbar navbar-expand-lg navbar-dark ftco_navbar bg-dark ftco-navbar-light" id="ftco-navbar">
	    <div class="container">
	      <a class="navbar-brand" href="index.html">Ini<small>Cafe</small></a>
	      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#ftco-nav" aria-controls="ftco-nav" aria-expanded="false" aria-label="Toggle navigation">
	        <span class="oi oi-menu"></span> Menu
	      </button>
	      <div class="collapse navbar-collapse" id="ftco-nav">
	        <ul class="navbar-nav ml-auto">
	          <li class="nav-item active"><a href="/" class="nav-link">Home</a></li>
	          <li class="nav-item"><a href="#about" class="nav-link">About</a></li>
	          <li class="nav-item"><a href="#hidangan" class="nav-link">Hidangan</a></li>
              @if($islogin['login']=='pelanggan')  
              <li class="nav-item"><a href="{{URL('pelanggan')}}" class="nav-link">Dashboard</a></li>
              @elseif($islogin['login']=='kasir')
              <li class="nav-item"><a href="{{URL('kasir')}}" class="nav-link">Dashboard</a></li>
              @elseif($islogin['login']=='waiter')
              <li class="nav-item"><a href="{{URL('waiter')}}" class="nav-link">Dashboard</a></li>
              @elseif($islogin['login']=='admin')
              <li class="nav-item"><a href="{{URL('admin')}}" class="nav-link">Dashboard</a></li>
              @elseif($islogin['login']=='owner')
              <li class="nav-item"><a href="{{URL('owner')}}" class="nav-link">Dashboard</a></li>
              @else
	          <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" href="room.html" id="dropdown04" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Login</a>
              <div class="dropdown-menu" aria-labelledby="dropdown04">
              	<a class="dropdown-item" href="{{URL('pelanggan/login')}}">Pelanggan</a>
                <a class="dropdown-item" href="{{URL('kasir/login')}}">Kasir</a>
                <a class="dropdown-item" href="{{URL('waiter/login')}}">Waiter</a>
                <a class="dropdown-item" href="{{URL('admin/login')}}">Admin</a>
                <a class="dropdown-item" href="{{URL('owner/login')}}">Owner</a>
              </div>
            </li>
            <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" href="room.html" id="dropdown04" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Register</a>
              <div class="dropdown-menu" aria-labelledby="dropdown04">
              	<a class="dropdown-item" href="{{URL('pelanggan/register')}}">Pelanggan</a>
              </div>
            </li>
            @endif
	        </ul>
	        </div>
		  </div>
          <!-- User profile and search -->
          <ul class="navbar-nav my-lg-0">
                        <!-- Profile -->
                        <li class="nav-item dropdown">

                            @if($islogin['login']=='pelanggan')
                            <a class="nav-link dropdown-toggle text-muted " href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><img src="{{asset('images/profil')}}/{{$pelanggan['foto_pelanggan']}}" style="width:30px;height:30px;border-radius: 50%"></a>
                            @elseif($islogin['login']=='kasir')
                            <a class="nav-link dropdown-toggle text-muted " href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><img src="{{asset('images/profil')}}/{{$kasir['foto_kasir']}}" style="width:30px;height:30px;border-radius: 50%"></a>
                            @elseif($islogin['login']=='waiter')
                            <a class="nav-link dropdown-toggle text-muted " href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><img src="{{asset('images/profil')}}/{{$waiter['foto_waiter']}}" style="width:30px;height:30px;border-radius: 50%"></a>
                            @elseif($islogin['login']=='admin')
                            <a class="nav-link dropdown-toggle text-muted " href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><img src="{{asset('images/profil')}}/{{$admin['foto_admin']}}" style="width:30px;height:30px;border-radius: 50%"></a>
                            @elseif($islogin['login']=='owner')
                            <a class="nav-link dropdown-toggle text-muted " href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><img src="{{asset('images/profil')}}/{{$owner['foto_owner']}}" style="width:30px;height:30px;border-radius: 50%"></a>
                            @endif

                            
                            <div class="dropdown-menu dropdown-menu-right animated zoomIn">
                                <ul class="dropdown-user">
                                    <li><a href="@if($islogin['login']=='pelanggan'){{URL('pelanggan')}}
                                                 @elseif($islogin['login']=='kasir'){{URL('kasir')}}
                                                 @elseif($islogin['login']=='waiter'){{URL('waiter')}}
                                                 @elseif($islogin['login']=='admin'){{URL('admin')}}
                                                 @elseif($islogin['login']=='owner'){{URL('owner')}}
                                                 @endif"><i class="fa fa-tachometer"></i> Dashboard</a></li>
                                    <li><a href="@if($islogin['login']=='pelanggan'){{URL('pelanggan/pengaturan')}}
                                                 @elseif($islogin['login']=='kasir'){{URL('kasir/pengaturan')}}
                                                 @elseif($islogin['login']=='waiter'){{URL('waiter/pengaturan')}}
                                                 @elseif($islogin['login']=='admin'){{URL('admin/pengaturan')}}
                                                 @elseif($islogin['login']=='owner'){{URL('owner/pengaturan')}}
                                                 @endif"><i class="ti-user"></i> Profile</a></li>
                                    <li><a href="@if($islogin['login']=='pelanggan'){{URL('pelanggan/logout')}}
                                                 @elseif($islogin['login']=='kasir'){{URL('kasir/logout')}}
                                                 @elseif($islogin['login']=='waiter'){{URL('waiter/logout')}}
                                                 @elseif($islogin['login']=='admin'){{URL('admin/logout')}}
                                                 @elseif($islogin['login']=='owner'){{URL('owner/logout')}}
                                                 @endif"><i class="fa fa-power-off"></i> Logout</a></li>
                                </ul>
                            </div>
                        </li>
                    </ul>
                </div>
	  </nav>
    <!-- END nav -->

    <section class="home-slider owl-carousel">
      <div class="slider-item" style="background-image: url(cafe/images/wood.png);">
      	<div class="overlay"></div>
        <div class="container">
          <div class="row slider-text justify-content-center align-items-center" data-scrollax-parent="true">

            <div class="col-md-8 col-sm-12 text-center ftco-animate">
            	<span class="subheading">Ini Cafe</span>
              <h1 class="mb-4">Salah Satu Cafe Terbaik di Subang</h1>
              <p class="mb-4 mb-md-5">Selamat datang dan selamat menikmati.</p>
            </div>

          </div>
        </div>
      </div>

      <div class="slider-item" style="background-image: url(cafe/images/wood.png);">
      	<div class="overlay"></div>
        <div class="container">
          <div class="row slider-text justify-content-center align-items-center" data-scrollax-parent="true">

            <div class="col-md-8 col-sm-12 text-center ftco-animate">
            	<span class="subheading">Ini Cafe</span>
              <h1 class="mb-4">Hidangan Terbaik &amp; Tempat Yang Aesthetic</h1>
              <p class="mb-4 mb-md-5">Selamat datang dan selamat menikmati.</p>
            </div>

          </div>
        </div>
      </div>
    </section>

    <section class="ftco-intro">
    	<div class="container-wrap">
    		<div class="wrap d-md-flex align-items-xl-end">
	    		<div class="info">
	    			<div class="row no-gutters">
	    				<div class="col-md-4 d-flex ftco-animate">
	    					<div class="icon"><span class="icon-phone"></span></div>
	    					<div class="text">
	    						<h3>000 (123) 456 7890</h3>
	    						<p>Contact Info</p>
	    					</div>
	    				</div>
	    				<div class="col-md-4 d-flex ftco-animate">
	    					<div class="icon"><span class="icon-my_location"></span></div>
	    					<div class="text">
	    						<h3>Jl. in aja dulu</h3>
	    						<p>Subang, Jawa Barat, Indonesia</p>
	    					</div>
	    				</div>
	    				<div class="col-md-4 d-flex ftco-animate">
	    					<div class="icon"><span class="icon-clock-o"></span></div>
	    					<div class="text">
	    						<h3>Buka Senin-Jumat / Sabtu</h3>
	    						<p>8:00 - 21:00 / 8:00 - 23:00</p>
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

    <section class="ftco-about d-md-flex">
    	<div class="one-half img"style="background-image: url(cafe/images/about.jpg);"></div>
    	<div class="one-half ftco-animate">
    		<div class="overlap">
	        <div class="heading-section ftco-animate" id="#about">
	        	<span class="subheading">Ini Cafe</span>
	          <h2 class="mb-4">Tentang Cafe</h2>
	        </div>
	        <div>
	  				<p>Sebuah cafe yang mementingkan kualitas hidangan, kepuasan pelanggan, dan tempat yang ramah lingkungan.</p>
	  			</div>
  			</div>
    	</div>
    </section>

    <section class="ftco-counter ftco-bg-dark img" id="section-counter">
			<div class="overlay"></div>
      <div class="container">
        <div class="row justify-content-center">
        	<div class="col-md-10">
        		<div class="row">
		          <div class="col-md-6 col-lg-3 d-flex justify-content-center counter-wrap ftco-animate">
		            <div class="block-18 text-center">
		              <div class="text">
		              	<div class="icon"><span class="flaticon-coffee-cup"></span></div>
		              	<strong class="number" data-number="0">0</strong>
		              	<span>Hidangan masih error, sabar bngst</span>
		              </div>
		            </div>
		          </div>
		          <div class="col-md-6 col-lg-3 d-flex justify-content-center counter-wrap ftco-animate">
		            <div class="block-18 text-center">
		              <div class="text">
		              	<div class="icon"><span class="flaticon-coffee-cup"></span></div>
		              	<strong class="number" data-number="684">0</strong>
		              	<span>Pelanggan yang berkunjung</span>
		              </div>
		            </div>
		          </div>
		          <div class="col-md-6 col-lg-3 d-flex justify-content-center counter-wrap ftco-animate">
		            <div class="block-18 text-center">
		              <div class="text">
		              	<div class="icon"><span class="flaticon-coffee-cup"></span></div>
		              	<strong class="number" data-number="4">0</strong>
		              	<span>Kasir</span>
		              </div>
		            </div>
		          </div>
		          <div class="col-md-6 col-lg-3 d-flex justify-content-center counter-wrap ftco-animate">
		            <div class="block-18 text-center">
		              <div class="text">
		              	<div class="icon"><span class="flaticon-coffee-cup"></span></div>
		              	<strong class="number" data-number="8">0</strong>
		              	<span>Waiter</span>
		              </div>
		            </div>
		          </div>
		        </div>
		      </div>
        </div>
      </div>
    </section>

    <section class="ftco-section">
    	<div class="container" id="hidangan">
    		<div class="row justify-content-center mb-5 pb-3">
          <div class="col-md-7 heading-section ftco-animate text-center">
          	<span class="subheading">Ini Cafe</span>
            <h2 class="mb-4">hidangan</h2>
            <p>Hidangan masih error, sabar ya bngst.</p>
          </div>
        </div>

		<!-- <?php
        // $i = 1;
        ?>
		@foreach($hidangan as $hidangan)
        <div class="row">
        	<div class="col-md-3">
        		<div class="menu-entry">
    					<a href="#" class="img" style="background-image: url({{ asset('images/hidangan/'.$hidangan->foto_hidangan) }})"></a>
    					<div class="text text-center pt-4">
    						<h3><a href="#">{{$hidangan->nama_hidangan}}</a></h3>
    						<p class="price"><span>Rp. {{$hidangan->harga_hidangan}}</span></p>
    						<p><a href="#" class="btn btn-primary btn-outline-primary">Pesan Sekarang</a></p>
    					</div>
    				</div>
				</div>
			<?php
			// $i++;
			?>
			@endforeach -->
        </div>
    	</div>
    </section>

    <section class="ftco-section img" id="ftco-testimony" style="background-image: url({{asset('images/profil/user.png')}});"  data-stellar-background-ratio="0.5">
    	<div class="overlay"></div>
	    <div class="container">
	      <div class="row justify-content-center mb-5">
	        <div class="col-md-7 heading-section text-center ftco-animate">
	        	<span class="subheading">Ini Cafe</span>
	          <h2 class="mb-4">Testimoni Pelanggan</h2>
	          <p>Beberapa kutipan dari pelanggan yang terhormat.</p>
	        </div>
	      </div>
	    </div>
	    <div class="container-wrap">
	      <div class="row d-flex no-gutters">
	        <div class="col-lg align-self-sm-end ftco-animate">
	          <div class="testimony">
	             <blockquote>
	                <p>&ldquo;Saya mengajak istri dan anak-anak saya ke tempat ini, ternyata mereka suka semua, alhamdulillah.&rdquo;</p>
	              </blockquote>
	              <div class="author d-flex mt-4">
	                <div class="image mr-3 align-self-center">
	                  <img src="{{asset('images/profil/user.png')}}" alt="">
	                </div>
	                <div class="name align-self-center">Kojek<span class="position">The Handsome Husband</span></div>
	              </div>
	          </div>
	        </div>
	        <div class="col-lg align-self-sm-end">
	          <div class="testimony overlay">
	             <blockquote>
	                <p>&ldquo;Saya dan anak-anak diajak oleh suami saya ke tempat ini, ternyata tempatnya keren banget.&rdquo;</p>
	              </blockquote>
	              <div class="author d-flex mt-4">
	                <div class="image mr-3 align-self-center">
	                  <img src="{{asset('images/profil/user.png')}}" alt="">
	                </div>
	                <div class="name align-self-center">Maya<span class="position">Kojek's Wife</span></div>
	              </div>
	          </div>
	        </div>
	        <div class="col-lg align-self-sm-end ftco-animate">
	          <div class="testimony">
	             <blockquote>
	                <p>&ldquo;Awalnya saya tidak mau ikut karena males, tapi saya terpaksa harus ikut, eh tau nya estetik banget cafe nya.&rdquo;</p>
	              </blockquote>
	              <div class="author d-flex mt-4">
	                <div class="image mr-3 align-self-center">
	                  <img src="{{asset('images/profil/user.png')}}" alt="">
	                </div>
	                <div class="name align-self-center">Agus<span class="position">Oldest Son</span></div>
	              </div>
	          </div>
	        </div>
	        <div class="col-lg align-self-sm-end">
	          <div class="testimony overlay">
	             <blockquote>
	                <p>&ldquo;Saya mah ikut aja karena lagi lapar.&rdquo;</p>
	              </blockquote>
	              <div class="author d-flex mt-4">
	                <div class="image mr-3 align-self-center">
	                  <img src="{{asset('images/profil/user.png')}}" alt="">
	                </div>
	                <div class="name align-self-center">Arya<span class="position">Son</span></div>
	              </div>
	          </div>
	        </div>
	        <div class="col-lg align-self-sm-end ftco-animate">
	          <div class="testimony">
	            <blockquote>
	              <p>&ldquo;Bodo amat.&rdquo;</p>
	            </blockquote>
	            <div class="author d-flex mt-4">
	              <div class="image mr-3 align-self-center">
	                <img src="{{asset('images/profil/user.png')}}" alt="">
	              </div>
	              <div class="name align-self-center">Azka<span class="position">Youngest Son</span></div>
	            </div>
	          </div>
	        </div>
	      </div>
	    </div>
	  </section>

    
    <footer class="ftco-footer ftco-section img">
    	<div class="overlay"></div>
      <div class="container">
        <div class="row mb-5">
          <div class="col-lg-3 col-md-6 mb-5 mb-md-5">
            <div class="ftco-footer-widget mb-4">
              <h2 class="ftco-heading-2">Info</h2>
              <div class="block-23 mb-3">
	              <ul>
	                <li><span class="icon icon-map-marker"></span><span class="text">Jl. aja dulu, Subang, Jawa Barat, Indonesia.</span></li>
	                <li><a href="#"><span class="icon icon-phone"></span><span class="text">000 (123) 456 7890</span></a></li>
	                <li><a href="#"><span class="icon icon-envelope"></span><span class="text">inicafe@gmail.com</span></a></li>
	              </ul>
	            </div>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-md-12 text-center">

            <p><!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
  Copyright &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved | Ini Cafe <a href="https://colorlib.com" style="color:white"><b>Team</b></a>
  <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. --></p>
          </div>
        </div>
      </div>
    </footer>
    
  

  <!-- loader -->
  <div id="ftco-loader" class="show fullscreen"><svg class="circular" width="48px" height="48px"><circle class="path-bg" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke="#eeeeee"/><circle class="path" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke-miterlimit="10" stroke="#F96D00"/></svg></div>


  <script src="{{asset('cafe/js/jquery.min.js')}}"></script>
  <script src="{{asset('cafe/js/jquery-migrate-3.0.1.min.js')}}"></script>
  <script src="{{asset('cafe/js/popper.min.js')}}"></script>
  <script src="{{asset('cafe/js/bootstrap.min.js')}}"></script>
  <script src="{{asset('cafe/js/jquery.easing.1.3.js')}}"></script>
  <script src="{{asset('cafe/js/jquery.waypoints.min.js')}}"></script>
  <script src="{{asset('cafe/js/jquery.stellar.min.js')}}"></script>
  <script src="{{asset('cafe/js/owl.carousel.min.js')}}"></script>
  <script src="{{asset('cafe/js/jquery.magnific-popup.min.js')}}"></script>
  <script src="{{asset('cafe/js/aos.js')}}"></script>
  <script src="{{asset('cafe/js/jquery.animateNumber.min.js')}}"></script>
  <script src="{{asset('cafe/js/bootstrap-datepicker.js')}}"></script>
  <script src="{{asset('cafe/js/jquery.timepicker.min.js')}}"></script>
  <script src="{{asset('cafe/js/scrollax.min.js')}}"></script>
  <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBVWaKrjvy3MaE7SQ74_uJiULgl1JY0H2s&sensor=false"></script>
  <script src="{{asset('cafe/js/google-map.js')}}"></script>
  <script src="{{asset('cafe/js/main.js')}}"></script>
    
  </body>
</html>