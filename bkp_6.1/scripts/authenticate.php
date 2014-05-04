<?php 

$hostname = "localhost";
$username = "nitelife_user";
$dbname = "nitelife_main";

//These variable values need to be changed by you before deploying
$password = ")I,[qT39@2[p";

//Connecting to your database
mysql_connect($hostname, $username, $password) OR DIE ("Unable to connect to database! Please try again later.");
mysql_select_db($dbname);

global $db;

$db = new mysqli($hostname, $username, $password, $dbname);

if ($db->connect_error) {
    die('Connect Error (' . $db->connect_errno . ') '
            . $db->connect_error);
}


?>