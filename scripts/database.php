<?php

$con = mysql_connect("localhost","root","");
if (!$con)
{
	die('Could not connect: ' . mysql_error());
}

mysql_select_db("nitelife", $con);


function get_bars(){

	$result = mysql_query("SELECT name, address, slug, icon_url, id FROM bar");
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
	if($spResults){
		for ($specials = array(); $tmp = mysql_fetch_array($spResults);){
			$specials[$tmp['day']][] = $tmp;
		}
	}
	
	$openResults = mysql_query("SELECT * FROM open_times WHERE bar_id IN (SELECT id FROM bar WHERE slug='".$slug."')");
	if($openResults){
		for ($open_times = array(); $tmp = mysql_fetch_array($openResults);){
			$open_times[$tmp['day']] = $tmp;
		}
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
			.$zip."', region='".$region."', description='".$desc."', facebook='".$fb."', twitter='"
			.$twitter."', foursquare='".$four."', username='".$user."', password='".$password."', 
			phone='".$phone."' WHERE id='$id'";
	$ok = mysql_query($query);
	if($ok) return true;
	else return false;
}

function admin_update_icon($id, $filename){
	$query = "UPDATE bar SET icon_url='".$filename."' WHERE id='".$id."'";
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

function admin_get_specials($slug){
	$id = get_id_from_slug($slug);
	$specialsquery = "SELECT * FROM special WHERE bar_id='".$id."'";
	$results = mysql_query($specialsquery);
	
	for ($specials = array(); $tmp = mysql_fetch_array($results);) $specials[] = $tmp;

	return $specials;
}

function admin_get_opentimes($slug){
	$id = get_id_from_slug($slug);
	$query = "SELECT * FROM open_times WHERE bar_id='".$id."'";
	$results = mysql_query($query);
	
	for ($opentimes = array(); $tmp = mysql_fetch_array($results);) $opentimes[] = $tmp;
	
	return $opentimes;

}

function get_id_from_slug($slug){
	$query = "SELECT id FROM bar WHERE slug='".$slug."'";
	$results = mysql_query($query);
	$id = mysql_fetch_array($results);
	return $id['id'];
}

function admin_add_opentimes($id, $days, $times){
	foreach($days as $day){
		$query = "INSERT INTO open_times (`bar_id`, `day`, `times`) VALUES ('".$id."', '".$day."', '".$times."')";
		$ok = mysql_query($query);
	}
}

function admin_remove_opentimes($ids){
	foreach($ids as $id){
		$query = "DELETE FROM open_times WHERE id='".$id."'";
		$ok = mysql_query($query);
	}
}

function admin_add_specials($id, $name, $times, $startdate, $enddate, $days, $all_day=0){
	foreach($days as $day){
		$query = "INSERT INTO special (`bar_id`, `name`, `date_start`, `date_end`, `times`, `day`, `all_day`)
				VALUES ('".$id."', '".$name."', '".$startdate."', '".$enddate."', '".$times."', '".$day."', '".$all_day."')";
				$ok = mysql_query($query);
	}
} 

function admin_add_bar($name, $slug, $address, $zip, $region, $desc, $fb, $twit, $four, $user, $pass, $phone){
	$query = "INSERT INTO bar (`name`, `slug`, `address`, `zipcode`, `region`, `description`, `facebook`, `twitter`, `foursquare`, `username`, `password`, `phone`) 
				values ('".$name."', '".$slug."', '".$address."', '".$zipcode."', '".$region."', '".$desc."', 
					'".$fb."', '".$twit."', '".$four."', '".$user."', '".$pass."', '".$phone."')";
	$success = mysql_query($query);
	return mysql_insert_id();
}

function admin_delete_specials($ids){
	foreach($ids as $id){
		$query = "DELETE FROM special WHERE id='".$id."'";
		$ok = mysql_query($query);
	}
}

function admin_delete_bars($ids){
	foreach($ids as $id){
		$query = "DELETE FROM bar WHERE id='".$id."'";
		$ok = mysql_query($query);
	}
	
}

function get_bar_specials(){
	$query = "SELECT id FROM bar";
	$results = mysql_query($query);
	for ($barids = array(); $tmp = mysql_fetch_array($results);) $barids[] = $tmp;

	$specials = array(); 

	foreach ($barids as $barid){
		$specialquery = "SELECT special.* FROM special WHERE bar_id='".$barid['id']."'";
		$specialresults = mysql_query($specialquery);
		for ($specials[$barid['id']] = array(); $tmp = mysql_fetch_array($specialresults);){
			$specials[$barid['id']][$tmp['day']][] = $tmp;
		}
	}
	return $specials;
	
}





?>
