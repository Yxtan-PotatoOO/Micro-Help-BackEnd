<!DOCTYPE html>
<?php
include ("../../api/connect.php");
include ("../../api/imgPrefix.php");
?>
<html>
	<head>
		<title>Hello Campus</title>
		<meta charset='UTF-8' />
		<link rel="stylesheet" href="../../layui/css/layui.css" />
		<link rel="stylesheet" type="text/css" href="../../css/Frame.css" />
		<link rel="stylesheet" type="text/css" href="../../css/Table.css" />
	</head>
	<body>
		<?php
		session_start (); 
		if (isset ( $_SESSION ["code"] )) { 
		?> 
		<div class="layui-layout layui-layout-admin">
			<!-- 头部 -->
			<div class="layui-header">
				<!-- 左上角LOGO -->
				<div class="logo">
					Hello Campus - 后台
				</div>

				<!-- 顶栏 -->
				<ul class="layui-nav top-bar">
					<li class="layui-nav-item">
						<img src='<?php echo $adminAvatar_imgPrefix."${_SESSION["usrAvatar"]}"; ?>' class='layui-nav-img' />
						<label><?php echo "${_SESSION["usrName"]}"; ?></label>
					</li>
					<li class='layui-nav-item'><a href="../../api/exit.php">退出</a></li>
				</ul>
			</div>

			<!-- 左侧导航区域 -->
			<div class="layui-side left-bar">
				<div class="layui-side-scroll">                 
					<ul class="layui-nav layui-nav-tree"  lay-filter="test">
						<li class="layui-nav-item">
							<a href="../Index/Index.php"><i class="layui-icon layui-icon-home"></i> 首页</a>
						</li>
						<li class="layui-nav-item"> 
							<a href="javascript:;"><i class="layui-icon layui-icon-user"></i> 用户信息管理</a>
							<dl class="layui-nav-child">
								<dd><a href="../UserManagement/UserLogin.php">用户登录信息管理</a></dd>
							</dl>
						</li>
						<li class="layui-nav-item">
							<a href="javascript:;"><i class="layui-icon layui-icon-component"></i> 动态信息管理</a>
							<dl class="layui-nav-child">
								<dd><a href="../TidingsManagement/Tidings.php">动态信息列表</a></dd>
							</dl>
						</li>
						<li class="layui-nav-item">
							<a href="javascript:;"><i class="layui-icon layui-icon-cart-simple"></i> 任务信息管理</a>
							<dl class="layui-nav-child">
								<dd><a href="../TasksManagement/Tasks.php">任务列表</a></dd>
								<dd><a href="../TasksManagement/CancelTasks.php">取消任务列表</a></dd>
								<dd><a href="../TasksManagement/Comments.php">评价列表</a></dd>
							</dl>
						</li>
						<li class="layui-nav-item">
							<a href="javascript:;"><i class="layui-icon layui-icon-log"></i> 闲置物品信息管理</a>
							<dl class="layui-nav-child">
								<dd><a href="../IdleManagement/Idles.php">物品信息列表</a></dd>
							</dl>
						</li>
						<li class="layui-nav-item">
							<a href="javascript:;"><i class="layui-icon layui-icon-file"></i> 失物/寻物管理</a>
							<dl class="layui-nav-child">
								<dd><a href="../ThingsManagement/Losted.php">寻物启事管理</a></dd>
								<dd><a href="../ThingsManagement/Picked.php">失物招领管理</a></dd>
							</dl>
						</li>
						<li class="layui-nav-item layui-nav-itemed">
							<a href="javascript:;"><i class="layui-icon layui-icon-set"></i> 权限设置</a>
							<dl class="layui-nav-child">
								<dd><a href="../AdminManagement/Admin.php">管理员管理</a></dd>
								<dd><a href="../AdminManagement/SysInfo.php" id="checked">系统信息管理</a></dd>
								<dd><a href="../AdminManagement/ImgAndNotice.php">轮播图片和公告信息</a></dd>
							</dl>
						</li>
					</ul>
				</div>
			</div>

			<!-- 内容主体 -->
			<div class="layui-body contentbox">
				<div class="layui-breadcrumb breadcrumb" lay-separator=">">
					<a>权限设置</a>
					<a>系统信息管理</a>
					<a><cite>添加系统信息</cite></a>
				</div>
				<div class="formbox">
					<form action="api/SysInfo-action-add.php" method="post" name="myform" onsubmit="return CheckPost();" class="layui-form">  
						<label class="formtitle">新增系统消息</label>
						<div class="layui-form-item formcontent">
							<label class="layui-form-label">用户账号：</label>
							<!-- <div class="layui-input-block">
								<input type="text" name="usrID" autocomplete="off" class="layui-input">
							</div> -->
							<div class="layui-input-block" style="width: 300px;">
							  <select name="usrID" lay-verify="required">
								<option value=""></option>
								<?php
								$sql = "SELECT * FROM tb_Users";
								$result = mysqli_query($conn, $sql);
								if (mysqli_num_rows($result) > 0) {
									while($row = mysqli_fetch_assoc($result)) {
										echo "<option value='{$row['openID']}'>{$row['nickName']} -- {$row['openID']}</option>";
									}	
								}
								mysqli_close($conn);
								?>
							  </select>
							</div>
						</div>
						<div class="layui-form-item">
							<label class="layui-form-label">通知标题：</label>
							<div class="layui-input-block">
								<input type="text" name="SerTitle" autocomplete="off" class="layui-input">
							</div>
						</div>
						<div class="layui-form-item">
							<label class="layui-form-label">通知内容：</label>
							<div class="layui-input-block">
								<textarea name="SerContent" class="layui-textarea" autocomplete="off"></textarea>
							</div>
						</div>
						<input type="submit" value="提交" class="layui-btn btn_submit">
						<a href="SysInfo.php" class="layui-btn layui-btn-primary">返回</a>
					</form>  
				</div>
			</div>


			<!-- 底部固定区域 -->
			<div class="layui-footer">
			  Copyright © 2021 HelloCampus - by Yxtan
			</div>
		</div>
		<?php
		} else {//code不存在，调用exit.php 退出登录 
		?> 
			<script type="text/javascript"> 
			 alert("退出登录"); 
			 window.location.href="../../api/exit.php"; 
			</script> 
		<?php
		} 
		?> 

		<script src="../../layui/layui.js"></script>
		<script>
			layui.use(['element','form'], function () {
				var element = layui.element;
				var form = layui.form;
			});
		</script>
		<script> 
		    function CheckPost() 
		    { 
		        if (myform.usrID.value=="") 
		        { 
		            alert("请填写用户账号"); 
		            myform.usrID.focus(); 
		            return false; 
		        }
				if (myform.SerTitle.value=="") 
		        { 
		            alert("请填写消息标题"); 
		            myform.SerTitle.focus(); 
		            return false; 
		        } 
				if (myform.SerContent.value=="") 
		        { 
		            alert("请填写消息内容"); 
		            myform.SerContent.focus(); 
		            return false; 
		        } 
		    } 
		</script>
	</body>
</html>