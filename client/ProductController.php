<?php

class ProductController
{
    private $productModel;

    public function __construct(ProductModel $productModel)
    {
        $this->productModel = $productModel;
    }

    public function displayProducts()
    {
        $products = $this->productModel->getProducts();
        include 'views/product_list.php';
    }

    public function addToCart($productId)
    {
        // 在實際應用中，這裡應該處理將商品添加到購物車的邏輯
        // 這裡僅作為示例，模擬添加商品到購物車的操作
        $_SESSION['cart'][] = $productId;
        
        // 重定向到商品列表頁面
        header('Location: index.php');
    }
}
