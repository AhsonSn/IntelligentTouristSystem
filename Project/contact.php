<!DOCTYPE html>
<html lang="en">
	<head>
		<title>Contacts</title>
		<meta charset="utf-8">
		<meta name="format-detection" content="telephone=no" />
		<link rel="icon" href="images/favicon.ico">
		<link rel="shortcut icon" href="images/favicon.ico" />
		<link rel="stylesheet" href="css/form.css">
		<link rel="stylesheet" href="css/style7.css">
		<link rel="stylesheet" type="text/css" href="Styles/mystyle.css">
		<script src="js/jquery.js"></script>
		<script src="js/jquery-migrate-1.2.1.js"></script>
		<script src="js/script.js"></script>
		<script src="js/TMForm.js"></script>
		<script src="js/superfish.js"></script>
		<script src="js/jquery.ui.totop.js"></script>
		<script src="js/jquery.equalheights.js"></script>
		<script src="js/jquery.mobilemenu.js"></script>
		<script src="js/jquery.easing.1.3.js"></script>
		<script>
		$(document).ready(function(){
			$().UItoTop({ easingType: 'easeOutQuart' });
			});
		</script>
		
		</head>

		
	<body >
	  <?php
      include_once 'usercontact.php';

       if(isset($_POST['signup']))
       {

         $name = mysql_real_escape_string($_POST['name']);
         $email = mysql_real_escape_string($_POST['email']);
         $country =(mysql_real_escape_string($_POST['country']));
         $message = $_POST['message'];

         if(mysql_query("INSERT INTO contactusers(name,email,country,message) VALUES('$name','$email','$country','$message')"))
            {
                ?>
                      <script>alert('Successfully submitted the message');</script>
                  <?php
            }
            else
            {
                ?>
                      <script>alert('error while submitting the message...');</script>
                      <?php
            }
        }

      ?>


<!--==============================header=================================-->
		<header>
			<div class="container_12">
				<div class="grid_12">
					<div class="menu_block">
						<nav class="horizontal-nav full-width horizontalNav-notprocessed">
							<ul class="sf-menu">
								<li><a href="home.php">HOME</a></li>
								
								<li class="current"><a href="contact.php">CONTACT US</a></li>
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
				</div>
				<div class="grid_12">
					<h1>
						<a href="home.php">
							
						</a>
					</h1>
				</div>
			</div>
		</header>
<!--==============================Content=================================-->

	
		<div class="content"><div class="ic">More Website Templates @ TemplateMonster.com - February 10, 2014!</div>
			<div class="container_12">
				<div class="grid_5">
					<h3><u><b>ABOUT US</b></u></h3>
					<div class="map">
						<p><i>i-Travel</i> recommends tourism locations based on user preferences.Just fill in the following criteria, Discover the place you are looking for. <span class="col1"><a href="http://www.templatemonster.com/website-templates.php" rel="nofollow"></a></span>.</p>
						<p>We take you to the exact location you are looking for. If any queries regarding the tourism, you can further contact us on given address.<span class="col1"><a href="http://www.templatetuning.com/" rel="nofollow"></a></span></p>
						<div class="clear"></div>
						<figure class="">
							<iframe src="http://maps.google.com/maps?f=q&amp;source=s_q&amp;hl=en&amp;geocode=&amp;q=Brooklyn,+New+York,+NY,+United+States&amp;aq=0&amp;sll=37.0625,-95.677068&amp;sspn=61.282355,146.513672&amp;ie=UTF8&amp;hq=&amp;hnear=Brooklyn,+Kings,+New+York&amp;ll=40.649974,-73.950005&amp;spn=0.01628,0.025663&amp;z=14&amp;iwloc=A&amp;output=embed"></iframe>
						</figure>
						<address>
							<dl>
								<dt><b>i-TRAVEL.</b> <br>
									8901 Marmora Road,<br>
									Glasgow, D04 89GR.
								</dt>
								<dd><span>Freephone:</span>+1 800 559 6580</dd>
								<dd><span>Telephone:</span>+1 800 603 6035</dd>
								<dd><span>FAX:</span>+1 800 889 9898</dd>
								<dd>E-mail: <a href="#" class="col1">mail@demolink.org</a></dd>
							</dl>
						</address>
					</div>
				</div>
				<div class="grid_6 prefix_1">
					<h3><u><b>GET IN TOUCH</b></u></h3>
					
					<div  class="form">
                      <form id="contactform" action="contact.php" method="post">
                        <p class="contact"><label for="name">Name</label></p>
                        <input id="name" name="name" placeholder="First and last name" required="" tabindex="1"type="text">
             
                        <p class="contact"><label for="email">Email</label></p>
                        <input id="email" name="email" placeholder="Enter your email address" required="" type="email">
           
                        <p class="contact"><label for="country">Country</label></p>
                        <input type="text" id="country" placeholder="country name" name="country" required="" type="text">
             
                        <br>
                        <label>Message</label><br><br>
                        <textarea name="message" id="message" placeholder="Message:"></textarea>
                        <br><br><br><br>

                        <input class="button" name="signup" id="submit" tabindex="5" value="Submit" type="submit">
                        
                      </form>
                    </div>
				</div>
			</div>
		</div>
<!--==============================footer=================================-->
		<footer>
			<div class="container_12">
				<div class="grid_12">
					<div class="socials">
						<a href="#" class="fa fa-facebook"></a>
						<a href="#" class="fa fa-twitter"></a>
						<a href="#" class="fa fa-google-plus"></a>
					</div>
					<div class="copy">
						 I-Travel (c) 2017 | <a href="#">Privacy Policy</a> 
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