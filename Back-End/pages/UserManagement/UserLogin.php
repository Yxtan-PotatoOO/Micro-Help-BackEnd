<!DOCTYPE html>
<?php
$keywords = isset($_POST['keywords'])?$_POST['keywords']:'';
include ("../../api/connect.php");
include ("../../api/imgPrefix.php");
if(!empty($keywords)){  
	$sql = "SELECT * FROM tb_Users WHERE nickName like '%{$keywords}%' ";
}else{    
	$sql = "SELECT * FROM tb_Users";
}
$result = mysqli_query($conn, $sql);
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
						<li class="layui-nav-item layui-nav-itemed"> 
							<a href="javascript:;"><i class="layui-icon layui-icon-user"></i> 用户信息管理</a>
							<dl class="layui-nav-child">
								<dd><a href="../UserManagement/UserLogin.php" id="checked">用户登录信息管理</a></dd>
							</dl>
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
						<li class="layui-nav-item">
							<a href="javascript:;"><i class="layui-icon layui-icon-set"></i> 权限设置</a>
							<dl class="layui-nav-child">
								<dd><a href="../AdminManagement/Admin.php">管理员管理</a></dd>
								<dd><a href="../AdminManagement/SysInfo.php">系统信息管理</a></dd>
								<dd><a href="../AdminManagement/ImgAndNotice.php">轮播图片和公告信息</a></dd>
							</dl>
						</li>
					</ul>
				</div>
			</div>

			<!-- 内容主体 -->
			<div class="layui-body contentbox">
				<div class="layui-breadcrumb breadcrumb" lay-separator=">">
					<a>用户信息管理</a>
					<a><cite>用户登录信息管理</cite></a>
				</div>
				<div class="tablebox">
					<div class="top-box">
						<form class="querybox" action="UserLogin.php" method="post">
							<label>昵称:</label>
							<input type="text" name="keywords" class="inputbox"/>
							<input type="submit" value="&#9993; 查询" class='layui-btn layui-btn-primary layui-bg-blue btn_search'/>
							<a class="layui-btn layui-btn-primary layui-bg-green" href='javascript:reset()'>&#8635; 重置</a>
						</form>
					</div>
					<div class="table-box">
						<table lay-filter="demo" class="layui-table">
							<thead>
								<tr>
									<th lay-data="{field:'id', width:60, sort: true, fixed: 'left'}">ID</th>
									<th lay-data="{field:'avatarUrl', width:100, align:'center'}">用户头像</th>
									<th lay-data="{field:'openID', width:300, align:'center'}">微信账号</th>
									<th lay-data="{field:'nickName', align:'center'}">昵称</th>
									<th lay-data="{field:'stuID', width:120, sort: true, align:'center'}">学号</th>
									<th lay-data="{field:'grade', width:100, sort: true, align:'center'}">年级</th>
									<th lay-data="{field:'usrStatus', width:100, align:'center'}">用户状态</th>
									<th lay-data="{field:'operation', width:70, fixed: 'right', align:'center'}">操作</th>
								</tr>
							</thead>
							<tbody>
								<?php
								if (mysqli_num_rows($result) > 0) {
									while($row = mysqli_fetch_assoc($result)) {
										echo "<tr>";
										echo "<td>{$row['id']}</td>";
								?>
								<td><img src='<?php echo $avatar_imgPrefix."{$row['avatarUrl']}"; ?>' class='layui-nav-img' /></td>
								<?php
										echo "<td>{$row['openID']}</td>";
										echo "<td>{$row['nickName']}</td>";
										echo "<td>{$row['stuID']}</td>";
										echo "<td>{$row['grade']}</td>";
										if($row['usrStatus'] == 0){
											echo "<td><i class='layui-icon layui-icon-ok correct'></i></td>";
										}else{
											echo "<td><i class='layui-icon layui-icon-close warn'></i></td>";
										}
										echo "<td>
												<a class='layui-btn layui-btn-xs' href='UserLogin-Edit.php?id={$row['id']}'>修改</a>
											  </td>";
										echo "</tr>";
									}	
								}
								mysqli_close($conn);
								?>
							</tbody>
						</table>
					</div>
				</div>
			</div>


			<!-- 底部固定区域 -->
			<div class="layui-footer">
			  Copyright © 2021 HelloCampus - by Yxtan
			</div>
		</div>
		<?php
		} else {
		?> 
			<script type="text/javascript"> 
			 alert("退出登录"); 
			 window.location.href="../../api/exit.php"; 
			</script> 
		<?php
		} 
		?> 

		<script src="../../layui/layui.js"></script>
		<script type="text/javascript">
			function reset () {
				window.location = "UserLogin.php";
			}
		</script>
		<script>
			layui.use(['element','table'], function () {
				var element = layui.element;
				var table = layui.table;

				table.init('demo', {
				  limit: 10
				  ,page: true
				  ,toolbar: true
				  ,height: 'full-300'
				}); 
			});
		</script>
	</body>
</html>