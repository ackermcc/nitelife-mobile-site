<? 

	REQUIRE('scripts/database.php');

?>
<!DOCTYPE html>
<html>
<head>
	<script src="http://maps.googleapis.com/maps/api/js?key=AIzaSyBtoUkFZDAjp_11DUBQB6pfzi6anr00aLc&sensor=false"></script>
	<script type="application/javascript" src="js/maps.js"></script>

</head>

<body>
	<div id="googleMap" style="width:500px;height:380px;"></div>
	<div id="myDiv"></div>
	<button type="button" onclick="getBars()">click here</button>
</body>
</html>