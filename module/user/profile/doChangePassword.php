<?php require_once "../../../include/connection.php" ?>
<?php
	$id_user = $_GET['id_user'];
	$old_password = $_POST['old_password'];
	$new_password = $_POST['new_password'];
	$confirm_password = $_POST['confirm_password'];

	$result = $connect->query("select password from users where id_user = ".$id_user."");
	if($result->num_rows > 0)
	{
		if($row = $result->fetch_assoc())
		{
			$password = $row["password"];
			if(md5($old_password) == $password)
			{
				$result = $connect->query("update users set password = '".md5($new_password)."' where id_user = ".$id_user."");
				//echo "OK";
				header("Location:../profile.php");
			}
			else
			{
				setcookie("errorChangePassword","1",time() + 5, "/");
				//echo "GAGAL";
				header("Location:doChangePassword.php");
			}
		}
	}
?>