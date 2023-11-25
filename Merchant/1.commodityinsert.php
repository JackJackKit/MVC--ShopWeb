<?php
require('dbconfig.php');

$commodityName=$_POST['commodityName']; //$_GET, $_REQUEST
$price=$_POST['price'];
$commodityContent=$_POST['commodityContent'];

	$sql = "insert into todo (commodityName, price,commodityContent) values (?, ?, ?)"; //SQL中的 ? 代表未來要用變數綁定進去的地方
	$stmt = mysqli_prepare($db, $sql); //prepare sql statement
	mysqli_stmt_bind_param($stmt, "sss", $commodityName, $price,$commodityContent); //bind parameters with variables, with types "sss":string, string ,string
	mysqli_stmt_execute($stmt);  //執行SQL
	echo "message added.";
?>
<a href="2.list.php">回工作列表</a>
