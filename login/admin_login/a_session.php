<?php
include('a_db.php');
session_start();
$check=$_SESSION['login_admin_id'];

$session=mysqli_query($conn,"SELECT admin_id FROM admin WHERE admin_id='$check' ");

$row=mysqli_fetch_array($session,MYSQLI_ASSOC);

$login_session=$row['admin_id'];

if(!isset($login_session))
{
header("Location:a_index.php");
}
?>

