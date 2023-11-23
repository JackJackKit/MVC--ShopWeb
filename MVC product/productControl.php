<?php
require('productModel.php');

$act = $_REQUEST['act'];

switch ($act) {
    case "listProducts":
        $productModel = new ProductModel($db);
        $products = $productModel->get_product_list();
        echo json_encode($products);
        break;
    case "getProductById":
        $id = $_REQUEST['id'];
        $productModel = new ProductModel($db);
        $product = $productModel->get_product_by_id($id);
        if ($product) {
            echo json_encode($product);
        } else {
            echo "Product not found";
        }
        break;
    default:
        // 預設的處理邏輯
        break;
}

?>