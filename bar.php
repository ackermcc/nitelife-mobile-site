<script type="text/javascript">
$(window).load(function(){
	var d = new Date();
	var day = d.getDay();

	var datePicker = function(){
		if (day == 0) {
			$(".specials-table").removeClass('active-day');
			$("#sunday-specials").addClass('active-day');
			$(".date-picker1 td:last-child").addClass('active-date');
		} else if (day == 1) {
			$(".specials-table").removeClass('active-day');
			$("#monday-specials").addClass('active-day');
			$(".date-picker1 td:nth-child(1)").addClass('active-date');
		} else if (day == 2) {
			$(".specials-table").removeClass('active-day');
			$("#tuesday-specials").addClass('active-day');
			$(".date-picker1 td:nth-child(2)").addClass('active-date');
		} else if (day ==3 ) {
			$(".specials-table").removeClass('active-day');
			$("#wednesday-specials").addClass('active-day');
			$(".date-picker1 td:nth-child(3)").addClass('active-date');
		} else if (day == 4) {
			$(".specials-table").removeClass('active-day');
			$("#thursday-specials").addClass('active-day');
			$(".date-picker1 td:nth-child(4)").addClass('active-date');
		} else if (day == 5) {
			$(".specials-table").removeClass('active-day');
			$("#friday-specials").addClass('active-day');
			$(".date-picker1 td:nth-child(5)").addClass('active-date');
		} else if (day == 6) {
			$(".specials-table").removeClass('active-day');
			$("#saturday-specials").addClass('active-day');
			$(".date-picker1 td:nth-child(6)").addClass('active-date');
		}
	}

	datePicker();

	$(".date-picker1 td:nth-child(1)").click(function(){
		$(".date-picker1 td").removeClass('active-date');
		day = 1;
		datePicker();
	});

	$(".date-picker1 td:nth-child(2)").click(function(){
		$(".date-picker1 td").removeClass('active-date');
		day = 2;
		datePicker();
	});

	$(".date-picker1 td:nth-child(3)").click(function(){
		$(".date-picker1 td").removeClass('active-date');
		day = 3;
		datePicker();
	});

	$(".date-picker1 td:nth-child(4)").click(function(){
		$(".date-picker1 td").removeClass('active-date');
		day = 4;
		datePicker();
	});

	$(".date-picker1 td:nth-child(5)").click(function(){
		$(".date-picker1 td").removeClass('active-date');
		day = 5;
		datePicker();
	});

	$(".date-picker1 td:nth-child(6)").click(function(){
		$(".date-picker1 td").removeClass('active-date');
		day = 6;
		datePicker();
	});

	$(".date-picker1 td:last-child").click(function(){
		$(".date-picker1 td").removeClass('active-date');
		day = 0;
		datePicker();
	});

	$("footer div").removeClass('active');
	$(".back").css('display','block');

});
</script>
<?php
//Getting bar info
$bar_info = get_bar_info($bar);
?>
	<div class="content">
		<div class="section">
			<div class="video-section">
				<?php if($bar_info['info']['banner_url'] && $bar_info['info']['banner_url'] != ''){ ?>
					<img src="banners/<?=$bar_info['info']['banner_url']?>" alt="" />
				<?php }else{ ?>
					<img id="noimg" src="images/no-img-banner.jpg" alt="" />
				<?php } ?>
			</div>
			<div class="bar-title"><?=$bar_info['info']['name']?></div>
		</div>
	
		<div class="section">
			<img src="images/specials-flag.png" />
			<div class="specials-date-picker">
				<table class="date-picker1" border="0" cellspacing="0" cellpadding="0">
					<tr>
						<td>M</td>
						<td>T</td>
						<td>W</td>
						<td>R</td>
						<td>F</td>
						<td>S</td>
						<td>U</td>
					</tr>
				</table>
			</div>
			<div class="hh-viewer"><!-- lets create one div of these for each day, and set those for the days that arent selected to be invisible -->
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
		</div>

		<div class="section">
			<img src="images/info-flag.png" />
			<div class="info-section">
				<div class="bar-information"><?=$bar_info['info']['address']?></div>
				<hr>
				<div class="left-info"> 
					<?php if($bar_info['open_times']['M']) {	?>
						<span>M</span> <?=$bar_info['open_times']['M']['times']?><br>
					<?php } ?>
					<?php if($bar_info['open_times']['T']) {	?>
						<span>T</span> <?=$bar_info['open_times']['T']['times']?><br>
					<?php } ?>
					<?php if($bar_info['open_times']['W']) {	?>
						<span>W</span> <?=$bar_info['open_times']['W']['times']?><br>
					<?php } ?>
					<?php if($bar_info['open_times']['H']) {	?>
						<span>R</span> <?=$bar_info['open_times']['H']['times']?><br>
					<?php } ?>
				</div>
				<div class="right-info"> 
					<?php if($bar_info['open_times']['F']) {	?>
						<span>F</span> <?=$bar_info['open_times']['F']['times']?><br>
					<?php } ?>
					<?php if($bar_info['open_times']['S']) {	?>
						<span>S</span> <?=$bar_info['open_times']['S']['times']?><br>
					<?php } ?>
					<?php if($bar_info['open_times']['U']) {	?>
						<span>U</span> <?=$bar_info['open_times']['U']['times']?><br>
					<?php } ?>
				</div>
				</div>
			</div>
		</div>

	</div>



