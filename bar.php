<script type="text/javascript">
$(window).load(function(){
	var d = new Date();
	var day = d.getDay();

	if (day == 0) {

	} else if (day == 1) {

	} else if (day == 2) {

	} else if (day ==3 ) {

	} else if (day == 4) {

	} else if (day == 5) {

	} else if (day == 6) {
		alert("its saturday");
	}

});
</script>
<?php
//Getting bar info
$bar_info = get_bar_info($bar);
?>
	<div class="content">
		<div class="section">
			<div class="video-section">
				<div class="bar-title"><?=$bar_info['info']['name']?></div>
				<img class="grayscale" src="images/uncle-woodys.jpg" alt="" />
			</div>
		</div>
	
		<div class="section">
			<img src="images/specials-flag.png" />
			<div class="specials-date-picker">
				<table class="date-picker1" border="0" cellspacing="0" cellpadding="0">
					<tr>
						<td class="active-date">M</td>
						<td>T</td>
						<td>W</td>
						<td>R</td>
						<td>F</td>
						<td>S</td>
						<td>U</td>
					</tr>
				</table>
			</div>
			<div class="specials-viewer">
				<table class="specials-table" border="0" cellspacing="0" cellpadding="0">
					<tr>
						<td><div class="special">1/2 off appetizers</div></td>
						<td><div class="special-time">4pm-6pm</div></td>
					</tr>
					<tr>
						<td><div class="special">$1 wells</div></td>
						<td><div class="special-time">7pm-9pm</div></td>
					</tr>
					<tr class="inactive-special">
						<td><div class="special">$5 Hipster Bomb</div></td>
						<td><div class="special-time">10pm-1am</div></td>
					</tr>
				</table>
			</div>
		</div>

		<div class="section">
			<img src="images/hh-flag.png" />
			<div class="specials-date-picker">
				<table class="date-picker2" border="0" cellspacing="0" cellpadding="0">
					<tr>
						<td class="active-date">M</td>
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
				<table class="specials-table" id="monday-specials" border="0" cellspacing="0" cellpadding="0">
					<?php if($bar_info['specials']['M']){
						foreach($bar_info['specials']['M'] as $special){?>
							<tr>
								<td><div class="special"><?=$special['name']?></div></td>
								<td><div class="special-time"><?=$special['times']?></div></td>
							</tr>
					<?php 	}
					}else{ ?>
						<tr><div class="null-special">Sorry there are no specials today, bummer.</div></tr>
					<?php } ?>
				</table>
				<table class="specials-table" id="tuesday-specials" border="0" cellspacing="0" cellpadding="0">
					<?php if($bar_info['specials']['T']){
						foreach($bar_info['specials']['T'] as $special){?>
							<tr>
								<td><div class="special"><?=$special['name']?></div></td>
								<td><div class="special-time"><?=$special['times']?></div></td>
							</tr>
					<?php 	}
					}else{ ?>
						<tr><div class="null-special">Sorry there are no specials today, bummer.</div></tr>
					<?php } ?>
				</table>
				<table class="specials-table" id="wednesday-specials" border="0" cellspacing="0" cellpadding="0">
					<?php if($bar_info['specials']['W']){
						foreach($bar_info['specials']['W'] as $special){?>
							<tr>
								<td><div class="special"><?=$special['name']?></div></td>
								<td><div class="special-time"><?=$special['times']?></div></td>
							</tr>
					<?php 	}
					}else{ ?>
						<tr><div class="null-special">Sorry there are no specials today, bummer.</div></tr>
					<?php } ?>
				</table>
				<table class="specials-table" id="thursday-specials" border="0" cellspacing="0" cellpadding="0">
					<?php if($bar_info['specials']['H']){
						foreach($bar_info['specials']['H'] as $special){?>
							<tr>
								<td><div class="special"><?=$special['name']?></div></td>
								<td><div class="special-time"><?=$special['times']?></div></td>
							</tr>
					<?php 	}
					}else{ ?>
						<tr><div class="null-special">Sorry there are no specials today, bummer.</div></tr>
					<?php } ?>
				</table>
				<table class="specials-table" id="friday-specials" border="0" cellspacing="0" cellpadding="0">
					<?php if($bar_info['specials']['F']){
						foreach($bar_info['specials']['F'] as $special){?>
							<tr>
								<td><div class="special"><?=$special['name']?></div></td>
								<td><div class="special-time"><?=$special['times']?></div></td>
							</tr>
					<?php 	}
					}else{ ?>
						<tr><div class="null-special">Sorry there are no specials today, bummer.</div></tr>
					<?php } ?>
				</table>
				<table class="specials-table" id="saturday-specials" border="0" cellspacing="0" cellpadding="0">
					<?php if($bar_info['specials']['S']){
						foreach($bar_info['specials']['S'] as $special){?>
							<tr>
								<td><div class="special"><?=$special['name']?></div></td>
								<td><div class="special-time"><?=$special['times']?></div></td>
							</tr>
					<?php 	}
					}else{ ?>
						<tr><div class="null-special">Sorry there are no specials today, bummer.</div></tr>
					<?php } ?>
				</table>
				<table class="specials-table" id="sunday-specials" border="0" cellspacing="0" cellpadding="0">
					<?php if($bar_info['specials']['U']){
						foreach($bar_info['specials']['U'] as $special){?>
							<tr>
								<td><div class="special"><?=$special['name']?></div></td>
								<td><div class="special-time"><?=$special['times']?></div></td>
							</tr>
					<?php 	}
					}else{ ?>
						<tr><div class="null-special">Sorry there are no specials today, bummer.</div></tr>
					<?php } ?>
				</table>
			</div>
		</div>

		<div class="section">
			<img src="images/info-flag.png" />
			<div class="info-section">
				<div class="left-info"> 
					
					<?php if($bar_info['open_times']['U']) {	?>
						<span>Sun</span> <?=$bar_info['open_times']['U']['times']?><br>
					<?php } ?>
					<?php if($bar_info['open_times']['M']) {	?>
						<span>Mon</span> <?=$bar_info['open_times']['M']['times']?><br>
					<?php } ?>
					<?php if($bar_info['open_times']['T']) {	?>
						<span>Tue</span> <?=$bar_info['open_times']['T']['times']?><br>
					<?php } ?>
					<?php if($bar_info['open_times']['W']) {	?>
						<span>Wed</span> <?=$bar_info['open_times']['W']['times']?><br>
					<?php } ?>
					<?php if($bar_info['open_times']['H']) {	?>
						<span>Thur</span> <?=$bar_info['open_times']['H']['times']?><br>
					<?php } ?>
					<?php if($bar_info['open_times']['F']) {	?>
						<span>Fri</span> <?=$bar_info['open_times']['F']['times']?><br>
					<?php } ?>
					<?php if($bar_info['open_times']['S']) {	?>
						<span>Sat</span> <?=$bar_info['open_times']['S']['times']?><br>
					<?php } ?>
				</div>
				</div>
			</div>
		</div>

	</div>



