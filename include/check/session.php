<?php
session_start();
$_SESSION['login'] = 1;
?>
<html>
 <head>
 </head>
 <body>
<?php
if(isset($_SESSION['login']))
{
echo "ADA";
}
else
{
echo "GAK ADA";
}
?>
 </body>
</html>