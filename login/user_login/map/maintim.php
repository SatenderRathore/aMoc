<?php
	date_default_timezone_set('Asia/Kolkata');
	//------------------------------------------------------------
	$file=fopen("../../../timestamp.json","r");              //Getting refence time
	$size=filesize("../../../timestamp.json");
	$d=fread($file,$size);
	$refd[]=json_decode($d,true);
	$tstr=$refd[0]["year"]."-".$refd[0]["month"]."-".$refd[0]["day"]." ".$refd[0]["hour"].":".$refd[0]["min"];
	$reftime=strtotime($tstr);
	fclose($file);
	//------------------------------------------------
	$t=time();
	$start_time=$reftime+(floor($_GET["rank"]/7))*60;
	$stop_time=$reftime+(ceil($_GET["rank"]/7))*60;
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
		$timeLeft=date("h:i:sa",$start_time).",".date("h:i:sa",$stop_time).','.date("h:i:sa",$t);
	}
	$data=array("el"=>$el,"tim"=>$timeLeft);
	//echo($start_time."<br>".$stop_time);
	print_r(json_encode($data));
	return json_encode($data);
	//echo(date("Y-m-d h:i:sa",$stop_time));
	//echo("<br>".$timeLeft)
?>