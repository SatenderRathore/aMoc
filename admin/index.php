<?php
session_start();
?>



<!doctype html>
<html lang="en">


  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title> Admin Login </title>
    <link rel="stylesheet" type="text/css" href="../css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="../css/style.css">
  </head>


  <body>
    <div class="container">

      <header class="col-xs-12 col-sm-12 col-md-12 col-lg-12 text-center ">
            <h1>Admin Login</h1>
            <jr/>
        </header>

      <div class=" col-md-offset-4 col-md-4 col-sm-offset-3 col-sm-6 col-xs-offset-1 col-xs-10">

<!-- comment for wrong details  now is in index_w.php-->

      <!--form starts here-->

      <form class="form-horizontal" action="a_login.php" method="post">


            <div class="form-group ">
                <label>Admin id</label>
                <input type="text" class="form-control form-control1" placeholder="Enter your class.." id = "admin_id" name = "admin_id">
            </div>


            <div class="form-group ">
                <label>Password</label>
                <input type="password" class="form-control form-control1" placeholder="Enter your contact no.." required id = "password" name = "password">
            </div>

            <input class="btn btn-default " type="submit" value="Submit" name = "submit">

        </form>

        <!--form ends here-->

      </div>
    </div>
  </body>
