<!DOCTYPE html>
<head>
<title>
Login
</title>
<link rel="stylesheet" type="text/css" href="Styles/mystyle.css">
<style>
    
@media screen and (min-width: 640px) {
    body {
        background-color: #D3D3D3;
    }
img {
  width: 100%;
}
}
@media screen and (max-width: 720px) {
   img {
width: 100%;
height: 100%;}
}

h1{
 font:normal 40pt Arial;
 color:#FFFFFF;
 text-shadow: 0 1px 0 #ccc,
 0 2px 0 #c9c9c9,
 0 3px 0 #bbb,
 0 4px 0 #b9b9b9,
 0 5px 0 #aaa,
 0 6px 1px rgba(0,0,0,.1),
 0 0 5px rgba(0,0,0,.1),
 0 1px 3px rgba(0,0,0,.3),
 0 3px 5px rgba(0,0,0,.2),
 0 5px 10px rgba(0,0,0,.25),
 0 10px 10px rgba(0,0,0,.2),
 0 20px 20px rgba(0,0,0,.15);
}
ul {
    list-style-type: none;
    margin: 0;
    padding: 0;
    overflow: hidden;
    background-color: #333;
}

li {
    float: left;
}

li a {
    display: block;
    color: white;
    text-align: center;
    padding: 14px 16px;
    text-decoration: none;
}

li a:hover {
    background-color: #111;
}

li a:active {
background-image: aero.jpg;
}




body {
    background-color: #C0C0C0;}
</style>
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
  $_SESSION['user'] = $row['user_id'];
  header("Location: questionarre.php");
 }
 else
 {
  ?>
        <script>alert('wrong details');</script>
        <?php
 }
 
}
?>
 
<h1><center>Login</center></h1>
<ul>
  <li><a href="next.php"> Home</a></li>
  <li><a  href="page2.php">RC Models</a></li>
  <li><a href="page3.php">Registration</a></li>
  <li><a href="page4.php">About</a></li>
 
</ul>


 <div  class="form">
            <form id="contactform" action="login.php" method="post">
                
 
                  <p class="contact"><label for="username">Enter your email</label></p>
                 <input id="username" name="username" placeholder="E-mail" required="" tabindex="2" type="text">
   
                  <p class="contact"><label for="password">Enter your password</label></p>
                  <input type="password" id="password" name="password" required="" tabindex="5" type="text" ><br><br><br>
                   <input class="button" name="login" id="submit" tabindex="5" value="Login" type="submit">
                   </t> &nbsp &nbsp<a href ="registration.php"><input class="button" value="Register" type="button"></a>
   
              
   
     </form>
     
     


</body>
</html>