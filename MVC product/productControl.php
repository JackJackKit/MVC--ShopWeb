<?php
require('productModel.php');

$act=$_REQUEST['act'];
switch ($act) {
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