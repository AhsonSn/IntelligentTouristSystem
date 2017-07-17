<!DOCTYPE html>
<html lang="en">
	<head>
		<title>Home</title>
		<meta charset="utf-8">
		<meta name="format-detection" content="telephone=no" />
		<link rel="icon" href="images/favicon.ico">
		<link rel="shortcut icon" href="images/favicon.ico" />
		<link rel="stylesheet" href="booking/css/booking.css">
		<link rel="stylesheet" href="css/form.css">
		<link rel="stylesheet" href="css/camera.css">
		<link rel="stylesheet" href="css/owl.carousel.css">
		<link rel="stylesheet" href="css/style.css">
		<script src="js/jquery.js"></script>
		<script src="js/jquery-migrate-1.2.1.js"></script>
		<script src="js/script.js"></script>
		<script src="js/superfish.js"></script>
		<script src="js/jquery.ui.totop.js"></script>
		<script src="js/jquery.equalheights.js"></script>
		<script src="js/jquery.mobilemenu.js"></script>
		<script src="js/jquery.easing.1.3.js"></script>
		<script src="js/owl.carousel.js"></script>
		<script src="js/camera.js"></script>
		<!--[if (gt IE 9)|!(IE)]><!-->
		<script src="js/jquery.mobile.customized.min.js"></script>
		<!--<![endif]-->
		<script src="booking/js/booking.js"></script>
		<script>
			$(document).ready(function(){
			jQuery('#camera_wrap').camera({
				loader: false,
				pagination: false ,
				minHeight: '444',
				thumbnails: false,
				height: '48.375%',
				caption: true,
				navigation: true,
				fx: 'mosaic'
			});
			/*carousel*/
			var owl=$("#owl");
				owl.owlCarousel({
				items : 2, //10 items above 1000px browser width
				itemsDesktop : [995,2], //5 items between 1000px and 901px
				itemsDesktopSmall : [767, 2], // betweem 900px and 601px
				itemsTablet: [700, 2], //2 items between 600 and 0
				itemsMobile : [479, 1], // itemsMobile disabled - inherit from itemsTablet option
				navigation : true,
				pagination : false
				});
			$().UItoTop({ easingType: 'easeOutQuart' });
			});
		</script>

	
	</head>
	<body class="page1" id="top">
<!--==============================header=================================-->
		<header>

			<div class="container_12">
				<div class="grid_12">
					<div class="menu_block">
						<nav class="horizontal-nav full-width horizontalNav-notprocessed">
							<ul class="sf-menu">
								<li class="current"><a href="home.php">HOME</a></li>
								<li><a href="contact.php">CONTACT US</a></li>

								<li><a href="questionarre.php">DISCOVER PLACES</a></li>
								<li><a href="survey.php">SURVEY</a></li>
								<?php 
									session_start();
									include_once 'userconnect.php';
									if(!isset($_SESSION['user']))
									{
							 			?>

									<li><a href="registration.php">REGISTER/LOGIN</a></li>
							 		<?php
									}
									else{
										
											if(isset($_SESSION['user']))
									     {
									     	?>
										<li><a href="logout.php">LOGOUT</a></li>
										<?php
										}
										
									}
								?>
							</ul>
						</nav>

						<div class="clear"></div>
					</div>
				<div class="grid_12">
					<h1>
						<a href="home.php">
							<img src="images/logo.png" alt="Your Happy Family">
						</a>
					</h1>
				</div>
			</div>
		</header>
		<div class="slider_wrapper">
			<div id="camera_wrap" class="">
				<div data-src="images/slide.jpg">
					<div class="caption fadeIn">
						<h2>LONDON</h2>
						
					</div>
				</div>
				<div data-src="images/slide1.jpg">
					<div class="caption fadeIn">
						<h2>MALDIVES</h2>
						
					</div>
				</div>
				<div data-src="images/pic1.jpg">
					<div class="caption fadeIn">
						<h2>COLOSSEUM</h2>
						
					</div>
				</div>
				<div data-src="images/pic2.jpg">
					<div class="caption fadeIn">
						<h2>HAWAII</h2>
						
					</div>
				</div>
				<div data-src="images/pic3.jpg">
					<div class="caption fadeIn">
						<h2>INDIA</h2>
						
					</div>
				</div>
				<div data-src="images/pic4.jpg">
					<div class="caption fadeIn">
						<h2>LEH LADAKH</h2>
					
					</div>
				</div>
				<div data-src="images/pic5.jpg">
					<div class="caption fadeIn">
						<h2>New York</h2>
						
					</div>
				</div>
			</div>
		</div>
<!--==============================Content=================================-->
		<div class="content"><div class="ic">More Website Templates @ TemplateMonster.com - February 10, 2014!</div>
			<div class="container_12">
				<div class="grid_4">
					<div class="banner">
						<img src="images/ban_img1.jpg" alt="">
						<div class="label">
							<div class="title">Barcelona</div>
							
						</div>
					</div>
				</div>
				<div class="grid_4">
					<div class="banner">
						<img src="images/ban_img2.jpg" alt="">
						<div class="label">
							<div class="title">GOA</div>
							
						</div>
					</div>
				</div>
				<div class="grid_4">
					<div class="banner">
						<img src="images/ban_img3.jpg" alt="">
						<div class="label">
							<div class="title">PARIS</div>
							
						</div>
					</div>
				</div>




				<video controls="" height="550" width="1000">
  <source src="videos\video.mp4" type="video/mp4" />
Your browser does not support the video tag.
</video>



<!--==============================Footer=================================-->

			<footer>
			<div class="container_12">
				<div class="grid_12">
					<div class="socials">
						<a href="#" class="fa fa-facebook"></a>
						<a href="#" class="fa fa-twitter"></a>
						<a href="#" class="fa fa-google-plus"></a>
					</div>
					<div class="copy">
						<!-- Your Trip (c) 2014 | <a href="#">Privacy Policy</a> | Website Template Designed by <a href="http://www.templatemonster.com/" rel="nofollow">TemplateMonster.com</a> -->
					</div>
				</div>
			</div>
		</footer>
		<script>
		$(function (){
			$('#bookingForm').bookingForm({
				ownerEmail: '#'
			});
		})
		</script>
		
	</body>
</html>

