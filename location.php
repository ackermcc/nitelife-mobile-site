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
		$("#location-nav div").click(function(){
			$("#location-nav div").removeClass('active-location-nav');
			$(this).addClass('active-location-nav');
		});
	});
</script>
	<div class="content">

		<div id="location-nav">
			<div id="location-nav-list" class="active-location-nav"><i class="icon-th-list"></i></div>
			<div id="location-nav-map"><i class="icon-map-marker"></i></div>
		</div>

		<div class="bar-location">
			<img src="images/unclewoodys-icon.jpg" alt=""/>
			<div class="bar-info">
				<div class="bar-name">Uncle Woody's</div>
				<div class="bar-address truncate">339 Calhoun St. Cincinnati, Ohio 45219</div>
			</div>
			<div class="bar-miles">0.3 mi</div>
		</div>
		<div class="bar-location">
			<img src="images/christies-icon.jpg" alt=""/>
			<div class="bar-info">
				<div class="bar-name">Lenhardt's & Christy's</div>
				<div class="bar-address truncate">151 W McMillan St, Cincinnati, OH 45219</div>
			</div>
			<div class="bar-miles">0.5 mi</div>
		</div>
		<div class="bar-location">
			<img src="images/murphys-icon.jpg" alt=""/>
			<div class="bar-info">
				<div class="bar-name">Murphy's Pub</div>
				<div class="bar-address truncate">2329 W Clifton Ave, Cincinnati, OH 45219</div>
			</div>
			<div class="bar-miles">1.2 mi</div>
		</div>
		<div class="bar-location">
			<img src="images/fries-icon.jpg" alt=""/>
			<div class="bar-info">
				<div class="bar-name">Fries Cafe</div>
				<div class="bar-address truncate">3247 Jefferson Ave, Cincinnati, OH 45220</div>
			</div>
			<div class="bar-miles">2.3 mi</div>
		</div>
	</div>



