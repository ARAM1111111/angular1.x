
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
<script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.6.4/angular.min.js"></script>
<!-- <script src="app.js"></script> -->
<style>
	
	
</style>
	<title>Dynamic dropdown</title>
</head>
<body ng-controller="UserCtrl" ng-init="loadCountry()" ng-cloak> 
<br><br>
<div class="container" style="width: 600px;">
	<h3>Dynamic dropdown</h3>
	<br>
	<select name="country" ng-model="country" ng-change="loadState()" ">
		<option value="">SELECT COUNTRY</option>
		<option  ng-repeat="country in countries" value="{{country.id}}">{{country.name}}</option>	
	</select><br>
	<select name="state" ng-model="state">
		<option value="">SELECT STATE</option>
		<option  ng-repeat="state in states" value="{{state.id}}">{{state.name}}</option>
	</select>
</div>

<script>
var app = angular.module("myApp", [])
.controller("UserCtrl", function($scope, $http) {
	$scope.loadCountry = () => {
		$http.get("load_country.php")
		.then(function(data) {
			$scope.countries = data.data;
			// console.log($scope.countries);
		})
	}

	$scope.loadState = () => {
		$http.post("loadstate.php ", {"country_id":$scope.country})
		.then(function(data) {
			$scope.states = data.data;
			 // console.log($scope.states);

		})
	}
})
</script>
</body>
</html>