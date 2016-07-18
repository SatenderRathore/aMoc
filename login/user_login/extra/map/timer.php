<?php
	date_default_timezone_set('Asia/Kolkata');
	$t=time();
	$stop_time=strtotime("5-4-2016 22:00")+(ceil($_GET["rank"]/7))*180;
	if($stop_time-$t<180)
	{
		$timeLeft=$stop_time-$t;
	}
	else
	{
		$timeLeft=-1;
	}
	$data=array("tl"=>$timeLeft);
	print_r(json_encode($data));
	return json_encode($data);
	//echo(date("Y-m-d h:i:sa",$stop_time));
	//echo("<br>".$timeLeft)
?>