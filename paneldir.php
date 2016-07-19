<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<script src="http://ajax.googleapis.com/ajax/libs/angularjs/1.4.8/angular.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<script>
var app = angular.module('myDataApp',[]);
app.controller('myDataController',function($scope, $http){
   $http.get("http://192.168.1.237/sfbike/scripts/getMyData.php")
      .then(function(response){$scope.bikes = response.data.bikes;});
   $http.get("http://192.168.1.237/sfbike/scripts/getCount.php")
      .then(function(response){$scope.count = response.data.count;});
   $scope.bikeNum="3";
   $scope.bikeBrand="Bianchi";
   $scope.bikeModel="Campione De Italia";
});
/*<?php
$fsconnect=mysqli_connect("localhost","dbagent","patches","testdb");
$getBikeQuery="select num from mydata";
$bikeresult = $fsconnect->query($getBikeQuery);
?>
*/
</script>
<script src="bikeDirective.js"></script>
<style>
</style>
</head>
</body>
<div ng-app="myDataApp" ng-controller="myDataController">
<data-bike-directive></data-bike-directive>
</div>
</body>
</html>
