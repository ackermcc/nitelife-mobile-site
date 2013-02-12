<?php

// will change this later to be location specific.  
// For now it grabs all of the bars.
$bars = get_bars();


?>


	<div class="content">

		
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
					<div class="bar-info">
						<div class="bar-name truncate"><?=$bar['name']?></div>
					</div>
				</div>
			</a>
				
		<? } ?>

	</div>



