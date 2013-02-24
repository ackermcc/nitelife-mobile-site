<?php
require('../scripts/database.php');

$slug = $_REQUEST['bar'];

if($slug){
	
	$id = get_id_from_slug($slug);

	if(isset($_POST['update-bar'])){

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



		if($_FILES["icon"] && $_FILES["icon"]["name"] != ''){
			move_uploaded_file($_FILES["icon"]["tmp_name"], "../icons/" . $_FILES["icon"]["name"]);
			admin_update_icon($id, $_FILES["icon"]["name"]);
			//echo $_FILES["icon"]["name"];
		 }
		 
		 if($_FILES["banner"] && $_FILES["banner"]["name"] != ''){
			move_uploaded_file($_FILES["banner"]["tmp_name"], "../banners/" . $_FILES["banner"]["name"]);
			admin_update_banner($id, $_FILES["banner"]["name"]);
		 }
	 }
	 
	 if(isset($_POST['add-special'])){
		$name = $_POST['new-special-name'];
		$times = $_POST['new-special-times'];
		$startdate = $_POST['special-start-date'];
		$enddate = $_POST['special-end-date'];
		$days = $_POST['special-days'];
		
		
		admin_add_specials($id, $name, $times, $startdate, $enddate, $days);
		
		$message = "Specials added successfully";
	 
	 }
	 
	 if(isset($_POST['delete-specials'])){
		$deletes = $_POST['delete-special'];
		admin_delete_specials($deletes);
	 
		$message = "Specials deleted successfully";
	 }
	 if(isset($_POST['add-open'])){
		$times = $_POST['new-open-times'];
		$days = $_POST['open-days'];
		
		admin_add_opentimes($id, $days, $times);		
	 }
	 
	 if(isset($_POST['delete-open-time'])){
		$ids = $_POST['delete-open-times'];
		admin_remove_opentimes($ids);
	 
	 }	
	
	 
	 $bar = admin_get_bar($slug);
	 $specials = admin_get_specials($slug);
	 $opentimes = admin_get_opentimes($slug);
	 
 }else{
 
	if(isset($_POST['update-bar'])){
		
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
		
		$id = admin_add_bar($name, $slug, $address, $zip, $region, $desc, $fb, $twit, $four, $user, $pass, $phone);
		
		
		if($_FILES["icon"] && $_FILES["icon"]["name"] != ''){
			move_uploaded_file($_FILES["icon"]["tmp_name"], "../icons/" . $_FILES["icon"]["name"]);
			admin_update_icon($id, $_FILES["icon"]["name"]);
		 }
		 
		 if($_FILES["banner"] && $_FILES["banner"]["name"] != ''){
			move_uploaded_file($_FILES["banner"]["tmp_name"], "../banners/" . $_FILES["banner"]["name"]);
			admin_update_banner($id, $_FILES["banner"]["name"]);
		 }
		
		 header( 'Location: edit-bar.php?bar='.$slug ) ;
		
	}
 }

?>

<!DOCTYPE html>

<html>
<head>
	<link rel="shortcut icon" href="images/nl_logo_r.png" />
	<link rel="stylesheet" href="admin.css">
	<link rel="stylesheet" href="../css/font-awesome.css">
	<meta charset="utf-8" />
	<title>NiteLife - Admin</title>

	<script type="text/javascript" src="//use.typekit.net/uni7btv.js"></script>
	<script type="text/javascript">try{Typekit.load();}catch(e){}</script>
</head>

<body>
<header>
	<img src="../images/logo_admin.png" alt="" />
</header>

<div class="edit-container">
	<div>
