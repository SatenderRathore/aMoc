<?php
/****** Database Details *********/
 
$host = "localhost"; 
$user = "root"; 
$pass = ""; 
$database = "amoc";
$con = mysqli_connect($host,$user,$pass,$database);
 
if (!$con) {
die('Could not connect: ' . mysqli_error());
}
 
//echo 'Connected successfully'; 
 
//mysql_select_db($database,$con);
?>