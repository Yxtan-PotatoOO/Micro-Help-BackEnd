<!DOCTYPE html>
<?php
$keywords = isset($_POST['keywords'])?$_POST['keywords']:'';
include ("../../api/connect.php");
include ("../../api/imgPrefix.php");
if(!empty($keywords)){  
	$sql = "SELECT * FROM tb_tasks WHERE taskRemarks like '%{$keywords}%' and status != 3 and status != 6 and status != 7";
}else{    
	$sql = "SELECT * FROM tb_tasks WHERE (status != 3 and status != 6 and status != 7)";
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
						<li class="layui-nav-item layui-nav-itemed">
							<a href="javascript:;"><i class="layui-icon layui-icon-cart-simple"></i> 任务信息管理</a>
							<dl class="layui-nav-child">
								<dd><a href="../TasksManagement/Tasks.php" id="checked">任务列表</a></dd>
								<dd><a href="../TasksManagement/CancelTasks.php">取消任务列表</a></dd>
								<dd><a href="../TasksManagement/Comments.php">评价列表</a></dd>
							</dl>
						</li>
						<li class="layui-nav-item">
							<a href="javascript:;"><i class="layui-icon layui-icon-log"></i> 闲置物品信息管理</a>
							<dl class="layui-nav-child">
								<dd><a href="../IdleManagement/Idles.php" >物品信息列表</a></dd>
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
					<a>任务信息管理</a>
					<a><cite>任务列表</cite></a>
				</div>
				<div class="tablebox">
					<div class="top-box">
						<form class="querybox" action="CancelTasks.php" method="post">
							<label>备注说明:</label>
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
									<th lay-data="{field:'usrID', width:300, align:'center'}">用户账号</th>
									<th lay-data="{field:'sendTasksDateTime', width:180, align:'center', sort: true}">发布时间</th>
									<th lay-data="{field:'status', width:90, align:'center', sort: true}">状态</th>
									<th lay-data="{field:'taskTitle', width:120, align:'center'}">任务名</th>
									<th lay-data="{field:'taskNum', width:80, align:'center'}">数量</th>
									<th lay-data="{field:'taskPrice', width:100, align:'center', sort: true}">价格</th>
									<th lay-data="{field:'taskTakeAddress', width:120}">取件地址</th>
									<th lay-data="{field:'taskToAddress', width:120}">送达地址</th>
									<th lay-data="{field:'taskRemarks', width:120}">任务备注</th>
									<th lay-data="{field:'phone', width:120, align:'center'}">电话</th>
									<th lay-data="{field:'contactID', width:120, align:'center'}">微信账号</th>
									<th lay-data="{field:'recID', width:300, align:'center'}">接单人</th>
									<th lay-data="{field:'recContact', width:120, align:'center'}">接单联系方式</th>
									<th lay-data="{field:'recDateTime', width:180, align:'center', sort: true}">接单时间</th>
									<th lay-data="{field:'sendCom', width:120, align:'center'}">发单确认</th>
									<th lay-data="{field:'sendComTime', width:180, align:'center', sort: true}">发单确认时间</th>
									<th lay-data="{field:'recCom', width:120, align:'center'}">接单确认</th>
									<th lay-data="{field:'recComTime', width:180, align:'center', sort: true}">接单确认时间</th>
									<th lay-data="{field:'completeTime', width:180, align:'center', sort: true}">完成时间</th>
									<th lay-data="{field:'delSend', width:120, align:'center'}">发单人删除</th>
									<th lay-data="{field:'delRec', width:120, align:'center'}">接单人删除</th>
									<th lay-data="{field:'operation', width:70, align:'center', fixed: 'right'}">操作</th>
								</tr>
							</thead>
							<tbody>
								<?php
								if (mysqli_num_rows($result) > 0) {
									while($row = mysqli_fetch_assoc($result)) {
										if($row['taskTitle'] == 0){
											$row['taskTitle'] = "取快递";
										}
										else if($row['taskTitle'] == 1){
											$row['taskTitle'] = "取外卖";
										}
										else{
											$row['taskTitle'] = "其他任务";
										}
										echo "<tr>";
										echo "<td>{$row['id']}</td>";
										echo "<td>{$row['usrID']}</td>";
										echo "<td>{$row['sendTasksDateTime']}</td>";
										if($row['status'] == 0){
											$row['status'] = "待接单";
											echo "<td><span class='layui-badge layui-bg-green'>{$row['status']}</span></td>";
										}
										else if($row['status'] == 1){
											$row['status'] = "已接单";
											echo "<td><span class='layui-badge layui-bg-orange'>{$row['status']}</span></td>";
										}
										else if($row['status'] == 2){
											$row['status'] = "已结算";
											echo "<td><span class='layui-badge'>{$row['status']}</span></td>";
										}
										else if($row['status'] == 3){
											$row['status'] = "已取消";
											echo "<td><span class='layui-badge layui-bg-gray'>{$row['status']}</span></td>";
										}else if($row['status'] == 4){
											$row['status'] = "A已确认";
											echo "<td><span class='layui-badge'>{$row['status']}</span></td>";
										}else if($row['status'] == 5){
											$row['status'] = "B已确认";
											echo "<td><span class='layui-badge'>{$row['status']}</span></td>";
										}else if($row['status'] == 6){
											$row['status'] = "A已取消";
											echo "<td><span class='layui-badge layui-bg-gray'>{$row['status']}</span></td>";
										}else{
											$row['status'] = "B已取消";
											echo "<td><span class='layui-badge layui-bg-gray'>{$row['status']}</span></td>";
										}
										echo "<td>{$row['taskTitle']}</td>";
										echo "<td>{$row['taskNum']}</td>";
										echo "<td><label class='price'>￥ {$row['taskPrice']}</label></td>";
										echo "<td>{$row['taskTakeAddress']}</td>";
										echo "<td>{$row['taskToAddress']}</td>";
										echo "<td>{$row['taskRemarks']}</td>";
										echo "<td>{$row['phone']}</td>";
										echo "<td>{$row['contactID']}</td>";
										echo "<td>{$row['recID']}</td>";
										echo "<td>{$row['recContact']}</td>";
										echo "<td>{$row['recDateTime']}</td>";
										if($row['sendCom'] == 1){
											echo "<td><i class='layui-icon layui-icon-ok correct'></i></td>";
										}else{
											echo "<td></td>";
										}
										echo "<td>{$row['sendComTime']}</td>";
										if($row['recCom'] == 1){
											echo "<td><i class='layui-icon layui-icon-ok correct'></i></td>";
										}else{
											echo "<td></td>";
										}
										echo "<td>{$row['recComTime']}</td>";
										echo "<td>{$row['completeTime']}</td>";
										if($row['delSend']!=0){
											echo "<td><i class='layui-icon layui-icon-delete warn'></i></td>";
										}else{
											echo "<td></td>";
										}
										if($row['delRec']!=0){
											echo "<td><i class='layui-icon layui-icon-delete warn'></i></td>";
										}else{
											echo "<td></td>";
										}
										echo "<td>
												<a class='layui-btn layui-btn-danger layui-btn-xs' href='javascript:del({$row['id']})'>删除</a>
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
			function del (id) {
				if (confirm("确定删除这行吗？")){
					window.location = "api/CancelTasks-action-del.php?id="+id;
				}
			}
			function reset () {
				window.location = "CancelTasks.php";
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