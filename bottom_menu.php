<script type="text/javascript">
	$(window).load(function(){
		$("footer div").click(function(){
			$("footer div").removeClass('active');
			$(this).addClass('active');
		});
	});
</script>
	

	<footer>
		<div class="active" id="bars">
			<i class="icon-flag"></i><br>
			Bars
		</div>
		<div id="specials">
			<i class="icon-beer"></i><br>
			Specials
		</div>
		<div id="location">
			<i class="icon-map-marker"></i><br>
			Location
		</div>
	</footer>