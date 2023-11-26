<?php
require('dbconfig.php');

$CommodityName=$_POST['name']; //$_GET, $_REQUEST
$price=$_POST['price'];
$CommodityContent=$_POST['content'];
$CommodityState=$_POST['CommodityState'];


	$sql = "insert into todo1 (CommodityName, price, CommodityContent, CommodityState) values (?, ?, ?, ?)"; //SQL中的 ? 代表未來要用變數綁定進去的地方
	$stmt = mysqli_prepare($db, $sql); //prepare sql statement
	mysqli_stmt_bind_param($stmt, "ssss", $CommodityName, $price,$CommodityContent,$CommodityState); //bind parameters with variables, with types "sss":string, string ,string
	mysqli_stmt_execute($stmt);  //執行SQL
	echo "message added.";
?>
<a href="2.list.php">回工作列表</a>
