<?php
include("db.php");



if(isset($_POST['submit']))
{
    $email = $_POST['email'];

    $query = "SELECT email,adm_no,hash FROM details WHERE email = '$email' ";
    $result = mysqli_query($conn,$query);
    $rows = mysqli_num_rows($result);
    $output = mysqli_fetch_array($result,MYSQLI_ASSOC);

    if($rows!="")           //user is registered
    {
        $adm_no = $output['adm_no'];
        $hash = md5( rand(0,1000) );

        $qry = "UPDATE details  SET hash = '$hash' WHERE email = '$email' ";
        $rslt = mysqli_query($conn,$qry);



        $message_to_send =
            '
            You recently requested for change password.

            Please click this link to change your password:
            https://172.29.2.94/aMoc1/login/user_login/forgot/check_valid.php?adm_no='.$adm_no.'&hash='.$hash.'

            '; // Our message above including the link

            //$headers = 'From:noreply@yourwebsite.com' . "\r\n"; // Set from headers
            //mail($to, $subject, $message, $headers); // Send our email

            //send a mail with phpmailer
      include("sendmail.php"); //include sendmail.php file
      $to       =   $email;//user's email id
      $subject  =   "CHANGE PASSWORD"   ;
      $message  =   $message_to_send;
      $name     =   "Svnit Surat";
      $mailsend =   sendmail($to,$subject,$message,$name);

      if($mailsend==1){
        ?>
        <script>
        var message = "An email sent to your account, You can change your password by clicking the link";
        alert(message); window.location.href = "../../main/main.php";
        </script>;
        <?php
        //echo $msg ;
      }
      else{
        echo '<h2>There are some issue.</h2>';
      }

    }
    else
    {
    ?>
        <script>
        var message = "You are not a registered user, please register first";
        alert(message); window.location.href = "../../main/main.php";
        </script>;
        <?php
    }
}

else
{
  header("Location:index.php");
}

?>