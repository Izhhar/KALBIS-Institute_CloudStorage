<?php require_once "../../../include/connection.php" ?>

<?php
if(isset($_GET['id_user']) && $_GET['id_user']){
	$id_user = $_GET['id_user'];
	$full_name = $_POST['full_name'];
	$display_name = $_POST['display_name'];
	$email = $_POST['email'];
	$gender = $_POST['gender'];
	$flags_active = $_POST['flags_active'];
	
	$sql ="UPDATE `users` SET `full_name`='$full_name',`display_name`='$display_name',`email`='$email',`gender`='$gender',`flags_active`='$flags_active' WHERE `id_user`='".$id_user."'"; 
	$edit_user = $connect->query($sql);
	header("Location:../users.php");

}else{
	setcookie("errorEditUsers","1",time() + 5, "/");
	header("Location:editusers.php");
	//echo "GAGAL";
}
?>