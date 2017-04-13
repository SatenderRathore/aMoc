<?php
include('db.php');
session_start();
$check=$_SESSION['login_adm_no'];

$session=mysqli_query($conn,"SELECT u_name FROM details WHERE adm_no='$check' ");

$row=mysqli_fetch_array($session,MYSQLI_ASSOC);

$login_session=$row['u_name'];

if(!isset($login_session))
{
header("Location:../index.php");
}
?>

