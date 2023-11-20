<?php
require('dbconfig.php');

$jobName=$_POST['name']; //$_GET, $_REQUEST
$jobUrgent=$_POST['urgent'];
$jobContent=$_POST['content'];
$jobState=$_POST['jobState'];


	$sql = "insert into todo1 (jobName, jobUrgent, jobContent, jobState) values (?, ?, ?, ?)"; //SQL中的 ? 代表未來要用變數綁定進去的地方
	$stmt = mysqli_prepare($db, $sql); //prepare sql statement
	mysqli_stmt_bind_param($stmt, "ssss", $jobName, $jobUrgent,$jobContent,$jobState); //bind parameters with variables, with types "sss":string, string ,string
	mysqli_stmt_execute($stmt);  //執行SQL
	echo "message added.";
?>
<a href="2.list.php">回工作列表</a>
