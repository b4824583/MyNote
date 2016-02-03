

<?php
include "../DbContext.php";
/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

$Username=$_GET["Username"];
$sql="DELETE FROM `user` WHERE (`Username`='$Username')";
DbContext::Query($sql, array());
$url="Index.php";
header("Location:$url");

?>