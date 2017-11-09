<?php require_once "../../../include/connection.php" ?>

<?php
if(isset($_GET['id_user']) && $_GET['id_user']){
	$id_user=$_GET['id_user'];
	$connect->query("DELETE FROM `users` WHERE id_user='".$id_user."'");
	header("Location:../users.php");
}else{
	setcookie("errorDeleteUsers","1",time() + 5, "/");
	header("Location:../users.php");
	//echo "GAGAL";
}
?>