#!/usr/bin/php
<?php
 
echo "hello world\n";
 
// ...

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "cron";

// Create connection

$conn = mysqli_connect($servername, $username, $password, $dbname);
// $conn = mysql_connect($servername, $username, $password, $dbname);

// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
	$name = "satender";
    $query = "INSERT INTO tab (name) VALUES ('$name')";
    mysqli_query($conn,$query); 
?>
