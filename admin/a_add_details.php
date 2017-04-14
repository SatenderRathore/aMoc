<?php
include('a_db.php');


$u_name = $_POST['name'];
$u_name = strtoupper($u_name);
//echo $u_name;
$adm_no = $_POST['adm_no'];
$adm_no = strtoupper($adm_no);
//echo $adm_no;
$email = $_POST['email'];
$email = strtolower($email);
//echo $email;
$rank = $_POST['rank'];


$sql = "INSERT INTO all_details (u_name, adm_no, email_id,rank) VALUES ('$u_name', '$adm_no', '$email','$rank')";

$result = mysqli_query($conn,$sql);

if($result)
{
        echo '<script> alert("Sign Up Successful"); </script>';
        //javascript code is not execution before php code.
    //echo '
    //<script>
    //alert("Sign Up Successful");
    //</script>
   header("location: a_profile.php");
    //echo "Thank You";
}
else
{
     echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}






mysqli_close($conn);

?>