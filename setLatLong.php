<?php
require('scripts/database.php');

$result = mysql_query("SELECT name, address, slug FROM bar");
for ($bars = array(); $tmp = mysql_fetch_array($result);) $bars[] = $tmp;













?>

<!DOCTYPE html>
<html>
<head>
	<script src="http://maps.googleapis.com/maps/api/js?key=AIzaSyBtoUkFZDAjp_11DUBQB6pfzi6anr00aLc&sensor=false"></script>
	<script type="application/javascript" src="js/maps.js"></script>

</head>

<body>
	<?=$bars[0]['address']?>
	<input type="button" value="clickme" onclick="getLatLong('<?=$bars[0]['address']?>')" />
</body>
</html>

