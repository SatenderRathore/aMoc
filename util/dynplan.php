<?php
// To show list of names when a person clicks on the room
// // Table is plan(Adm_No varchar, Room_No varchar Hostel varchar)
/****** Database Details *********/

$host = "localhost";
$user = "root";
$pass = "";
$database = "aMoc";
$con = mysqli_connect($host,$user,$pass,$database);

if (!$con) {
die('Could not connect: ' . mysqli_error());
}
//------------------------------------------
//include("regconfig.php");
$rm = $_GET["rmo"];
switch($rm[0])
{
	case 'N':
	$hstl='NEHRU';
	$rmx=$rm[1].$rm[2].'-'.$rm[3].$rm[4];
	break;
	case 'T':
	$hstl='TAGORE';
	$rmx=$rm[1].$rm[2].'-'.$rm[3].$rm[4];
	break;
	case 'B':
	$hstl='BHABHA';
	$rmx=$rm[1].'-'.$rm[2].$rm[3].$rm[4];
	break;
}
$qry='SELECT * FROM plan WHERE room_no = "'.$rmx.'" AND hostel="'.$hstl.'";';
$qry_res=mysqli_query($con,$qry);
$data=array();
while($row = mysqli_fetch_array($qry_res))
{
	/*$data[]=array(
	"adm" => $row["Adm_No"]
	);*/
	array_push($data,$row["adm_no"]);
}
//$data=array("m" => $rmx);
print_r(json_encode($data));
return json_encode($data);
//echo($qry_res);
?>