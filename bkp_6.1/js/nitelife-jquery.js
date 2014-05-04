
$(window).load(function(){
	$("a").click(function (event) {
	    event.preventDefault();
	    window.location = $(this).attr("href");
	});
	$("#location-nav div").click(function(){
		$("#location-nav div").removeClass('active-location-nav');
		$(this).addClass('active-location-nav');
	});
});
