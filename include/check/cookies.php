<?php
	//setcookie("cloud_storage","admin@admin.com",time() + 86400 * 30, "/");
	setcookie("cloud_storage","",time() - 3600,"/");
?>
<html>
 <head>
 </head>
 <body>
<?php
	if(!isset($_COOKIE["cloud_storage"])){
		echo "GAK ADA";
	} else {
		echo "ADA";
	}
?>
 </body>
</html>