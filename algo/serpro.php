<?php

/*PREFERCENCES(rank,Adm_No,P1,P2,P3,P4,P5,P6,P7,FP)*/
/* FinalList(rank,Adm_No,RoomNo(in integer code))*/
session_start();
include("pdf.php");
include("db.php");
include("decrypt.php");

$arr=array_fill(0,444,0);                     //An array full of zeros

$query = "SELECT * FROM alloted";
$result = mysqli_query($conn,$query);
while($output = mysqli_fetch_array($result,MYSQLI_ASSOC))
{
	$enc_no = $output['enc_no'];
	$arr[$enc_no] = 1;
}


$qry="SELECT * FROM preferences ORDER BY rank ASC" ;
$qry_res=mysqli_query($conn,$qry);
while($rows = mysqli_fetch_array($qry_res,MYSQLI_ASSOC))
{
	$adm_no = $rows['adm_no'];
	$pdf_qry = "SELECT u_name,contact,email FROM details WHERE adm_no = '$adm_no'";//query for pdf
	$o = mysqli_query($conn,$pdf_qry);
	$pdf_row = mysqli_fetch_array($o,MYSQLI_ASSOC);

	for($x=1;$x<=7;$x++)
	{
		$y=$rows['p'.$x];               /*Choosing priority No. for $x=1, 'P'.$x = 'P1'*/
		if($arr[$y]===0)
		{
			$arr[$y]++;
			//$qry='UPDATE preferences SET FP='.$y.' WHERE rank='.$rows["rank"].';';    //Assigning the room
			//if(mysql_query($qry)==false)
			//{
			//	/*Error handling*/
			//}
			$room = room_no($y);
			$hostel_name = hostel($y);
			$qry='INSERT INTO alloted(adm_no,rank,hostel,room_no,enc_no) VALUES("'.$rows['adm_no'].'",'.$rows['rank'].',"'.$hostel_name.'","'.$room.'",'.$y.');';        //Inserting into FinalList
			$op = mysqli_query($conn,$qry);

			//insert into pdf table to generate pdf
			$for_pdf = 'INSERT INTO pdf(u_name,adm_no,hostel,room_no,email,contact) VALUES("'.$pdf_row['u_name'].'","'.$rows['adm_no'].'","'.$hostel_name.'","'.$room.'","'.$pdf_row['email'].'",'.$pdf_row['contact'].');';
			$pdf_res = mysqli_query($conn,$for_pdf);

			if($op === false || $pdf_res === false)
			{
				$data=array("m" => "Error");
				print_r(json_encode($data));
				return json_encode($data);
				//Error handling
			}
			//-----------------------------------------------
			break;
		}
	}
}
$for_pref = "TRUNCATE TABLE preferences";
mysqli_query($conn,$for_pref);
pdf();
$data=array("m" => "Process Completes");
print_r(json_encode($data));
return json_encode($data);
//$_SESSION['to_active'] = 1;
//header("Location:pdf.php");
?>