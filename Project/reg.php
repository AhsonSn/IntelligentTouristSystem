
<!DOCTYPE html>
<head>
<title>
Aeroplanes
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
li font {
   display: block;
    color: orange;
    text-align: center;
    padding: 14px 16px;
    text-decoration: none;
}
li img{
  display:block;
  float:right;
  left:1000px;
  width:20px;
  height:20px;
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
include_once 'dbconnect.php';

if(isset($_POST['signup']))
{
  

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
?>
<h1><center>Questionarre</center></h1>



 <div  class="form">
            <form id="contactform" action="reg.php" method="post">
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
              <option value="others">Other</option>
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

              <option value="simla">Simla</option>
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
     

</body>
</html>