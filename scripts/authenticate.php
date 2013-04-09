<?php 

$con = mysql_connect("localhost","root","password");
if (!$con)
{
	die('Could not connect: ' . mysql_error());
}

mysql_select_db("nitelife", $con);

global $db;

$db = new mysqli('localhost', 'root', 'password', 'nitelife');

if ($db->connect_error) {
    die('Connect Error (' . $db->connect_errno . ') '
            . $db->connect_error);
}


?>