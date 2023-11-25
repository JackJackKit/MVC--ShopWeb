<?php

class ProductModel
{
    private $products;

    public function __construct()
    {
        // 模擬從數據庫獲取商品數據
        $this->products = [
            ['id' => 1, 'name' => '商品A', 'price' => 10, 'description' => '一個沒用的A'],
            ['id' => 2, 'name' => '商品B', 'price' => 20, 'description' => '一個沒用的B'],
            ['id' => 3, 'name' => '商品C', 'price' => 30, 'description' => '一個沒用的C'],
        ];
    }

    public function getProducts()
    {
        return $this->products;
    }
}
