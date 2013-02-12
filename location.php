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
		
		<?php foreach($bars as $bar){
		/* 
		
		now, each of these bars needs to redirect to a url nitelife.com?bar=bar-slug.
		You can get the bar slug using <?=$bar['slug']?>
		So create the url like nitelife.com?bar=<?=$bar['slug']?>.  You can do this in javascript as
		a redirect or however you wish.  I will put logic in the index page that determines if there's a bar 
		slug present.

		*/
 		?>
			<a class="bar-page-link" href="?bar=<?=$bar['slug']?>">
				<div id="<?=$bar['slug']?>" class="bar-location">
					<?php if($bar['icon_url'] && $bar['icon_url'] != ''){ ?>
						<img src="images/<?=$bar['icon_url']?>" alt="" />
					<?php }else{ ?>
						<img src="images/no-img-icon.jpg" alt=""/>
					<?php } ?>
					<div class="bar-info">
						<div class="bar-name truncate"><?=$bar['name']?></div>
						<div class="bar-address truncate"><?=$bar['address']?></div>
					</div>
					<div class="bar-miles">0.3 mi</div>
				</div>
			</a>
				
		<? } ?>

	</div>



