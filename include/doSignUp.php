<?php require_once "connection.php" ?>

<?php
	$full_name = $_POST['full_name'];
	$display_name = $_POST['display_name'];
	$email = $_POST['email'];
	$password = $_POST['password'];
	$password_confirmation = $_POST['password_confirmation'];
	$gender = $_POST['gender'];
	
	if($password != $password_confirmation)
	{
		//echo "GAGAL";
		header("location:../module/signup.php");
	}
	else{
			$result = $connect->query("SELECT * FROM users where email = '$email'");
			if($result->num_rows > 0)
			{
				setcookie("errorRegister","1",time() + 5, "/");
				header("Location:../module/signup.php");
				//echo "GAGAL";
			}
			else
			{
				$select_id = "";
				$sql = "INSERT INTO users (full_name, display_name, email, password, gender, avatar_url, permission, create_at, flags_active) VALUES ('$full_name', '$display_name', '$email', '".md5($password)."', '$gender', '', 'User', now(), 'Y')";
				$sign_up = $connect->query($sql);
				$id_select = $connect->query("select 1 + (select id_user from users order by id_user desc limit 1) as id_usernya");
				if($id_select->num_rows > 0)
				{
					if($row = $id_select->fetch_assoc())
					{
						$select_id = $row['id_usernya'];
						//echo "INSERT INTO activity (id_user, content, create_at) VALUES ('$select_id', 'New Account', now())";
						$rst_activity = "INSERT INTO activity (id_user, content, create_at) VALUES ('$select_id', 'New Account', now())";
						$activity = $connect->query($rst_activity);
					}
				}
				header("Location:../module/signup.php");
			}
	}
?>