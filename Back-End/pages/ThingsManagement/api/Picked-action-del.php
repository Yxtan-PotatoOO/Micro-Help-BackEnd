<?php
include ("../../../api/connect.php");

$id = $_GET['id'];

mysqli_query($conn,"DELETE FROM tb_PickedInfo WHERE id={$id}") or die('出错：'.mysqli_error()); 

header("Location:../Picked.php"); 

mysqli_close($conn);
?>