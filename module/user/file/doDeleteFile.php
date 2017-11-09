<?php require_once "../../../include/connection.php" ?>

<?php
if(isset($_GET['id_file']) && $_GET['id_file']){
	$id_file=$_GET['id_file'];
	$connect->query("DELETE FROM `files` WHERE id_file='".$id_file."'");
	header("Location:../home.php");
}else{
	setcookie("errorDeleteFiles","1",time() + 5, "/");
	header("Location:../home.php");
	//echo "GAGAL";
}
?>