<?php if($slug){ ?>
<h2>Bar Information</h2>
<?php }else{ ?>
<?php if($message) echo $message;?>
<h2>Add Bar</h2>
<?php } ?>
<form method="post" enctype="multipart/form-data">
	<?=$bar['icon_url']?>
	<input type="hidden" value="<?=$bar['slug']?>" name="bar" />
	<input type="hidden" value="<?=$bar['id']?>" name="id" />
	<?php if($success) echo 'Bar Successfully Updated'; ?>
	<br>ID: <?=$bar['id']?></br>
	<br>Name: <input type="text" name="name" style="width:250px;" value="<?=$bar['name']?>"></input></br>
	<br>Slug: <input type="text" name="slug" style="width:250px;" value="<?=$bar['slug']?>"></input></br>
	
	<br>Icon: 
			<?php if(!$bar['icon_url']){ 
				echo 'No Icon'; 
			}else{ ?>
				<img src="../icons/<?=$bar['icon_url']?>" />
			<?php } ?>
			<input type="file" name="icon"></br>
	<br>Banner: 
			<?php if(!$bar['banner_url']){ 
				echo 'No Banner'; 
			}else{ ?>
				<img id="banner" src="../banners/<?=$bar['banner_url']?>" /> 
			<?php } ?>
			<input type="file" name="banner"></br>

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
	<?php if($slug){ ?>
		<br><input type="submit" name="update-bar" value="Update" /> <a href="index.php">Go back to bar list</a></br>
	<?php }else{ ?>
		<br><input type="submit" name="update-bar" value="Add" /> <a href="index.php">Go back to bar list</a></br>
	<?php } ?>
	</form>
	</div>

	<div>
	<?php if($slug){ ?>
		<h2>Specials</h2>
		<form method="post">
		<table cellpadding="0" cellspacing="0" border="0">
			<tr>
				<!-- <td>ID</td> -->
				<td>Name</td>
				<td>Times</td>
				<td>Start Date</td>
				<td>End Date</td>
				<td>Day</td>
				<td></td>
			</tr>
		<?php foreach($specials as $special){ ?>
				<tr>
					<!-- <td><?=$special['id']?></td> -->
					<td><?=$special['name']?></td>
					<td><?=$special['times']?></td>
					<td><?=$special['date_start']?></td>
					<td><?=$special['date_end']?></td>
					<td><?=$special['day']?></td>
					<td><input type="checkbox" name="delete-special[]" value="<?=$special['id']?>"></td>
				</tr>
		<?php } ?>
		</table>
		<input type="submit" name="delete-specials" value="Delete Specials" />
		<h3>Add New</h3>
		Name:<input type="text" style="width:200;" name="new-special-name" maxlength="80" />
		Times:<input type="text" name="new-special-times" />
		Date Start:<input type="date" name="special-start-date" />
		Date End:<input type="date" name="special-end-date" /> 
		Days: <input type="checkbox" name="special-days[]" value="M">M
				<input type="checkbox" name="special-days[]" value="T">T
				<input type="checkbox" name="special-days[]" value="W">W
				<input type="checkbox" name="special-days[]" value="H">H
				<input type="checkbox" name="special-days[]" value="F">F
				<input type="checkbox" name="special-days[]" value="S">S
				<input type="checkbox" name="special-days[]" value="U">U
		<input type="submit" name="add-special" value="Add" />
		
		<h2>Open Times</h2>
		<table cellpadding="0" cellspacing="0" border="0"> 
			<tr>
				<!-- <td>ID</td> -->
				<td>Times</td>
				<td>Day</td>
				<td></td>
			</tr>
		<?php foreach($opentimes as $opentime){ ?>
				<tr>
					<!-- <td><?=$opentime['id']?></td> -->
					<td><?=$opentime['times']?></td>
					<td><?=$opentime['day']?></td>
					<td><input type="checkbox" name="delete-open-times[]" value="<?=$opentime['id']?>"></td>
				</tr>
		<?php } ?>
		</table>
		<input type="submit" name="delete-open-time" value="Delete Open Times" />
		<h3>Add New</h3>
		Times:<input type="text" name="new-open-times" />
		Days: <input type="checkbox" name="open-days[]" value="M">M
				<input type="checkbox" name="open-days[]" value="T">T
				<input type="checkbox" name="open-days[]" value="W">W
				<input type="checkbox" name="open-days[]" value="H">H
				<input type="checkbox" name="open-days[]" value="F">F
				<input type="checkbox" name="open-days[]" value="S">S
				<input type="checkbox" name="open-days[]" value="U">U
		<input type="submit" name="add-open" value="Add" />
		</form>
	<?php } ?>

</form>
</div>
</div>

</body>
</html>