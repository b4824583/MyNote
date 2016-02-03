<?php

include "../DbContext.php";
$Id=$_POST["Id"];
$Name=$_POST["Name"];

$sql="UPDATE `tag` SET `Name`='$Name' WHERE (`Id`='$Id')";
DbContext::Query($sql, array());
$url="Index.php";
header("Location:$url");
?>