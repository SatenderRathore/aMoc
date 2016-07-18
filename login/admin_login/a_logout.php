<?php
session_start();
unset($_SESSION['login_admin_id']);
if(session_destroy())
{
?>
<script> alert('logOut Successfully'); window.location.href = "a_index.php";</script>';
<?
//header("Location: a_index.php");
}
?>