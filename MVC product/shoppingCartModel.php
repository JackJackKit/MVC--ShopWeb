<?php
require('dbconfig.php');

// 獲取購物車內商品列表
function getShoppingCartItems() {
    global $db;
    $sql = "SELECT shopping_cart.id, products.name, products.price, shopping_cart.quantity, (products.price * shopping_cart.quantity) as total_price 
            FROM shopping_cart 
            JOIN products ON shopping_cart.product_id = products.id;";
    $result = mysqli_query($db, $sql);
    
    $rows = array();
    while($r = mysqli_fetch_assoc($result)) {
        $rows[] = $r;
    }
    return $rows;
}
// 從購物車中移除商品
function removeFromShoppingCart($cartItemId) { 
    global $db;
    
    $deleteSql = "DELETE FROM shopping_cart WHERE id = ?";
    $deleteStmt = mysqli_prepare($db, $deleteSql);
    mysqli_stmt_bind_param($deleteStmt, "i", $cartItemId);
    mysqli_stmt_execute($deleteStmt);
    
    return true;
}
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

// 新增的函式：計算購物車中所有商品總價
function calculateTotalCartPrice() {
    global $db;

    $sql = "SELECT SUM(products.price * shopping_cart.quantity) as totalCartPrice 
            FROM shopping_cart 
            JOIN products ON shopping_cart.product_id = products.id;";
    $result = mysqli_query($db, $sql);

    $row = mysqli_fetch_assoc($result);
    $totalCartPrice = $row['totalCartPrice'];

    return $totalCartPrice;
}

function addToOrder() {
    global $db;
	
    $sql = "INSERT INTO shopping_order( id,item, product_id, quantity,notestatus )
            select (SELECT ifnull(MAX( id ),0) + 1 FROM shopping_order ),@s:=@s+1 item
                    ,product_id,quantity,'未處理訂單'
                    from shopping_cart, (SELECT @s:= 0) AS s;"; 
    $stmt = mysqli_prepare($db, $sql); //prepare sql statement
    mysqli_stmt_execute($stmt);  //執行SQL


    $sql = "Delete from shopping_cart"; 
    $stmt = mysqli_prepare($db, $sql); //prepare sql statement
    mysqli_stmt_execute($stmt);  //執行SQL

	
	
    $sql = "SELECT distinct id,notestatus,score from shopping_order;";
    $result = mysqli_query($db, $sql);
    
    $rows = array();
    while($r = mysqli_fetch_assoc($result)) {
        $rows[] = $r;
    }
    return $rows;
}
// 獲取訂單表
function getShoppingOrderItems() {
    global $db;
    $sql = "SELECT distinct id,notestatus,score from shopping_order;";
    $result = mysqli_query($db, $sql);
    
    $rows = array();
    while($r = mysqli_fetch_assoc($result)) {
        $rows[] = $r;
    }
    return $rows;
}

//修改訂單幾顆星
function updateScoreToOrder($cartItemId , $score) {
    global $db;
    
    $Sql = "Update  shopping_order set score = ?  WHERE id = ?";
    //$Sql = "Update  shopping_order set score = '一'  WHERE id = ?";
    $Stmt = mysqli_prepare($db, $Sql);
    mysqli_stmt_bind_param($Stmt, "si" , $score , $cartItemId);
    mysqli_stmt_execute($Stmt);
    
    return true;
}

// 獲取訂單可評分明細表
function getShoppingOrderScoreItems() {
    global $db;
    $sql = "SELECT distinct id,notestatus,score from shopping_order where notestatus='已送達' and score=''";
    $result = mysqli_query($db, $sql);
    
    $rows = array();
    while($r = mysqli_fetch_assoc($result)) {
        $rows[] = $r;
    }
    return $rows;
}


?>
