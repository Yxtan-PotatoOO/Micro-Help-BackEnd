<!doctype html> 
<html> 
	<head> 
	 <meta http-equiv="Content-Type" content="text/html" charset="UTF-8" />
	 <title>enter</title> 
	</head> 
	<body> 
		<?php
		session_start();
		$usrID = $_POST["usrID"];
		$usrPwd = $_POST["usrPwd"];
		
		include ("connect.php");
		
		$sql = "SELECT * FROM tb_Admin where adminID = '$usrID'";
		$result = mysqli_query($conn,$sql);
		
		$db_adID = null; 
		$db_adPwd = null;  
		$db_adName = null; 
		$db_adAvatar = null; 

		while($row = mysqli_fetch_assoc($result)) {
			$db_adID = $row["adminID"]; 
			$db_adPwd = $row["adminPwd"]; 
			$db_adName = $row["adminName"]; 
			$db_adAvatar = $row["adminAvatar"]; 
		}
		if (is_null($db_adID)) {
		?> 
		 <script type="text/javascript"> 
			alert("用户名不存在"); 
			window.location.href="../pages/Index/Login.php"; 
		 </script> 
		<?php
		} 
		else { 
			if ($db_adPwd!=$usrPwd){
		?> 
		<script type="text/javascript"> 
			alert("密码错误"); 
			window.location.href="../pages/Index/Login.php"; 
		</script> 
		<?php
			} else { 
			$_SESSION["usrID"]=$db_adID; 
			$_SESSION["usrName"]=$db_adName; 
			$_SESSION["usrAvatar"]=$db_adAvatar; 
			$_SESSION["code"]=mt_rand(0, 100000);
		?> 
		<script type="text/javascript"> 
			window.location.href="../pages/Index/Index.php"; 
		</script> 
		
		<?php
			}
		} 
		mysqli_close($conn);
		?> 
	</body> 
</html> 