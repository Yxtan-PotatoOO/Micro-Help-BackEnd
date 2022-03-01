<!DOCTYPE html>
<?php
$keywords = isset($_POST['keywords'])?$_POST['keywords']:'';
include ("../../api/connect.php");
include ("../../api/imgPrefix.php");
if(!empty($keywords)){  
	$sql = "SELECT * FROM tb_idle WHERE idleTitle like '%{$keywords}%' ";
}else{    
	$sql = "SELECT * FROM tb_idle";
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
		<style>
        .layui-table-cell{
            height:auto !important;
        }
		</style>
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
						<li class="layui-nav-item layui-nav-itemed">
							<a href="javascript:;"><i class="layui-icon layui-icon-log"></i> 闲置物品信息管理</a>
							<dl class="layui-nav-child">
								<dd><a href="../IdleManagement/Idles.php" id="checked">物品信息列表</a></dd>
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
					<a>闲置物品信息管理</a>
					<a><cite>闲置物品信息列表</cite></a>
				</div>
				<div class="tablebox">
					<div class="top-box">
						<form class="querybox" action="Idles.php" method="post">
							<label>物品名称:</label>
							<input type="text" name="keywords" class="inputbox"/>
							<input type="submit" value="&#9993; 查询" class='layui-btn layui-btn-primary layui-bg-blue btn_search'/>
							<a class="layui-btn layui-btn-primary layui-bg-green" href='javascript:reset()'>&#8635; 重置</a>
						</form>
					</div>
					<div class="table-box">
						<table lay-filter="demo" class="layui-table">
							<thead>
								<tr>
									<th lay-data="{field:'id', width:60, sort: true}">ID</th>
									<th lay-data="{field:'operation', width:150, align:'center'}">操作</th>
									<th lay-data="{field:'usrID', width:300, align:'center'}">用户账号</th>
									<th lay-data="{field:'sendIdleDateTime', width:180, align:'center', sort: true}">发布时间</th>
									<th lay-data="{field:'idleTitle', width:180}">物品名称</th>
									<th lay-data="{field:'status', width:80, align:'center'}">状态</th>
									<th lay-data="{field:'idleRemarks', width:300}">物品详细介绍</th>
									<th lay-data="{field:'idlePrice', align:'center', sort: true, width:100}">价格</th>
									<th lay-data="{field:'imgUrl1', width:200, align:'center'}">图片1</th>
									<th lay-data="{field:'imgUrl2', width:200, align:'center'}">图片2</th>
									<th lay-data="{field:'phone', width:120, align:'center'}">电话</th>
									<th lay-data="{field:'contactID', width:120, align:'center'}">微信账号</th>
								</tr>
							</thead>
							<tbody>
								<?php
								if (mysqli_num_rows($result) > 0) {
									while($row = mysqli_fetch_assoc($result)) {
										echo "<tr>";
										echo "<td>{$row['id']}</td>";
										echo "<td>
												<a class='layui-btn layui-btn-danger layui-btn-xs' href='javascript:del({$row['id']})'>删除</a>
												<a class='layui-btn layui-btn-xs' href='api/Idle-action-edit.php?id={$row['id']}'>更新时间</a>
											  </td>";
										echo "<td>{$row['usrID']}</td>";
										echo "<td>{$row['sendIdleDateTime']}</td>";
										echo "<td>{$row['idleTitle']}</td>";
										if($row['status'] == 0){
											$row['status'] = "未出售";
											echo "<td><span class='layui-badge layui-bg-green'>{$row['status']}</span></td>";
										}
										else{
											$row['status'] = "已出售";
											echo "<td><span class='layui-badge layui-bg-orange'>{$row['status']}</span></td>";
										}
										echo "<td>{$row['idleRemarks']}</td>";
										echo "<td><label class='price'>￥ {$row['idlePrice']}</label></td>";
								?>
								<?php
								if($row['imgUrl1'] != null){
								?>
								<td><img src='<?php echo $idle_imgPrefix."{$row['imgUrl1']}"; ?>' /></td>
								<?php
								}
								else{
									echo "<td></td>";
								}
								?>
								<?php
								if($row['imgUrl2'] != null){
								?>
								<td><img src='<?php echo $idle_imgPrefix."{$row['imgUrl2']}"; ?>' /></td>
								<?php
								}
								else{
									echo "<td></td>";
								}
								?>
								<?php
										echo "<td>{$row['phone']}</td>";
										echo "<td>{$row['contactID']}</td>";
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
			function del (id) {
				if (confirm("确定删除这行吗？")){
					window.location = "api/Idles-action-del.php?id="+id;
				}
			}
			function reset () {
				window.location = "Idles.php";
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