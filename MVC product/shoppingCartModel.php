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

// 將商品添加到購物車
function addToShoppingCart($productId) {
    global $db;
    
    // 檢查商品是否已經在購物車中
    $checkSql = "SELECT * FROM shopping_cart WHERE product_id = ?";
    $checkStmt = mysqli_prepare($db, $checkSql);
    mysqli_stmt_bind_param($checkStmt, "i", $productId);
    mysqli_stmt_execute($checkStmt);
    $checkResult = mysqli_stmt_get_result($checkStmt);
    
    if (mysqli_num_rows($checkResult) > 0) {
        // 如果商品已經在購物車中，增加數量
        $updateSql = "UPDATE shopping_cart SET quantity = quantity + 1 WHERE product_id = ?";
        $updateStmt = mysqli_prepare($db, $updateSql);
        mysqli_stmt_bind_param($updateStmt, "i", $productId);
        mysqli_stmt_execute($updateStmt);
    } else {
        // 如果商品不在購物車中，新增並設置數量為1
        $insertSql = "INSERT INTO shopping_cart (product_id, quantity) VALUES (?, 1)";
        $insertStmt = mysqli_prepare($db, $insertSql);
        mysqli_stmt_bind_param($insertStmt, "i", $productId);
        mysqli_stmt_execute($insertStmt);
    }
    return true;
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
?>
