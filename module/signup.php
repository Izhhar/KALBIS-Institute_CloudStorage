<?php require_once "../include/getdata.php" ?>

<?php
	$status = "";
	if(!isset($_COOKIE["errorRegister"])) 
	{
		$status = "";
	}
	else
	{
		$status = $_COOKIE["errorRegister"];
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
	<link href="../asset/css/register-style.css" rel="stylesheet">
	
	<style>
		.icon-link:hover{
			cursor : pointer;
			text-decoration:none;
		}
		
		#danger-alert{
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
				<form role="form" id="sign_up" method="POST" action="../include/doSignUp.php">
					<h2>Please Sign Up <small>It's free and always will be.</small></h2>
					<hr class="colorgraph">
						<div class="row">
							<div class="col-xs-12 col-sm-12 col-md-12">
								<div class="form-group">
									<div class="input-group">
										<span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
										<input type="text" name="full_name" id="full_name" class="form-control input-lg" placeholder="Full Name" value="" tabindex="1">
									</div>
								</div>
							</div>
						</div>
						<div class="form-group">
							<div class="input-group">
								<span class="input-group-addon"><i class="glyphicon glyphicon-eye-open"></i></span>
								<input type="text" name="display_name" id="display_name" class="form-control input-lg" placeholder="Display Name" value="" tabindex="3">
							</div>
						</div>
						<div class="form-group">
							<div class="input-group">
								<span class="input-group-addon"><i class="glyphicon glyphicon-envelope"></i></span>
								<input type="email" name="email" id="email" class="form-control input-lg" placeholder="Email Address" value="" tabindex="4">
							</div>
						</div>
						<div class="row">
							<div class="col-xs-12 col-sm-6 col-md-6">
								<div class="form-group">
									<div class="input-group" id="check_pass1">
										<span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></span>
										<input type="password" name="password" id="password" class="form-control input-lg" placeholder="Password" tabindex="5">
									</div>
								</div>
							</div>
							<div class="col-xs-12 col-sm-6 col-md-6">
								<div class="form-group">
									<div class="input-group" id="check_pass2">
										<span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></span>
										<input type="password" name="password_confirmation" id="password_confirmation" class="form-control input-lg" placeholder="Confirm Password" tabindex="6">
									</div>
								</div>
							</div>
						
						<div class="col-xs-12 col-sm-6 col-md-6">
							<div class="form-group">
								<div class="input-group">
									<span class="input-group-addon"><i class="glyphicon glyphicon-remove"></i></span>
									<select name="gender" class="form-control input-lg">
									  <option value="">Gender</option>
									  <option value="Male">Male</option>
									  <option value="Female">Female</option>
									</select>
								</div>
							</div>
						</div>
						</div>
						<div class="row">
							<!--
							<div class="col-xs-4 col-sm-3 col-md-3">
								<span class="button-checkbox">
									<button type="button" class="btn" data-color="info" tabindex="7">I Agree</button>
									<input type="checkbox" name="t_and_c" id="t_and_c" class="hidden" value="1">
								</span>
							</div>
							-->
							<div class="col-xs-8 col-sm-9 col-md-9">
								By clicking <strong class="label label-primary">Register</strong>, you agree to the <a href="#" data-toggle="modal" data-target="#t_and_c_m">Terms and Conditions</a> set out by this site, including our Cookie Use.
							</div>
						</div>
					<hr class="colorgraph">
						<div class="row">
							<div class="col-xs-12 col-md-6"><input type="submit" value="Register" class="btn btn-primary btn-block btn-lg" tabindex="7"></div>
							<div class="col-xs-12 col-md-6"><a href="signin.php" class="btn btn-success btn-block btn-lg">Sign In</a></div>
						</div>
				</form>
				<div class="row">
					<div class="col-xs-12 col-md-12">
						<div class="alert alert-danger" id="danger-alert">
							<strong><span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span></strong> Invalid Create Account
						</div>
					</div>
				</div>
			</div>
		</div>
		
		<!-- Modal -->
		<div class="modal fade" id="t_and_c_m" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
			<div class="modal-dialog modal-lg">
				<div class="modal-content">
					<div class="modal-header">
						<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
						<h4 class="modal-title" id="myModalLabel">Terms & Conditions</h4>
					</div>
					<div class="modal-body">
						<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Similique, itaque, modi, aliquam nostrum at sapiente consequuntur natus odio reiciendis perferendis rem nisi tempore possimus ipsa porro delectus quidem dolorem ad.</p>
						<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Similique, itaque, modi, aliquam nostrum at sapiente consequuntur natus odio reiciendis perferendis rem nisi tempore possimus ipsa porro delectus quidem dolorem ad.</p>
						<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Similique, itaque, modi, aliquam nostrum at sapiente consequuntur natus odio reiciendis perferendis rem nisi tempore possimus ipsa porro delectus quidem dolorem ad.</p>
						<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Similique, itaque, modi, aliquam nostrum at sapiente consequuntur natus odio reiciendis perferendis rem nisi tempore possimus ipsa porro delectus quidem dolorem ad.</p>
						<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Similique, itaque, modi, aliquam nostrum at sapiente consequuntur natus odio reiciendis perferendis rem nisi tempore possimus ipsa porro delectus quidem dolorem ad.</p>
						<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Similique, itaque, modi, aliquam nostrum at sapiente consequuntur natus odio reiciendis perferendis rem nisi tempore possimus ipsa porro delectus quidem dolorem ad.</p>
						<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Similique, itaque, modi, aliquam nostrum at sapiente consequuntur natus odio reiciendis perferendis rem nisi tempore possimus ipsa porro delectus quidem dolorem ad.</p>
					</div>
					<div class="modal-footer">
						<button type="button" class="btn btn-primary" data-dismiss="modal">I Agree</button>
					</div>
				</div><!-- /.modal-content -->
			</div><!-- /.modal-dialog -->
		</div><!-- /.modal -->
	</div>
	
	<!-- jQuery -->
	<script src="../dist/jquery/jquery-1.11.3.min.js"></script>
	
	<!-- Sweetalert Core JavaScript -->
	<script src="../dist/sweetalert/dist/sweetalert.min.js"></script>
	
	<!-- Bootstrap Core JavaScript -->
    <script src="../dist/bootstrap/js/bootstrap.min.js"></script>

	<!-- Custom JavaScript -->
	<script src="../asset/js/register.js"></script>
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