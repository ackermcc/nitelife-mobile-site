<?php

require('authenticate.php');

if($_GET['search']){

	getBarsWithSearch($_GET['search'], $_GET['lat'], $_GET['lng']);
	
}elseif($_GET['lat'] && $_GET['lng']){

	getClosestBars($_GET['lat'], $_GET['lng'], $_GET['start']);

}

function getBarsWithSearch($search, $lat, $lng){

	global $db;
	
	if(isset($lat) && isset($lng) && $lat != 0 && $lng != 0)
		$getSearched = "CALL searchBarsWithLatLng('".$search."', ".$lat.", ".$lng.");";
	else	// if theyre not set or equal 0, dont get the distance
		$getSearched = "SELECT name, address, slug, icon_url, id FROM `bar` WHERE name LIKE '".$search."%'";

	
	$result = $db->query($getSearched) or die ('Error: '.$db->error);
	for ($bars = array(); $tmp = $result->fetch_assoc();) $bars[] = $tmp;
	
	free_results($db);
	
	$barinfo = array('search'=>$search,'bars'=>$bars);

	echo json_encode($barinfo);
	
}

function displayBars($bars){
	
	foreach($bars as $bar){
		?>
			<a class="bar-page-link" href="?bar=<?=$bar['slug']?>">
				<div id="<?=$bar['slug']?>" class="bar-location">
					<?php if($bar['icon_url'] && $bar['icon_url'] != ''){ ?>
						<div class="bar-icon"><img src="icons/<?=$bar['icon_url']?>" alt="" /></div>
					<?php }else{ ?>
						<div class="bar-icon"><img src="images/no-img-icon.jpg" alt=""/></div>
					<?php } ?>
					<div class="bar-info">
						<div class="bar-name truncate"><?=$bar['name']?></div>
						<div class="bar-address truncate"><?=$bar['address']?></div>
					</div>
					<div class="bar-miles"><?=round($bar['distance'], 1)?> mi</div>
				</div>
			</a>
				
	<? }

}

function free_results($db){

	if ($res = $db->store_result()) {
        printf("---\n");
        var_dump($res->fetch_assoc());
        $res->free();
    }
	while ($db->more_results() && $db->next_result());

}

function getClosestBars($lat, $lng, $start){

	global $db;
	$dist = 20.0;
	
	if($start == -1) $start = 0;
	
	// We know we have lat and long and that they are not 0. 
	// Other cases handled in js.
	//if($lat && $lng && abs($lat) > 0 && abs($lng) > 0){
	$getClosest = "CALL geodistNew(".$lat.", ".$lng.", ".$dist.", ".$start.");";
	$result = $db->query($getClosest) or die ('Error1: '.$db->error);
	
	//echo $getClosest;
	
	$bars = array();
	while($row = $result->fetch_assoc()){
		$bars[] = $row;
	}
	$result->free();
	
	free_results($db);
	
	if(count($bars) > 0){
	
		echo json_encode(array('random' => false, 'bars' => $bars));
		//displayBars($bars);
		
	}else{
	
		//echo "Sorry there are no bars nearby.  Here are some random bars!";
		
		$getRandom = "CALL getrandom(".$lat.", ".$lng.");";
		$result = $db->query($getRandom) or die ('Error2: '.$db->error);
		
		$bars = array();
		while($row = $result->fetch_assoc()){
			$bars[] = $row;
		}
		$result->free();
		
		free_results($db);
		
		if(count($bars) > 0){
			//displayBars($bars);
			echo json_encode(array('random' => true, 'bars' => $bars));
		}
		

	}
	
	
}

function get_bars(){

	global $db;
	//$result = mysql_query("SELECT name, address, slug, icon_url, id FROM bar");
	//$bars = array();
	//while($row = $result->fetch_assoc()){
	//	$bars[] = $row;
	//}
	
	$result = $db->query("SELECT name, address, slug, icon_url, id FROM bar") or die ('Error3: '.$db->error);
	for ($bars = array(); $tmp = $result->fetch_assoc();) $bars[] = $tmp;
	
	return $bars;

}

function get_home(){
	return 'localhost/nitelife';

}

