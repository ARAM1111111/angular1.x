
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
<script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.6.4/angular-route.js"></script>
<!-- <script src="app.js"></script> -->
<style>
	
	
</style>
	<title>Templathing</title>
</head>
<body> 
<a href="#">Home</a>
<a href="#!/test">Test</a>
<a href="#!/about">About</a>
<a href="#!/page">Page</a>

<div ng-view></div>
	

<script>
var app = angular.module("myApp", ['ngRoute']);
app.config(function($routeProvider) {
	$routeProvider
	.when("/",{
		templateUrl: 'pages/home.php',
		controller: 'UserCtrl',
	})
	.when("/test", {
		templateUrl: 'pages/test.php',
		controller: 'TestCtrl',
	})
	.when("/about",{
		templateUrl: 'pages/about.html',
		controller: 'AboutCtrl',
	})
	.when("/page/:num", {
		templateUrl: 'pages/about.php',
		controller: 'PageCtrl',
	})
	
})

app.service("myService", function() {
	this.name = "Aram Hakverdyan";
	this.namelength = () => this.name.length;
})

app.controller("UserCtrl", ["$scope","$log","myService", function($scope,$log,myService) {
	 $scope.name ="Home";

	 $scope.$watch('serv',() => myService.name = $scope.serv);

	 $scope.serv = myService.name;

}]);
app.controller("TestCtrl", ["$scope","$log","myService", function($scope,$log,myService) {
	$scope.name ="Test";

	$scope.$watch('serv',() => myService.name = $scope.serv);

	$scope.serv = myService.name;

}]);
app.controller("AboutCtrl", ["$scope","$log","myService", function($scope,$log,myService) {
	$scope.name ="About";
	$scope.serv = myService.name;

}]);
app.controller("PageCtrl", ["$scope","$log","$routeParams","myService", function($scope, $log,$routeParams, myService) {
	$scope.num = $routeParams.num || 1;

	// $log.log(myService.name);
	// $log.log(myService.namelength());
	$scope.serv = myService.name;


}]);
</script>
</body>
</html>