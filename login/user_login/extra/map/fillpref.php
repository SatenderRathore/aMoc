<?php
//include("regconfig.php");

/*preferences(rank,Adm_No,P1,P2,P3,P4,P5,P6,P7,FP)*/


give();

function give()
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

//mysql_select_db($database,$con);
	$rank=$_GET["rank"];
	$adm=$_GET["Adm_no"];
	$qry='INSERT INTO preferences (rank,Adm_No';
	//$res=mysql_query($qry);
	for($i=1;$i<=7;$i++)
	{
		if(strcmp($_GET["p".$i],"undefined"))
		{
			$qry=$qry.',p'.$i;
		}
		else
		{
			break;
		}
	}
	$qry=$qry.') VALUES ('.$rank.',"'.$adm.'"';
	for($k=1;$k<$i;$k++)
	{
		$qry=$qry.','.$_GET['p'.$k];
	}
	$qry=$qry.');';
	$res=mysqli_query($con,$qry);
	if($res==true)
	{
		$data=array("m" => "Preferences submitted successfully!!");
		print_r(json_encode($data));
		return(json_encode($data));
	}
	else
	{
		$data=array("m" => "SORRY,YOU HAVE ALREADY SUBMITTED YOUR PREFERENCES!!");
		print_r(json_encode($data));
		return(json_encode($data));
	}
	//$data=array('m' => $qry);
	//$file=fopen("code.txt","w");
	//fwrite($file,$qry);
	//fclose($file);
	//print_r(json_encode($data));
	//return json_encode($data);
}
?>