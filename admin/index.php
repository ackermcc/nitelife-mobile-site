<?php
require('../scripts/database.php');

if(isset($_POST['delete-bar'])){
	$ids = $_POST['delete-bars'];
	admin_delete_bars($ids);
	$message = "Bars deleted successfully";

}


$bars = admin_get_bars();


?>
<form method="post">
<?php if($message) echo $message; ?>
<table border="1">
	<tr>
	<td>Name</td>
	<td>Address</td>
	<td>Description</td>
	<td>Slug</td>
	<td>Facebook</td>
	<td>Twitter</td>
	<td></td>
	</tr>
	<?php foreach ($bars as $bar){ ?>
		<tr>
			<td><a href="edit-bar.php?bar=<?=$bar['slug']?>"><?=$bar['name']?></a></td>
			<td><?=$bar['address']?></td>
			<td><?=$bar['description']?></td>
			<td><?=$bar['slug']?></td>
			<td><?=$bar['facebook']?></td>
			<td><?=$bar['twitter']?></td>
			<td><input type="checkbox" name="delete-bars[]" value="<?=$bar['id']?>"></td>
		</tr>
	<?}	?>
</table>
<a href="edit-bar.php">Add Bar</a><input type="submit" name="delete-bar" value="Delete Bars" />
</form>
