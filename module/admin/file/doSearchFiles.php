<?php require_once "../../../include/getdata.php" ?>
<?php require_once "../../../include/connection.php" ?>

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
    <link href="../../../dist/bootstrap/css/bootstrap.min.css" rel="stylesheet">
		
	<!-- Sweetalert CSS -->
    <link href="../../../dist/sweetalert/dist/sweetalert.css" rel="stylesheet">
	
	<!-- Custom CSS -->
	<link href="../../../asset/css/style.css" rel="stylesheet">
	<link href="../../../asset/css/user-profile-sidebar-style.css" rel="stylesheet">
	<link href="../../../asset/css/table-panel-with-pagination.css" rel="stylesheet">
	<link href="../../../asset/css/search.css" rel="stylesheet">
	<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.4.0/css/font-awesome.min.css" rel='stylesheet' type='text/css'>
	
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
                <a class="navbar-brand" href="../home.php">
					<img alt="Brand" src="../../../asset/img/logo.png">
				</a>
            </div>
            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="navbar-collapse">
                
            </div>
            <!-- /.navbar-collapse -->
        </div>
        <!-- /.container -->
    </nav>

    <!-- Put your page content here! -->
	
	<div class="container-fluid" style="margin-top: 50px;">
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
					<img src="../../../asset/img/avatar-user/<?php echo $row["avatar_url"]; ?>" onerror="this.src = '../../../asset/img/avatar.jpg'" class="img-responsive" alt="Avatar">
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
					<a href="../profile.php" type="button" class="btn btn-success btn-sm">Profile</a>
					<a href="../../../include/doSignOut.php" type="button" class="btn btn-danger btn-sm">Sign Out</a>
				</div>
				<!-- END SIDEBAR BUTTONS -->
				<!-- SIDEBAR MENU -->
				<div class="profile-usermenu">
					<ul class="nav">
						<li>
							<a href="../home.php">
							<i class="glyphicon glyphicon-home"></i>
							Home </a>
						</li>
						<li>
							<a href="../users.php">
							<i class="glyphicon glyphicon-user"></i>
							Users </a>
						</li>
						<li class="active">
							<a href="../files.php">
							<i class="glyphicon glyphicon-file"></i>
							Files</a>
						</li>
					</ul>
				</div>
				<!-- END MENU -->
			</div>
		</div>
		<div class="col-md-9">
            <div class="profile-content">
				<div class="row">
					<div class="search">
						<form action="doSearchFiles.php" method="GET" role="search">
						<input type="text" id="search_file" name="search_file" class="form-control input-sm" maxlength="64" placeholder="Search" />
						<button id="btnSearch" type="submit" class="btn btn-primary btn-sm">Search</button>
						</form>
					</div>
				</div>

		<div class="panel panel-default panel-table">
              <div class="panel-heading">
                <div class="row">
                  <div class="col col-xs-6">
                    <h3 class="panel-title">Search Files</h3>
                  </div>
                </div>
              </div>
              <div class="panel-body">
                <table class="table table-striped table-bordered table-list">
                  <thead>
                    <tr>
                        <th><em class="fa fa-cog"></em></th>
                        <th class="hidden-xs">Name User</th>
                        <th>Name File</th>
                        <th>Size</th>
                        <th>Date</th>
                        <th>Tags</th>
					</tr> 
                  </thead>
                  <tbody>
<?php
if(isset($_GET['search_file']) && $_GET['search_file']){
	$search_file = $_GET['search_file'];
	$result = $connect->query("SELECT  a.`id_file`, a.`id_user`, a.`date`, a.`name`, a.`type`, a.`size`, a.`file`, a.`tag`, b.`id_user`, b.`display_name` FROM `files` a, `users` b WHERE a.`id_user`=b.`id_user` AND a.`name` like '%$search_file%' or a.`type` like '%$search_file%' or a.`date` like '%$search_file%' or a.`tag` like '%$search_file%' or b.`display_name` like '%$search_file%'");
	if($result->num_rows > 0)
	{
		while($row = $result->fetch_array())
		{
		?>
                          <tr>
                            <td align="center">
                              <a href="previewfiles.php?id_file=<?php echo $row["id_file"]; ?>" class="btn btn-default"><em class="fa fa-eye"></em></a>
                              <a href="javascript:confirmDelete('doDeleteFiles.php?id_file=<?php echo $row["id_file"]; ?>')" class="btn btn-danger"><em class="fa fa-trash"></em></a>
                            </td>
                            <td class="hidden-xs"><?php echo $row["display_name"]; ?></td>
                            <td><?php echo '<a href="'.$row['file'].'">'.$row["name"]; ?></td>
                            <td><?php echo $row["size"].' B';?></td>
                            <td><?php echo $row["date"]; ?></td>
							<td><?php echo $row["tag"]; ?></td>
                          </tr>
                        </tbody>
						 <?php
		}?>
                </table>
          <?php 
	}
?>
              </div>
			  
              <div class="panel-footer">
                <!--
				<div class="row">
                  <div class="col col-xs-4">Page 1 of 5
                  </div>
                  <div class="col col-xs-8">
                    <ul class="pagination hidden-xs pull-right">
                      <li><a href="#">1</a></li>
                      <li><a href="#">2</a></li>
                      <li><a href="#">3</a></li>
                      <li><a href="#">4</a></li>
                      <li><a href="#">5</a></li>
                    </ul>
                    <ul class="pagination visible-xs pull-right">
                        <li><a href="#">«</a></li>
                        <li><a href="#">»</a></li>
                    </ul>
                  </div>
                </div>
				-->
              </div>
			  
            </div>
		<?php
	}else{
		echo '<div class="row">
                <div class="col-xs-12 col-sm-8 col-md-8 col-sm-offset-2 col-md-offset-4">
                    <h1 class="page-body">Data not found!</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>';
	}
?>
</div>
	</div>
	</div>
	</div>
	
	<!-- jQuery -->
    <script src="../../../dist/jquery/jquery-1.11.3.min.js"></script>
	
	<!-- Sweetalert Core JavaScript -->
	<script src="../../../dist/sweetalert/dist/sweetalert.min.js"></script>
	
	<!-- Bootstrap Core JavaScript -->
    <script src="../../../dist/bootstrap/js/bootstrap.min.js"></script>

	<!-- Custom JavaScript -->
	<script src="../../asset/js/script.js"></script>
	
	<script>
	$(function(){
			$(document).on("click", ".btn-preview", function () {
				 var myBookId = $(this).data('id');
				 $("#id_filenya").val( myBookId );
			});
					
			$("#komentarnya").keypress(function(e) {
				var id_file = $("#id_filenya").val();
				var komentator = "<?php echo $id_user; ?>";
				var isikomentar = $("#komentarnya").val();
				if(e.which == 13) {
					alert(id_file + " - " + komentator + " - " + isikomentar);
					$.ajax({
						  type: 'post',
						  url: "../comment/doComment.php",
						  data: {
							  id_file : id_file,
							  komentator : komentator,
							  isikomentar : isikomentar
						  },
						  success: function(resultData) 
						  {
							  alert("Save Complete")
						  }
						
					});
				}
			});
		});
	function confirmDelete(delUrl){
		if (confirm("Are you sure you want to delete?")) {
			document.location = delUrl;
		}
	}
	</script>
	
</body>

</html>
<?php
}
else
{
	//header('Location: ../index.php');
}
?>