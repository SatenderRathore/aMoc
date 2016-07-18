<?php
	date_default_timezone_set('Asia/Kolkata');
	$t=time();
	$start_time=strtotime("5-4-2016 22:00")+(floor($_GET["rank"]/7))*180;
	$stop_time=strtotime("5-4-2016 22:00")+(ceil($_GET["rank"]/7))*180;
	$el=($t>$start_time && $t<$stop_time? true : false);
	if($start_time>$t)
	{
		$timeLeft="Time left : ".($start_time-$t);
	}
	else if($start_time<=$t && $stop_time>=$t)
	{
		$timeLeft="Your preference filling time has already begun!!";
	}
	else
	{
		$timeLeft="Your preference filling time is over!!";
	}
	$data=array("el"=>$el,"tim"=>$timeLeft);
	//echo($start_time."<br>".$stop_time);
	print_r(json_encode($data));
	return json_encode($data);
	//echo(date("Y-m-d h:i:sa",$stop_time));
	//echo("<br>".$timeLeft)
?>