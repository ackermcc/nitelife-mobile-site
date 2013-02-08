<script type="text/javascript">
	$(window).load(function(){
		$("footer div").click(function(){
			$("footer div").removeClass('active');
			$(this).addClass('active');
		});
		$("#location").click(function(){
			$("#location-page").css('display','block');
			$("#bar-page").css('display','none');
			$(".back").css('display','none');
		});
		$("#my-nl").click(function(){
			
		});
	});
</script>
	

	<footer>
		<a href="#"><div id="location" class="active"></a>
			<i class="icon-map-marker"></i><br>
			Location
		</div>
		<div id="specials">
			<i class="icon-beer"></i><br>
			Specials
		</div>
		<div id="my-nl">
			<i class="icon-user"></i><br>
			My NL
		</div>
	</footer>