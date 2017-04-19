<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">

<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <title>email confirmation</title>
    <link href="display/style.css" type="text/css" rel="stylesheet" />
</head>
<body>
    <!-- start header div -->
    <div id="header">

    </div>
    <!-- end header div -->

    <!-- start wrap div -->
    <div id="wrap">
        <!-- start PHP code -->
        <?php
            include('db.php');
            if(isset($_GET['email']) && !empty($_GET['email']) AND isset($_GET['hash']) && !empty($_GET['hash']))
            {
                // Verify data
                $email = mysqli_escape_string($conn,$_GET['email']); // Set email variable
                $hash = mysqli_escape_string($conn,$_GET['hash']); // Set hash variable

                $search = mysqli_query($conn,"SELECT email, hash, active FROM details WHERE email='".$email."' AND hash='".$hash."' AND active='0'") or die(mysql_error());
                $match  = mysqli_num_rows($search);

                if($match > 0)
                {
                    // We have a match, activate the account
                    mysqli_query($conn,"UPDATE details SET active='1' WHERE email='".$email."' AND hash='".$hash."' AND active='0'") or die(mysql_error());
                    //echo '<div class="statusmsg">Your account has been activated, you can now login</div>';
                    header("Location:display/displays.php");
                    //give a link to login page
                }

                else
                {
                    // No match -> invalid url or account has already been activated.
                    echo '<div class="statusmsg">The url is either invalid or you already have activated your account.</div>';
                }

            }

            else
            {
                // Invalid approach
                echo '<div class="statusmsg">Invalid approach, please use the link that has been send to your email.</div>';
            }

        ?>
        <!-- stop PHP Code -->


    </div>
    <!-- end wrap div -->
</body>
</html>