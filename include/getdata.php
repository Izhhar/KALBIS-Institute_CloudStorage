<?php require_once "connection.php" ?>

<?php
	// deklarasi variabel id_tipe_user, email, nama_user
	$id_tipe_user = "";
	$email = "";
	$nama_user = "";
	
	$url = $_SERVER['REQUEST_URI'];
	$potongan = substr($url, 7);
	if($potongan == "" || $potongan == "index.php")
	{
		// ini buat halaman awal / login
		// cek cookies
		if(!isset($_COOKIE["cloud_storage"]))
		{
			
		}
		else
		{
			$email = $_COOKIE["cloud_storage"];
			$result = $connect->query("SELECT * FROM  users WHERE email = '".$email."'");
			if($result->num_rows > 0)
			{
				if($row = $result->fetch_assoc())
				{
					$id_tipe_user = $row["permission"];
					$nama_user = $row["name"];
					// cek jika usernya adalah admin
					if($id_tipe_user == "Admin")
					{
						header("Location:module/admin/home.php");
					}
					// cek jika usernya adalah pengguna
					else if($id_tipe_user == "User")
					{
						header("Location:module/user/home.php");
					}
				}
			}
			else
			{
				
			}
		}
	}
	else{
		// ini buat menu
		$potongan2 = substr($url, 15);
		$findslash = strpos($potongan2, "/");
		$menu = substr($potongan2, 0, $findslash);
		if($menu == "admin")
		{
			// menu admin
			// cek cookies
			if(!isset($_COOKIE["cloud_storage"]))
			{
				header("Location:../../index.php");
			}
			else
			{
				$email = $_COOKIE["cloud_storage"];
				$result = $connect->query("SELECT * FROM  users WHERE email = '".$email."'");
				if($result->num_rows > 0)
				{
					if($row = $result->fetch_assoc())
					{
						$id_tipe_user = $row["permission"];
						$nama_user = $row["name"];
						// cek jika usernya adalah admin
						if($id_tipe_user == "Admin")
						{
							
						}
						// cek jika usernya adalah pengguna
						else if($id_tipe_user == "User")
						{
							header("Location:../user/home.php");
						}
					}
				}
				else
				{
					header("Location:../../index.php");
				}
			}
		}
		else if($menu == "user")
		{
			// menu user
			// cek cookies
			if(!isset($_COOKIE["cloud_storage"]))
			{
				header("Location:../../index.php");
			}
			else
			{
				$email = $_COOKIE["cloud_storage"];
				$result = $connect->query("SELECT * FROM  users WHERE email = '".$email."'");
				if($result->num_rows > 0)
				{
					if($row = $result->fetch_assoc())
					{
						$id_tipe_user = $row["permission"];
						$nama_user = $row["name"];
						// cek jika usernya adalah admin
						if($id_tipe_user == "Admin")
						{
							header("Location:../admin/home.php");
						}
						// cek jika usernya adalah pengguna
						else if($id_tipe_user == "User")
						{
							
						}
					}
				}
				else
				{
					header("Location:../../index.php");
				}
			}
		}
	}
?>