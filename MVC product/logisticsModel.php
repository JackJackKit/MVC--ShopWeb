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



function updateProduct($id, $name,$price,$description) {
	echo $id, $name,$price,$description;
	return;
}

function OrderItems() {
    global $db;
	$sql = "SELECT distinct id,notestatus,score from shopping_order;";
    $result = mysqli_query($db, $sql);
    
    $rows = array();
    while($r = mysqli_fetch_assoc($result)) {
        $rows[] = $r;
    }
    return $rows;
}
function getShoppingOrderItems() {
    global $db;
    $sql = "SELECT distinct id,notestatus,score from shopping_order where notestatus='寄送中訂單';";
    $result = mysqli_query($db, $sql);
    
    $rows = array();
    while($r = mysqli_fetch_assoc($result)) {
        $rows[] = $r;
    }
    return $rows;
}
function getConfirmOrderItems() {
    global $db;
    $sql = "SELECT distinct id,notestatus,score from shopping_order where notestatus='已寄送';";
    $result = mysqli_query($db, $sql);
    
    $rows = array();
    while($r = mysqli_fetch_assoc($result)) {
        $rows[] = $r;
    }
    return $rows;
}

function updateOrderStatus($orderId, $newStatus) {
    global $db;
    $sql = "UPDATE shopping_order SET notestatus=? WHERE id=?";
    $stmt = mysqli_prepare($db, $sql);
    mysqli_stmt_bind_param($stmt, "si", $newStatus, $orderId);
    mysqli_stmt_execute($stmt);
    return true;
}

function updateOrderStatusSended($orderId, $newStatus) {
    global $db;
    $sql = "UPDATE shopping_order SET notestatus=? WHERE id=?";
    $stmt = mysqli_prepare($db, $sql);
    mysqli_stmt_bind_param($stmt, "si", $newStatus, $orderId);
    mysqli_stmt_execute($stmt);
    return true;
}

?>