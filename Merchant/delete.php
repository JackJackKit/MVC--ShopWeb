<?php
require('dbconfig.php');
$ID=$_POST['id'];
$CommodityName=$_POST['name']; //$_GET, $_REQUEST
$price=$_POST['price'];
$CommodityContent=$_POST['content'];
$CommodityState=$_POST['CommodityState'];


	$sql = "DELETE FROM todo1 where id=$ID"; //SQL中的 ? 代表未來要用變數綁定進去的地方
	$stmt = mysqli_prepare($db, $sql); //prepare sql statement
	mysqli_stmt_execute($stmt);  //執行SQL
	echo "message delete.";
?>
<a href="1.新首頁.html">回工作列表</a>
