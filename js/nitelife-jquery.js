
$(window).load(function(){
	$("a").click(function (event) {
	    event.preventDefault();
	    window.location = $(this).attr("href");
	});
	$("#location-nav div").click(function(){
		$("#location-nav div").removeClass('active-location-nav');
		$(this).addClass('active-location-nav');
	});

	$("#about-us").click(function(){
		$(this).css('box-shadow','0px 0px 8px #000');
		// alert("yolo");
	});
});
