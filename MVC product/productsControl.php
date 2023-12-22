<?php
require('productsModel.php');

$act=$_REQUEST['act'];
switch ($act) {
case "listProduct":
  $products=getProductList();
  echo json_encode($products);
  return;  
case "addProduct":
	
	$jsonStr = $_POST['dat'];
	$Product = json_decode($jsonStr);
	//should verify first
	addProduct($Product->name,$Product->price,$Product->description,$Product->id);
	return;
case "delProduct":
	$id=(int)$_REQUEST['id']; //$_GET, $_REQUEST
	//verify
	delProduct($id);
	return;
  case "OrderItems":
    $OrderItems = OrderItems();
    echo json_encode($OrderItems);
    return;
case "getOrderItems":
    $shoppingOrderItems = getShoppingOrderItems();
    echo json_encode($shoppingOrderItems);
    return;
case "getConfirmOrderItems":
    $ConfirmOrderItems = getConfirmOrderItems();
    echo json_encode($ConfirmOrderItems);
    return;
case "updateOrderStatus":
  $orderId = $_REQUEST['orderId'];
  $newStatus = $_REQUEST['newStatus'];
  updateOrderStatus($orderId, $newStatus);
  return;
case "updateOrderStatusSended":
    $orderId = $_REQUEST['orderId'];
    $newStatus = $_REQUEST['newStatus'];
    updateOrderStatusSended($orderId, $newStatus);
    return;
default:
}

?>