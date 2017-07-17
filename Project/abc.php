<!DOCTYPE html>
<html>
<head>
	<title>
		results
	</title>
	<script src="locationUtil.js"></script>
</head>
<body>
<p id = "txt"></p>

<div id="placeDiv"></div>
<br>
<br>
<br>

<div id="categoryDiv"></div>

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
			document.getElementById('placeDiv').appendChild(a);
			document.getElementById('placeDiv').appendChild(document.createElement('br'));
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
			a.href = "#";
			a.onclick = (function(place, category) {
		        return function() {
		        	displayMapMarker(place, category)
		        };
		    }(place, categoryArray[i]));
			document.getElementById('categoryDiv').appendChild(a);
			document.getElementById('categoryDiv').appendChild(document.createElement('br'));
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