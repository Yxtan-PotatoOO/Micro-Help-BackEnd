<?php
include ("../../../api/connect.php");

$id = $_GET['id'];

mysqli_query($conn,"UPDATE tb_PickedInfo SET sendDateTime = NOW() WHERE id =$id") or die('修改数据出错：'.mysqli_error()); 

header("Location:../Picked.php"); 

mysqli_close($conn);
?>