<?php
require('dbconfig.php');
$jobID=$_POST['jobID'];
$jobName=$_POST['name']; //$_GET, $_REQUEST
$jobUrgent=$_POST['urgent'];
$jobContent=$_POST['content'];
$jobState=$_POST['jobState'];

	$sql = "update todo1 set jobName=?, jobUrgent=?, jobContent=?,jobState=? where id=?"; //SQL中的 ? 代表未來要用變數綁定進去的地方
	$stmt = mysqli_prepare($db, $sql); //prepare sql statement
	mysqli_stmt_bind_param($stmt, "ssssi", $jobName, $jobUrgent,$jobContent,$jobState,$jobID); //bind parameters with variables, with types "sss":string, string ,string
	mysqli_stmt_execute($stmt);  //執行SQL
	echo "message added.";
	
?>
<a href="1.新首頁.html">回工作列表</a>

