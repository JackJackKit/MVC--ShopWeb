<?php

require('ShoppingCartController.php');

$controller = new ShoppingCartController();

// 根據需要的操作執行相應的函數
$act = $_REQUEST['act'] ?? '';

switch ($act) {
    case 'viewShoppingCart':
        $controller->viewShoppingCart();
        break;
    // 其他操作...
    default:
        // 默認操作...
}

?>
