<?php

// will change this later to be location specific.  
// For now it grabs all of the bars.
$bars = get_bars();


?>


	<div class="content">
			<div id="location-nav">
				<div id="location-nav-list" class="active-location-nav"><i class="icon-th-list"></i></div>
				<div id="location-nav-map"><i class="icon-map-marker"></i></div>
			</div>
		<input id="location-search" placeholder="search locations" onkeydown="if (event.keyCode == 13) { getBarsWithSearch(); return false; }"/>
		
		<div id="map-section" style="width:300px; background-color:blue; display:none; position:fixed; top:30px;" >
			<div id="nested-map-section" style="width:100%; height:100%"></div>
		</div>
		
		<input type="hidden" id="current-lat" value="" />
		<input type="hidden" id="current-lng" value="" />
		<input type="hidden" id="number-of-bars" value="0" />
		
		<div id="nearby-locations">
		</div>


	</div>



