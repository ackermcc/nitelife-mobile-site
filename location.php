<?php

// will change this later to be location specific.  
// For now it grabs all of the bars.
$bars = get_bars();


?>


	<div class="content">
		<!-- <input id="location-search" placeholder="search locations" onkeydown="if (event.keyCode == 13) { getBarsWithSearch(); return false; }"/> -->
		
		<div id="map-section">
			<div id="nested-map-section"></div>
		</div>
		
		<input type="hidden" id="current-lat" value="" />
		<input type="hidden" id="current-lng" value="" />
		<input type="hidden" id="number-of-bars" value="0" />
		
		<div id="nearby-locations">
		</div>


	</div>



