<?php
include ("../../../api/connect.php");
session_start (); 

$usrID = $_POST['usrID'];
$SerTitle = $_POST['SerTitle'];
$SerContent = $_POST['SerContent'];
$adminID = $_SESSION["usrID"];

$sql = "INSERT INTO tb_sysinfo(usrID,SerTitle,SerContent,SerDateTime,adminID) VALUES ('$usrID','$SerTitle','$SerContent',now(),'$adminID')";
mysqli_query($conn,$sql); 

header("Location:../SysInfo.php"); 

mysqli_close($conn);
?>