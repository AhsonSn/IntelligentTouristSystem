<?php 
		session_start();
		include_once 'userconnect.php';
		if(!isset($_SESSION['user']))
		{
 			header("Location: registration.php");
		}
?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<title>Discover Places</title>
		<meta charset="utf-8">
		<meta name="format-detection" content="telephone=no" />
		<link rel="icon" href="images/favicon.ico">
		<link rel="shortcut icon" href="images/favicon.ico" />
		<link rel="stylesheet" href="css/form.css">
		<link rel="stylesheet" href="css/style2.css">
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
		<script src="loadash.js"></script>
		<script src="fuse.js"></script>
		<script src="fuzzyUtils.js"></script>
		<script>
		$(document).ready(function(){
			$().UItoTop({ easingType: 'easeOutQuart' });
			});
		</script>
		<script type="text/javascript">
			function findLocationCat(tempArray) {
			  try {
			  	const  placeArray = _.map(_.uniqBy(tempArray, 'place'), 'place');
				const placeCategoryArray = [];
				for(var i in placeArray) {
					const categoryArray = (_.map(_.filter(tempArray, (placeData) => {
					  return placeData.place === placeArray[i];
					}), 'category'));
					var jsonObj = {};
					const loc = placeArray[i];
					jsonObj[loc] = categoryArray;
					placeCategoryArray.push(jsonObj);
				}
				return placeCategoryArray;	
			  } catch(e) {
			  	return [];
			  }
			}

			function displayResults(ag,gen,bud,cli){
				<?php
						$con = mysql_connect("localhost","root","");
						if(!$con){
							echo "Cannot connect to database";
						}
						mysql_select_db("jsondatabase");
						$query = "Select * FROM jsondata";
						$result = mysql_query($query);

					?>
			
					var newArray = [];
					<?php while ($row = mysql_fetch_assoc($result)) {?>
						//echo $row['key1']." ".$row['value']."<br>";
						newArray.push('<?php echo $row['value']; ?>');
					<?php }?>

					
					var jsonArray = [];
					for(var j in newArray){
						jsonArray.push(JSON.parse(newArray[j]));
					}
					
					var genderResult = fuzzyGender(jsonArray,gen);
					var ageGroupResult = fuzzyAgeGrp(genderResult, ag);
					var budgetResult = fuzzyBudget(ageGroupResult, bud);
					var climateResult = fuzzyClimate(budgetResult, cli);
					var finalLocationCategory = findLocationCat(climateResult);

					if (finalLocationCategory.length === 0) {
						finalLocationCategory = findLocationCat(budgetResult);			
					}

					if (finalLocationCategory.length === 0) {
						finalLocationCategory = findLocationCat(ageGroupResult);			
					}

					if (finalLocationCategory.length === 0) {
						finalLocationCategory = findLocationCat(genderResult);			
					}
					localStorage.setItem('locationCategoryMapping', JSON.stringify(finalLocationCategory));

			}

			function display(){
				if(document.getElementById('age').value==="select"){
					alert("Please enter your age");
					return false;
					
				}
				else if(document.getElementById('gender').value === "select"){
					alert("Please enter your gender");
					return false;
				}
				else if(document.getElementById('budget').value === "select"){
					alert("Please enter your budget");
					return false;
				}
				else if(document.getElementById('climate').value === "select"){
					alert("Please enter climate");
					return false;
				}
				else
				{	
					displayResults(document.getElementById('age').value,document.getElementById('gender').value,document.getElementById('budget').value,document.getElementById('climate').value);
				}
			}


			</script>
		
		</head>

		
	<body >
	
<!--==============================header=================================-->
		<header>
			<div class="container_12">
				<div class="grid_12">
					<div class="menu_block">
						<nav class="horizontal-nav full-width horizontalNav-notprocessed">
							<ul class="sf-menu">
								<li><a href="home.php">HOME</a></li>
								
								<li class="current"><a href="questionarre.php">DISCOVER PLACES</a></li>
								<li><a href="contact.php">CONTACT US</a></li>
								<li><a href="survey.php">SURVEY</a></li>
								<li><a href="logout.php">LOGOUT</a></li>
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
						<div  class="form">
				            <form id="contactform"  method="post" action="finalproject.html" target="_blank">
				                  <p class="contact"><label for="name">Name</label></p>
				                <input id="name" name="name" placeholder="First and last name" required="" tabindex="1"type="text">
				             
					            <select class="select-style age" name="age" id="age">
					              <option value="select">Age</option>
					              <option value="15-30">15-30</option>
					              <option value="31-50">31-50</option>
					              <option value="51-75">51-75</option>
					              <option value="76+">76 above</option>
					            </select><br><br>

					            <select class="select-style gender" name="gender" id ="gender">
					              <option value="select">Gender</option>
					            <option value="male">Male</option>
					            <option value="Female">Female</option>
					            </select><br><br>

					            <select class="select-style budget" name="budget" id ="budget">
					              <option value="select">Budget</option>
					              <option value="upto10">upto 10K</option>
					              <option value="11-40">11-40</option>
					              <option value="41-75">41-75</option>
					              <option value="76+">76 above</option>
					            </select><br><br>


					            <select class="select-style climate" name="climate" id ="climate">
					              <option value="select">Climate</option>
					              <option value="snowy">Snowy</option>
					              <option value="rainy">Rainy</option>
					              <option value="sunny">Sunny</option>
					              <option value="windy">Windy</option>
					              <option value="cloudy">Cloudy</option>
					            </select><br><br>

					            <input type="hidden" id="value">
					            <input class="button" name="signup" id="submit" tabindex="5" value="Submit" type="submit" onclick="return display()"  >   
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
    
</body>
</html>