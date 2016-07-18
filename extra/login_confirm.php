<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "aMoc";

// Create connection
$conn = mysqli_connect($servername, $username, $password, $dbname);
// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

$adm_no = $_POST['adm_no'];
$password = $_POST['password'];
$password = md5($password);
$sql = "SELECT adm_no FROM details WHERE adm_no='$adm_no' AND password = '$password'";
$result = mysqli_query($conn, $sql);

//$cnt = 0;
$row = mysqli_fetch_array($result, MYSQLI_ASSOC);
//while($row = mysqli_fetch_array($result))
//{
//    $cnt++;
//}
if ($row['adm_no']== $adm_no)
{
    session_start();
    $_SESSION["adm_no"] = $adm_no;
    $_SESSION["password"] = $password;
    header('location: login_successful.php');
//    echo "<a href='welcome_page.html'>";
}
else
{
    echo "Error: Wrong Username or Password";
}

mysqli_close($conn);
?>
