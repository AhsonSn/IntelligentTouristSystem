// const tempArray = [
// 	{
//   	location: 'mumbai',
//     category: 'abc'
//   },
//   {
//   	location: 'delhi',
//     category: 'abcd'
//   },
//   {
//   	location: 'mumbai',
//     category: 'pqr'
//   },
//   {
//   	location: 'chennai',
//     category: 'xyz'
//   },
//   {
//   	location: 'banglore',
//     category: 'lmn'
//   }
// ];

// var genderResult = fuzzyGender("PUT COMPLETE DATA HERE"," DYNAMIC GENDER GIVEN BY USER");
// var ageGroupResult = fuzzyAgeGrp(genderResult, "DYNAMIC AGE GROUP GIVEN BY USER");
// var budgetResult = fuzzyBudget(ageGroupResult, "DYNAMIC BUGDET BIVEN BY USER");
// var climateResult = fuzzyClimate(budgetResult, "DYNAMIC CLIMATE PREFERENCES GIVEN BY USER");

// var finalDisplayArray = findLocationCat(climateResult);
// now finalDisplayArray can be used to display results.

function fuzzyGender(dataArray, genderString) {
	var options = {
    shouldSort: true,
    threshold: 0.0,
    location: 0,
    distance: 100,
    maxPatternLength: 20,
    minMatchCharLength: 1,
    keys: ["gender"]
  };
  var fuse = new Fuse(dataArray, options); // "dataArray" is the item array
  return fuse.search(genderString);
}

function fuzzyAgeGrp(dataArray, ageGrpString) {
	var options = {
    shouldSort: true,
    threshold: 0.1,
    location: 0,
    distance: 100,
    maxPatternLength: 20,
    minMatchCharLength: 1,
    keys: ["age"]
  };
  var fuse = new Fuse(dataArray, options); // "dataArray" is the item array
  return fuse.search(ageGrpString);
}

function fuzzyBudget(dataArray, budgetString) {
	var options = {
    shouldSort: true,
    threshold: 0.1,
    location: 0,
    distance: 100,
    maxPatternLength: 20,
    minMatchCharLength: 1,
    keys: ["budget"]
  };
  var fuse = new Fuse(dataArray, options); // "dataArray" is the item array
  return fuse.search(budgetString);
}

function fuzzyClimate(dataArray, climateString) {
	var options = {
    shouldSort: true,
    threshold: 0.1,
    location: 0,
    distance: 100,
    maxPatternLength: 20,
    minMatchCharLength: 1,
    keys: ["climate"]
  };
  var fuse = new Fuse(dataArray, options); // "dataArray" is the item array
  return fuse.search(climateString);
}

// function that returns Categories which are mapped with location

// function findLocationCat(tempArray) {
//   const  placeArray = _.map(_.uniqBy(tempArray, 'place'), 'place');
//   const placeCategoryArray = [];
//   for(var i in placeArray) {
//     const categoryArray = (_.map(_.filter(tempArray, (placeData) => {
//       return placeData.place === placeArray[i];
//     }), 'category'));
//     var jsonObj = {};
//     const loc = placeArray[i];
//     console.log(loc, 'location');
//     jsonObj[loc] = categoryArray;
//     placeCategoryArray.push(jsonObj);
//   }
//   return placeCategoryArray;
// }

