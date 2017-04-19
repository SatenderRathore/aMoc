<?php
// TO UPDATE THE PLANNING CHOICES OF THE USER
// Table is plan(Adm_No varchar, Room_No varchar Adm_No varchar)
/****** Database Details *********/

$host = "localhost";
$user = "root";
$pass = "";
$database = "aMoc";
$con = mysqli_connect($host,$user,$pass,$database);

if (!$con) {
die('Could not connect: ' . mysqli_error());
}
//include("regconfig.php");
$rmx=$_GET["rmo"];
$adm=$_GET["adm"];
if($rmx!="undefined")
{
switch($rmx[0])
{
	case 'N':
	$hstl='NEHRU';
	$rm=$rmx[1].$rmx[2].'-'.$rmx[3].$rmx[4];
	break;
	case 'T':
	$hstl='TAGORE';
	$rm=$rmx[1].$rmx[2].'-'.$rmx[3].$rmx[4];
	break;
	case 'B':
	$hstl = 'BHABHA';
	$rm=$rmx[1].'-'.$rmx[2].$rmx[3].$rmx[4];
	break;
}
$qry='UPDATE plan SET room_no = "'.$rm.'",hostel="'.$hstl.'" WHERE adm_no = "'.$adm.'";';
if(mysqli_query($con,$qry)==true)
{
	$data=array("m" => "Your planning choices has been submitted successfully!!");
}
else
{
	$data=array("m" => "There is an error in updating planning choice!!");
}
}
else
{
	$qry='UPDATE plan SET room_no = NULL, hostel = NULL WHERE adm_no = "'.$adm.'";';
	$res=mysqli_query($con,$qry);
	$data=array("m" => "Your preferences has been nullified");
}
//$data=array("m" => $qry);
print_r(json_encode($data));
return json_encode($data);
?>