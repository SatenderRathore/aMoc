<?php
include("db.php");

$password = $_POST['password'];
$password = md5($password);

$re_password = $_POST['re_password'];
$re_password = md5($re_password);

if(isset($_POST['submit']))
{
    if($password == $re_password)
    {

        session_start();
        $adm_no = $_SESSION['adm_no'];

        $query = "UPDATE details SET password = '$password' WHERE adm_no = '$adm_no'";
        $result = mysqli_query($conn,$query);

        if($result)
        {
        ?>

            <script> alert('Your password has been changed successfully.'); window.location.href = "../../main/main.php";</script>';

        <?php
        }

    }

    else
    {
        //both passwords don not match
    ?>

        <script> alert('Passwords do not match, Please try again.'); window.location.href = "change_p.php";</script>';

    <?php
    }
}
else
{
    header("Location:change_p.php");
}
?>