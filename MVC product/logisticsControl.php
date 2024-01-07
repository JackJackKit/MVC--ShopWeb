<?php
require('logisticsModel.php');

$act=$_REQUEST['act'];
switch ($act) {
case "listProduct":
  $products=getProductList();
  echo json_encode($products);
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