<?php

	if(isset($_GET['location'])){
		
		$location = $_GET['location'];
		echo "I HAS A LOCATION ";
		echo $location;
		
	
	}

class DB{

	public function connect(){
		$con = mysql_connect("localhost", "root", "") or die(mysql_error());
		mysql_select_db("nitelife", $con);
		return true;
	}

}


?>
