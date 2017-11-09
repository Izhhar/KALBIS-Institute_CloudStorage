<?php require_once "../../../include/connection.php" ?>
<?php
if(isset($_GET['id_user']) && $_GET['id_user']){
	$id_user = $_GET['id_user'];
	$name = $_FILES['avatar']['name'];
	$size = $_FILES['avatar']['size'];
	$type = $_FILES['avatar']['type'];
	$tmp_file = $_FILES['avatar']['tmp_name'];

	$path = "../../../asset/img/avatar-user/".$name;
	
	if($type == "image/jpeg" || $type == "image/png"){ // Cek apakah tipe file yang diupload adalah JPG / JPEG / PNG
    // Jika tipe file yang diupload JPG / JPEG / PNG, lakukan :
    if($ukuran_file <= 2000000){ // Cek apakah ukuran file yang diupload kurang dari sama dengan 2MB
        // Jika ukuran file kurang dari sama dengan 1MB, lakukan :
        // Proses upload
        if(move_uploaded_file($tmp_file, $path)){ // Cek apakah gambar berhasil diupload atau tidak
            // Jika gambar berhasil diupload, Lakukan : 
            // Proses simpan ke Database
			$sql ="UPDATE `users` SET `avatar_url`='$name' WHERE `id_user`='".$id_user."'"; 
			$edit_user = $connect->query($sql);// Eksekusi/ Jalankan query dari variabel $query
             
            if($sql){
				// Cek jika proses simpan ke database sukses atau tidak
                // Jika Sukses, Lakukan :
                header("location: ../profile.php"); // Redirectke halaman profile.php
            }else{
                // Jika Gagal, Lakukan :
                //echo "Maaf, Terjadi kesalahan saat mencoba untuk menyimpan data ke database.";
				setcookie("errorUploadAvatar","1",time() + 5, "/");
				header("location: uploadavatar.php");
            }
        }else{
            // Jika gambar gagal diupload, Lakukan :
            //echo "Maaf, Gambar gagal untuk diupload.";
			setcookie("errorUploadAvatar","1",time() + 5, "/");
			header("location: uploadavatar.php");
        }
    }else{
        // Jika ukuran file lebih dari 1MB, lakukan :
        //echo "Maaf, Ukuran gambar yang diupload tidak boleh lebih dari 1MB";
        //echo "<br><a href='form.php'>Kembali Ke Form</a>";
		setcookie("errorUploadAvatarSize","1",time() + 5, "/");
		header("location: uploadavatar.php");
    }
}else{
    // Jika tipe file yang diupload bukan JPG / JPEG / PNG, lakukan :
    //echo "Maaf, Tipe gambar yang diupload harus JPG / JPEG / PNG.";
	setcookie("errorUploadAvatarType","1",time() + 5, "/");
	header("location: uploadavatar.php");
}
}
?>