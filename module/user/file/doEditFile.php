<?php require_once "../../../include/connection.php" ?>

<?php
if(isset($_GET['id_file']) && $_GET['id_file']){
	$id_file = $_GET['id_file'];
	$name = $_POST['name'];
	$tag = $_POST['tag'];
	$path='../../../files/'.$name;
	
	$new_path=substr($path,3,100);
	$words_split= preg_split('/[,.\s;]+/', $tag);
	$words= implode(',',$words_split);
	

	$sql ="UPDATE `files` SET `name`='$name',`tag`='$words',`file`='$new_path' WHERE `id_file`='".$id_file."'"; 
	$edit_file = $connect->query($sql);
	//echo "BERHASIL";
	header("Location:../home.php");
}else{
	setcookie("errorEditFile","1",time() + 5, "/");
	header("Location:editfile.php");
	//echo "GAGAL";
}
?>