<?php
require('shoppingCartModel.php');

$act = $_REQUEST['act'];

switch ($act) {
    case "getShoppingCartItems":
        $shoppingCartItems = getShoppingCartItems();
        echo json_encode($shoppingCartItems);
        return;
    case "addToShoppingCart":
        $productId = (int)$_REQUEST['id'];
        addToShoppingCart($productId);
        return;
    case "removeFromShoppingCart":
        $cartItemId = (int)$_REQUEST['id'];
        removeFromShoppingCart($cartItemId);
        return;
    default:
}
?>
