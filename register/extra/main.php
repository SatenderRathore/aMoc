<?php
      echo "hello";
      include("sendmail.php");
      $to       =   "satenderjpr@gmail.com";
      $subject  =   "Hello Raja";
      $message  =   "hello <i>how are you this is Satender Singh Rathore.</i>";
      $name     =   "Satender Singh Rathore";
      $mailsend =   sendmail($to,$subject,$message,$name);

      printf("mail send = %d",$mailsend);
      if($mailsend==1){
        echo '<h2>email sent.</h2>';
      }
      else{
        echo '<h2>There are some issue.</h2>';
      }
?>
