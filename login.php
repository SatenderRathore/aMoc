<?php
include('util/db.php');

if(isset($_POST["submit"])) {
    session_start();
    $adm_no=$_POST["adm_no"];
    $pass=$_POST["password"];
    $pass = md5($pass);
    //query for login
    $query = "SELECT adm_no FROM details WHERE adm_no='$adm_no' AND password='$pass' AND active = '1'";
    $fetch=mysqli_query($conn,$query);
    $count=mysqli_num_rows($fetch);
    //query for rank
    $rank_query = "SELECT rank FROM all_details WHERE adm_no = '$adm_no'";
    $fetch_rank = mysqli_query($conn,$rank_query);
    $rank=mysqli_fetch_array($fetch_rank,MYSQLI_ASSOC);
    //$_SESSION['wrong_details'] = 0;// check down in else part. it is for wrong details.
    if($count!="") {
        //session_register("sessionusername");  //what is this search this on google and why it is not working??
        $_SESSION['login_adm_no'] = $adm_no; //admission no session variable
        $_SESSION['rank'] = $rank["rank"]; //rank session variable
        header("Location:user_page.php");
        //header("Location:../../algo/algo.php");
    } else {
        //$_SESSION['wrong_details'] = 1;
?>
    <script> alert('Wrong Details'); window.location.href = "../aMoc/index.php";</script>';
<?php
//header('Location:index_w.php');
     }
} else header('Location:index.php');
?>