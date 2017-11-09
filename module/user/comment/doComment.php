<?php require_once "../../../include/getdata.php" ?>
<?php require_once "../../../include/connection.php" ?>
<?php
	$id_file = $_POST["id_file"];
	$komentator = $_POST["komentator"];
	$isikomentar = $_POST["isikomentar"];
	
	$result = $connect->query("INSERT INTO `comment`(`id_file`, `id_user`, `comment`, `date`) VALUES ('".$id_file."', '".$komentator."', '".$isikomentar."', now())");
	//echo $id_file . " - " . $komentator . " - " . $isikomentar;
?>