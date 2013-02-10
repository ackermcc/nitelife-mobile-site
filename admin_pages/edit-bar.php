<?php
require('../scripts/database.php');

$slug = $_REQUEST['bar'];

$bar = admin_get_bar($slug);

$desc = $_POST['description'];

?>

<!DOCTYPE html>

<html>

<head>
</head>
<body>
<?=$desc?>
<form method="post">
<input type="hidden" value="<?=$bar['slug']?>" name="bar" />
<br>ID: <?=$bar['id']?></br>
<br>Name: <input type="text" name="name" style="width:250px;" value="<?=$bar['name']?>"></input></br>
<br>Slug: <input type="text" name="slug" style="width:250px;" value="<?=$bar['slug']?>"></input></br>
<br>Icon: <?php if(!$bar['icon_url']){ echo 'No Icon'; }else{ ?><img src="<?=$bar['icon_url']?>" /> <?php } ?></br>
<br>Banner: <?php if(!$bar['banner_url']){ echo 'No Banner'; }else{ ?><img src="<?=$bar['banner_url']?>" /> <?php } ?></br>
<br>Address: <input type="text" name="address" style="width:250px;" value="<?=$bar['address']?>"></input></br>
<br>Zipcode: <input type="text" name="zipcode" style="width:250px;" value="<?=$bar['zipcode']?>"></input></br>
<br>Region: <input type="text" name="region" style="width:250px;" value="<?=$bar['region']?>"></input></br>
<br>Description: <textarea name="description" style="width:250px;" value="<?=$bar['description']?>"></textarea></br>
<br>Facebook: <input type="text" name="facebook" style="width:250px;" value="<?=$bar['facebook']?>"></input></br>
<br>Twitter: <input type="text" name="twitter" style="width:250px;" value="<?=$bar['twitter']?>"></input></br>
<br>Foursquare: <input type="text" name="foursquare" style="width:250px;" value="<?=$bar['foursquare']?>"></input></br>
<br>Username: <input type="text" name="username" style="width:250px;" value="<?=$bar['username']?>"></input></br>
<br>Password: <input type="text" name="password" style="width:250px;" value="<?=$bar['password']?>"></input></br>
<br>Phone: <input type="text" name="phone" style="width:250px;" value="<?=$bar['phone']?>"></input></br>
<br><input type="submit" value="Update" /></br>
</form>
</body>
</html>