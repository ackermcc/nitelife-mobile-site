<script type="text/javascript">
$(window).load(function(){
	var d = new Date();
	var day = d.getDay();

	var datePicker = function(){
		if (day == 0) {
			$(".specials-table").removeClass('active-day');
			$("#sunday-specials").addClass('active-day');
			$("#day-specials-title").text("Sunday");
		} else if (day == 1) {
			$(".specials-table").removeClass('active-day');
			$("#monday-specials").addClass('active-day');
			$("#day-specials-title").text("Monday");
		} else if (day == 2) {
			$(".specials-table").removeClass('active-day');
			$("#tuesday-specials").addClass('active-day');
			$("#day-specials-title").text("Tuesday");
		} else if (day ==3 ) {
			$(".specials-table").removeClass('active-day');
			$("#wednesday-specials").addClass('active-day');
			$("#day-specials-title").text("Wednesday");
		} else if (day == 4) {
			$(".specials-table").removeClass('active-day');
			$("#thursday-specials").addClass('active-day');
			$("#day-specials-title").text("Thursday");
		} else if (day == 5) {
			$(".specials-table").removeClass('active-day');
			$("#friday-specials").addClass('active-day');
			$("#day-specials-title").text("Friday");
		} else if (day == 6) {
			$(".specials-table").removeClass('active-day');
			$("#saturday-specials").addClass('active-day');
			$("#day-specials-title").text("Saturday");
		}
	}

	datePicker();

	$("#prev").click(function(){
		if (day == 0) {
			day = 6;
		} else {
			day --;
		}
		datePicker();
	});

	$("#next").click(function(){
		if (day == 6) {
			day = 0;
		} else {
			day ++;
		}
		datePicker();
	});

	$("footer div").removeClass('active');
	$(".back").css('display','block');

	

});

window.onload = function () { $('.loadingDiv').css('display','none'); };
</script>
	

<?php
//Getting bar info
$bar_info = get_bar_info($bar);
?>
	<div class="content">
		<div class="video-section">
			<?php if($bar_info['info']['banner_url'] && $bar_info['info']['banner_url'] != ''){ ?>
				<img src="banners/<?=$bar_info['info']['banner_url']?>" alt="" />
				<img id="banner-gradient" src="images/title-image-gradient@2x.png">
			<?php }else{ ?>
				<img id="noimg" src="images/no-img-banner.jpg" alt="" />
			<?php } ?>
			<div class="bar-title"><?=$bar_info['info']['name']?></div>
		</div>
	
		<div class="section">
			<div id="prev"><img src="images/l-arrow@2x.png"></div>
			<div id="day-specials-title">Saturday</div>
			<div id="next"><img src="images/r-arrow@2x.png"></div>
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
			<div class="info-section">
				<div class="bar-information">
					<div class="truncate"><img src="images/nav@2x.png"><?=$bar_info['info']['address']?>, <?=$bar_info['info']['zipcode']?></div>
					<div class="truncate"><img src="images/phone@2x.png"><?=$bar_info['info']['phone']?></div>
					<div class="truncate"><img src="images/hours@2x.png"><?=$bar_info['open_times']['M']['times']?></div>
				</div>
			</div>
		</div>

	</div>



