<?php
require('../scripts/database.php');

if(isset($_POST['delete-bar'])){
	$ids = $_POST['delete-bars'];
	admin_delete_bars($ids);
	$message = "Bars deleted successfully";

}

$bars = admin_get_bars();


?>
<!DOCTYPE html>

<html>
<head>
	<link rel="shortcut icon" href="images/nl_logo_r.png" />
	<link rel="stylesheet" href="css/admin.css">
	<link rel="stylesheet" href="../css/font-awesome.css">
	<meta charset="utf-8" />
	<title>NiteLife - Admin</title>

	<script type="text/javascript" src="//use.typekit.net/uni7btv.js"></script>
	<script type="text/javascript">try{Typekit.load();}catch(e){}</script>
</head>

<body>
<header>
	<img src="http://m.cincynitelife.com/images/logo_admin.png" alt="" />
	<div id="add-bar"><a href="edit-bar.php"><i class="icon-plus"></i></a></div>
</header>

<div class="container">
	<form method="post">
	<?php if($message) echo $message; ?>
	<table cellpadding="0" cellspacing="0" border="0">
		<tr>
			<td>Name</td>
			<td>Address</td>
			<!-- <td>Description</td> -->
			<td>Slug</td>
			<td></td>
		</tr>
		<?php foreach ($bars as $bar){ ?>
			<tr>
				<td><a class="bar-name-link" href="edit-bar.php?bar=<?=$bar['slug']?>"><?=stripslashes($bar['name'])?></a></td>
				<td><?=stripslashes($bar['address'])?></td>
				<td><?=$bar['slug']?></td>
				<td><input type="checkbox" name="delete-bars[]" value="<?=$bar['id']?>"></td>
			</tr>
		<?}	?>
	</table>
	<input type="submit" name="delete-bar" value="Delete Bars" />
	</form>
</div>

</body>
</html>

