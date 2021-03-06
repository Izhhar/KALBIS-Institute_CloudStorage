<?php require_once "../../include/getdata.php" ?>
<?php require_once "../../include/connection.php" ?>
<?php
session_start();
if(isset($_SESSION['login']))
{
	$email = $_SESSION['login'];
?>
<?php
	$id_user = $_COOKIE["id_user"];
	$display_name = $_COOKIE["display_name"];
	$id_tipe_user = $_COOKIE["permission"];
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
    <link href="../../dist/bootstrap/css/bootstrap.min.css" rel="stylesheet">
		
	<!-- Sweetalert CSS -->
    <link href="../../dist/sweetalert/dist/sweetalert.css" rel="stylesheet">
	
	<!-- Custom CSS -->
	<link href="../../asset/css/style.css" rel="stylesheet">
	<link href="../../asset/css/user-profile-sidebar-style.css" rel="stylesheet">
	
	<style>
		.navbar .navbar-brand {
		padding: 10px;
		}
		
		.navbar-brand {
		float: left;
		font-size: 18px;
		line-height: 20px;
		}
		
		.navbar .logo {
		width: auto;
		height: 60px;
		}

		.navbar-brand>img {
		display: block;
		}

		.navbar-brand img {
		height: auto;
		width: 80px;
		border: 0;
		vertical-align: middle;
		}
	</style>
	
	<style>
		.table {
			border-bottom:0px !important;
		}
		.table th, .table td {
			border: 1px !important;
		}
		.fixed-table-container {
			border:0px !important;
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
	
	<!-- Navigation -->
    <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
        <div class="container-fluid">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navbar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="home.php">
					<img alt="Brand" src="../../asset/img/logo.png">
				</a>
            </div>
            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="navbar-collapse">
                <ul class="nav navbar-nav">
                    <li><a href="#"><span class=""></span></a></li>
                </ul>
            </div>
            <!-- /.navbar-collapse -->
        </div>
        <!-- /.container -->
    </nav>

    <!-- Put your page content here! -->
	<div class="container-fluid" style="margin-top: 50px;">
		<div class="row-fluid">
			
			
		</div>
	</div>
	
	<div class="container-fluid">
    <div class="row profile">
		<div class="col-md-3">
			<div class="profile-sidebar">
			<?php
	$result = $connect->query("SELECT * FROM `users` WHERE id_user = '".$id_user."'");
	if($result->num_rows > 0)
	{
		while($row = $result->fetch_assoc())
		{
?>
				<!-- SIDEBAR USERPIC -->
				<div class="profile-userpic">
					<img src="../../asset/img/avatar-user/<?php echo $row["avatar_url"]; ?>" onerror="this.src = '../../asset/img/avatar.jpg'" class="img-responsive" alt="Avatar">
				</div>
				<!-- END SIDEBAR USERPIC -->
				<!-- SIDEBAR USER TITLE -->
				<div class="profile-usertitle">
					<div class="profile-usertitle-name">
						<?php echo $row['email'];?>
					</div>
					<div class="profile-usertitle-job">
						<?php echo $row['display_name'];?>
					</div>
				</div>
				<?php
		}
	}
?>
				<!-- END SIDEBAR USER TITLE -->
				<!-- SIDEBAR BUTTONS -->
				<div class="profile-userbuttons">
					<a href="profile.php" type="button" class="btn btn-success btn-sm">Profile</a>
					<a href="../../include/doSignOut.php" type="button" class="btn btn-danger btn-sm">Sign Out</a>
				</div>
				<!-- END SIDEBAR BUTTONS -->
				<!-- SIDEBAR MENU -->
				<div class="profile-usermenu">
					<ul class="nav">
						<li>
							<a href="home.php">
							<i class="glyphicon glyphicon-home"></i>
							Home </a>
						</li>
						<li>
							<a href="users.php">
							<i class="glyphicon glyphicon-user"></i>
							Users </a>
						</li>
						<li>
							<a href="files.php">
							<i class="glyphicon glyphicon-file"></i>
							Files</a>
					</ul>
				</div>
				<!-- END MENU -->
			</div>
		</div>
		<div class="col-md-9">
            <div class="profile-content">
			<div class="row">
					<div class="col-lg-12">
						<h1 class="page-header">Profile</h1>
					</div>
					<!-- /.col-lg-12 -->
				</div>
			   <?php
	$result = $connect->query("SELECT `id_user`, `full_name`, `display_name`, `email`, `password`, `gender`, `avatar_url`, `create_at` FROM `users` WHERE permission = '".$id_tipe_user."'");
	if($result->num_rows > 0)
	{
		if($row = $result->fetch_assoc())
		{
?>
<div class="row">
			<div class="col-xs-12 col-sm-8 col-md-8 col-sm-offset-2 col-md-offset-4">
			   		<div class="row">
						<div class=" col-md-9 col-lg-9">

						  <table class="table table-user-information">
							<tbody>
							  <tr>
								<td>Full Name</td>
								<td>:</td>
								<td><?php echo $row["full_name"] ?></td>
							  </tr>
							  <tr>
								<td>Display Name</td>
								<td>:</td>
								<td><?php echo $row["display_name"] ?></td>
							  </tr>
							  <tr>
								<td>Email</td>
								<td>:</td>
								<td><?php echo $row["email"] ?></td>
							  </tr>
							  <tr>
								<td>Gender</td>
								<td>:</td>
								<td>
									<?php echo $row["gender"] ?>
								</td>
							  </tr>
							  <tr>
								<td>Join date</td>
								<td>:</td>
								<td><?php echo $row["create_at"] ?></td>
							  </tr>
							</tbody>
						  </table>

						  <a href="profile/editprofile.php?id_user=<?php echo $row["id_user"]; ?>" class="btn btn-primary">Edit Profile</a>
						  <a href="profile/changepassword.php?id_user=<?php echo $row["id_user"]; ?>" class="btn btn-primary">Change Password</a>
						  <a href="profile/uploadavatar.php?id_user=<?php echo $row["id_user"]; ?>" class="btn btn-primary">Upload Avatar</a>
						</div>
					  </div>
					</div>
				</div>
			</div>
		</div><!-- /.row -->
		<?php
		}
	}
?>
		<div class="empty" style="margin-bottom:15px;"></div>
            </div>
		</div>
		</div>
		</div>
	</div>
	</div>

	<!-- jQuery -->
    <script src="../../dist/jquery/jquery-1.11.3.min.js"></script>
		
	<!-- Sweetalert Core JavaScript -->
	<script src="../../dist/sweetalert/dist/sweetalert.min.js"></script>
	
	<!-- Bootstrap Core JavaScript -->
    <script src="../../dist/bootstrap/js/bootstrap.min.js"></script>

	<!-- Custom JavaScript -->
	<script src="../../asset/js/script.js"></script>
	
</body>

</html>
<?php
}
else
{
	//header('Location: ../index.php');
}
?>