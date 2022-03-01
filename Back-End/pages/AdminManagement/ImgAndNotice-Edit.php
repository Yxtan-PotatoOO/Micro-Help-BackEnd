<!DOCTYPE html>
<?php
include ("../../api/connect.php");
include ("../../api/imgPrefix.php");
$sql = "SELECT * FROM tb_scrollandnotice";
$result = mysqli_query($conn, $sql);
?>
<html>
	<head>
		<title>Hello Campus</title>
		<meta charset='UTF-8' />
		<link rel="stylesheet" href="../../layui/css/layui.css" />
		<link rel="stylesheet" type="text/css" href="../../css/Frame.css" />
		<link rel="stylesheet" type="text/css" href="../../css/Table.css" />
		<link rel="stylesheet" type="text/css" href="../../css/OnlyEdit.css" />
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
								<dd><a href="../AdminManagement/SysInfo.php">系统信息管理</a></dd>
								<dd><a href="../AdminManagement/ImgAndNotice.php" id="checked">轮播图片和公告信息</a></dd>
							</dl>
						</li>
					</ul>
				</div>
			</div>

			<!-- 内容主体 -->
			<div class="layui-body contentbox">
				<div class="layui-breadcrumb breadcrumb" lay-separator=">">
					<a>权限设置</a>
					<a>轮播图片和公告信息</a>
					<a><cite>修改轮播图片和公告信息</cite></a>
				</div>
				<?php
				include ("../../api/connect.php");
				$id = $_GET['id'];
				$notice = $_GET['notice'];
				$sql = "SELECT * FROM tb_scrollandnotice WHERE id=$id";
				$result = mysqli_query($conn, $sql);
				$sql_arr = mysqli_fetch_assoc($result);
				?>
				<div class="formbox">
					<form action="api/ImgAndNotice-action-edit.php" method="post" class="layui-form" enctype="multipart/form-data">  
						<label class="formtitle">修改轮播图片和公告信息</label> 
						<input type="hidden" name="id" value="<?php echo $sql_arr['id']?>"> 

						<div class="layui-form-item formcontent">
							<label class="layui-form-label">轮播图片1：</label>
							<div class="layui-input-block">
								<input type="file" name="scrollImg1" class="layui-btn layui-btn-primary"/>
							</div>
						</div>
						<div class="layui-form-item formcontent">
							<label class="layui-form-label">轮播图片2：</label>
							<div class="layui-input-block">
								<input type="file" name="scrollImg2" class="layui-btn layui-btn-primary"/>
							</div>
						</div>
						<div class="layui-form-item formcontent">
							<label class="layui-form-label">轮播图片3：</label>
							<div class="layui-input-block">
								<input type="file" name="scrollImg3" class="layui-btn layui-btn-primary"/>
							</div>
						</div>
						<div class="layui-form-item formcontent">
							<label class="layui-form-label">公告：</label>
							<div class="layui-input-block">
								<textarea name="notice" class="layui-textarea"><?php echo $sql_arr['notice'];?></textarea>
							</div>
						</div>
						<input type="submit" value="提交" class="layui-btn btn_submit">
						<a href="ImgAndNotice.php" class="layui-btn layui-btn-primary">返回</a>
					</form>  
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
		<script>
			layui.use(['element','table'], function () {
				var element = layui.element;
				var table = layui.table;

				table.init('demo', {
				  limit: 10
				  ,page: true
				  ,toolbar: true
				  ,height: 'full-220'
				}); 
			});
		</script>
	</body>
</html>