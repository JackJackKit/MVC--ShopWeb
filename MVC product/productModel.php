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

function addToShoppingCart($id) {
 global $db;

 $sql = "select * from shopping_cart where product_id=?;";
 $stmt = mysqli_prepare($db, $sql ); //precompile sql指令，建立statement 物件，以便執行SQL
    mysqli_stmt_bind_param($stmt, "i", $id); 
 mysqli_stmt_execute($stmt); //執行SQL
 $result = mysqli_stmt_get_result($stmt); //取得查詢結果
 //如果查詢有資料
 if (mysqli_num_rows($result)>0)
 {
    $sql = "Update shopping_cart set quantity=quantity+1 where product_id=?;"; //SQL中的 ? 代表未來要用變數綁定進去的地方
 }
 else
 {
      $sql = "INSERT INTO shopping_cart (product_id,quantity) VALUES (?,1);"; //SQL中的 ? 代表未來要用變數綁定進去的地方
 }
 $stmt = mysqli_prepare($db, $sql); //prepare sql statement
 mysqli_stmt_bind_param($stmt, "i", $id); //bind parameters with variables, with types "sss":string, string ,string
 mysqli_stmt_execute($stmt);  //執行SQL
 return True;
}


?>