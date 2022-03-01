<?php
include ("../../../api/connect.php");

$id = $_GET['id'];

mysqli_query($conn,"UPDATE tb_taskscomments SET comments = '该评论已被管理员删除' WHERE id={$id}") or die('出错：'.mysqli_error()); 

header("Location:../Comments.php"); 

mysqli_close($conn);
?>