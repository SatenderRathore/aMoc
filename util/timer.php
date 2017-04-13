<?php
	date_default_timezone_set('Asia/Kolkata');
	//---------------------------------------------
	$file=fopen("../resource/timestamp.json","r");            //Getting reference time
	$size=filesize("../resource/timestamp.json");
	$d=fread($file,$size);
	$refd=json_decode($d,true);
	$tstr=$refd["year"]."-".$refd["month"]."-".$refd["day"]." ".$refd["hour"].":".$refd["min"];
	$reftime=strtotime($tstr);
	fclose($file);
	//---------------------------------------------------
	$t=time();
	$stop_time=$reftime+(ceil($_GET["rank"]/7))*60;
	if($stop_time-$t<60)
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
