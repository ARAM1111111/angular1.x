
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
	<title>ISERT AND SELECT DATA</title>
</head>
<body ng-controller="UserCtrl" ng-init="displayData()" ng-cloak> 
<div class="container" style="width: 500px;">
	<h3 align="center">Insert data into php</h3>
	<label for="name">First Name</label>
	<input type="text" id="name" name="name" ng-model="name" class="form-controll">
	<div style="color: red" ng-show="shown">Name Required</div>
	<br/>
	<label for="lname">Last Name</label>
	<input type="text" id="lname" name="lname" ng-model="lname" class="form-controll">
	<div style="color: red" ng-show="showln">Lname Required</div>
	<br/>
	<input type="file" file-input="files"><button class="btn btn-info" ng-click="uploadFile()">UPLOAD</button>
	<br>
	<input type="hidden" ng-model="id">
	<input type="submit" name="btnInsert" class="btn btn-info" ng-click="insertData()" value="{{btnName}}">
	<br/>
	<table class="table table-bordered">
		<tr>
			<th>NAME</th>
			<th>LAST NAME</th>
			<th>IMAGE</th>
		</tr>
		<tr ng-repeat="d in res.data">
			<td>{{d.name}}</td>
			<td>{{d.lname}}</td>
			<td>{{d.img}}</td>
			<td><button class="btn btn-info" ng-click="updateDate(d.id,d.name,d.lname)">UPDATE</button></td>
			<td><button class="btn btn-warning" ng-click="delDate(d.id)">DELETE</button></td>
		</tr>
	</table>
	<!-- <h1 ng-repeat="r in res.data">{{r}}</h1> -->
	<!-- <h1>{{res.data}}</h1> -->
</div>
	

<script>
var app = angular.module("myApp", []);
app.directive("fileInput", function($parse) {
	return{
		link: function($scope, element, attrs) {
			element.on("change",function(event) {
				var files = event.target.files;
				// console.log(files[0].name);
				$parse(attrs.fileInput).assign($scope,element[0].files);
				$scope.$apply();	

			})
		}
	}
})
app.controller("UserCtrl", ["$scope", "$http", function($scope,$http) {
	$scope.btnName = "ADD";
	$scope.insertData = function() {
		if ($scope.name == null) {
			$scope.shown = true;
		} else if ($scope.lname == null) {
			$scope.showln = true;
		} else {
			$http.post("insert_proc.php", {"name":$scope.name, "lname":$scope.lname,"btn":$scope.btnName,"id":$scope.id})
			.then(function(resp) {
				
				$scope.name = null;
				$scope.lname = null;
				$scope.shown = false;
				$scope.showln = false;
				$scope.btnName = "ADD";
				$scope.displayData();
			})
		}

		
	} 

	$scope.displayData = function() {
		$http.get("select_proc.php").then(function(data) {
			$scope.res = data;
		});
	}

	$scope.updateDate = function(id, name, lname) {
		$scope.id = id;
		$scope.name = name;
		$scope.lname = lname;
		$scope.btnName = "Update";

	}

	$scope.delDate =  function(id) {
		$http.post("insert_proc.php",{"id":id, "btn":"del"})
		.then(function(resp) {
			console.log(resp)
			$scope.displayData();
		})
	}

	$scope.uploadFile = function() {
		var form_data = new FormData();
		angular.forEach($scope.files, function(file){
			form_data.append("file", file);
		});
		$http.post("uload.php", form_data, {
			transformRequest: angular.identity,
			headers:{"Content-Type":undefined, "Process-Data": false}
		}).then(function(resp) {
			
			console.log(resp);
		})
	}
	
}]);
</script>
</body>
</html>