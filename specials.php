<?php

// will change this later to be location specific.  
// For now it grabs all of the bars.
$bars = get_bars();

?>

<?php
//Getting bar info
$bar_info = get_bar_info($bar);
?>

<script type="text/javascript">
$(window).load(function(){
	var d = new Date();
	var day = d.getDay();

	var datePicker = function(){
		if (day == 0) {
			$(".specials-table").removeClass('active-day');
			$("table#sunday-specials").addClass('active-day');
			$(".date-picker1 td:last-child").addClass('active-date');
		} else if (day == 1) {
			$(".specials-table").removeClass('active-day');
			$("table#monday-specials").addClass('active-day');
			$(".date-picker1 td:nth-child(1)").addClass('active-date');
		} else if (day == 2) {
			$(".specials-table").removeClass('active-day');
			$("table#tuesday-specials").addClass('active-day');
			$(".date-picker1 td:nth-child(2)").addClass('active-date');
		} else if (day ==3 ) {
			$(".specials-table").removeClass('active-day');
			$("table#wednesday-specials").addClass('active-day');
			$(".date-picker1 td:nth-child(3)").addClass('active-date');
		} else if (day == 4) {
			$(".specials-table").removeClass('active-day');
			$("table#thursday-specials").addClass('active-day');
			$(".date-picker1 td:nth-child(4)").addClass('active-date');
		} else if (day == 5) {
			$(".specials-table").removeClass('active-day');
			$("table#friday-specials").addClass('active-day');
			$(".date-picker1 td:nth-child(5)").addClass('active-date');
		} else if (day == 6) {
			$(".specials-table").removeClass('active-day');
			$("table#saturday-specials").addClass('active-day');
			$(".date-picker1 td:nth-child(6)").addClass('active-date');
		}
	}

	datePicker();

	});

	</script>


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
			<a style="text-decoration: none;" href="?bar=<?=$bar['slug']?>">
				<div id="<?=$bar['slug']?>" class="bar-special-index">
					<div class="bar-name truncate2"><?=$bar['name']?></div>
						<table class="specials-table" id="monday-specials" border="0" cellspacing="0" cellpadding="0">
							<?php if($bar_info['specials']['M']){
								foreach($bar_info['specials']['M'] as $special){?>
									<tr valign="top">
										<td><div class="special"><?=$special['name']?></div></td>
										<td><div class="special-time"><?=$special['times']?></div></td>
									</tr>
							<?php 	}
							}else{ ?>
								<tr valign="top"><td class="null-special">Sorry there are no specials today. Bummer.<td></tr>
							<?php } ?>
						</table>
						<table class="specials-table" id="tuesday-specials" border="0" cellspacing="0" cellpadding="0">
							<?php if($bar_info['specials']['T']){
								foreach($bar_info['specials']['T'] as $special){?>
									<tr valign="top">
										<td><div class="special"><?=$special['name']?></div></td>
										<td><div class="special-time"><?=$special['times']?></div></td>
									</tr>
							<?php 	}
							}else{ ?>
								<tr><td class="null-special">Sorry there are no specials today. Bummer.<td></tr>
							<?php } ?>
						</table>
						<table class="specials-table" id="wednesday-specials" border="0" cellspacing="0" cellpadding="0">
							<?php if($bar_info['specials']['W']){
								foreach($bar_info['specials']['W'] as $special){?>
									<tr valign="top">
										<td><div class="special"><?=$special['name']?></div></td>
										<td><div class="special-time"><?=$special['times']?></div></td>
									</tr>
							<?php 	}
							}else{ ?>
								<tr><td class="null-special">Sorry there are no specials today. Bummer.<td></tr>
							<?php } ?>
						</table>
						<table class="specials-table" id="thursday-specials" border="0" cellspacing="0" cellpadding="0">
							<?php if($bar_info['specials']['H']){
								foreach($bar_info['specials']['H'] as $special){?>
									<tr valign="top">
										<td><div class="special"><?=$special['name']?></div></td>
										<td><div class="special-time"><?=$special['times']?></div></td>
									</tr>
							<?php 	}
							}else{ ?>
								<tr><td class="null-special">Sorry there are no specials today. Bummer.<td></tr>
							<?php } ?>
						</table>
						<table class="specials-table" id="friday-specials" border="0" cellspacing="0" cellpadding="0">
							<?php if($bar_info['specials']['F']){
								foreach($bar_info['specials']['F'] as $special){?>
									<tr valign="top">
										<td><div class="special"><?=$special['name']?></div></td>
										<td><div class="special-time"><?=$special['times']?></div></td>
									</tr>
							<?php 	}
							}else{ ?>
								<tr><td class="null-special">Sorry there are no specials today. Bummer.<td></tr>
							<?php } ?>
						</table>
						<table class="specials-table" id="saturday-specials" border="0" cellspacing="0" cellpadding="0">
							<?php if($bar_info['specials']['S']){
								foreach($bar_info['specials']['S'] as $special){?>
									<tr valign="top">
										<td><div class="special"><?=$special['name']?></div></td>
										<td><div class="special-time"><?=$special['times']?></div></td>
									</tr>
							<?php 	}
							}else{ ?>
								<tr><td class="null-special">Sorry there are no specials today. Bummer.<td></tr>
							<?php } ?>
						</table>
						<table class="specials-table" id="sunday-specials" border="0" cellspacing="0" cellpadding="0">
							<?php if($bar_info['specials']['U']){
								foreach($bar_info['specials']['U'] as $special){?>
									<tr valign="top">
										<td><div class="special"><?=$special['name']?></div></td>
										<td><div class="special-time"><?=$special['times']?></div></td>
									</tr>
							<?php 	}
							}else{ ?>
								<tr><td class="null-special">Sorry there are no specials today. Bummer.<td></tr>
							<?php } ?>
						</table>
					</div>
					<div class="see-more-specials">
							...
					</div>
				</a>
					
			<? } ?>

		</div>



