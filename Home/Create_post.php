<?php
include "../DbContext.php";

$title=$_POST["Title"];
$content=$_POST["Content"];
$category=$_POST["ClassTag"];
$edit_user=$_POST["Author"];

if (isset($_POST["IsHidden"])) {
    $is_display = $_POST["IsHidden"];
} else {
    $is_display = 0;
}
$sql="INSERT INTO `article` (`Title`, `Content`, `ClassTag`, `Author`, `IsHidden`) VALUES ('$title', '$content', '$category', '$edit_user', $is_display)";
DbContext::Query($sql, array());
$url="Index.php";
header("Location:$url");
?>