function get_bar_info($slug){

	global $db;
	
	$barResults = $db->query("SELECT * FROM bar WHERE slug='".$slug."'") or die ('Error4: '.$db->error);
	$bar_info = $barResults->fetch_assoc();
	
	//$barResults = mysql_query("SELECT * FROM bar WHERE slug='".$slug."'");
	//$bar_info = mysql_fetch_array($barResults);
	
	//$spResults = mysql_query("SELECT * FROM special WHERE bar_id IN (SELECT id FROM bar WHERE slug='".$slug."')");
	$spResults = $db->query("SELECT * FROM special WHERE bar_id IN (SELECT id FROM bar WHERE slug='".$slug."')");
	
	if($spResults){
		for ($specials = array(); $tmp = $spResults->fetch_assoc();){
			$specials[$tmp['day']][] = $tmp;
		}
	}
	
	//$openResults = mysql_query("SELECT * FROM open_times WHERE bar_id IN (SELECT id FROM bar WHERE slug='".$slug."')");
	$openResults = $db->query("SELECT * FROM open_times WHERE bar_id IN (SELECT id FROM bar WHERE slug='".$slug."')");
	if($openResults){
		for ($open_times = array(); $tmp = $openResults->fetch_assoc();){
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
	
	global $db;
	
	$result = $db->query("SELECT * FROM bar");
	//$result = mysql_query("SELECT * FROM bar");
	for ($bars = array(); $tmp = $result->fetch_assoc();) $bars[] = $tmp;
	return $bars;

}

function admin_get_bar($slug){

	global $db;
	
	$result = $db->query("SELECT * FROM bar WHERE slug='".$slug."'");
	//$result = mysql_query("SELECT * FROM bar WHERE slug='".$slug."'");
	return $result->fetch_assoc();
}

function admin_update($id, $name, $slug, $address, $zip, $region, $desc, $fb, $twitter, $four, $user, $password, $phone){

	global $db;
	
	$query = "UPDATE bar SET name='".$name."', slug='".$slug."', address='".$address."', zipcode='"
			.$zip."', region='".$region."', description='".$desc."', facebook='".$fb."', twitter='"
			.$twitter."', foursquare='".$four."', username='".$user."', password='".$password."', 
			phone='".$phone."' WHERE id='$id'";
	$ok = $db->query($query);
	if($ok) return true;
	else return false;
}

function admin_update_icon($id, $filename){

	global $db;

	$query = "UPDATE bar SET icon_url='".$filename."' WHERE id='".$id."'";
	$ok = $db->query($query);
	if($ok) return true;
	else return false;
}

function admin_update_banner($id, $filename){

	global $db;

	$query = "UPDATE bar SET banner_url='".$filename."' WHERE id='".$id."'";
	$ok = $query->fetch_assoc();
	if($ok) return true;
	else return false;

}

function admin_get_specials($slug){

	global $db;

	$id = get_id_from_slug($slug);
	$specialsquery = "SELECT * FROM special WHERE bar_id='".$id."'";
	$results = $db->query($specialsquery);
	
	for ($specials = array(); $tmp = $results->fetch_assoc();) $specials[] = $tmp;

	return $specials;
}

function admin_get_opentimes($slug){

	global $db;

	$id = get_id_from_slug($slug);
	$query = "SELECT * FROM open_times WHERE bar_id='".$id."'";
	$results = $db->query($query);
	
	for ($opentimes = array(); $tmp = $results->fetch_assoc();) $opentimes[] = $tmp;
	
	return $opentimes;

}

function get_id_from_slug($slug){
	global $db;
	$query = "SELECT id FROM bar WHERE slug='".$slug."'";
	$results = $db->query($query);
	$id = $results->fetch_assoc();
	return $id['id'];
}

function admin_add_opentimes($id, $days, $times){
	global $db;
	foreach($days as $day){
		$query = "INSERT INTO open_times (`bar_id`, `day`, `times`) VALUES ('".$id."', '".$day."', '".$times."')";
		$ok = $db->query($query);
	}
}

function admin_remove_opentimes($ids){
	global $db;
	foreach($ids as $id){
		$query = "DELETE FROM open_times WHERE id='".$id."'";
		$ok = $db->query($query);
	}
}

function admin_add_specials($id, $name, $times, $startdate, $enddate, $days, $all_day=0){
	global $db;
	foreach($days as $day){
		$query = "INSERT INTO special (`bar_id`, `name`, `date_start`, `date_end`, `times`, `day`, `all_day`)
				VALUES ('".$id."', '".$name."', '".$startdate."', '".$enddate."', '".$times."', '".$day."', '".$all_day."')";
				$ok = $db->connect($query);
	}
} 

function admin_add_bar($name, $slug, $address, $zip, $region, $desc, $fb, $twit, $four, $user, $pass, $phone){
	global $db;
	$query = "INSERT INTO bar (`name`, `slug`, `address`, `zipcode`, `region`, `description`, `facebook`, `twitter`, `foursquare`, `username`, `password`, `phone`) 
				values ('".$name."', '".$slug."', '".$address."', '".$zipcode."', '".$region."', '".$desc."', 
					'".$fb."', '".$twit."', '".$four."', '".$user."', '".$pass."', '".$phone."')";
	$success = $db->query($query);
	return $db->insert_id();
}

function admin_delete_specials($ids){
	global $db;
	foreach($ids as $id){
		$query = "DELETE FROM special WHERE id='".$id."'";
		$ok = $db->query($query);
	}
}

function admin_delete_bars($ids){
	global $db;
	foreach($ids as $id){
		$query = "DELETE FROM bar WHERE id='".$id."'";
		$ok = $db->query($query);
	}
	
}

function get_bars_and_specials($day){
	
	global $db;
	$query_for_bars = "SELECT slug, name, id FROM `bar` WHERE id IN (SELECT bar_id FROM `special` WHERE day='".$day."') ORDER BY RAND() LIMIT 8";
	$results = $db->query($query_for_bars);
	
	for ($bars = array(); $tmp = $results->fetch_assoc();) $bars['bars'][] = $tmp;

	// Now get all the specials for these bars
	$all_specials = array();
	
	if(count($bars['bars']) > 0){
		foreach($bars['bars'] as $bar){
			
			$query_for_specials = "SELECT * FROM `special` WHERE bar_id='".$bar['id']."' AND day='".$day."'";
			$results = $db->query($query_for_specials);
			for ($specials = array(); $tmp = $results->fetch_assoc();) $specials[] = $tmp;
			$all_specials[$bar['id']][] = $specials;
			
		}	
		$bars['specials'] = $all_specials;
	}
	return $bars;

}





?>
