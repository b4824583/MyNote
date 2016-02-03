<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

include "../DbContext.php";
$NickName=$_POST["NickName"];
$Username=$_POST["Username"];

if (empty($_POST["IsAdmin"])) {
    $IsAdmin = 0;
} else {
    $IsAdmin = 1;
}
$sql="UPDATE `user` SET `NickName`='$NickName', `IsAdmin`=$IsAdmin WHERE (`Username`='$Username')";
DbContext::Query($sql, array());
$url="Index.php";
header("Location:$url");

?>