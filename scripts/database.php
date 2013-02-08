<?php

/*
if(isset($_GET['location'])){
	
	$location = $_GET['location'];
	echo "I HAS A LOCATION ";
	echo $location;
	

}
*/


$con = mysql_connect("localhost","root","");
if (!$con)
{
	die('Could not connect: ' . mysql_error());
}

mysql_select_db("nitelife", $con);


function get_bars(){

	$result = mysql_query("SELECT name, address, slug FROM bar");
	for ($bars = array(); $tmp = mysql_fetch_array($result);) $bars[] = $tmp;
	return $bars;

}




?>
