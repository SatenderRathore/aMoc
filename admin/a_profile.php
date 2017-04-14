<?php
include("a_session.php");
?>

<h3 align="center"> Hellow <?php echo $login_session; ?></h3>
<h2 align="center" >Welcome to login system</h2>

<h4 align="center">  click here to <a href="a_logout.php">LogOut</a> </h4>

<!--create a profile page here-->
<!doctype html>
<html lang="en">


  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Admin</title>
    <link rel="stylesheet" type="text/css" href="../css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="../css/style.css">
  </head>


  <body>
    <div class="container">

      <header class="col-xs-12 col-sm-12 col-md-12 col-lg-12 text-center ">
            <h1>Fill Details</h1>
            <jr/>
        </header>

      <div class=" col-md-offset-4 col-md-4 col-sm-offset-3 col-sm-6 col-xs-offset-1 col-xs-10">

      <!--form starts here-->

      <form class="form-horizontal" action="a_add_details.php" method="post">
            <div class="form-group ">
                <label>Name</label>
                <input type="text" class="form-control" placeholder="Type your name.." required id = "name" name = "name">
            </div>

            <div class="form-group ">
                <label>Admission No</label>
                <input type="text" class="form-control form-control1" placeholder="Enter your Admission number.." id = "adm_no" name = "adm_no">
            </div>

            <div class="form-group ">
                <label>Email-id</label>
                <input type="email" class="form-control form-control1" placeholder="Your college mail-id" required id = "email" name = "email">
            </div>


            <div class="form-group ">
                <label>Rank</label>
                <input type="number" class="form-control form-control1" placeholder="Enter Rank" id = "rank" name = "rank">
            </div>

            <input class="btn btn-default " type="submit" value="Submit">

        </form>

        <!--form ends here-->

      </div>
    </div>
  </body>
