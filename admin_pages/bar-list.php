<?php
require('../scripts/database.php');

$bars = admin_get_bars();
?>

<table border="1">
	<tr>
	<td>Name</td>
	<td>Address</td>
	<td>Description</td>
	<td>Slug</td>
	<td>Facebook</td>
	<td>Twitter</td>
	</tr>
	<?php foreach ($bars as $bar){ ?>
		<tr>
			<td><a href="edit-bar.php?bar=<?=$bar['slug']?>"><?=$bar['name']?></a></td>
			<td><?=$bar['address']?></td>
			<td><?=$bar['description']?></td>
			<td><?=$bar['slug']?></td>
			<td><?=$bar['facebook']?></td>
			<td><?=$bar['twitter']?></td>
		
		</tr>
	<?}	?>


</table>
