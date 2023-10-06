<!DOCTYPE html>
<html class="no-js" lang="en-US">
	
	<head>
		
		<!-- Meta -->
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">

		<!-- Title -->
		<title>Desa Digital</title>

		<!-- Favicon -->
		<link rel="icon" href="images/favicon.ico" type="image/x-icon">
		
		<!-- Google web font -->
		<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:200,300,400,500,700">
		
		<!-- Bootstrap -->
		<link rel="stylesheet" href="{{ asset('frontend/assets/library/bootstrap/css/bootstrap.min.css')}}">
		
		<!-- Font awesome -->
		<link rel="stylesheet" href="{{ asset('frontend/assets/library/fontawesome/css/all.min.css') }}">
		
		<!-- Linea icons -->
		<link rel="stylesheet" href="{{ asset('frontend/assets/library/linea/arrows/styles.css') }}" />
		<link rel="stylesheet" href="{{ asset('frontend/assets/library/linea/basic/styles.css') }}" />
		<link rel="stylesheet" href="{{ asset('frontend/assets/library/linea/ecommerce/styles.css') }}" />
        <link rel="stylesheet" href="{{ asset('frontend/assets/library/linea/software/styles.css') }}" />
        <link rel="stylesheet" href="{{ asset('frontend/assets/library/linea/weather/styles.css') }}" />
		
		<!-- Animate -->
		<link rel="stylesheet" href="{{ asset('frontend/assets/library/animate/animate.css') }}">
		
		<!-- Lightcase -->
        <link rel="stylesheet" href="{{ asset('frontend/assets/library/lightcase/css/lightcase.css') }}">
		
		<!-- Swiper -->
		<link rel="stylesheet" href="{{ asset('frontend/assets/library/swiper/swiper-bundle.min.css') }}">
		
		<!-- Owl carousel -->
		<link rel="stylesheet" href="{{ asset('frontend/assets/library/owlcarousel/owl.carousel.min.css') }}">
		
		<!-- Slick carousel -->
		<link rel="stylesheet" type="text/css" href="{{ asset('frontend/assets/library/slick/slick.css') }}">
		
		<!-- Magnific popup -->
		<link rel="stylesheet" href="{{ asset('frontend/assets/library/magnificpopup/magnific-popup.css') }}">
		
		<!-- YTPlayer -->
		<link rel="stylesheet" href="{{ asset('frontend/assets/library/ytplayer/css/jquery.mb.ytplayer.min.css') }}">
		
		<!-- Stylesheet -->
		<link rel="stylesheet" href="{{ asset('frontend/assets/css/style.css') }}">
        <link rel="stylesheet" href="{{ asset('frontend/assets/css/media.css') }}">
		
		<!-- Color schema -->
		<link rel="stylesheet" href="{{ asset('frontend/assets/colors/blue.css') }}" class="colors">
		
	</head>

	<body>

		<!-- Loader -->
		<div class="page-loader">
			<div class="progress"></div>
		</div>

		<!-- Header -->
		<header id="top-page" class="header">
			
			<!-- Main menu -->
			<div id="mainNav" class="main-menu-area animated">
				<div class="container">
					<div class="row align-items-center">
						
						<div class="col-12 col-lg-2 d-flex justify-content-between align-items-center">
							
							<!-- Logo -->
							<div class="logo">
								
								<a class="navbar-brand navbar-brand1" href="#">
									<img src="{{ asset('assets/img/Logo.png') }}"  data-rjs="2" class="w-50" />
								</a>

							</div>
							
							<!-- Burger menu -->
							<div class="menu-bar d-lg-none">
								<span></span>
								<span></span>
								<span></span>
							</div>
							
						</div>
						
						<div class="op-mobile-menu col-lg-10 p-0 d-lg-flex align-items-center justify-content-end">
							
							<!-- Mobile menu -->
							<div class="m-menu-header d-flex justify-content-between align-items-center d-lg-none">
								
								<!-- Logo -->
								<a href="#" class="logo">
									<img src="{{ asset('assets/img/logo_light2.png') }}"  data-rjs="2" class="w-25" />
								</a>
								
								<!-- Close button -->
								<span class="close-button"></span>
								
							</div>
							
							<!-- Items -->
							<ul class="nav-menu d-lg-flex flex-wrap list-unstyled justify-content-center">
								
								<li class="nav-item">
									<a class="nav-link js-scroll-trigger " href="{{ route('login') }}">
										<span>Masuk</span>
									</a>
                                 
								</li>
								<li class="nav-item">
									<a class="nav-link js-scroll-trigger " href="{{ route('register') }}">
										<span>Daftar</span>
									</a>
                                 
								</li>
							

								<li class="nav-item search-option">
									<a class="nav-link" href="#">
										<i class="fas fa-search"></i>
									</a>
								</li>

							</ul>
							
						</div>
						
					</div>
				</div>
			</div>
			
		</header>
	

		<!-- Banner -->
		<section id="home" class="banner image-bg">
			
			<!-- Container -->
			<div class="container">
				
				<div class="row align-items-center">

					<!-- Content -->
					<div class="col-12 col-lg-6 res-margin mt-5">

						<!-- Banner text -->
						<div class="banner-text">

							<h1 class="wow fadeInUp" data-wow-offset="10" data-wow-duration="1s" data-wow-delay="0s">
								Manajemen <br>Administari Desa  
							</h1>
							
							<p class="wow fadeInUp" data-wow-offset="10" data-wow-duration="1s" data-wow-delay="0.3s">
								Duis facilisis sem sed metus malesuada rhoncus. 
								Nulla tincidunt tincidunt lectus at lacinia. 
								Pellentesque ullamcorper arcu id rutrum volutpat. 
								Donec suscipit auctor enim vel dignissim.
							</p>

							<div class="button-store wow fadeInUp" data-wow-offset="10" data-wow-duration="1s" data-wow-delay="0.6s">
								
								<a href="#" class="custom-btn d-inline-flex align-items-center m-2 m-sm-0 me-sm-3">
									<i class="fab fa-google-play"></i><p>Available on<span>Google Play</span></p>
								</a>
								
								<a href="#" class="custom-btn d-inline-flex align-items-center m-2 m-sm-0">
									<i class="fab fa-apple"></i><p>Download on<span>App Store</span></p>
								</a>
							
							</div>

						</div>
					
					</div>
					
					<!-- Image -->
					<div class="col-12 col-lg-6">
				
						<div class="banner-image wow fadeInUp" data-wow-offset="10" data-wow-duration="1s" data-wow-delay="0.3s">
							<img class="bounce-effect" src="{{ asset('assets/img/Logo.png') }}" alt="" />
						</div>

					</div>
					
				</div>
				
			</div>
			
			<!-- Wave effect -->
			<div class="wave-effect wave-anim">
				
                <div class="waves-shape shape-one">
                    <div class="wave wave-one"></div>
                </div>
				
                <div class="waves-shape shape-two">
                    <div class="wave wave-two"></div>
                </div>
				
                <div class="waves-shape shape-three">
                    <div class="wave wave-three"></div>
                </div>
				
            </div>
			
		</section>

        <!-- Services -->
		<section id="services">
			
			<!-- Container -->
			<div class="container">
				
				<!-- Section title -->
				<div class="row justify-content-center">
					<div class="col-12 col-md-10 col-lg-6">
						
						<div class="section-title text-center">
							<h3>How It Works?</h3>
							<p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo justo. Nullam dictum felis eu pede mollis pretium.</p>
						</div>
						
					</div>
				</div>
			
				<div class="row">
					
					<!-- Service 1 -->
					<div class="col-12 col-lg-4 res-margin wow fadeInUp" data-wow-offset="10" data-wow-duration="1s" data-wow-delay="0">
						<div class="service-single">
							
							<div class="icon icon-basic-server2"></div>
							
							<h5>Your Data in Cloud</h5>
							<p>Lorem ipsum dolor sit amet, conseda adipiscing elit. Aenean commodo ligula eget dolor massa.</p>
							
						</div>
					</div>

					<!-- Service 2 -->
					<div class="col-12 col-lg-4 res-margin wow fadeInUp" data-wow-offset="10" data-wow-duration="1s" data-wow-delay="0.3s">
						<div class="service-single">
							
							<div class="icon icon-basic-headset"></div>
							
							<h5>24/7 Support</h5>
							<p>Lorem ipsum dolor sit amet, conseda adipiscing elit. Aenean commodo ligula eget dolor massa.</p>
						
						</div>
					</div>

					<!-- Service 3 -->
					<div class="col-12 col-lg-4 res-margin wow fadeInUp" data-wow-offset="10" data-wow-duration="1s" data-wow-delay="0.6s">
						<div class="service-single">
							
							<div class="icon icon-software-pen"></div>
							
							<h5>Exclusive Design</h5>
							<p>Lorem ipsum dolor sit amet, conseda adipiscing elit. Aenean commodo ligula eget dolor massa.</p>
						
						</div>
					</div>
					
				</div>
				
			</div>
			
		</section>

        <!-- Team -->
		<section id="team">
			
			<!-- Container -->
			<div class="container">
				
				<!-- Section title -->
				<div class="row justify-content-center">
					<div class="col-12 col-md-10 col-lg-6">
						
						<div class="section-title text-center">
							<h3>Our Team</h3>
							<p>Aliquam at tortor sit amet eros bibendum faucibus quis nec arcu. Quisque lobortis lectus vitae lectus aliquet leo.</p>
						</div>
						
					</div>
				</div>
			
				<div class="row">
					
					<!-- Member 1 -->
					<div class="col-12 col-md-6 col-lg-3">
						<div class="team-member res-margin">
							<div class="team-image">
                           
								<div class="team-social">
									<div class="team-social-inner">
										<a href="#"><i class="fab fa-twitter"></i></a>
										<a href="#"><i class="fab fa-facebook-f"></i></a>
										<a href="#"><i class="fab fa-linkedin-in"></i></a>
										<a href="#"><i class="fab fa-dribbble"></i></a>
									</div>
								</div>
							</div>
							<div class="team-details">
								<h5 class="title"><a href="#">Kodrat Pamungkas</a></h5>
								<span class="position">CEO Founder</span>
							</div>
						</div>
					</div>
					
					<!-- Member 2 -->
					<div class="col-12 col-md-6 col-lg-2">
						<div class="team-member res-margin">
							<div class="team-image">
								
								<div class="team-social">
									<div class="team-social-inner">
										<a href="#"><i class="fab fa-twitter"></i></a>
										<a href="#"><i class="fab fa-facebook-f"></i></a>
										<a href="#"><i class="fab fa-linkedin-in"></i></a>
										<a href="#"><i class="fab fa-dribbble"></i></a>
									</div>
								</div>
							</div>
							<div class="team-details">
								<h5 class="title"><a href="#">Chika Efansa</a></h5>
								<span class="position">Web Designer</span>
							</div>
						</div>
					</div>	
					
					<!-- Member 3 -->
					<div class="col-12 col-md-6 col-lg-2">
						<div class="team-member res-margin">
							<div class="team-image">
								
								<div class="team-social">
									<div class="team-social-inner">
										<a href="#"><i class="fab fa-twitter"></i></a>
										<a href="#"><i class="fab fa-facebook-f"></i></a>
										<a href="#"><i class="fab fa-linkedin-in"></i></a>
										<a href="#"><i class="fab fa-dribbble"></i></a>
									</div>
								</div>
							</div>
							<div class="team-details">
								<h5 class="title"><a href="#">JESUN WEDDY A. P</a></h5>
								<span class="position">App Developer</span>
							</div>
						</div>
					</div>
					
					<!-- Member 4 -->
					<div class="col-12 col-md-6 col-lg-2">
						<div class="team-member">
							<div class="team-image">
								
								<div class="team-social">
									<div class="team-social-inner">
										<a href="#"><i class="fab fa-twitter"></i></a>
										<a href="#"><i class="fab fa-facebook-f"></i></a>
										<a href="#"><i class="fab fa-linkedin-in"></i></a>
										<a href="#"><i class="fab fa-dribbble"></i></a>
									</div>
								</div>
							</div>
							<div class="team-details">
								<h5 class="title"><a href="#">SELLY CLARISA V. P.</a></h5>
								<span class="position">Web Designer</span>
							</div>
						</div>
					</div>
					<!-- Member 5 -->
					<div class="col-12 col-md-6 col-lg-3">
						<div class="team-member">
							<div class="team-image">
								
								<div class="team-social">
									<div class="team-social-inner">
										<a href="#"><i class="fab fa-twitter"></i></a>
										<a href="#"><i class="fab fa-facebook-f"></i></a>
										<a href="#"><i class="fab fa-linkedin-in"></i></a>
										<a href="#"><i class="fab fa-dribbble"></i></a>
									</div>
								</div>
							</div>
							<div class="team-details">
								<h5 class="title"><a href="#">Irfan Rohiansyah H.</a></h5>
								<span class="position">App Developer</span>
							</div>
						</div>
					</div>
					
				</div>
				
			</div>
			
		</section>
		
        
        <!-- Footer -->
		<footer>
			
		            
            <!-- Copyright -->
			<div class="footer-copyright">				
				<div class="container">
					
					<div class="row">						
						<div class="col-12">
							
							<!-- Text -->
                            <p class="copyright text-center">
                                Copyright © 2023 <a href="#" target="_blank">DESA DIGITAL</a>. All Rights Reserved.
                            </p>
							
						</div>
					</div>
					
				</div>				
			</div>
			
		</footer>
        
        <!-- Back to top -->
		<a href="#top-page" class="to-top">
			<div class="icon icon-arrows-up"></div>
		</a>


		<!-- jQuery -->
        <script src="{{ asset('frontend/assets/library/jquery/jquery.js') }}"></script>
		<script src="{{ asset('frontend/assets/library/jquery/jquery-easing.js') }}"></script>
		
		<!-- Bootstrap -->
		<script src="{{ asset('frontend/assets/library/bootstrap/js/bootstrap.min.js') }}"></script>
		
		<!-- Plugins -->
		<script src="{{ asset('frontend/assets/library/retina/retina.min.js') }}"></script>
		<script src="{{ asset('frontend/assets/library/backstretch/jquery.backstretch.min.js') }}"></script>
		<script src="{{ asset('frontend/assets/library/swiper/swiper-bundle.min.js') }}"></script>
		<script src="{{ asset('frontend/assets/library/owlcarousel/owl.carousel.min.js') }}"></script>
		<script src="{{ asset('frontend/assets/library/slick/slick.js') }}"></script>
        <script src="{{ asset('frontend/assets/library/waypoints/jquery.waypoints.min.js') }}"></script>
		<script src="{{ asset('frontend/assets/library/isotope/isotope.pkgd.min.js') }}"></script>
		<script src="{{ asset('frontend/assets/library/waitforimages/jquery.waitforimages.min.js') }}"></script>
		<script src="{{ asset('frontend/assets/library/lightcase/js/lightcase.js') }}"></script>
		<script src="{{ asset('frontend/assets/library/wow/wow.min.js') }}"></script>
        <script src="{{ asset('frontend/assets/library/parallax/jquery.parallax.min.js') }}"></script>
		<script src="{{ asset('frontend/assets/library/counterup/jquery.counterup.min.js') }}"></script>
		<script src="{{ asset('frontend/assets/library/magnificpopup/jquery.magnific-popup.min.js') }}"></script>
        <script src="{{ asset('frontend/assets/library/ytplayer/jquery.mb.ytplayer.min.js') }}"></script>
		
		<!-- Main -->
		<script src="{{ asset('frontend/assets/js/main.js') }}"></script>

	</body>
	
</html>