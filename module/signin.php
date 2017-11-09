<?php require_once "../include/getdata.php" ?>

<?php
	$status = "";
	if(!isset($_COOKIE["errorLogin"])) 
	{
		$status = "";
	}
	else
	{
		$status = $_COOKIE["errorLogin"];
	}
?>

<!DOCTYPE html>
<html lang="en">

<head>

	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
	<meta name="description" content="">
	<meta name="author" content="">
	
	<title>Drive</title>
	
	
	<!-- Bootstrap Core CSS -->
    <link href="../dist/bootstrap/css/bootstrap.min.css" rel="stylesheet">
		
	<!-- Sweetalert CSS -->
    <link href="../dist/sweetalert/dist/sweetalert.css" rel="stylesheet">
	
	<!-- Custom CSS -->
	<link href="../asset/css/style.css" rel="stylesheet">
	<link href="../asset/css/login-style.css" rel="stylesheet">
	
	<style>
		.icon-link:hover{
			cursor : pointer;
			text-decoration:none;
		}
		
		#danger-alert{
			margin-top: 10px;
			display : none;
		}
    </style>
	
	<!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
	<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
	<!--[if lt IE 9]>
		<script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
		<script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
	<![endif]-->

</head>

<body>

	<div class="container">
		<div class="row">
			<div class="col-xs-12 col-sm-8 col-md-6 col-sm-offset-2 col-md-offset-3">
				<form role="form" id="sign_in" method="POST" action="../include/doSignIn.php">
					<h2>Please Sign in <small>get all functionality.</small></h2>
					<hr class="colorgraph">
					<div class="form-group">
						<div class="input-group">
							<span class="input-group-addon"><i class="glyphicon glyphicon-envelope"></i></span>
							<input type="email" name="email" id="email" class="form-control input-lg" placeholder="Email Address" tabindex="4" value="" autofocus required>
						</div>
					</div>
					<div class="row">
						<div class="col-xs-12 col-sm-12 col-md-12">
							<div class="form-group">
								<div class="input-group">
									<span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></span>
									<input type="password" name="password" id="password" class="form-control input-lg" placeholder="Password" tabindex="5" required>
								</div>
							</div>
						</div>
						<div class="col-xs-12 col-sm-12 col-md-12">
							&nbsp;&nbsp;&nbsp;
							<a id="signup"href="signup.php" class="icon-link"><i class="glyphicon glyphicon-user"></i> Sign Up</a>
							&nbsp;&nbsp;&nbsp;
							<a id="forgotpassword" class="icon-link"><i class="glyphicon glyphicon-question-sign"></i> Forgot Password?</a>
						</div>
					</div>
					<hr class="colorgraph">
					<div class="row">
						<div class="col-xs-12 col-md-12"><input type="submit" value="Sign In" class="btn btn-primary btn-block btn-lg" tabindex="7"></div>
					</div>
				</form>
				<div class="row">
					<div class="col-xs-12 col-md-12">
						<div class="alert alert-danger" id="danger-alert">
							<strong><span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span></strong> Invalid Username or Password
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>

	<!-- jQuery -->
	<script src="../dist/jquery/jquery-1.11.3.min.js"></script>
	
	<!-- Sweetalert Core JavaScript -->
	<script src="../dist/sweetalert/dist/sweetalert.min.js"></script>
	
	<!-- Bootstrap Core JavaScript -->
    <script src="../dist/bootstrap/js/bootstrap.min.js"></script>

	<!-- Custom JavaScript -->
	<script src="../asset/js/script.js"></script>
	
	<script>
		$(function(){
			var cek = "<?php echo $status ?>";
			if(cek == "1")
			{
				$("#danger-alert").show();
				setTimeout(function() { 
				   $('#danger-alert').fadeOut(); 
				}, 2000);				
			}
		});
	</script>
	
</body>

</html>