<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "aMoc";

// Create connection
$conn = mysqli_connect($servername, $username, $password, $dbname);
// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

$u_name = $_POST['name'];
$adm_no = $_POST['adm_no'];
$email = $_POST['email'];
$contact = $_POST['contact'];

//$password = $_POST['password'];

//$password = md5($password);
//$creation_date = date("Y-m-d");
//$updated_date = $creation_date;
//$end_date = "2016-12-31";
//$is_active = true;
if(isset($_POST['name']) && !empty($_POST['name']) AND isset($_POST['email']) && !empty($_POST['email']))
    {
        $name = mysqli_escape_string($conn,$_POST['name']); // Turn our post into a local variable
        $email = mysqli_escape_string($conn,$_POST['email']); // Turn our post into a local variable
        $adm_no = mysqli_escape_string($conn,$_POST['adm_no']);
        $contact = mysqli_escape_string($conn,$_POST['contact']);
         if(eregi("^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,3})$", $email))//some formate for email
        {
            echo "hello";
            $sql_query= "SELECT u_name ,adm_no FROM all_details WHERE email_id = '$email'";//check in database of all the users
            $query_output = mysqli_query($conn,$sql_query);
            //printf("op = %d",$query_output);
            $output_rows = mysqli_fetch_array($query_output,MYSQLI_ASSOC);
            //for debugging
            //echo $output_rows['u_name'];
            //echo $output_rows['adm_no'];
            //mysqli_close($conn);//connection for database aMoc is closed
            //for debugging
            if($output_rows['u_name'] == $name && $output_rows['adm_no'] == $adm_no)
            {
                //for debugging
              //  $connn = mysqli_connect($servername, $username, $password, "aMoc1");//new connection for dateabase aMoc1
                //echo "inside if statement";
            //$h =  mysqli_query($conn,"INSERT INTO all_details (u_name,adm_no,email_id) VALUES ('singh palara shakti','u14co053','singhpalarashakti@gmail.com')");
              //   printf("h = %d",$h);
              //for debugging
                 $query_to_check = "SELECT adm_no FROM details WHERE u_name= '$name' AND email= '$email'";//check id user already exists
                 $result = mysqli_query($conn,$query_to_check);
                 printf("inside if = %d",$result);
                 $output= mysqli_fetch_array($result,MYSQLI_ASSOC);
                 //echo "$number_of_rows";
                 echo $output['adm_no'];
                 if($output['adm_no'] != $adm_no)//for new users
                 {

                    echo "in out";
                    //echo "user already exists";
                    $msg = 'Your account has been made, <br /> please verify it by clicking the activation link that has been send to your email.';

                    echo "$msg";

                    $hash = md5( rand(0,1000) ); // Generate random 32 character hash and assign it to a local variable.
                        // Example output: f4552671f8909587cf485ea990207f3b

                    $password = rand(1000,5000); // Generate random number between 1000 and 5000 and assign it to a local variable.
                        // Example output: 4568
                    $insert_query = "INSERT INTO details (u_name, password, email, hash,adm_no,contact) VALUES(
            '". mysqli_escape_string($conn,$name) ."',
            '". mysqli_escape_string($conn,md5($password)) ."',
            '". mysqli_escape_string($conn,$email) ."',
            '". mysqli_escape_string($conn,$hash) ."',
            '". mysqli_escape_string($conn,$adm_no) ."',
            '". mysqli_escape_string($conn,$contact) ."') ";

             mysqli_query($conn,$insert_query) or die(mysqli_error());
echo "inserted";

             //send a email

             $to      = $email; // Send email to our user
            $subject = 'Signup | Verification'; // Give the email a subject
            $message = '

            Thanks for signing up!
            Your account has been created, you can login with the following credentials after you have activated your account by pressing the url below.

            ------------------------
            Username: '.$name.'
            Password: '.$password.'
            ------------------------

            Please click this link to activate your account:
            http://www.yourwebsite.com/verify.php?email='.$email.'&hash='.$hash.'

            '; // Our message above including the link

            $headers = 'From:noreply@yourwebsite.com' . "\r\n"; // Set from headers
            mail($to, $subject, $message, $headers); // Send our email

                 }

                 else
                 {
                    //if account has already been created
                     header("Location: register_already_signup.php");
                 }
            }

            else
            {
                //else part for data not found in main database which contains the information of all the data
             header("Location: register_not_eligible.php");
            }


        //echo "$all_query";
        //echo "all queries";

        }

        else
        {
            //else part if email dont match the requirments
            header("Location: register_wrong_email.php");
        }

    }

mysqli_close($conn);


?>
