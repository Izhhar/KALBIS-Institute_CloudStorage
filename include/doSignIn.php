<?php require_once "connection.php" ?>

<?php
	session_start();
	$email = $_POST['email'];
	$password = $_POST['password'];
	
	$result = $connect->query("SELECT * FROM users WHERE email = '$email' AND password = '".md5($password)."'");
	
	if($result->num_rows > 0)
	{
		if($row = $result->fetch_assoc())
		{	
			$_SESSION['login'] = $email;
			$id_user = $row["id_user"];
			$id_tipe_user = $row["permission"];
			$email_user = $row["email"];
			$display_name = $row["display_name"];		

			setcookie("cloud_storage",$email_user,time() + 86400 * 30, "/");
			setcookie("permission",$id_tipe_user,time() + 86400 * 30, "/");
			setcookie("id_user",$id_user,time() + 86400 * 30, "/");
			setcookie("display_name",$display_name,time() + 86400 * 30, "/");

			if($id_tipe_user == "Admin")
			{
				header('Location:../module/admin/home.php');
			}
			else if($id_tipe_user == "User")
			{
				header('Location:../module/user/home.php');
			}
		}
	}
	else
	{
		//echo "GAGAL";
		setcookie("errorLogin","1",time() + 5, "/");
		header("Location:../module/signin.php");
	}
?>