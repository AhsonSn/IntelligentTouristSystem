<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" type="text/css" href="css/demo.css" />
    <link rel="stylesheet" type="text/css" href="css/style4.css" />
    <link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css'>
	<title>
		results
	</title>
	<style>
	#show-museum,#show-worshipplace,#show-amusementpark,#show-attraction {
        width: 15%;
        display: none;
      }

      #show-park,#show-food,#show-stadium,#show-mall,#show-zoo,#show-beach,#show-club{
        width: 15%;
        display: none;
      }

#dropbtn {
    background-color: #4CAF50;
    color: white;
    padding: 16px;
    font-size: 16px;
    border: none;
    cursor: pointer;
}

#dropdown {
    position: relative;
    display: inline-block;
}

#dropdown-content {
    display: none;
    position: absolute;
    background-color: #f9f9f9;
    min-width: 160px;
    box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
    z-index: 1;
}

#dropdown-content a {
    color: black;
    padding: 12px 16px;
    text-decoration: none;
    display: block;
}

#dropdown-content a:hover {background-color: #f1f1f1}

#dropdown:hover #dropdown-content {
    display: block;
}

#dropdown:hover #dropbtn {
    background-color: #3e8e41;
}
</style>
	<script src="locationUtil.js"></script>
</head>
<body>
<p id = "txt"></p>
<div id="dropdown">
  <button id="dropbtn">Places</button>
  <div id="dropdown-content">
    
  </div>
</div>

<div id="placeDiv"></div>
<br>
<br>
<br>

<div id="categoryDiv"></div>
<br>
<br><br>
<div id ="placebtns">
			<div>
              <input id="show-museum" type="button" class ="button"  style="background-image:url(images/museums.jpg);background-size: 100% 100%;background-repeat: no-repeat;">
              <input id="show-worshipplace" type="button" class ="button" style="background-image:url(images/religious.jpg);background-size: 100% 100%;background-repeat: no-repeat;">
           </div>

           <div>
              <input id="show-amusementpark" type="button" class ="button" style="background-image:url(images/amusement.jpg);background-size: 100% 100%;background-repeat: no-repeat;">
              <input id="show-park" type="button" class ="button" style="background-image:url(images/parks.jpg);background-size: 100% 100%;background-repeat: no-repeat;">
           </div>

           <div>
              <input id="show-food" type="button" class ="button" style="background-image:url(images/food.jpg);background-size: 100% 100%;background-repeat: no-repeat;">
              <input id="show-zoo" type="button" class ="button" style="background-image:url(images/zoo.jpg);background-size: 100% 100%;background-repeat: no-repeat;">
           </div>

           <div id = "malls">
           	
              <input id="show-mall" type="button" class ="button" style="background-image:url(images/malls.jpg);background-size: 100% 100%;background-repeat: no-repeat;">
           
              <input id="show-stadium" type="button" class ="button" style="background-image:url(images/stadium.jpg);background-size: 100% 100%;background-repeat: no-repeat;">
           </div>

           <div>
              <input id="show-attraction" type="button" class ="button" style="background-image:url(images/attractions.jpg);background-size: 100% 100%;background-repeat: no-repeat;">
              <input id="show-beach" type="button" class ="button" style="background-image:url(images/beaches.jpg);background-size: 100% 100%;background-repeat: no-repeat;">
            </div>

            <div>
              <input id="show-club" type="button" class ="button" style="background-image:url(images/nightlife.jpg);background-size: 100% 100%;background-repeat: no-repeat;">
            </div>
</div>

<script type="text/javascript">
	var data = JSON.parse(localStorage.getItem('locationCategoryMapping'));
	console.log(data);
	for(var i = 0; i < data.length; i++){
		const placeArray = data[i];
		for(var j in placeArray){
			// j is a place
			// placeArray[j] is an array of categories 
			// console.log(placeArray[j], 'category', j);
			var a = document.createElement('a');
			var linkText = document.createTextNode(capitalizeFirstLetter(j));
			a.appendChild(linkText);

			a.title = j;
			a.href = "#";

			a.onclick = (function(place, categoryArray) {
		        return function() {
		        	displayCategory(place, categoryArray)
		        };
		    }(j, placeArray[j]));
		    document.getElementById('dropdown-content').appendChild(a);
			//document.getElementById('placeDiv').appendChild(a);
			//document.getElementById('placeDiv').appendChild(document.createElement('br'));
			// document.getElementById('placeDiv').innerHTML += j+"<br>";
		}
	}


	function displayCategory(place, categoryArray) {
		console.log(' i was called with data ', categoryArray);
		document.getElementById('categoryDiv').innerHTML = "";
		for(var i in categoryArray) {
			var a = document.createElement('a');
			var linkText = document.createTextNode(capitalizeFirstLetter(categoryArray[i]));
			a.appendChild(linkText);
			a.title = categoryArray[i];
			// dispButons(a.title);
			console.log(a.title);
			a.href = "#";
			a.onclick = (function(place, category) {
		        return function() {
		        	displayMapMarker(place, category)
		        };
		    }(place, categoryArray[i]));
			document.getElementById('categoryDiv').appendChild(a);
			document.getElementById('categoryDiv').appendChild(document.createElement('br'));
			displayBtn(a.title);
		}
	}

	function displayBtn(text){
		if(text == "nightlife"){
			document.getElementById("show-club").style.display = 'block';
		}
		else{
			document.getElementById("show-club").style.display = 'none';
		}
		if(text == "shopping"){
			document.getElementById("show-mall").style.display = 'block';
		}
		else{
			document.getElementById("show-mall").style.display = 'none';
		}
	}

	function displayMapMarker(place, category) {
		var latLongObj = getLatLong(place);
		console.log(latLongObj, place);
	}

	function capitalizeFirstLetter(string) {
	    return string.charAt(0).toUpperCase() + string.slice(1);
	}
</script>


</body>
</html>