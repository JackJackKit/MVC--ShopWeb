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
        $Product=getProductList();
        echo json_encode($Product);
        return;  
    case "addToShoppingCart":
	    $id=(int)$_REQUEST['id']; //$_GET, $_REQUEST
	    //verify
	    addToShoppingCart($id);
	    return;
    default:
}
?>
