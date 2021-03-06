<!DOCTYPE html>
<html lang="en">

<head>

	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge" />
	<meta name="author" content="Jthemes" />
	<meta name="description" content="Sistem Informasi Administrasi Pengadaan Kabupaten Kudus" />
	<meta name="keywords" content="Responsive, HTML5 template, Jthemes, SEO, Strategy, Digital Marketing Agency, Online Marketing">
	<meta name="viewport" content="width=device-width, initial-scale=1.0" />

	<!-- SITE TITLE -->
	<title>SIAP KABUPATEN KUDUS</title>
	<link rel="shortcut icon" href="<?= base_url('assets/') ?>dist/img/logo-kudus.png" />

	<!-- GOOGLE FONTS -->
	<link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700&display=swap" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css?family=Muli:400,600,700,800,900&display=swap" rel="stylesheet">

	<!-- BOOTSTRAP CSS -->
	<link href="<?= base_url('assets/utama/') ?>css/bootstrap.min.css" rel="stylesheet">

	<!-- FONT ICONS -->
	<link href="https://use.fontawesome.com/releases/v5.11.0/<?= base_url('assets/utama/') ?>css/all.css" rel="stylesheet" crossorigin="anonymous">
	<link href="<?= base_url('assets/utama/') ?>css/flaticon.css" rel="stylesheet">

	<!-- PLUGINS STYLESHEET -->
	<link href="<?= base_url('assets/utama/') ?>css/menu.css" rel="stylesheet">
	<link id="effect" href="<?= base_url('assets/utama/') ?>css/dropdown-effects/fade-down.css" media="all" rel="stylesheet">
	<link href="<?= base_url('assets/utama/') ?>css/magnific-popup.css" rel="stylesheet">
	<link href="<?= base_url('assets/utama/') ?>css/flexslider.css" rel="stylesheet">
	<link href="<?= base_url('assets/utama/') ?>css/owl.carousel.min.css" rel="stylesheet">
	<link href="<?= base_url('assets/utama/') ?>css/owl.theme.default.min.css" rel="stylesheet">

	<!-- ON SCROLL ANIMATION -->
	<link href="<?= base_url('assets/utama/') ?>css/animate.css" rel="stylesheet">

	<!-- TEMPLATE CSS -->
	<link href="<?= base_url('assets/utama/') ?>css/red.css" rel="stylesheet">

	<!-- STYLE SWITCHER CSS -->
	<link href="<?= base_url('assets/utama/') ?>css/carrot.css" rel="alternate stylesheet" title="carrot-theme">
	<link href="<?= base_url('assets/utama/') ?>css/dodgerblue.css" rel="alternate stylesheet" title="dodgerblue-theme">
	<link href="<?= base_url('assets/utama/') ?>css/green.css" rel="alternate stylesheet" title="green-theme">
	<link href="<?= base_url('assets/utama/') ?>css/magneta.css" rel="alternate stylesheet" title="magneta-theme">
	<link href="<?= base_url('assets/utama/') ?>css/olive.css" rel="alternate stylesheet" title="olive-theme">
	<link href="<?= base_url('assets/utama/') ?>css/orange.css" rel="alternate stylesheet" title="orange-theme">
	<link href="<?= base_url('assets/utama/') ?>css/purple.css" rel="alternate stylesheet" title="purple-theme">
	<link href="<?= base_url('assets/utama/') ?>css/skyblue.css" rel="alternate stylesheet" title="skyblue-theme">
	<link href="<?= base_url('assets/utama/') ?>css/teal.css" rel="alternate stylesheet" title="teal-theme">

	<!-- RESPONSIVE CSS -->
	<link href="<?= base_url('assets/utama/') ?>css/responsive.css" rel="stylesheet">

</head>




