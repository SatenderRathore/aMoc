<!-- start PHP code -->
<?php
include('db.php');

if(isset($_GET['adm_no']) && !empty($_GET['adm_no']) AND isset($_GET['hash']) && !empty($_GET['hash']))
{
 // Verify data
   $adm_no = mysqli_escape_string($conn,$_GET['adm_no']); // Set email variable
   $hash = mysqli_escape_string($conn,$_GET['hash']); // Set hash variable
   $search = mysqli_query($conn,"SELECT adm_no, hash FROM details WHERE adm_no='".$adm_no."' AND hash='".$hash."' ") or die(mysql_error());
   $match  = mysqli_num_rows($search);

   if($match > 0)
   {
   // We have a match, activate the account
      //mysqli_query($conn,"UPDATE details SET active='1' WHERE email='".$email."' AND hash='".$hash."' AND active='0'") or die(mysql_error());
      //echo '<div class="statusmsg">Your account has been activated, you can now login</div>';
        session_start();
        $_SESSION['adm_no'] = $adm_no;
        header("Location:change_p.php");
      //give a link to login page
    }

   else
   {
   // No match -> invalid url or account has already been activated.
      //echo '<div class="statusmsg">The url is invalid.</div>';
      ?>

      <script> alert('The url is invalid'); window.location.href = "index.php";</script>';

      <?php
}

}

else
{
// Invalid approach
    //echo '<div class="statusmsg">Invalid approach, please use the link that has been send to your email.</div>';
  ?>

  <script> alert('Invalid approach, please use the link that has been send to your email.'); window.location.href = "index.php";</script>';

  <?php
}

?>
<!-- stop PHP Code -->


