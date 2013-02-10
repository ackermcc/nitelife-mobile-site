<?php
require('../scripts/database.php');

$slug = $_REQUEST['bar'];



$id = $_POST['id'];

if($id){

$name = $_POST['name'];
$slug = $_POST['slug'];
$address = $_POST['address'];
$zip = $_POST['zipcode'];
$region = $_POST['region'];
$desc = $_POST['description'];
$fb = $_POST['facebook'];
$twit = $_POST['twitter'];
$four = $_POST['foursquare'];
$user = $_POST['username'];
$pass = $_POST['password'];
$phone = $_POST['phone'];


$success = admin_update($id, $name, $slug, $address, $zip, $region, $desc, $fb, $twit, $four, $user, $pass, $phone);

}

if($_FILES["icon"] && $_FILES["icon"]["name"] != ''){
	move_uploaded_file($_FILES["icon"]["tmp_name"], "../icons/" . $_FILES["icon"]["name"]);
	admin_update_icon($id, $_FILES["icon"]["name"]);
	echo $_FILES["icon"]["name"];
 }
 
 if($_FILES["banner"] && $_FILES["banner"]["name"] != ''){
	move_uploaded_file($_FILES["banner"]["tmp_name"], "../banners/" . $_FILES["banner"]["name"]);
	admin_update_banner($id, $_FILES["banner"]["name"]);
 }
 
 $bar = admin_get_bar($slug);


?>

<!DOCTYPE html>

<html>

<head>
</head>
<body>
<form method="post" enctype="multipart/form-data">
	<?=$bar['icon_url']?>
	<input type="hidden" value="<?=$bar['slug']?>" name="bar" />
	<input type="hidden" value="<?=$bar['id']?>" name="id" />
	<?php if($success) echo 'Bar Successfully Updated'; ?>
	<br>ID: <?=$bar['id']?></br>
	<br>Name: <input type="text" name="name" style="width:250px;" value="<?=$bar['name']?>"></input></br>
	<br>Slug: <input type="text" name="slug" style="width:250px;" value="<?=$bar['slug']?>"></input></br>
	<br>Icon: <?php if(!$bar['icon_url']){ echo 'No Icon'; }else{ ?><img src="../icons/<?=$bar['icon_url']?>" /> <?php } ?><input type="file" name="icon"></br>
	<br>Banner: <?php if(!$bar['banner_url']){ echo 'No Banner'; }else{ ?><img src="../banners/<?=$bar['banner_url']?>" /> <?php } ?><input type="file" name="banner"></br>
	<br>Address: <input type="text" name="address" style="width:250px;" value="<?=$bar['address']?>"></input></br>
	<br>Zipcode: <input type="text" name="zipcode" style="width:250px;" value="<?=$bar['zipcode']?>"></input></br>
	<br>Region: <input type="text" name="region" style="width:250px;" value="<?=$bar['region']?>"></input></br>
	<br>Description: <textarea name="description" style="width:250px;"><?=$bar['description']?></textarea></br>
	<br>Facebook: <input type="text" name="facebook" style="width:250px;" value="<?=$bar['facebook']?>"></input></br>
	<br>Twitter: <input type="text" name="twitter" style="width:250px;" value="<?=$bar['twitter']?>"></input></br>
	<br>Foursquare: <input type="text" name="foursquare" style="width:250px;" value="<?=$bar['foursquare']?>"></input></br>
	<br>Username: <input type="text" name="username" style="width:250px;" value="<?=$bar['username']?>"></input></br>
	<br>Password: <input type="text" name="password" style="width:250px;" value="<?=$bar['password']?>"></input></br>
	<br>Phone: <input type="text" name="phone" style="width:250px;" value="<?=$bar['phone']?>"></input></br>
	<br><input type="submit" value="Update" /> <a href="bar-list.php">Go back to bar list</a></br>
</form>
</body>
</html>