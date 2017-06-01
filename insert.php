
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
	<title></title>
</head>
<body ng-controller="UserCtrl" ng-cloak> 
<div class="container" style="width: 500px;">
	<h3 align="center">Insert data into php</h3>
	<label for="name">First Name</label>
	<input type="text" id="name" name="name" ng-model="name" class="form-controll">
	<br/>
	<label for="lname">Last Name</label>
	<input type="text" id="lname" name="lname" ng-model="lname" class="form-controll">
	<br/>
	<input type="submit" name="btnInsert" class="btn btn-info" ng-click="insertData()" value="ADD">
</div>

	

<script>
var myApp = angular.module("myApp", []);
myApp.controller("UserCtrl",['$scope','$http',function($scope,$http) {
	$scope.proc = "Process";
	$scope.insertData = function() {
		$http.post("insert_proc.php",{'name':$scope.name,'lname':$scope.lname})
		.then(function(d) {
			// console.log(d);

			$scope.name = null;
			$scope.lname = null;

		})
	}	


}]);
</script>
</body>
</html>