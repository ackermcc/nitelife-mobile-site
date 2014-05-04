<?php 

$hostname = "nitelife.db.7728880.hostedresource.com";
$username = "nitelife";
$dbname = "nitelife";

//These variable values need to be changed by you before deploying
$password = "barFly2!";

//Connecting to your database
mysql_connect($hostname, $username, $password) OR DIE ("Unable to connect to database! Please try again later.");
mysql_select_db($dbname);

global $db;

$db = new mysqli($hostname, $username, $password, 'nitelife');

if ($db->connect_error) {
    die('Connect Error (' . $db->connect_errno . ') '
            . $db->connect_error);
}


?>