<body>
	<!-- PRELOADER SPINNER
		============================================= -->
	<div id="loader-wrapper">
		<div id="loading">
			<div id="loading-center">
				<div id="loading-center-absolute">
					<div class="object" id="object_four"></div>
					<div class="object" id="object_three"></div>
					<div class="object" id="object_two"></div>
					<div class="object" id="object_one"></div>
				</div>
			</div>
		</div>
	</div>
	<!-- PAGE CONTENT
		============================================= -->
	<div id="page" class="page">
		<!-- HEADER
			============================================= -->
		<header id="header" class="header tra-menu navbar-light">
			<div class="header-wrapper">
				<!-- MOBILE HEADER -->
				<div class="wsmobileheader clearfix">
					<a id="wsnavtoggle" class="wsanimated-arrow"><span></span></a>
					<span class="smllogo smllogo-black"><img src="<?= base_url('assets/utama/') ?>images/logo.png" width="162" height="40" alt="mobile-logo" /></span>
					<span class="smllogo smllogo-white"><img src="<?= base_url('assets/utama/') ?>images/logo-white.png" width="162" height="40" alt="mobile-logo" /></span>
					<a href="tel:123456789" class="callusbtn"><i class="fas fa-phone"></i></a>
				</div>
				<!-- NAVIGATION MENU -->
				<div class="wsmainfull menu clearfix">
					<div class="wsmainwp clearfix">
						<!-- LOGO IMAGE -->
						<!-- For Retina Ready displays take a image with double the amount of pixels that your image will be displayed (e.g 334 x 80 pixels) -->
						<div class="desktoplogo"><a href="<?= base_url() ?>" class="logo-black"><img src="<?= base_url('assets/utama/') ?>images/logo.png" width="162" height="40" alt="header-logo"></a></div>
						<div class="desktoplogo"><a href="<?= base_url() ?>" class="logo-white"><img src="<?= base_url('assets/utama/') ?>images/logo-white.png" width="162" height="40" alt="header-logo"></a></div>
						<!-- MAIN MENU -->
						<nav class="wsmenu clearfix blue-header">
							<ul class="wsmenu-list">
								<!-- SIMPLE NAVIGATION LINK -->
								<li class="nl-simple" aria-haspopup="true"><a href="<?= base_url('tentang') ?>">Tentang</a></li>
								<li class="nl-simple" aria-haspopup="true"><a href="<?= base_url('alur-pengajuan') ?>">Alur Pengajuan</a></li>
								<li class="nl-simple" aria-haspopup="true"><a href="<?= base_url('daftar-opd') ?>">OPD</a></li>
								<li class="nl-simple" aria-haspopup="true"><a href="<?= base_url('persyaratan') ?>">Persyaratan</a></li>
								<li class="nl-simple primary-scroll" aria-haspopup="true">
									<a href="tel:123456789" class="last-link last-link-number">
										<i class="fas fa-phone-square-alt"></i> 855-569-7890
									</a>
								</li>
							</ul>
						</nav> <!-- END MAIN MENU -->
					</div>
				</div> <!-- END NAVIGATION MENU -->


			</div> <!-- End header-wrapper -->
		</header> <!-- END HEADER -->
		<!-- HERO-10
			============================================= -->
		<section id="hero-10" class="bg-scroll hero-section division">
			<div class="container">
				<div class="row">
					<!-- HERO TEXT -->
					<div class="col-xl-10 offset-xl-1">
						<div class="hero-txt text-center white-color">

							<!-- Title -->
							<h4>LAYANAN SATU ATAP</h4>
							<h3>SISTEM INFORMASI ADMINISTRASI PENGADAAN</h3>

							<!-- Text -->
							<p>Melaksanakan penyelenggaraan pengadaan barang/jasa lingkup Pemerintah Daerah sesuai dengan ketentuan dan Perundang-undangan yang berlaku.
							</p>

							<!-- Button -->
							<a href="<?= base_url('login') ?>" class="btn btn-md btn-primary tra-white-hover">Mulai</a>

						</div>
					</div> <!-- END HERO TEXT -->
				</div> <!-- End row -->
			</div> <!-- End container -->
			<!-- HERO WAVES -->
			<div class="hero-waves">
				<svg class="waves" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 24 150 28" preserveAspectRatio="none" shape-rendering="auto">
					<defs>
						<path id="gentle-wave" d="M-160 44c30 0 58-18 88-18s 58 18 88 18 58-18 88-18 58 18 88 18 v44h-352z" />
					</defs>
					<g class="parallax">
						<use xlink:href="#gentle-wave" x="48" y="0" fill="rgba(255,255,255,0.7" />
						<use xlink:href="#gentle-wave" x="48" y="3" fill="rgba(255,255,255,0.5)" />
						<use xlink:href="#gentle-wave" x="48" y="5" fill="rgba(255,255,255,0.3)" />
						<use xlink:href="#gentle-wave" x="48" y="7" fill="#fff" />
					</g>
				</svg>
			</div> <!-- END HERO WAVES -->
		</section> <!-- END HERO-10 -->

	</div> <!-- END PAGE CONTENT -->
	<!-- EXTERNAL SCRIPTS
		============================================= -->
	<script src="<?= base_url('assets/utama/') ?>js/jquery-3.3.1.min.js"></script>
	<script src="<?= base_url('assets/utama/') ?>js/bootstrap.min.js"></script>
	<script src="<?= base_url('assets/utama/') ?>js/modernizr.custom.js"></script>
	<script src="<?= base_url('assets/utama/') ?>js/jquery.easing.js"></script>
	<script src="<?= base_url('assets/utama/') ?>js/jquery.appear.js"></script>
	<script src="<?= base_url('assets/utama/') ?>js/menu.js"></script>
	<script src="<?= base_url('assets/utama/') ?>js/materialize.js"></script>
	<script src="<?= base_url('assets/utama/') ?>js/jquery.scrollto.js"></script>
	<script src="<?= base_url('assets/utama/') ?>js/imagesloaded.pkgd.min.js"></script>
	<script src="<?= base_url('assets/utama/') ?>js/isotope.pkgd.min.js"></script>
	<script src="<?= base_url('assets/utama/') ?>js/jquery.flexslider.js"></script>
	<script src="<?= base_url('assets/utama/') ?>js/owl.carousel.min.js"></script>
	<script src="<?= base_url('assets/utama/') ?>js/jquery.magnific-popup.min.js"></script>
	<script src="<?= base_url('assets/utama/') ?>js/seo-form.js"></script>
	<script src="<?= base_url('assets/utama/') ?>js/contact-form.js"></script>
	<script src="<?= base_url('assets/utama/') ?>js/comment-form.js"></script>
	<script src="<?= base_url('assets/utama/') ?>js/jquery.validate.min.js"></script>
	<script src="<?= base_url('assets/utama/') ?>js/jquery.ajaxchimp.min.js"></script>
	<script src="<?= base_url('assets/utama/') ?>js/wow.js"></script>
	<!-- Custom Script -->
	<script src="<?= base_url('assets/utama/') ?>js/custom.js"></script>

	<script>
		new WOW().init();
	</script>
	<script src="<?= base_url('assets/utama/') ?><?= base_url('assets/utama/') ?>js/changer.js"></script>
	<script defer src="<?= base_url('assets/utama/') ?><?= base_url('assets/utama/') ?>js/styleswitch.js"></script>

</body>



</html>