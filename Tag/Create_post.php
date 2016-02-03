<?php
include "../DbContext.php";

$Name=$_POST["Name"];

$sql="INSERT INTO `tag` ( `Name`) VALUES ('$Name')";
DbContext::Query($sql, array());
$url="Index.php";
header("Location:$url");
?>


