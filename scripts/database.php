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

function get_home(){
	return 'localhost/nitelife';

}

function get_bar_info($slug){
	$barResults = mysql_query("SELECT * FROM bar WHERE slug='".$slug."'");
	$bar_info = mysql_fetch_array($barResults);
	
	$spResults = mysql_query("SELECT * FROM special WHERE bar_id IN (SELECT id FROM bar WHERE slug='".$slug."')");
	for ($specials = array(); $tmp = mysql_fetch_array($spResults);){
		$specials[$tmp['day']][] = $tmp;
	}
	
	$openResults = mysql_query("SELECT * FROM open_times WHERE bmysql_queryar_id IN (SELECT id FROM bar WHERE slug='".$slug."')");
	for ($open_times = array(); $tmp = mysql_fetch_array($openResults);){
		$open_times[$tmp['day']] = $tmp;
	}

	$all_info = array(
		"info" => $bar_info,
		"open_times" => $open_times,
		"specials" => $specials
	);
	
	return $all_info;
}

function admin_get_bars(){
	$result = mysql_query("SELECT * FROM bar");
	for ($bars = array(); $tmp = mysql_fetch_array($result);) $bars[] = $tmp;
	return $bars;

}

function admin_get_bar($slug){
	$result = mysql_query("SELECT * FROM bar WHERE slug='".$slug."'");
	return mysql_fetch_array($result);
}

function admin_update($id, $name, $slug, $address, $zip, $region, $desc, $fb, $twitter, $four, $user, $password, $phone){
	$query = "UPDATE bar SET name='".$name."', slug='".$slug."', address='".$address."', zipcode='"
			.$zip."', region='".$region."', description='".$desc."', facebook='".$facebook."', twitter='"
			.$twitter."', foursquare='".$foursquare."', username='".$user."', password='".$password."', 
			phone='".$phone."' WHERE id='$id'";
		
	$ok = mysql_query($query);
	if($ok) return true;
	else return false;
}

function admin_update_icon($id, $filename){
	$query = "UPDATE bar SET icon_url='".$filename."' WHERE id='".$id."'";
	echo $query;
	$ok = mysql_query($query);
	if($ok) return true;
	else return false;
}

function admin_update_banner($id, $filename){
	$query = "UPDATE bar SET banner_url='".$filename."' WHERE id='".$id."'";
	$ok = mysql_query($query);
	if($ok) return true;
	else return false;

}





?>
