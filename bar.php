<script type="text/javascript">
	$(window).load(function(){
		$(".date-picker1 td").click(function(){
			$(".date-picker1 td").removeClass('active-date');
			$(this).addClass('active-date');
		});
		$(".date-picker2 td").click(function(){
			$(".date-picker2 td").removeClass('active-date');
			$(this).addClass('active-date');
		});
		$(".back").click(function(){
			$("#location-page").css('display','block');
			$("#bar-page").css('display','none');
			$(".back").css('display','none');
		});
	});
</script>
	<div class="content">
		<div class="section">
			<div class="video-section">
				<div class="bar-title">Uncle Woody's</div>
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
						<td><div class="active-special">1/2 off appetizers</div></td>
						<td><div class="special-time">4pm-6pm</div></td>
					</tr>
					<tr>
						<td><div class="active-special">$1 wells</div></td>
						<td><div class="special-time">7pm-9pm</div></td>
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
			<div class="hh-viewer">
				<table class="specials-table" border="0" cellspacing="0" cellpadding="0">
					<tr>
						<td><div class="active-special">1/2 off appetizers</div></td>
						<td><div class="special-time">4pm-6pm</div></td>
					</tr>
					<tr>
						<td><div class="active-special">$1 wells</div></td>
						<td><div class="special-time">7pm-9pm</div></td>
					</tr>
				</table>
			</div>
		</div>

		<div class="section">
			<img src="images/info-flag.png" />
			<div class="info-section">
				<div class="left-info">
					<span>Sun</span> 11am-5pm<br>
					<span>Mon</span> 11am-5pm<br>
					<span>Tue</span> 11am-5pm<br>
					<span>Wed</span> 11am-5pm<br>
				</div>
				<div class="right-info">
					<span>Thur</span> 11am-5pm<br>
					<span>Fri</span> 11am-5pm<br>
					<span>Sat</span> 11am-5pm<br>
				</div>
			</div>
		</div>

	</div>



