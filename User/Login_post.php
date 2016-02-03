<?php
include '../_Layout.php';
/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
$sql="SELECT * FROM user";
$results=  DbContext::Query($sql, array());
$result_array=$results->fetchAll();


$login_success=FALSE;
foreach($result_array as $results)
{
    if($results["Username"]==$_POST["Username"] && $results["Password"]==$_POST["Password"] )
    {
        $login_success=TRUE;
        $_SESSION["Username"]=$_POST["Username"];
        if(empty($results["IsAdmin"]))
        {
            $_SESSION["IsAdmin"]=0;
        }
        else
        {

             $_SESSION["IsAdmin"]=$results["IsAdmin"];
        }
        break;
    }

}
if($login_success==TRUE)
{
    $url="../Home/Index.php";
}
else
{
    $url="../User/Login.php?message=登入失敗";
}
    header("Location:$url");

?>