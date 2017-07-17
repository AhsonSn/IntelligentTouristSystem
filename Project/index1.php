
<!DOCTYPE html>
<head>
<title>
Fuzzy
</title>
<link rel="stylesheet" type="text/css" href="Styles/mystyle.css">
<script src="loadash.js"></script>
<script src="fuse.js"></script>
<script src="fuzzyUtils.js"></script>

<script type="text/javascript">

	function findLocationCat(tempArray) {
	  try {
	  	const  placeArray = _.map(_.uniqBy(tempArray, 'place'), 'place');
		const placeCategoryArray = [];
		for(var i in placeArray) {
			const categoryArray = (_.map(_.filter(tempArray, (placeData) => {
			  return placeData.place === placeArray[i];
			}), 'category'));
			var categoryArrayUniq = _.uniq(categoryArray);
			var jsonObj = {};
			const loc = placeArray[i];
			jsonObj[loc] = categoryArrayUniq;
			placeCategoryArray.push(jsonObj);
		}
		return placeCategoryArray;	
	  } catch(e) {
	  	return [];
	  }
	}


</script>

</head>
<body >
<div id = "op">Some random Value</div>
 <?php
	
	$con = mysql_connect("localhost","root","");
	if(!$con){
		echo "Cannot connect to database";
	}
	mysql_select_db("jsondatabase");
	$query = "Select * FROM jsondata";
	$result = mysql_query($query);

	?>
	<script type="text/javascript">
		var newArray = [];
		<?php while ($row = mysql_fetch_assoc($result)) {?>
			//echo $row['key1']." ".$row['value']."<br>";
			newArray.push('<?php echo $row['value']; ?>');
		<?php }?>

		
		var jsonArray = [];
		for(var j in newArray){
			jsonArray.push(JSON.parse(newArray[j]));
		}
		
		var genderResult = fuzzyGender(jsonArray,"male");
		//console.log(genderResult);
		var ageGroupResult = fuzzyAgeGrp(genderResult, "15-30");
		var budgetResult = fuzzyBudget(ageGroupResult, "76+");
		var climateResult = fuzzyClimate(budgetResult, "snowy");
		console.log(climateResult);
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
		console.log(finalLocationCategory);
		//localStorage.setItem('locationCategoryMapping', JSON.stringify(finalLocationCategory));
	</script>
	
	
</script>
</body>
</html>