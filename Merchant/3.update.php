<?php
require('dbconfig.php');
$ID=$_POST['id'];
$CommodityName=$_POST['name']; //$_GET, $_REQUEST
$price=$_POST['price'];
$CommodityContent=$_POST['content'];
$CommodityState=$_POST['CommodityState'];

	$sql = "update todo1 set CommodityName=?, price=?, CommoditContent=?,CommoditState=? where id=?"; //SQL中的 ? 代表未來要用變數綁定進去的地方
	$stmt = mysqli_prepare($db, $sql); //prepare sql statement
	mysqli_stmt_bind_param($stmt, "ssssi", $CommoditName, $price,$CommoditContent,$CommoditState,$ID); //bind parameters with variables, with types "sss":string, string ,string
	mysqli_stmt_execute($stmt);  //執行SQL
	echo "message added.";
	
?>
<a href="1.新首頁.html">回工作列表</a>

