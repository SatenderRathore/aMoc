<?php
session_start();
if(isset($_SESSION['login_adm_no']))
{
  header('Location:map/main.php');
}
?>



<!doctype html>
<html lang="en">


  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Login Form</title>
    <link rel="stylesheet" type="text/css" href="../../helper/css/bootstrap.css">
    <link rel="stylesheet" type="text/css" href="../../helper/css/style.css">
  </head>


  <body>
    <div class="container">

      <header class="col-xs-12 col-sm-12 col-md-12 col-lg-12 text-center ">
            <h1>Login Form</h1>
            <jr/>
        </header>

      <div class=" col-md-offset-4 col-md-4 col-sm-offset-3 col-sm-6 col-xs-offset-1 col-xs-10">

<!-- comment for wrong details  now is in index_w.php-->

      <!--form starts here-->

      <form class="form-horizontal" action="login.php" method="post">


            <div class="form-group ">
                <label>Admission No</label>
                <input type="text" class="form-control form-control1" placeholder="Enter your class.." id = "adm_no" name = "adm_no">
            </div>


            <div class="form-group ">
                <label>Password</label>
                <input type="password" class="form-control form-control1" placeholder="Enter your contact no.." required id = "password" name = "password">
            </div>

            <input class="btn btn-default " type="submit" value="Submit" name = "submit">

        </form>

        <a href="forgot/index.php">Forgot Your Password?</a>

        <!--form ends here-->

      </div>
    </div>
  </body>
