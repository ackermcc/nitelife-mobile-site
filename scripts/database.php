<?php

require('authenticate.php');

if($_GET['lat'] && $_GET['lng']){

getClosestBars($_GET['lat'], $_GET['lng'], $_GET['start']);


}elseif($_GET['search']){

	getBarsWithSearch($_GET['search']);
	
}

function getBarsWithSearch($search){

	$getSearched = "SELECT name, address, slug, icon_url, id FROM `bar` WHERE name LIKE '".$search."%'";
	$result = mysql_query($getSearched);
	for ($bars = array(); $tmp = mysql_fetch_array($result);) $bars[] = $tmp;
	if(count($bars) != 0){
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
						<div class="bar-miles"></div>
					</div>
				</a>
					
			<? }
	}else{
		echo "Sorry there are no bars with that name";
	
	}
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
	
	//$lat = 0;
	//$lng = 0;
	
	// $lng = -84.516404;
	// $lat = 39.1275712;
	
	if($start == -1) $start = 0;
	
	// We know we have lat and long and that they are not 0. 
	// Other cases handled in js.
	//if($lat && $lng && abs($lat) > 0 && abs($lng) > 0){
	$getClosest = "CALL geodist(".$lat.", ".$lng.", ".$dist.", ".$start.");";
	$result = $db->query($getClosest) or die ('Error: '.$db->error);
	
	//echo $getClosest;
	
	$bars = array();
	while($row = $result->fetch_assoc()){
		$bars[] = $row;
	}
	$result->free();
	
	free_results($db);
	
	if(count($bars) > 0){
	
		displayBars($bars);
		
	}else{
	
		echo "Sorry there are no bars nearby.  Here are some random bars!";
		
		$getRandom = "CALL getrandom(".$lat.", ".$lng.");";
		$result = $db->query($getRandom) or die ('Error: '.$db->error);
		
		$bars = array();
		while($row = $result->fetch_assoc()){
			$bars[] = $row;
		}
		$result->free();
		
		free_results($db);
		
		if(count($bars) > 0){
			displayBars($bars);
		}
		

	}
	
	
}

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

function get_bars_and_specials($day){

	$query_for_bars = "SELECT slug, name, id FROM `bar` WHERE id IN (SELECT bar_id FROM `special` WHERE day='".$day."') ORDER BY RAND() LIMIT 8";
	$results = mysql_query($query_for_bars);
	
	for ($bars = array(); $tmp = mysql_fetch_array($results);) $bars['bars'][] = $tmp;

	// Now get all the specials for these bars
	$all_specials = array();
	
	if(count($bars['bars']) > 0){
		foreach($bars['bars'] as $bar){
			
			$query_for_specials = "SELECT * FROM `special` WHERE bar_id='".$bar['id']."' AND day='".$day."'";
			$results = mysql_query($query_for_specials);
			for ($specials = array(); $tmp = mysql_fetch_array($results);) $specials[] = $tmp;
			$all_specials[$bar['id']][] = $specials;
			
		}	
		$bars['specials'] = $all_specials;
	}
	return $bars;

}





?>
