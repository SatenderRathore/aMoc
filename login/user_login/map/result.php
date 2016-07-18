<?php

send();

function send()
{
	/****** Database Details *********/

$host = "localhost";
$user = "root";
$pass = "";
$database = "aMoc";
$con = mysqli_connect($host,$user,$pass,$database);

if (!$con) {
die('Could not connect: ' . mysqli_error());
}

//echo 'Connected successfully';
	$qry='SELECT Room_No,Hostel FROM alloted;';
	$res=mysqli_query($con,$qry);
	$data=array();
	while($rows = mysqli_fetch_array($res))
	{
		$data[]=array(
		"room" => $rows["Room_No"],
		"Hostel" => $rows["Hostel"]
		);
	}
	print_r(json_encode($data));
	return json_encode($data);
}
?>