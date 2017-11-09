<?php require_once "connection.php" ?>

<?php
session_start();
$_SESSION['login'] = null;
unset($_SESSION['login']);
session_unset();
session_destroy();

setcookie("cloud_storage","",time() - 3600,"/");
setcookie("permission","",time() - 3600,"/");
setcookie("id_user","",time() - 3600,"/");
setcookie("display_name","",time() - 3600,"/");

header("Location:../index.php");
?>