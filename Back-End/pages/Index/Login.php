<!DOCTYPE html>
<?php
include ("../../api/Index_count_chart.php");
include ("../../api/imgPrefix.php");
$sql = "SELECT * FROM tb_scrollandnotice";
$result = mysqli_query($conn, $sql);
?>
<html>
	<head>
		<title>Hello Campus</title>
		<meta http-equiv="Content-Type" content="text/html" charset="UTF-8" />
		<link rel="stylesheet" href="../../layui/css/layui.css" />
		<link rel="stylesheet" type="text/css" href="../../css/Login.css" />
		<script type="text/javascript">
			function check() {
				var usrID = document.getElementById("usrID").value;
				var usrPwd = document.getElementById("usrPwd").value;
				var regex = /^[/s]+$/;
				if (regex.test(usrID) || usrID.length == 0) {
					alert("用户名格式不对");
					return false;
				}
				if (regex.test(usrPwd) || usrPwd.length == 0) {
					alert("密码格式不对");
					return false;
				}
				return true;
			}
		</script>
	</head>
	<body>
		<div class="bigbox">
			<!-- 店名 -->
			<div class="namebox">
				<label class="nameLabel">Hello Campus</label>
			</div>
			<!-- 背景色 -->
			<div class="background"></div>
			
			<div class="middlebox">
				<?php
				if (mysqli_num_rows($result) > 0) {
					while($row = mysqli_fetch_assoc($result)) {
				?>
				<div class="showimages">
					<img class="front-img" src='<?php echo $scroll_imgPrefix."{$row['scrollImg1']}"; ?>' />
				</div>
				<?php
					}
				}
				mysqli_close($conn);
				?>
				
				<!-- 登录框 -->
				<form action="../../api/Login_enter.php" method="post" onsubmit="return check()">
					<div class="loginbox-bg">
						<div class="loginbox">
							<div class="usrbox">
								<i class="layui-icon layui-icon-username"></i>
								<input type="text" id="usrID" class="usrtext" name="usrID" placeholder="请输入账户" />
							</div>
							<div class="pwdbox">
								<i class="layui-icon layui-icon-password"></i>
								<input type="password" id="usrPwd" class="pwdtext" name="usrPwd" placeholder="请输入账户密码" />
							</div>
							<div class="loginbar">
								<input type="submit" class="layui-btn layui-bg-blue LoginButton" value="登 录"></input>
							</div>
						</div>
					</div>
				</form>
			</div>
			<!-- 底部固定区域 -->
			<div class="footer">
				Copyright © 2021 HelloCampus - by Yxtan
			</div>
		</div>
	</body>
</html>
