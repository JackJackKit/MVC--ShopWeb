<?php
require('dbconfig.php');

function getProductList() {
	global $db;
	$sql = "select * from products;";
	$stmt = mysqli_prepare($db, $sql ); //precompile sql指令，建立statement 物件，以便執行SQL
	mysqli_stmt_execute($stmt); //執行SQL
	$result = mysqli_stmt_get_result($stmt); //取得查詢結果

	$rows = array(); //要回傳的陣列
	while($r = mysqli_fetch_assoc($result)) {
		$rows[] = $r; //將此筆資料新增到陣列中
	}
	return $rows;
}

function addProduct($name,$price,$description,$ProductID) {
	global $db;
	if($ProductID>0) {
		$sql = "update products set name=?, price=?,description=? where id=?"; //SQL中的 ? 代表未來要用變數綁定進去的地方
		$stmt = mysqli_prepare($db, $sql); //prepare sql statement
		mysqli_stmt_bind_param($stmt, "sssi", $name, $price,$description,$ProductID); //bind parameters with variables, with types "sss":string, string ,string
	} else {
		$sql = "insert into products (name, price, description) values (?, ?, ?)"; //SQL中的 ? 代表未來要用變數綁定進去的地方
		$stmt = mysqli_prepare($db, $sql); //prepare sql statement
		mysqli_stmt_bind_param($stmt, "sss", $name, $price,$description); //bind parameters with variables, with types "sss":string, string ,string
	}
	mysqli_stmt_execute($stmt);  //執行SQL
	return True;
}

function updateProduct($id, $name,$price,$description) {
	echo $id, $name,$price,$description;
	return;
}

function delProduct($id) {
	global $db;

	$sql = "delete from products where id=?;"; //SQL中的 ? 代表未來要用變數綁定進去的地方
	$stmt = mysqli_prepare($db, $sql); //prepare sql statement
	mysqli_stmt_bind_param($stmt, "i", $id); //bind parameters with variables, with types "sss":string, string ,string
	mysqli_stmt_execute($stmt);  //執行SQL
	return True;
}
?>