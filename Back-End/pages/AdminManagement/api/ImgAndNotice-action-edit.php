<!DOCTYPE html>
<?php
include ("../../../api/connect.php");
include ("../../../api/imgPrefix.php");
?>
<html>
	<head>
		<title>Hello Campus</title>
		<meta charset='UTF-8' />
	</head>
	<body>
		<?php
		$notice = trim($_POST['notice']);
		$id = $_POST['id'];
		if($notice != ''){
			mysqli_query($conn,"UPDATE tb_scrollandnotice SET notice='$notice' WHERE id=$id") or die('修改数据出错：'.mysqli_error());
		}
		?>
		<?php

		if($_FILES["scrollImg1"]["error"])
		{
		}
		else
		{
			$type1 = $_FILES["scrollImg1"]["type"]=="image/jpeg" || $_FILES["scrollImg1"]["type"]=="image/png";
			if($type1)
			{
				$filename1 = date("YmdHis")."1".$_FILES["scrollImg1"]["name"];
				$upload_filename1 = iconv("UTF-8","gb2312","../".$scroll_imgPrefix.$filename1);
				if(file_exists($filename1))
				{
					?>
					<script>
						alert("图片已存在！");
					</script>
					<?php
				}
				else
				{
					move_uploaded_file($_FILES["scrollImg1"]["tmp_name"],$upload_filename1);
					$sql = "UPDATE tb_scrollandnotice SET scrollImg1='$filename1' WHERE id=$id";
					if($conn->query($sql))
					{
						?>
						<script>
							alert("图片1更新成功！");
						</script>
						<?php
					}
					else
					{
						?>
						<script>
							alert("图片1更新失败！");
						</script>
						<?php
					};
				}
			}
			else
			{
				?>
				<script>
					alert("图片类型错误！");
				</script>
				<?php
			}
		}
		?>
		<?php
		if($_FILES["scrollImg2"]["error"])
		{
		}
		else
		{
			$type2 = $_FILES["scrollImg2"]["type"]=="image/jpeg" || $_FILES["scrollImg2"]["type"]=="image/png";
			if($type2)
			{
				$filename2 = date("YmdHis")."2".$_FILES["scrollImg2"]["name"];
				$upload_filename2 = iconv("UTF-8","gb2312","../".$scroll_imgPrefix.$filename2);
				if(file_exists($filename2))
				{
					?>
					<script>
						alert("图片已存在！");
					</script>
					<?php
				}
				else
				{
					move_uploaded_file($_FILES["scrollImg2"]["tmp_name"],$upload_filename2);
					$sql = "UPDATE tb_scrollandnotice SET scrollImg2='$filename2' WHERE id=$id";
					if($conn->query($sql))
					{
						?>
						<script>
							alert("图片2更新成功！");
						</script>
						<?php
					}
					else
					{
						?>
						<script>
							alert("图片2更新失败！");
						</script>
						<?php
					};
				}
			}
			else
			{
				?>
				<script>
					alert("图片类型错误！");
					window.location.href = "../ImgAndNotice.php";
				</script>
				<?php
			}
		}
		?>
		<?php
		if($_FILES["scrollImg3"]["error"])
		{
		}
		else
		{
			$type3 = $_FILES["scrollImg3"]["type"]=="image/jpeg" || $_FILES["scrollImg3"]["type"]=="image/png";
			if($type3)
			{
				$filename3 = date("YmdHis")."3".$_FILES["scrollImg3"]["name"];
				$upload_filename3 = iconv("UTF-8","gb2312","../".$scroll_imgPrefix.$filename3);
				if(file_exists($filename3))
				{
					?>
					<script>
						alert("图片已存在！");
						window.location.href = "../ImgAndNotice.php";
					</script>
					<?php
				}
				else
				{
					move_uploaded_file($_FILES["scrollImg3"]["tmp_name"],$upload_filename3);
					$sql = "UPDATE tb_scrollandnotice SET scrollImg3='$filename3' WHERE id=$id";
					if($conn->query($sql))
					{
						?>
						<script>
							alert("图片3更新成功！");
						</script>
						<?php
					}
					else
					{
						?>
						<script>
							alert("图片3更新失败！");
						</script>
						<?php
					};
				}
			}
			else
			{
				?>
				<script>
					alert("图片类型错误！");
				</script>
				<?php
			}
		}
		?>
		<script>
			window.location.href = "../ImgAndNotice.php";
		</script>
	</body>
</html>