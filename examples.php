
<!DOCTYPE html>
<html ng-app="myApp">
<head>
	<meta charset="UTF-8">
	
	<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
	<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

<!-- Optional theme -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">
<!-- Latest compiled and minified JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
<script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.6.4/angular.js"></script>
<!-- <script src="app.js"></script> -->
<style>
	
	
</style>
	<title></title>
</head>
<body ng-controller="UserCtrl" > 
<form ng-submit="addName()">
	<input type="text" ng-model="name">
	<button type="submit">ADD</button>
</form>
<ul>
	<li ng-repeat="name in names track by $index">
		{{name}}
		<a href="#" ng-click="removeName(name)">Remove</a>
	</li>
</ul>

<br>SEARCH <input type="text" ng-model="query">
<table class="table table-bordered">
	<tr>
		<td><a ng-click="sortField='name';reverse=!reverse">Name</a></td>
		<td><a ng-click="sortField='population';reverse=!reverse">Population</a></td>
	</tr>
	<tr ng-repeat="count in country | filter:query | orderBy:sortField:reverse">
		<td>{{count.name}}</td>
		<td>{{count.population}}</td>
	</tr>
</table>

<script>
var app = angular.module("myApp", []);
app.controller("UserCtrl", ["$scope", "$timeout","$http", function($scope,  $timeout, $http){
	$scope.country = [
		{"name" : "Armenia", "population": 2000000},
		{"name" : "Zambia", "population": 80000},
		{"name" : "Germany", "population": 200000000},
		{"name" : "Russia", "population": 500000000},
		{"name" : "USE", "population": 800000000},
		{"name" : "France", "population": 400000000},
	]





	// $scope.country = null;
	// $http.get("country.json").then(function(resp) {
	// 	$scope.country = angular.fromJson(resp);
	// 	console.log($scope.country);
	// });

	//  $scope.country = $http.get("country.json", { transformResponse: [function (data) { return data; }] })
	// console.log($scope.country);

	
	$scope.addName = () => {
		$scope.names.push($scope.name);
		$scope.name = "";
	}

	$scope.removeName = (name) => {
		var elem = $scope.names.indexOf(name);
		$scope.names.splice(elem,1);
	}


	
}])
</script>
</body>
</html>