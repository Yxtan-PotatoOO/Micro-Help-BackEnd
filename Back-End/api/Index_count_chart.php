<?php
include ("connect.php");

$chart1_sql = "SELECT SUM(CASE WHEN tb_tidings.`status` = 0 THEN 1 ELSE 0 END) DailyCount,
	SUM(CASE WHEN tb_tidings.`status` = 1 THEN 1 ELSE 0 END) LoveCount FROM tb_tidings";

$chart1_result = mysqli_query($conn,$chart1_sql);
if(mysqli_num_rows($chart1_result) > 0){
	while($chart1_row = mysqli_fetch_assoc($chart1_result)) {
		$DailyCount = $chart1_row['DailyCount'];
		$LoveCount = $chart1_row['LoveCount'];
	}
	$chart1_y=json_encode([$DailyCount,$LoveCount]);	
}

$week = "DATE_FORMAT(sendTasksDateTime,'%w')";
$chart2_sql = "SELECT SUM(CASE WHEN $week = 1 THEN 1 ELSE 0 END) MonCount,SUM(CASE WHEN $week = 2 THEN 1 ELSE 0 END) TueCount,SUM(CASE WHEN $week = 3 THEN 1 ELSE 0 END) WedCount,SUM(CASE WHEN $week = 4 THEN 1 ELSE 0 END) ThuCount,SUM(CASE WHEN $week = 5 THEN 1 ELSE 0 END) FriCount,SUM(CASE WHEN $week = 6 THEN 1 ELSE 0 END) SatCount,SUM(CASE WHEN $week = 7 THEN 1 ELSE 0 END) SunCount FROM tb_Tasks";

$chart2_result = mysqli_query($conn,$chart2_sql);
if(mysqli_num_rows($chart2_result) > 0){
	while($chart2_row = mysqli_fetch_assoc($chart2_result)) {
		$MonCount = $chart2_row['MonCount'];
		$TueCount = $chart2_row['TueCount'];
		$WedCount = $chart2_row['WedCount'];
		$ThuCount = $chart2_row['ThuCount'];
		$FriCount = $chart2_row['FriCount'];
		$SatCount = $chart2_row['SatCount'];
		$SunCount = $chart2_row['SunCount'];
	}
	$chart2_y=json_encode([$MonCount,$TueCount,$WedCount,$ThuCount,$FriCount,$SatCount,$SunCount]);	
}

$usr_sql = "SELECT COUNT(*) Num FROM tb_Users";
$picked_sql = "SELECT COUNT(*) Num FROM tb_PickedInfo";
$losted_sql = "SELECT COUNT(*) Num FROM tb_LostedInfo";

$usr_result = mysqli_query($conn,$usr_sql);
if(mysqli_num_rows($usr_result) > 0){
	while($row = mysqli_fetch_assoc($usr_result)) {
		$usr_Num = $row['Num'];
	}
}

$picked_result = mysqli_query($conn,$picked_sql);
if(mysqli_num_rows($picked_result) > 0){
	while($row = mysqli_fetch_assoc($picked_result)) {
		$picked_Num = $row['Num'];
	}
}

$losted_result = mysqli_query($conn,$losted_sql);
if(mysqli_num_rows($losted_result) > 0){
	while($row = mysqli_fetch_assoc($losted_result)) {
		$losted_Num = $row['Num'];
	}
}























?>