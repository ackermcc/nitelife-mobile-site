<!DOCTYPE html>

<html>

<head>

	<meta name="viewport" content="width=device-width, initial-scale=0.5" />
	<!-- <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1"> -->
	<meta name="apple-mobile-web-app-capable" content="yes" />
	<meta names="apple-mobile-web-app-status-bar-style" content="black-translucent" />

	<link rel="apple-touch-icon-precomposed" href="images/nl_logo.png" />
	<link rel="apple-touch-icon-precomposed" sizes="114x114" href="images/nl_logo_r.png" />

	<meta charset="utf-8" />
	<title>NiteLife</title>

	<link rel="stylesheet" href="stylesheets/style.css">
	<link rel="stylesheet" href="stylesheets/barpage.css">
	<link rel="stylesheet" href="stylesheets/location-style.css">
	<link rel="stylesheet" href="css/font-awesome.css">

	<script type="application/javascript" src="js/jquery.js"></script>
	<script type="application/javascript" src="js/iscroll.js"></script>
	<script type="application/javascript" src="js/fastclick.js"></script>
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

</head>

<body>

<div class="container">
	<header>
		<a href="#"><div class="back">Back</div></a>
		<img src="images/logo_03.png" alt="" />
	</header>
	<div class="wrapper">
		<div id="bar-page"><? include_once('bar.php'); ?></div>
		<div id="location-page"><? include_once('location.php'); ?></div>	
	</div>
	<? include_once('bottom_menu.php'); ?>
</div>

</body>
</html>

