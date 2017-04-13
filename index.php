<!DOCTYPE html>
<html>
<head>
	<title>room jugad</title>
	<link rel="stylesheet" href="css/bootstrap.min.css">
	<script src="js/jquery.min.js"></script>
	<script src="js/bootstrap.js"></script>
	<style>
		.carousel-inner > .item > img,
		.carousel-inner > .item > a > img {
			height:auto;
			display: block;
			width:auto;
			margin:auto;
		}
		img{
			vertical-align: middle;
			border: 0px;
		}
		*{
			box-sizing: border-box;
			border-radius: 0px;
		}

		body{
	 background:#202020;
	 font:bold 12px Arial, Helvetica, sans-serif;
	 margin:0;
	 padding:0;
	 min-width:960px;
	 color:#bbbbbb;
}

a {
	text-decoration:none;
	color:#00c6ff;


}


.container {width: 960px; margin: 0 auto; overflow: hidden;}
.container1{width: 400px; margin: 0 auto; overflow:hidden;}
#content {	float: left; width: 100%;}

#text{
	text-align: right;
	margin-top:40px;
	margin-bottom: 15px;
}

#logo{
	margin-top: 10px;
}

.post { margin: 0 auto; padding-bottom: 10px; float: right; width: 960px; }

.btn-sign {
	width:40px;
	margin-bottom:20px;
	margin:0 auto;
	padding:10px;
	border-radius:2px;
	background: -moz-linear-gradient(center top, #00c6ff, #018eb6);
    background: -webkit-gradient(linear, left top, left bottom, from(#00c6ff), to(#018eb6));
	background:  -o-linear-gradient(top, #00c6ff, #018eb6);
    filter: progid:DXImageTransform.Microsoft.gradient(startColorStr='#00c6ff', EndColorStr='#018eb6');
	text-align:right;
	font-size:14px;
	color:#fff;
	text-transform:uppercase;
}

.btn-sign a { color:#fff; text-shadow:0 1px 2px #161616; }

#mask {
	display: none;
	background: #000;
	position: fixed; left: 0; top: 0;
	z-index: 10;
	width: 100%; height: 100%;
	opacity: 0.8;
	z-index: 999;
}

.login-popup{
	display:none;
	background: #333;
	padding: 10px;
	border: 2px solid #ddd;
	float: right;
	font-size: 1.2em;
	position: fixed;
	top: 50%; left: 50%;
	z-index: 99999;
	box-shadow: 0px 0px 20px #999;
	-moz-box-shadow: 0px 0px 20px #999; /* Firefox */
    -webkit-box-shadow: 0px 0px 20px #999; /* Safari, Chrome */
	border-radius:3px 3px 3px 3px;
    -moz-border-radius: 3px; /* Firefox */
    -webkit-border-radius: 3px; /* Safari, Chrome */
}

img.btn_close {
	float: right;
	margin: -28px -28px 0 0;
}

fieldset {
	border:none;
}

form.signin .textbox label {
	display:block;
	padding-bottom:7px;
}

form.signin .textbox span {
	display:block;
}

form.signin p, form.signin span {
	color:#999;
	font-size:11px;
	line-height:18px;
}

form.signin .textbox input {
	background:#666666;
	border-bottom:1px solid #333;
	border-left:1px solid #000;
	border-right:1px solid #333;
	border-top:1px solid #000;
	color:#fff;
	border-radius: 3px 3px 3px 3px;
	-moz-border-radius: 3px;
    -webkit-border-radius: 3px;
	font:13px Arial, Helvetica, sans-serif;
	padding:6px 6px 4px;
	width:400px;
}

form.signin input:-moz-placeholder { color:#bbb; text-shadow:0 0 2px #000; }
form.signin input::-webkit-input-placeholder { color:#bbb; text-shadow:0 0 2px #000;  }

.button {
	background: -moz-linear-gradient(center top, #f3f3f3, #dddddd);
	background: -webkit-gradient(linear, left top, left bottom, from(#f3f3f3), to(#dddddd));
	background:  -o-linear-gradient(top, #f3f3f3, #dddddd);
    filter: progid:DXImageTransform.Microsoft.gradient(startColorStr='#f3f3f3', EndColorStr='#dddddd');
	border-color:#000;
	border-width:1px;
	border-radius:4px 4px 4px 4px;
	-moz-border-radius: 4px;
    -webkit-border-radius: 4px;
	color:#333;
	cursor:pointer;
	display:inline-block;
	padding:6px 6px 4px;
	margin-top:10px;
	margin-left: 125px;
	font:12px;
	width:150px;
}

.button:hover { background:#ddd; }

#title{
	text-transform: uppercase;
	text-align: left;
	padding-top: 25px;
     margin-top: 0;
     font-size:30px;
    color: #454545;
    text-shadow: 0 1px 0 white;

}

#sub_title{
	text-transform: uppercase;
	text-align: left;
    font-size: 15px;
    color: #454545;
    text-shadow: 0 1px 0 white;

}

.secondary_item{
	margin-top:10px;
	font:13px Arial, Helvetica, sans-serif;
	color:#fff;
	cursor:pointer;
}
#forgot{
	text-align: right;
}

span{
	display:inline;
}
	</style>
	<script>
	$(document).ready(function() {/*
	$('a.login-window').click(function() {

		// Getting the variable's value from a link
		var loginBox = $(this).attr('href');

		//Fade in the Popup and add close button
		$(loginBox).fadeIn(300);

		//Set the center alignment padding + border
		var popMargTop = ($(loginBox).height() + 24) / 2;
		var popMargLeft = ($(loginBox).width() + 24) / 2;

		$(loginBox).css({
			'margin-top' : -popMargTop,
			'margin-left' : -popMargLeft
		});

		// Add the mask to body
		$('body').append('<div id="mask"></div>');
		$('#mask').fadeIn(300);

		return false;
	});*/
	// When clicking on the button close or the mask layer the popup closed
	$('a.close, #mask').live('click', function() {
	  $('#mask , .login-popup').fadeOut(300 , function() {
		$('#mask').remove();
	});
	return false;
	});
});
	</script>
</head>
<body>
	<div class="container">
	<div id="content">
	<div class="row">
	<div class="col-md-2" align="left">
	<img id="logo" class="img-responsive" src="img/logo.png">
	</div>
	<div class="col-md-10">
        	<p id="title">sardar vallabhbhai national institute of technology</p>
        	</div>
        	</div>
        	<div id="sub_title" class="row">
        	<center>
        	hostel allotment
        	</center>
        	</div>
        	</div>
        	<div id="text">
				<a href="#" class="login-window" data-toggle="modal" data-target="#login-modal">
				Login/Sign In</a>
        	</div>
        </div>
        <!--pop -up will appear from here-->
        <div class="modal fade" id="login-modal">
        	<div class="modal-dialog modal-md">
        		<div class="modal-content" style="background-color: #379">
        			<div class="modal-header">
        				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
  							<span aria-hidden="true">&times;</span>
  						</button>
  						<h4 class="modal-title" style="text-align: center;">Login</h4>
        			</div>
        			<div class="modal-body">
        				<form method="post" action="login.php">
                			<label for="username">Admission No.</label>
                			<input id="username" name="adm_no" type="text" placeholder="U14CO001" 
                			class="form-control"><br>
                			<label for="password">Password</label>
                			<input id="password" name="password" type="password" placeholder="*******" 
                			class="form-control"><br>
                			<button class="btn btn-default" type="submit" name="submit">Login</button>
                			<div class="container1 secondary_item">
                				<div id="content">
                					<div class="col-md-6" text-align="left">
                						<a  href="forgot_pass.php">Forgot password?</a>
                					</div>
                					<div class="col-md-6" id="forgot">
                						<a href="user_signup.php">New User?Signup</a>
                					</div>
                				</div>
                			</div>
          				</form>
        			</div>
        		</div>
        	</div>
		</div>

    </div>
</div>

	<div class="container">

		<div id="myCarousel" class="carousel slide" data-ride="carousel">
			<!-- Indicators -->
			<ol class="carousel-indicators">
				<li data-target="#myCarousel" data-slide-to="0" class="active"></li>
				<li data-target="#myCarousel" data-slide-to="1"></li>
				<li data-target="#myCarousel" data-slide-to="2"></li>
				<li data-target="#myCarousel" data-slide-to="3"></li>
				<li data-target="#myCarousel" data-slide-to="4"></li>
				<li data-target="#myCarousel" data-slide-to="5"></li>
			</ol>

			<!-- Wrapper for slides -->
			<div class="carousel-inner" role="listbox">
				<div class="item active">
					<img class="img-responsive" src="img/hostelimages/hostel1.jpg" alt="hostel1" >
					<div class="carousel-caption">
						<!-- to insert caption -->
					</div>
				</div>

				<div class="item">
					<img class="img-responsive" src="img/hostelimages/hostel2.jpg" alt="hostel2">
				</div>

				<div class="item">
					<img class="img-responsive" src="img/hostelimages/hostel3.jpg" alt="hostel3">
				</div>

				<div class="item">
					<img class="img-resposive" src="img/hostelimages/hostel4.jpg" alt="hostel4">
				</div>

				<div class="item">
					<img class="img-responsive" src="img/hostelimages/hostel5.jpg" alt="hostel5">
				</div>

				<div class="item">
					<img class="img-responsive" src="img/hostelimages/mess1.jpg" alt="mess">
				</div>

			</div>

			<!-- Left and right controls -->
			<a class="left carousel-control" href="#myCarousel" role="button" data-slide="prev">
				<span class="glyphicon glyphicon-chevron-left" aria-hidden="true">
				</span>
				<span class="sr-only">Previous</span>
			</a>
			<a class="right carousel-control" href="#myCarousel" role="button" data-slide="next">
				<span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
				<span class="sr-only">Next</span>
			</a>
		</div>
	</div>
<br>
</body>
</html>