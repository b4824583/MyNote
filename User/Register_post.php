<?php
include "../DbContext.php";

$Username=$_POST["Username"];
$Password=$_POST["Password"];
$NickName=$_POST["NickName"];
if(isset($_POST["IsAdmin"]))
{
    $IsAdmin=1;
}
else
{
    $IsAdmin=0;
}

//$sql="INSERT INTO `user` (`Username`, `Password`, `NickName`, `IsAdmin`) VALUES ('321', '321', '321', '\0')";
$sql="INSERT INTO `user` (`Username`, `Password`, `NickName`, `IsAdmin`) VALUES ('$Username', '$Password', '$NickName',$IsAdmin)";
DbContext::Query($sql, array());
$url="../User/Login.php";
header("Location:$url");
?>


