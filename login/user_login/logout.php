<?php
session_start();
unset($_SESSION['adm_no']);
if(session_destroy())
{

?>
    <script> alert('logOut Successfully'); window.location.href = "../main/main.php";</script>';
<?php
//header("Location: index.php");
}
?>