<!DOCTYPE html>
<html lang="en">
  <head>
    <title>Survey</title>
    <meta charset="utf-8">
    <meta name="format-detection" content="telephone=no" />
    <link rel="icon" href="images/favicon.ico">
    <link rel="shortcut icon" href="images/favicon.ico" />
    <link rel="stylesheet" href="css/form.css">
    <link rel="stylesheet" href="css/style1.css">
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
include_once 'dbconnect.php';

if(isset($_POST['signup']))
{
    if($_REQUEST['age'] == "select"){
      ?>
      <script>alert('Please Enter your age');</script>
      <?php
    }
    elseif ($_REQUEST['gender'] == "select") {
      ?>
      <script>alert('Please Enter your gender');</script>
      <?php
    }
    elseif ($_REQUEST['budget'] == "select") {
      ?>
      <script>alert('Please Enter your budget');</script>
      <?php
    }
    elseif ($_REQUEST['climate'] == "select") {
      ?>
      <script>alert('Please Enter climate');</script>
      <?php
    }
    elseif ($_REQUEST['place'] == "select") {
      ?>
      <script>alert('Please Enter place');</script>
      <?php
    }
    elseif ($_REQUEST['category'] == "select") {
      ?>
      <script>alert('Please Enter category');</script>
      <?php
    }
    else{
         $arr = array(
            'age' => $_POST['age'], 
            'gender' => $_POST['gender'], 
            'budget' => $_POST['budget'], 
            'climate' => $_POST['climate'], 
            'place' => $_POST['place'], 
            'category' => $_POST['category']
          );
          $json = json_encode($arr);
     
         if(mysql_query("INSERT INTO jsondata(value) VALUES('$json')"))
        {
          ?>
            <script>alert('Successfully submitted');</script>
          <?php
        }
         else
        {
          ?>
           <script>alert('error while submitting...');</script>
          <?php
        }
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
                
                <li class="current"><a href="survey.php">SURVEY</a></li>
                <li><a href="questionarre.php">DISCOVER PLACES</a></li>
                <li><a href="contact.php">CONTACT US</a></li>
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
            <div  class="form">
                    <form id="contactform" action="survey.php" method="post">
                              <p class="contact"><label for="name">Name</label></p>
                            <input id="name" name="name" placeholder="First and last name" required="" tabindex="1"type="text">
                         
                        <select class="select-style age" name="age">
                          <option value="select">Age</option>
                          <option value="15-30">15-30</option>
                          <option value="31-50">31-50</option>
                          <option value="51-75">51-75</option>
                          <option value="76+">76 above</option>
                        </select><br><br>

                        <select class="select-style gender" name="gender">
                          <option value="select">Gender</option>
                          <option value="male">Male</option>
                          <option value="Female">Female</option>
                        </select><br><br>

                        <select class="select-style budget" name="budget">
                          <option value="select">Budget</option>
                          <option value="upto10">upto 10K</option>
                          <option value="11-40">11-40</option>
                          <option value="41-75">41-75</option>
                          <option value="76+">76 above</option>
                        </select><br><br>


                        <select class="select-style climate" name="climate">
                          <option value="select">Climate</option>
                          <option value="snowy">Snowy</option>
                          <option value="rainy">Rainy</option>
                          <option value="sunny">Sunny</option>
                          <option value="windy">Windy</option>
                          <option value="cloudy">Cloudy</option>
                        </select><br><br>

                        <select class="select-style place" name="place">
                          <option value="select">Place</option>
                          <option value="mumbai">Mumbai</option>
                          <option value="goa">Goa</option>
                          <option value="delhi">Delhi</option>
                          <option value="malaysia">Malaysia</option>

                          <option value="switzerland">Switzerland</option>
                          <option value="hawaii">Hawaii</option>
                          <option value="paris">Paris</option>
                          <option value="ladakh">Ladakh</option>
                          <option value="andaman">Andaman</option>

                          <option value="simla">Shimla</option>
                          <option value="bali">Bali</option>
                          <option value="amsterdam">Amsterdam</option>
                          <option value="newyork">New York</option>
                          <option value="chicago">Chicago</option>

                          <option value="lasvegas">Las Vegas</option>
                          <option value="thailand">Thailand</option>
                          <option value="dubai">Dubai</option>
                          <option value="spain">Spain</option>
                        </select><br><br>

                        <select class="select-style category" name="category">
                          <option value="select">Category</option>
                          <option value="beaches">Beaches</option>
                          <option value="religious">Religious</option>
                          <option value="amusement">Amusement</option>
                          <option value="nightlife">Nightlife</option>
                          <option value="shopping">Shopping</option>
                          <option value="wildlife">Wildlife</option>
                          <option value="Museums">Museums</option>
                          <option value="parks">Parks</option>  
                        </select><br><br>

                        
               
                       
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