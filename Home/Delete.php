<?php
include "../DbContext.php";
/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

$id=$_GET["Id"];
$sql="DELETE FROM `article` WHERE (`Id`='$id')";
DbContext::Query($sql, array());
$url="Index.php";
header("Location:$url");

?>