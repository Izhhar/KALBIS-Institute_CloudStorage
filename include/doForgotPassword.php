<?php require_once "connection.php" ?>

<?php
	$inputValue = $_POST['inputValue'];
	
	function generateRandomString($length = 8) {
		$characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
		$charactersLength = strlen($characters);
		$randomString = '';
		for ($i = 0; $i < $length; $i++) {
			$randomString .= $characters[rand(0, $charactersLength - 1)];
		}
		return $randomString;
	}
	
	$result = $connect->query("SELECT * FROM users where email = '".$inputValue."'");
	if($result->num_rows > 0)
	{
		if($row = $result->fetch_assoc())
		{
			$id_user = $row["id_user"];
			$id_tipe_user = $row["permission"];
			$emailuser = $row["email"];
			$newpassword = generateRandomString();
			if($id_tipe_user == "Admin")
			{
				$sql = "UPDATE users set password = '".md5($newpassword)."' where email = '".$inputValue."'";
				$result = $connect->query($query);
				include "mailForgotPassword.php";
			}
			else
			{
				$sql = "UPDATE users set password = '".md5($newpassword)."' where email = '".$inputValue."'";
				$result = $connect->query($query);
				include "mailForgotPassword.php";
			}
		}
	}
	else
	{
		echo "GAGAL";
	}
?>