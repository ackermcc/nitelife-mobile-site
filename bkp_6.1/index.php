<?php
require('scripts/database.php');

// Lets put all the text in this file through after the ending head tag in a header.php then include it?
//That would make things more organized.
?> 

<!DOCTYPE html>

<html>

<head>

	<link rel="shortcut icon" href="images/nl_logo_r.png" />

	<meta name="viewport" content="width=device-width; initial-scale=0.5; maximum-scale=0.5; minimum-scale=0.5; user-scalable=no; target-densityDpi=device-dpi" />
	<!-- <meta name="viewport" content="width=device-width, initial-scale=0.5, user-scalable=no " /> -->
	<!-- <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1"> -->
	<meta name="apple-mobile-web-app-capable" content="yes" />
	<meta names="apple-mobile-web-app-status-bar-style" content="black-translucent" />
	<meta name="news_keywords" content="night life, bars, bar specials, cincinnati, bar deals, NiteLife, bar live feed, deals, cincinnati bar specials">

	<link rel="apple-touch-icon-precomposed" href="images/nl_logo.png" />
	<link rel="apple-touch-icon-precomposed" sizes="114x114" href="images/nl_logo_r.png" />
	
	<!-- <link rel="apple-touch-startup-image" href="images/startup.png"> -->
	<!-- iPhone (Retina) -->
	<link href="images/startup.png"
	      media="(device-width: 320px) and (device-height: 480px)
	         and (-webkit-device-pixel-ratio: 2)"
	      rel="apple-touch-startup-image">
	<!-- iPhone 5 -->
	<link href="images/startup-5.png"
	      media="(device-width: 320px) and (device-height: 568px)
	         and (-webkit-device-pixel-ratio: 2)"
	      rel="apple-touch-startup-image">

	<meta charset="utf-8" />
	<title>NiteLife</title>

	<link rel="stylesheet" href="stylesheets/style.css">
	<link rel="stylesheet" href="stylesheets/barpage.css">
	<link rel="stylesheet" href="stylesheets/location-style.css">
	<link rel="stylesheet" href="css/font-awesome.css">

	<script type="application/javascript" src="js/jquery.js"></script>
	<script type="application/javascript" src="js/iscroll.js"></script>
	<script type="application/javascript" src="js/fastclick.js"></script>
	<script type="application/javascript" src="js/nitelife-jquery.js"></script>
	<script type="application/javascript" src="js/maps.js"></script>

	<script type="text/javascript" src="//use.typekit.net/uni7btv.js"></script>
	<script type="text/javascript">try{Typekit.load();}catch(e){}</script>

	<script type="text/javascript">
	var myScroll;
	function loaded() {
		setTimeout(function () {
			myScroll = new iScroll('wrapper');
		}, 100);
	}
	window.addEventListener('load', loaded, false);
	</script>

	<script type="text/javascript">
		window.addEventListener('load', function() {
		    new FastClick(document.body);
		}, false);
	</script>

	<!-- GOOGLE ANALYTICS -->
	<script type="text/javascript">

	  var _gaq = _gaq || [];
	  _gaq.push(['_setAccount', 'UA-35701212-2']);
	  _gaq.push(['_trackPageview']);

	  (function() {
	    var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
	    ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
	    var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
	  })();

	</script>

	<script>(function(a,b,c){if(c in b&&b[c]){var d,e=a.location,f=/^(a|html)$/i;a.addEventListener("click",function(a){d=a.target;while(!f.test(d.nodeName))d=d.parentNode;"href"in d&&(d.href.indexOf("http")||~d.href.indexOf(e.host))&&(a.preventDefault(),e.href=d.href)},!1)}})(document,window.navigator,"standalone")</script>

	<!-- WEBSITE REDIRECT -->

	<script type="text/javascript">
	    if(!navigator.userAgent.match(/android/i) && !(navigator.userAgent.match(/iPhone/i)) && !(navigator.userAgent.match(/iPod/i))) {
			//window.location = "http://cincynitelife.com";
	    }
  	</script>

	<!-- ADD TO HOME SCREEN HELPER -->

	<link rel="stylesheet" href="stylesheets/add2home.css">
	<script type="application/javascript" src="js/add2home.js"></script>

	<!-- LOADING -->
	<!-- // moved to when bars load
	<script type="text/javascript">
	$(window).load(function(){
	  $('.loadingDiv').css('display','none'); 
	});
	</script>
	-->

</head>
<?php $bar = $_GET['bar']; ?>

<body>
	<div class="loadingDiv"></div>

<div id="rotation-issue">
	<i class="icon-mobile-phone"></i><br>
	Ahh! Turn me back upright!
</div>

<div class="container">
	<header>
		<a href="javascript:history.go(-1)"><div class="back">Back</div></a>
		<img src="images/logo_03.png" alt="" />
		<img id="beta-ribbon" src="images/beta-ribbon.png" alt="" />
	</header>

	<div class="wrapper">
		<?php if($bar){	?>
		<div id="middle-content"><? include_once('bar.php'); ?></div>
		<?php }else{ ?>
		<div id="middle-content"><? include_once('location.php'); ?></div>	
		<?php } ?>
	</div>
	<? include_once('bottom_menu.php'); ?>
</div>

</body>
</html>

