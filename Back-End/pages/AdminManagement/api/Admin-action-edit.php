<?php
include ("../../../api/connect.php");

$id = $_POST['id'];
$adminID = $_POST['adminID'];
$adminName = $_POST['adminName'];
$adminPwd = $_POST['adminPwd'];

$sql = "SELECT * FROM tb_admin WHERE id=$id";

$result = mysqli_query($conn,$sql);
if (mysqli_num_rows($result) > 0) {
	while($row = mysqli_fetch_assoc($result)) {
		if($adminName == ""){
			$adminName = $row['adminName'];
		}
		if($adminPwd == ""){
			$adminPwd = $row['adminPwd'];
		}
	}
}

mysqli_query($conn,"UPDATE tb_admin SET adminName='$adminName',adminPwd='$adminPwd' WHERE id=$id") or die('修改数据出错：'.mysqli_error()); 

header("Location:../Admin.php"); 

mysqli_close($conn);
?>