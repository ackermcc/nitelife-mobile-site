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
			$("div.specials-table#sunday-specials").addClass('active-day');
			$(".date-picker1 td:last-child").addClass('active-date');
			$("#current-date").text("Sunday");
		} else if (day == 1) {
			$(".specials-table").removeClass('active-day');
			$("div.specials-table#monday-specials").addClass('active-day');
			$(".date-picker1 td:nth-child(1)").addClass('active-date');
			$("#current-date").text("Monday");
		} else if (day == 2) {
			$(".specials-table").removeClass('active-day');
			$("div.specials-table#tuesday-specials").addClass('active-day');
			$(".date-picker1 td:nth-child(2)").addClass('active-date');
			$("#current-date").text("Tuesday");
		} else if (day ==3 ) {
			$(".specials-table").removeClass('active-day');
			$("div.specials-table#wednesday-specials").addClass('active-day');
			$(".date-picker1 td:nth-child(3)").addClass('active-date');
			$("#current-date").text("Wednesday");
		} else if (day == 4) {
			$(".specials-table").removeClass('active-day');
			$("div.specials-table#thursday-specials").addClass('active-day');
			$(".date-picker1 td:nth-child(4)").addClass('active-date');
			$("#current-date").text("Thursday");
		} else if (day == 5) {
			$(".specials-table").removeClass('active-day');
			$("div.specials-table#friday-specials").addClass('active-day');
			$(".date-picker1 td:nth-child(5)").addClass('active-date');
			$("#current-date").text("Friday");
		} else if (day == 6) {
			$(".specials-table").removeClass('active-day');
			$("div.specials-table#saturday-specials").addClass('active-day');
			$(".date-picker1 td:nth-child(6)").addClass('active-date');
			$("#current-date").text("Saturday");
		}
	}

	datePicker();

	$("#prev-date").click(function() {
		day = day - 1;
		if (day < 0){
			day = 6;
		}else {
			
		}
		datePicker();
	});

	$("#next-date").click(function() {
		day = day + 1;
		if (day > 6){
			day = 0;
		}else {
			
		}
		datePicker();
	});

	});

	</script>


	<div class="content">

		<div class="specials-date-selector">
			<div id="prev-date"><i class="icon-chevron-left"></i></div>
			<div id="current-date">Thursday</div>
			<div id="next-date"><i class="icon-chevron-right"></i></div>
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
			<a style="text-decoration: none;" href="?bar=<?=$bar['slug']?>">
				<div id="<?=$bar['slug']?>" class="bar-special-index">
					<div class="bar-name truncate2"><?=$bar['name']?></div>
						<div class="specials-table" id="monday-specials" border="0" cellspacing="0" cellpadding="0">
							<?php if($bar_info['specials']['M']){
								foreach($bar_info['specials']['M'] as $special){?>
									<div class="special-row" valign="top">
										<div class="special"><?=$special['name']?></div>
										<div class="special-time"><?=$special['times']?></div>
									</div>
							<?php 	}
							}else{ ?>
								<div class="null-special">Sorry there are no specials today. Bummer.</div>
							<?php } ?>
						</div>
						<div class="specials-table" id="tuesday-specials" border="0" cellspacing="0" cellpadding="0">
							<?php if($bar_info['specials']['T']){
								foreach($bar_info['specials']['T'] as $special){?>
									<div class="special-row" valign="top">
										<div class="special"><?=$special['name']?></div>
										<div class="special-time"><?=$special['times']?></div>
									</div>
							<?php 	}
							}else{ ?>
								<div class="null-special">Sorry there are no specials today. Bummer.</div>
							<?php } ?>
						</div>
						<div class="specials-table" id="wednesday-specials" border="0" cellspacing="0" cellpadding="0">
							<?php if($bar_info['specials']['W']){
								foreach($bar_info['specials']['W'] as $special){?>
									<div class="special-row" valign="top">
										<div class="special"><?=$special['name']?></div>
										<div class="special-time"><?=$special['times']?></div>
									</div>
							<?php 	}
							}else{ ?>
								<div class="null-special">Sorry there are no specials today. Bummer.</div>
							<?php } ?>
						</div>
						<div class="specials-table" id="thursday-specials" border="0" cellspacing="0" cellpadding="0">
							<?php if($bar_info['specials']['H']){
								foreach($bar_info['specials']['H'] as $special){?>
									<div class="special-row" valign="top">
										<div class="special"><?=$special['name']?></div>
										<div class="special-time"><?=$special['times']?></div>
									</div>
							<?php 	}
							}else{ ?>
								<div class="null-special">Sorry there are no specials today. Bummer.</div>
							<?php } ?>
						</div>
						<div class="specials-table" id="friday-specials" border="0" cellspacing="0" cellpadding="0">
							<?php if($bar_info['specials']['F']){
								foreach($bar_info['specials']['F'] as $special){?>
									<div class="special-row" valign="top">
										<div class="special"><?=$special['name']?></div>
										<div class="special-time"><?=$special['times']?></div>
									</div>
							<?php 	}
							}else{ ?>
								<div class="null-special">Sorry there are no specials today. Bummer.</div>
							<?php } ?>
						</div>
						<div class="specials-table" id="saturday-specials" border="0" cellspacing="0" cellpadding="0">
							<?php if($bar_info['specials']['S']){
								foreach($bar_info['specials']['S'] as $special){?>
									<div class="special-row" valign="top">
										<div class="special"><?=$special['name']?></div>
										<div class="special-time"><?=$special['times']?></div>
									</div>
							<?php 	}
							}else{ ?>
								<div class="null-special">Sorry there are no specials today. Bummer.</div>
							<?php } ?>
						</div>
						<div class="specials-table" id="sunday-specials" border="0" cellspacing="0" cellpadding="0">
							<?php if($bar_info['specials']['U']){
								foreach($bar_info['specials']['U'] as $special){?>
									<div class="special-row" valign="top">
										<div class="special"><?=$special['name']?></div>
										<div class="special-time"><?=$special['times']?></div>
									</div>
							<?php 	}
							}else{ ?>
								<div class="null-special">Sorry there are no specials today. Bummer.</div>
							<?php } ?>
						</div>
					</div>
					<div class="see-more-specials">
							...
					</div>
				</a>
					
			<? } ?>

		</div>



