<?php
include ("../../../api/connect.php");

$id = $_GET['id'];

mysqli_query($conn,"DELETE FROM tb_LostedInfo WHERE id={$id}") or die('出错：'.mysqli_error()); 

header("Location:../Losted.php"); 

mysqli_close($conn);
?>