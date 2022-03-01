<?php
include ("../../../api/connect.php");

$id = $_POST['id'];
$openID = $_POST['openID'];
$avatarUrl = $_POST['avatarUrl'];
$nickName = $_POST['nickName'];
$stuID = $_POST['stuID'];
$grade = $_POST['grade'];
$usrStatus = $_POST['usrStatus'];

if($avatarUrl != ''){
	mysqli_query($conn,"UPDATE tb_Users SET avatarUrl='$avatarUrl' WHERE id=$id") or die('修改数据出错：'.mysqli_error());
}
if($nickName != ''){
	mysqli_query($conn,"UPDATE tb_Users SET nickName='$nickName' WHERE id=$id") or die('修改数据出错：'.mysqli_error());
}
if($stuID != ''){
	mysqli_query($conn,"UPDATE tb_Users SET stuID='$stuID' WHERE id=$id") or die('修改数据出错：'.mysqli_error()); 
}
if($grade != ''){
	mysqli_query($conn,"UPDATE tb_Users SET grade='$grade' WHERE id=$id") or die('修改数据出错：'.mysqli_error()); 
}
if($usrStatus != ''){
	mysqli_query($conn,"UPDATE tb_Users SET usrStatus='$usrStatus' WHERE id=$id") or die('修改数据出错：'.mysqli_error()); 
}

header("Location:../UserLogin.php"); 

mysqli_close($conn);
?>