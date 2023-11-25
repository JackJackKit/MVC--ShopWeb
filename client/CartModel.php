<?php

class CartModel
{
    public function getCartItems()
    {
        // 模擬購物車數據（假設商品信息存在 session 中）
        if (isset($_SESSION['cart']) && is_array($_SESSION['cart'])) {
            return $_SESSION['cart'];
        }

        return [];
    }

    public function getTotalPrice($cartItems)
    {
        return array_sum(array_map(function ($item) {
            return $item['price'] * $item['quantity'];
        }, $cartItems));
    }
}
