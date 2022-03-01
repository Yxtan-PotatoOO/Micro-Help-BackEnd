<?php
include ("../../../api/connect.php");

$id = $_GET['id'];

mysqli_query($conn,"DELETE FROM tb_tidings WHERE id={$id}") or die('出错：'.mysqli_error()); 

header("Location:../Tidings.php"); 

mysqli_close($conn);
?>