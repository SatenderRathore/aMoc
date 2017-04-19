<?php
include('a_db.php');

if(isset($_POST['submit']))
{
session_start();
{
    $admin_id=$_POST["admin_id"];
    $pass=$_POST["password"];
    $pass = md5($pass);
     $query = "SELECT admin_id FROM admin WHERE admin_id='$admin_id' AND password='$pass'";
     printf("query = %d",$query);
     $fetch=mysqli_query($conn,$query);

     $count=mysqli_num_rows($fetch);
     printf("count = %d",$count);
     //$_SESSION['wrong_details'] = 0;// check down in else part. it is for wrong details.
     if($count!="")
     {
     //session_register("sessionusername");  //what is this search this on google and why it is not working??
     $_SESSION['login_admin_id']=$admin_id;
     header("Location:a_profile.php");
     }



     else
     {

      header('Location:index.php');
     }

}

}
else
{
    header("Location:index.php");
}
?>