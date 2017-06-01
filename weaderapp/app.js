var app = angular.module("myApp", ["ngRoute","ngResource"]);

// app.config(['$qProvider', function ($qProvider) {
//     $qProvider.errorOnUnhandledRejections(false);
// }]);

app.config(function($routeProvider) {
	$routeProvider
	.when("/", {
		templateUrl: 'pages/home.html',
		controller: 'HomeCtrl',
	})
	.when("/forcast", {
		templateUrl: 'pages/forcast.html',
		controller: 'ForcastCtrl',
	})


})

app.service("myService", function() {
	this.city = "New York, NY";
	
})

app.controller("HomeCtrl", ["$scope","myService","$resource", function($scope, myService, $resource) {
	$scope.$watch('city',() => myService.city = $scope.city);
	$scope.city = myService.city;
}])

app.controller("ForcastCtrl", ["$scope", "myService","$resource","$http", function($scope, myService, $resource, $http) {
	
	 $http({
      url: "http://api.openweathermap.org/data/2.5/forecast/daily",
      method: "GET",
      params: {q: "Berlin", cnt:2,  appid: "8b9c91464edbe11301b8789a9e87c6c6"}
   }).then(function(response){
        $scope.weatherResults = response.data; 
        console.log($scope.weatherResults);
   });


	
}])


