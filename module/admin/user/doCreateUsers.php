<?php require_once "../../../include/connection.php" ?>

<?php
	$full_name = $_POST['full_name'];
	$display_name = $_POST['display_name'];
	$email = $_POST['email'];
	$password = $_POST['password'];
	$password_confirmation = $_POST['password_confirmation'];
	$gender = $_POST['gender'];
	$flags_active = $_POST['flags_active'];
	$timestamp = date('Y-m-d G:i:s');
	
	if($password != $password_confirmation)
	{
		//echo "GAGAL";
		header("location:createusers.php");
	}
	else{
			$result = $connect->query("SELECT * FROM users where email = '$email'");
			if($result->num_rows > 0)
			{
				setcookie("errorCreateUsers","1",time() + 5, "/");
				header("Location:createusers.php");
				//echo "GAGAL";
			}
			else
			{
				$sql = "INSERT INTO users (full_name, display_name, email, password, gender, avatar_url, permission, create_at, update_at, flags_active) VALUES ('$full_name', '$display_name', '$email', '".md5($password)."', '$gender', '', 'User', '$timestamp', '', '$flags_active')";
				$create_user = $connect->query($sql);
				header("Location:createusers.php");
				//echo "Berhasil";
			}
	}
?>