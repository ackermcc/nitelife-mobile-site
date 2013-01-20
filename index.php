<!DOCTYPE html>

<html>

<head>

	<meta name="viewport" content="width=device-width;" />
	<meta name="apple-mobile-web-app-capable" content="yes" />
	<meta names="apple-mobile-web-app-status-bar-style" content="black-translucent" />

	<meta charset="utf-8" />
	<title>NiteLife</title>

	<link rel="stylesheet" href="stylesheets/style.css">
	<link rel="stylesheet" href="stylesheets/barpage.css">
	
	<script type="application/javascript" src="js/iscroll.js"></script>
	<script type="text/javascript">
	var myScroll;
	function loaded() {
		setTimeout(function () {
			myScroll = new iScroll('wrapper');
		}, 100);
	}
	window.addEventListener('load', loaded, false);
	</script>

</head>

<body>

<div class="container">
	<header>
		<img src="images/logo_03.png" alt="" />
	</header>
<div class="wrapper">
<? include_once('bar.php'); ?>
	
</div>
<? include_once('bottom_menu.php'); ?>
</div>

</body>
</html>

