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
	$scope.indexNumbers=["3","4","5","8","9"];
});
<?php
function createTabAction($num){
   print "$(document).ready(function(){\n";
   print "\t$('#clickEdit" . $num . "').click(function(){\n";
   print "\t\t$('#panel" . $num . "').slideDown('slow');\n";
   print "\t});\n";
   print "});\n";
   print "$(document).ready(function(){\n";
   print "\t$('#clickHide" . $num . "').click(function(){\n";
   print "\t\t$('#panel" . $num . "').slideUp('slow');\n";
   print "\t});\n";
   print "});\n";
}

$fsconnect=mysqli_connect("localhost","dbagent","patches","testdb");
$getBikeQuery="select num from mydata";
$bikeresult = $fsconnect->query($getBikeQuery);

createTabAction(3);
createTabAction(4);
createTabAction(5);
createTabAction(8);
createTabAction(9);

?>
</script>
<script src='panel2.js'></script>
<style>
button{
   margin-top: 20px;
   margin-left: 20px;
}

.slider  {
    padding: 30px;
    display: none;
    text-align: left;
    background-color: #e5eecc;
    border: solid 1px #c3c3c3;
    width: 400px;
}
</style>
</head>
<body>
<?php
$bikeindex=array();
while($bikeInfo = $bikeresult->fetch_row()){
   array_push($bikeindex,$bikeInfo[0]);
}
?>
<div ng-app="myDataApp" ng-controller="myDataController">
   <!-- PANEL NG-REPEAT -->
	<div ng-repeat="indexNumber in indexNumbers">
		<div bike-directive></div>
	</div>
    </div>
</div>
</body>
</html>
