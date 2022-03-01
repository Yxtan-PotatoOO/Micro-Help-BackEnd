<!DOCTYPE html>
<?php
include ("../../api/Index_count_chart.php");
include ("../../api/imgPrefix.php");
?>
<html>
	<head>
		<title>Hello Campus</title>
		<meta charset='UTF-8' />
		<link rel="stylesheet" href="../../layui/css/layui.css" />
		<link rel='stylesheet' type='text/css' href='../../css/Frame.css' />
		<link rel='stylesheet' type='text/css' href='../../css/Index.css' />
	</head>
	<body>
		<?php
		session_start (); 
		if (isset ( $_SESSION ["code"] )) {//判断code存不存在，如果不存在，说明异常登录 
		?> 
		<form>
			<div class='layui-layout layui-layout-admin'>
				<!-- 头部 -->
				<div class='layui-header'>
					<!-- 左上角LOGO -->
					<div class='logo'>
						Hello Campus - 后台
					</div>

					<!-- 顶栏 -->
					<ul class='layui-nav top-bar'>
						<li class='layui-nav-item'>
							<img src='<?php echo $adminAvatar_imgPrefix."${_SESSION["usrAvatar"]}"; ?>' id='AportraitImage' class='layui-nav-img'>
							<label id='AnameLabel'><?php echo "${_SESSION["usrName"]}"; ?></label>
						</li>
						<li class='layui-nav-item'><a href="../../api/exit.php">退出</a></li>
					</ul>
				</div>

				<!-- 左侧导航区域 -->
				<div class="layui-side left-bar">
				<div class="layui-side-scroll">                 
					<ul class="layui-nav layui-nav-tree"  lay-filter="test">
						<li class="layui-nav-item layui-nav-itemed">
							<a href="../Index/Index.php" id="checked"><i class="layui-icon layui-icon-home"></i> 首页</a>
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
				<div class='layui-body contentbox'>
					<div class='countbox layui-row'>
						<div class="layui-row layui-col-xs6 layui-col-sm6 layui-col-md4">
							<div class="layui-col-xs6 layui-col-sm6 layui-col-md4">
								<i class='layui-icon layui-icon-user' id='icon1'></i>
							</div>
							<div class="layui-col-xs6 layui-col-sm6 layui-col-md4 num">
								<?php echo $usr_Num; ?>
							</div>
							<div class="layui-col-xs6 layui-col-sm6 layui-col-md4 text">
								总用户数
							</div>
						</div>
						<div class="layui-row layui-col-xs6 layui-col-sm6 layui-col-md4 layui-col-md-offset1">
							<div class="layui-col-xs6 layui-col-sm6 layui-col-md4">
								<i class='layui-icon layui-icon-form' id='icon2'></i>
							</div>
							<div class="layui-col-xs6 layui-col-sm6 layui-col-md4 num">
								<?php echo $picked_Num; ?>
							</div>
							<div class="layui-col-xs6 layui-col-sm6 layui-col-md4 text">
								总失物数
							</div>
						</div>
						<div class="layui-row layui-col-xs6 layui-col-sm6 layui-col-md4 layui-col-md-offset1">
							<div class="layui-col-xs6 layui-col-sm6 layui-col-md4 ">
							<i class='layui-icon layui-icon-chart' id='icon3'></i>
							</div>
							<div class="layui-col-xs6 layui-col-sm6 layui-col-md4 num">
								<?php echo $losted_Num; ?>
							</div>
							<div class="layui-col-xs6 layui-col-sm6 layui-col-md4 text">
								总寻物数
							</div>
						</div>
					</div>
					<div class='statisticbox'>
						<div>
							<div id='container1'></div>              
						</div>
						<div>
							<div id='container2'></div> 
						</div>    
					</div>
				</div>


				<!-- 底部固定区域 -->
				<div class='layui-footer'>
				  Copyright © 2021 HelloCampus - by Yxtan
				</div>
			</div>
		</form>
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

			
		<script src='../../layui/layui.js'></script>
		<script>
			//JavaScript代码区域
			layui.use('element', function () {
				var element = layui.element;

			});
		</script>

		<script type='text/javascript' src='../../echarts.min.js'></script>     
		<script type='text/javascript'>
			var y=<?php echo $chart1_y?>;
			var dom = document.getElementById('container1');
			var myChart = echarts.init(dom);
			var app = {};
			option = null;
			option = {
				title : {
					text: '动态统计',
					padding: [20,20,30,30],
					textStyle: {
						fontWeight: '600',
						fontSize:15
					}
				},
				xAxis: {
					type: 'category',
					data: ['日常吐槽','表白一下']
				},
				yAxis: {
					type: 'value'
				},
				series: [{
					data: y,
					type: 'bar'
				}]
			};
			if (option && typeof option === 'object') {
				myChart.setOption(option, true);
			}
		</script>
			   
		<script type='text/javascript'>
			var y=<?php echo $chart2_y?>;
			var dom = document.getElementById('container2');
			var myChart = echarts.init(dom);
			var app = {};
			option = null;
			option = {
				title : {
					text: '任务统计',
					padding: [20,20,30,30],
					textStyle: {
						fontWeight: '600',
						fontSize:15
					}
				},
				xAxis: {
					type: 'category',
					data: ['Mon', 'Tue', 'Wed', 'Thu', 'Fri', 'Sat', 'Sun']
				},
				yAxis: {
					type: 'value'
				},
				series: [{
					data: y,
					type: 'line'
				}]
			};
			;
			if (option && typeof option === 'object') {
				myChart.setOption(option, true);
			}
		</script>
	</body>
</html>