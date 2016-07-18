<?php

function pdf()
{
include("db.php");
//echo "hello";
include("sendmail.php");
//$_session['to_active'] = 1;

//$to_active = $_SESSION['to_active'];
//if($to_active)
//{
// // // //  echo "hello world!!!";
//}

//QUERY TO FETCH DETAILS WHOME WE WANT TO EMAIL FOR THEIR ROOM ALLTOMENT
$query  = "SELECT * FROM pdf";
$result = mysqli_query($conn,$query);
//$row = mysqli_fetch_array($result,MYSQLI_ASSOC);

while($rows = mysqli_fetch_array($result,MYSQLI_ASSOC))
{
    $message_to_send =
            '
            Thank you!
            your room has been booked, here are the details.

            NAME : '.$rows['u_name'].'
            ADMISSION NO : '.$rows['adm_no'].'
            HOSTEL : '.$rows['hostel'].'
            ROOM NO : '.$rows['room_no'].'
            ';

            //send a mail with phpmailer
      //include("sendmail.php"); //include sendmail.php file
      $email = $rows['email'];
      $to       =   $email;//user's email id
      $subject  =   "FINAL HOSTEL ALLOTMENT";
      $message  =   $message_to_send;
      $name     =   "Svnit Surat";
      $mailsend =   sendmail($to,$subject,$message,$name);

      if($mailsend==1){

        echo "SUCCESS - ";
      }
      else{
        echo '<h2>There are some issue.</h2>';
      }
}


$for_empty = "TRUNCATE TABLE pdf";
mysqli_query($conn,$for_empty);

}

?>