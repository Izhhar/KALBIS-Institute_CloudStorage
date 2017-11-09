<?php require_once "../../../include/connection.php" ?>
<?php
	$id_user = $_GET['id_user'];
	$password = $_POST['password'];
	$confirm_password = $_POST['confirm_password'];

	$result = $connect->query("select password from users where id_user = ".$id_user."");
	if($result->num_rows > 0)
	{
		if($row = $result->fetch_assoc())
		{
			if($password == $confirm_password)
			{
				$result = $connect->query("update users set password = '".md5($password)."' where id_user = ".$id_user."");
				//echo "OK";
				header("Location:../users.php");
			}
			else
			{
				setcookie("errorResetPassword","1",time() + 5, "/");
				//echo "GAGAL";
				header("Location:resetpassword.php");
			}
		}
	}
	?>