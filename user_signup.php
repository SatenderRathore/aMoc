<!doctype html>
<html lang="en">


  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Registeration Form</title>
    <link rel="stylesheet" type="text/css" href="css/bootstrap.css">
    <link rel="stylesheet" type="text/css" href="css/style.css">
  </head>


  <body>
    <div class="container">

      <header class="col-xs-12 col-sm-12 col-md-12 col-lg-12 text-center ">
        <h1>Registeration Form</h1>
        <jr/>
      </header>

      <div class=" col-md-offset-4 col-md-4 col-sm-offset-3 col-sm-6 col-xs-offset-1 col-xs-10">

      <!--form starts here-->

      <form class="form-horizontal" action="functions/register/register.php" method="post">
        <div class="form-group">
          <label>Name</label>
          <input type="text" class="form-control" placeholder="Type your name.." required id = "name" name = "name">
        </div>

        <div class="form-group ">
          <label>Admission No</label>
          <input type="text" class="form-control form-control1" placeholder="Enter College Admission NO.." id = "adm_no" name = "adm_no" pattern=".{8,8}">
        </div>

        <div class="form-group ">
          <label>Email-id</label>
          <input type="email" class="form-control form-control1" placeholder="Your college mail-id" required id = "email" name = "email">
        </div>

        <div class="form-group ">
          <label>Contact No.</label>
          <input type="text" class="form-control form-control1" placeholder="Enter your contact no.." required id = "contact" name = "contact" pattern="[789][0-9]{9}" maxlength="10">
        </div>

        <div class="form-group ">
          <label>Password</label>
          <input type="password" class="form-control form-control1" placeholder="Enter password.." required id = "password" name = "password" pattern=".{6,}"required title="password length should be greater than 6">
        </div>

        <div class="form-group ">
          <label>ReEnter Password</label>
          <input type="password" class="form-control form-control1" placeholder="ReEnter Password" required id = "re_password" name = "re_password" pattern=".{6,}"required title="password length should be greater than 6">
        </div>


        <input class="btn btn-default " type="submit" value="Submit" name="submit">

      </form>

        <!--form ends here-->

      </div>
    </div>
  </body>

</html>