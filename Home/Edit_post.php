<?php

include "../DbContext.php";
$id=$_POST["Id"];
$title=$_POST["Title"];
$content=$_POST["Content"];
$category=$_POST["ClassTag"];
$edit_user=$_POST["Author"];

if (isset($_POST["IsHidden"])) {
    $is_display = 1;
} else {
    $is_display = 0;
}
$sql="UPDATE `article` SET `Title`='$title', `Content`='$content', `ClassTag`='$category', `Author`='$edit_user', `IsHidden`=$is_display WHERE (`Id`='$id')";
DbContext::Query($sql, array());
$url="Edit.php?Id=$id";
header("Location:$url");
?>