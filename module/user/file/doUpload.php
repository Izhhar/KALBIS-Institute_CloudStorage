<?php require_once "../../../include/connection.php" ?>

<?php
// A list of permitted file extensions
$allowed	= array('mp3', 'doc', 'docx', 'xls', 'xlsx', 'ppt', 'pptx', 'pdf', 'rar','png', 'jpg', 'gif','zip');

if(isset($_FILES['upload']) && $_FILES['upload']['error'] == 0){
	//$result = $connect->query("INSERT `id_user` FROM users");
	//$id_user=$row['id_user'];
	$id_user = $_COOKIE["id_user"];
	$file_name	= $_FILES['upload']['name'];
	$file_path	= '../../../files/'.$file_name;
	$file_size	= $_FILES['upload']['size'];
	$file_temp	= $_FILES['upload']['tmp_name'];
	$extension	= pathinfo($file_name, PATHINFO_EXTENSION);
	$new_path=substr($file_path,3,100);
	
	if(!in_array(strtolower($extension), $allowed)){
		echo '{"status":"error"}';
		exit;
	}
	
	if(move_uploaded_file($file_temp, $file_path)){
		$result = $connect->query("INSERT INTO `files`(`date`, `name`, `type`, `size`, `file`, `id_user`) VALUES (now(), '$file_name', '$extension', '$file_size', '$new_path', '$id_user')");
		echo '{"status":"success"}';
		exit;
	}
	//echo "BERHASIL";
}
else{
echo '{"status":"error"}';
}
exit;
?>