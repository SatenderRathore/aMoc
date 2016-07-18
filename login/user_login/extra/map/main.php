<?php
include("../session.php");
?>

<!doctype html>
<html>
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width,initial-scale=1">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<title>Book</title>
		<link rel="stylesheet" type="text/css" href="css/bootstrap.css">
		<link rel="stylesheet" type="text/css" href="css/main.css">
		<script>
		//var adm_no = '<?php echo($_SESSION['login_adm_no']); ?>';
		var adm_no='<?php echo($_SESSION['login_adm_no']); ?>';
		</script>
	</head>

	<body id="full">
		<div class="container">
			<div class="buttons">
				<button onclick = "check()" class=" col-md-offset-1 col-xs-offset-1 col-sm-offset-1 col-xs-offset-1 col-md-2 col-lg-2 col-sm-2 col-xs-2">BOOK</button>
				<a href="#"><button class=" col-md-offset-1 col-lg-offset-1 col-sm-offset-1 col-xs-offset-1 col-md-3 col-lg-3 col-sm-4 col-xs-4" >CHECK LIVE STATUS</button></a>
				<a href="#"><button class="col-md-offset-1 col-xs-offset-1 col-sm-offset-1 col-xs-offset-1 col-md-2 col-lg-2 col-sm-2 col-xs-2">PLANNING</button></a>
			</div>
		</div>

	</body>
</html>

<script src="js/profile.js"></script>


<h3 align="center"> Hellow <?php echo $login_session; ?></h3>
<h2 align="center" >Welcome to login system</h2>

<h4 align="center">  click here to <a href="../logout.php">LogOut</a> </h4>

<!--create a profile page here-->