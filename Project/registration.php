<!DOCTYPE html>
<html lang="en">
  <head>
    <title>Register/Login</title>
    <meta charset="utf-8">
    <meta name="format-detection" content="telephone=no" />
    <link rel="icon" href="images/favicon.ico">
    <link rel="shortcut icon" href="images/favicon.ico" />
    <link rel="stylesheet" href="css/form.css">
    <link rel="stylesheet" href="css/style3.css">
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
    session_start();
      include_once 'userconnect.php';

      if(isset($_POST['login']))
    {
       $user = mysql_real_escape_string($_POST['username']);
       $upass = mysql_real_escape_string($_POST['password']);
       $res=mysql_query("SELECT * FROM users WHERE email='$user'");
       $row=mysql_fetch_array($res);
       if($row['password']==$upass)
       {
        $_SESSION['user'] = $row['email'];
        header("Location: questionarre.php");
       }
       else
       {
        ?>
              <script>alert('wrong details');</script>
              <?php
       }
     
    }
    


      if(isset($_POST['signup']))
      {
         $name = mysql_real_escape_string($_POST['name']);
         $email = mysql_real_escape_string($_POST['email']);
         $password =(mysql_real_escape_string($_POST['password']));
         $dob = $_POST['bday'];
         $gender = $_POST['gender'];
         $phone = $_POST['phone'];

         $query = mysql_query("SELECT email FROM users WHERE email='" . $email . "'");
         $a = mysql_num_rows($query);
         if ((!filter_var($email, FILTER_VALIDATE_EMAIL)) OR ($a >= 1))
         {
           ?><script>alert("Your email is not valid or already exists!");</script> 
           <?php

         }
          else
          {
            if(strlen($password) < 7 ){
              ?>
              <script>alert('Please enter a password of more than 6 characters');</script>
              <?php
            }
            else
            {
              if(strlen($phone)< 10 || strlen($phone) > 10) {
                ?><script>alert("Please enter a valid phone number");</script>
                <?php
              }
              else{
                if(mysql_query("INSERT INTO users(name,email,password,dob,gender,phone) VALUES('$name','$email','$password','$dob','$gender','$phone')"))
               {
                ?>
                      <script>alert('Successfully registered');</script>
                  <?php
               }
               else
               {
                ?>
                      <script>alert('error while registering you...');</script>
                      <?php
               }
              }
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
                <li class ="current"><a href = "registration.php">REGISTER/LOGIN</a></li>
                <li><a href="contact.php">CONTACT</a></li>
                <li><a href="questionarre.php">DISCOVER PLACES</a></li>
                <li><a href="survey.php">SURVEY</a></li>
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
          <h3>&nbsp &nbsp &nbsp &nbsp <u><b> REGISTER</b></u></h3>
          <div  class="form">
                      <form id="contactform" action="registration.php" method="post">
                        <p class="contact"><label for="name">Name</label></p>
                        <input id="name" name="name" placeholder="First and last name" required="" tabindex="1"type="text">
             
                        <p class="contact"><label for="email">Email</label></p>
                        <input id="email" name="email" placeholder="example@domain.com" required="" type="email">
           
                        <p class="contact"><label for="password">Create a password</label></p>
                        <input type="password" id="password" placeholder="minimum 7 characters" name="password" required="" type="text">
             
                        <br>
                        <label>Date Of Birth</label><br><br>
                        <input type="date" name="bday" required="">
                        <br><br>

                        <select class="select-style gender" name="gender">
                          <option value="select">Gender</option>
                            <option value="Male">Male</option>
                            <option value="Female">Female</option>
                        </select><br><br>
               
                        <p class="contact"><label for="phone">Mobile phone</label></p>
                          <input id="phone" name="phone" placeholder="phone number" required="" type="text"> <br>
                        <input class="button" name="signup" id="submit" tabindex="5" value="Register" type="submit">
                        
                    </form>
                </div>
        </div>
        <div class="grid_6 prefix_1">
          <h3>&nbsp &nbsp &nbsp &nbsp <u><b>LOG IN</b></u></h3>
          <div  class="form">
              <form id="contactform" action="registration.php" method="post">
                <p class="contact"><label for="username">Enter your email</label></p>
                      <input id="username" name="username" placeholder="E-mail" required="" tabindex="2" type="text">
                      <p class="contact"><label for="password">Enter your password</label></p>
                        <input type="password" id="password" placeholder="enter your password" name="password" required="" tabindex="5" type="text" ><br><br><br>
                        <input class="button" name="login" id="submit" tabindex="5" value="Login" type="submit">
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