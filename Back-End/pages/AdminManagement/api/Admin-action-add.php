<?php
include ("../../../api/connect.php");

$adminID = $_POST['adminID'];
$adminName = $_POST['adminName'];
$adminPwd = $_POST['adminPwd'];
$adminAvatar = mt_rand(1,9).".jpg";

$sql = "INSERT INTO tb_admin(adminID,adminName,adminPwd,adminAvatar) VALUES ('$adminID','$adminName','$adminPwd','$adminAvatar')";
mysqli_query($conn,$sql); 

header("Location:../Admin.php"); 

mysqli_close($conn);
?>