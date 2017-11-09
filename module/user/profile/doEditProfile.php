<?php require_once "../../../include/connection.php" ?>

<?php
if(isset($_GET['id_user']) && $_GET['id_user']){
	$id_user = $_GET['id_user'];
	$full_name = $_POST['full_name'];
	$display_name = $_POST['display_name'];
	$email = $_POST['email'];
	$gender = $_POST['gender'];
	
	$sql ="UPDATE `users` SET `full_name`='$full_name',`display_name`='$display_name',`email`='$email',`gender`='$gender' WHERE `id_user`='".$id_user."'"; 
	$edit_profile = $connect->query($sql);
	header("Location:../profile.php");
}else{
	setcookie("errorEditProfile","1",time() + 5, "/");
	header("Location:editprofile.php");
	//echo "GAGAL";
}
?>