<?php

$days = array("M", "T", "W", "H", "F", "S", "U");
$divIdNames = array(
    "M"  => "monday-specials",
    "T" => "tuesday-specials",
    "W" => "wednesday-specials",
	"H" => "thursday-specials",
	"F" => "friday-specials",
	"S" => "saturday-specials",
	"U" => "sunday-specials"
	);
?>

<script type="text/javascript">
$(window).load(function(){

	var d = new Date();
	var day = d.getDay();

	var datePicker = function(){
		if (day == 0) {
			$(".specials-table").removeClass('active-day');
			$("div.specials-table#sunday-specials").addClass('active-day');
			$("#current-date").text("Sunday");
		} else if (day == 1) {
			$(".specials-table").removeClass('active-day');
			$("div.specials-table#monday-specials").addClass('active-day');
			$("#current-date").text("Monday");
		} else if (day == 2) {
			$(".specials-table").removeClass('active-day');
			$("div.specials-table#tuesday-specials").addClass('active-day');
			$("#current-date").text("Tuesday");
		} else if (day ==3 ) {
			$(".specials-table").removeClass('active-day');
			$("div.specials-table#wednesday-specials").addClass('active-day');
			$("#current-date").text("Wednesday");
		} else if (day == 4) {
			$(".specials-table").removeClass('active-day');
			$("div.specials-table#thursday-specials").addClass('active-day');
			$("#current-date").text("Thursday");
		} else if (day == 5) {
			$(".specials-table").removeClass('active-day');
			$("div.specials-table#friday-specials").addClass('active-day');
			$("#current-date").text("Friday");
		} else if (day == 6) {
			$(".specials-table").removeClass('active-day');
			$("div.specials-table#saturday-specials").addClass('active-day');
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
			<div id="current-date">&nbsp;</div>
			<div id="next-date"><i class="icon-chevron-right"></i></div>
		</div>
		
		<?php foreach($days as $day){ 
		
			$bars = get_bars_and_specials($day);
			if(count($bars) > 0){ ?>
				<div class="specials-table" id="<?=$divIdNames[$day]?>">
				<?php foreach($bars['bars'] as $bar){ ?>

					<a style="text-decoration: none;" href="?bar=<?=$bar['slug']?>">
					
						<div id="<?=$bar['slug']?>" class="bar-special-index">
							<div class="bar-name-specials truncate2"><?=$bar['name']?></div>
						
							<?php foreach($bars['specials'][$bar['id']][0] as $special){							?>
								<div class="special-row" valign="top">
									<div class="special"><?=$special['name']?></div>
									<div class="special-time"><?=$special['times']?></div>
								</div>
							<?php } ?>
						</div>
						<div class="see-more-specials">
							...
						</div>
					</a>
					
			<?php 	} ?>
				</div> <?php
		
			}
		
		
		}
		/*
			<a style="text-decoration: none;" href="?bar=<?=$bar['slug']?>">
				<div id="<?=$bar['slug']?>" class="bar-special-index">
					<div class="bar-name truncate2"><?=$bar['name']?></div>
					
						<?php if($specials[$bar['id']]['M']){ ?>
							<div class="specials-table" id="monday-specials" border="0" cellspacing="0" cellpadding="0">
									<?php foreach($specials[$bar['id']]['M'] as $special){ ?>
										<div class="special-row" valign="top">
											<div class="special"><?=$special['name']?></div>
											<div class="special-time"><?=$special['times']?></div>
										</div>
									<?php } ?>
							</div>
						<?php } ?>
						
						<?php if($specials[$bar['id']]['T']){ ?>
							<div class="specials-table" id="tuesday-specials" border="0" cellspacing="0" cellpadding="0">
								<?php foreach($specials[$bar['id']]['T'] as $special){ ?>
									<div class="special-row" valign="top">
										<div class="special"><?=$special['name']?></div>
										<div class="special-time"><?=$special['times']?></div>
									</div>
								<?php } ?>
							</div>
						<?php } ?>
						
						<?php if($specials[$bar['id']]['W']){ ?>
							<div class="specials-table" id="wednesday-specials" border="0" cellspacing="0" cellpadding="0">
								<?php foreach($specials[$bar['id']]['W'] as $special){?>
									<div class="special-row" valign="top">
										<div class="special"><?=$special['name']?></div>
										<div class="special-time"><?=$special['times']?></div>
									</div>
							<?php 	} ?>
							</div>
						<?php } ?>
						
						<?php if($specials[$bar['id']]['H']){ ?>
							<div class="specials-table" id="thursday-specials" border="0" cellspacing="0" cellpadding="0">
								<?php foreach($specials[$bar['id']]['H'] as $special){?>
									<div class="special-row" valign="top">
										<div class="special"><?=$special['name']?></div>
										<div class="special-time"><?=$special['times']?></div>
									</div>
							<?php 	} ?>
							</div>
						<?php } ?>
						
						<?php if($specials[$bar['id']]['F']){ ?>
							<div class="specials-table" id="friday-specials" border="0" cellspacing="0" cellpadding="0">
								<?php foreach($specials[$bar['id']]['F'] as $special){?>
									<div class="special-row" valign="top">
										<div class="special"><?=$special['name']?></div>
										<div class="special-time"><?=$special['times']?></div>
									</div>
								<?php 	} ?>
							</div>
						<?php } ?>
						
						<?php if($specials[$bar['id']]['S']){ ?>
							<div class="specials-table" id="saturday-specials" border="0" cellspacing="0" cellpadding="0">
								<?php foreach($specials[$bar['id']]['S'] as $special){?>
									<div class="special-row" valign="top">
										<div class="special"><?=$special['name']?></div>
										<div class="special-time"><?=$special['times']?></div>
									</div>
							<?php 	} ?>
							</div>
						<?php } ?>
						
						<?php if($specials[$bar['id']]['U']){ ?>
							<div class="specials-table" id="sunday-specials" border="0" cellspacing="0" cellpadding="0">
								<?php foreach($specials[$bar['id']]['U'] as $special){?>
									<div class="special-row" valign="top">
										<div class="special"><?=$special['name']?></div>
										<div class="special-time"><?=$special['times']?></div>
									</div>
							<?php 	} ?>
							</div>
						<?php } ?>
					</div>
					<div class="see-more-specials">
							...
					</div>
				</a>
					
			<? } */ ?>

		</div>



