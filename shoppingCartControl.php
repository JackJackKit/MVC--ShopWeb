<?php
require('shoppingCartModel.php');

$act = $_REQUEST['act'];

switch ($act) {
    case "getShoppingCartItems":
        $shoppingCartItems = getShoppingCartItems();
        echo json_encode($shoppingCartItems);
        return;
    case "removeFromShoppingCart":
        $cartItemId = (int)$_REQUEST['id'];
        removeFromShoppingCart($cartItemId);
        return;
    case "listProduct":
        $Product = getProductList();
        echo json_encode($Product);
        return;
    case "addToShoppingCart":
        $id = (int)$_REQUEST['id'];
        addToShoppingCart($id);
        return;
    case "calculateTotalCartPrice":
        $totalCartPrice = calculateTotalCartPrice();
        echo json_encode(['totalCartPrice' => $totalCartPrice]);
        return;
    default:
        // Handle other cases or do nothing for unknown actions
}
?>
