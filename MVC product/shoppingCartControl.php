<?php
require('shoppingCartModel.php');

$act = $_REQUEST['act'];

switch ($act) {
    case "getShoppingCartItems":
        $username = $_REQUEST['username'];
        $shoppingCartItems = getShoppingCartItems($username);
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
        $username = $_REQUEST['username'];
        addToShoppingCart($id,$username);
        return;
    case "calculateTotalCartPrice":
        $totalCartPrice = calculateTotalCartPrice();
        echo json_encode(['totalCartPrice' => $totalCartPrice]);
        return;
    case "addToOrder"://20231211
        $shoppingCartItems = addToOrder();
        echo json_encode($shoppingCartItems);
        return;
    case "getOrderItems"://20240111
        $username = $_REQUEST['username'];
        $shoppingOrderItems = getShoppingOrderItems($username);
        echo json_encode($shoppingOrderItems);
        return;
    case "updateOrder"://20240111
        $orderItemId = (int)$_REQUEST['id'];
        $score = $_REQUEST['score'];
        //$orderScore = $_REQUEST['id'];
        updateScoreToOrder($orderItemId , $score );
        return;
    case "getOrderScoreItems"://訂單評分
        $shoppingOrderScoreItems = getShoppingOrderScoreItems();
        echo json_encode($shoppingOrderScoreItems);
        return;
		
    default:
        // Handle other cases or do nothing for unknown actions
}
?>
