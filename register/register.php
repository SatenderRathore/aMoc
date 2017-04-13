<?php
include('db.php');


$u_name = $_POST['name'];
$adm_no = $_POST['adm_no'];
$email = $_POST['email'];
$contact = $_POST['contact'];
$password = $_POST['password'];
$re_password = $_POST['re_password'];

//printf("issset = %d",isset($_POST['submit']));
if(isset($_POST['submit']))
{
  if($password === $re_password)//if both passwords are correct
  {
    if(isset($_POST['name']) && !empty($_POST['name']) AND isset($_POST['email']) && !empty($_POST['email']))
    {
        $name = mysqli_escape_string($conn,$_POST['name']); // Turn our post into a local variable
        $name = strtoupper($name);
        $email = mysqli_escape_string($conn,$_POST['email']); // Turn our post into a local variable
        $email = strtolower($email);
        $adm_no = mysqli_escape_string($conn,$_POST['adm_no']);// Turn our post into a local variable
        $adm_no = strtoupper($adm_no);
        $contact = mysqli_escape_string($conn,$_POST['contact']);// Turn our post into a local variable

        //some formate for email
        // if(eregi("^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,3})$", $email))
        // {
          //query to check if user is eligible for signup
          //all_details database
          $sql_query= "SELECT u_name ,adm_no FROM all_details WHERE email_id = '$email'";
          $query_output = mysqli_query($conn,$sql_query);
          $output_rows = mysqli_fetch_array($query_output,MYSQLI_ASSOC);
          //query to check if user is eligible for signup

          if($output_rows['u_name'] == $name && $output_rows['adm_no'] == $adm_no) //compare local var with db
          {
            //query to check if user already has an account
            //details database
            $query_to_check = "SELECT adm_no,active FROM details WHERE u_name= '$name' AND email= '$email'";
            $result = mysqli_query($conn,$query_to_check);
            $output= mysqli_fetch_array($result,MYSQLI_ASSOC);
            //query to check if user already has an account

            if(!($output['adm_no'] === $adm_no AND $output['active'] === 1))//compare if account already exists
            {
              $msg = 'Your account has been made, <br /> please verify it by clicking the activation link that has been send to your email.';

              $hash = md5( rand(0,1000) ); // Generate random 32 character hash and assign it to a local variable.
                      // Example output: f4552671f8909587cf485ea990207f3b
              $localIP = getHostByName(getHostName());
              $message_to_send =
              '
              Thanks for signing up!
              Your account has been created, you can login with the following credentials after you have activated your account by pressing the url below.

              Please click this link to activate your account:
              https://'.$localIP.'/aMoc/register/verify.php?email='.$email.'&hash='.$hash.'

              '; // Our message above including the link

              //$headers = 'From:noreply@yourwebsite.com' . "\r\n"; // Set from headers
              //mail($to, $subject, $message, $headers); // Send our email

              //send a mail with phpmailer
              include("sendmail.php"); //include sendmail.php file
              $to       =   $email;//user's email id
              $subject  =   "SignUp | Verification";
              $message  =   $message_to_send;
              $name     =   "Svnit Surat";
              $mailsend =   sendmail($to,$subject,$message,$name);

              if($mailsend==1)
              {
                  

                  //$password = rand(100000,5000000000); // Generate random number between 1000 and 5000 and assign it to a local variable.
                      // Example output: 4568
                  //insert users details in details database
                  $insert_query = "INSERT INTO details (u_name, password, email, hash,adm_no,contact) VALUES(
                  '". mysqli_escape_string($conn,$name) ."',
                  '". mysqli_escape_string($conn,md5($password)) ."',
                  '". mysqli_escape_string($conn,$email) ."',
                  '". mysqli_escape_string($conn,$hash) ."',
                  '". mysqli_escape_string($conn,$adm_no) ."',
                  '". mysqli_escape_string($conn,$contact) ."') ";

                   mysqli_query($conn,$insert_query) or die(mysqli_error());

                   $plan_query = "INSERT INTO plan (adm_no)VALUES('$adm_no')";
                   mysqli_query($conn,$plan_query);



                ?>
                <script>
                var message = "Your account has been made,Please verify it by clicking the activation link that has been send to your email.";
                alert(message); window.location.href = "../login/main/main.php";
                </script>';
                <?php
                //echo $msg ;
              }
              else
              {
                echo '<h2>There are some issue.</h2>';
              }
            }
            else
            {
              //if account has already been created
              ?>
                <script> alert('You have already created an account, Please login using account details.'); window.location.href = "../login/main/main.php";</script>';
              <?php
              //header("Location: register_already_signup.php");
            }
          }
          else
          {
              //else part for data not found in main database which contains the information of all the data
          ?>
              <script> alert('You are not eligible to make an account, Please register using valid details.'); window.location.href = "index.php";</script>';
           <?php
           //header("Location: register_not_eligible.php");
          }
        // }

        // else
        // {
        //     //else part if email dont match the requirments
        //  ?>

             <script> //alert('Wrong email id.'); window.location.href = "index.php";</script>';
          <?php

        //     //header("Location: register_wrong_email.php");
        // }

    }

  }

  else //if both password do not match
  {
    ?>
    <script> alert('passwords do not match'); window.location.href = "index.php";</script>';
    <?php
  }
}

else
{
  header("Location:index.php");
}
mysqli_close($conn);


?>
