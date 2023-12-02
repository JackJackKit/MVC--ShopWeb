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
default:
  
}

?>