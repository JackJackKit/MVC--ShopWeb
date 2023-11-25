<?php

class ShoppingCartModel {
    private static $items = [];

    public static function addItem($productId) {
        self::$items[] = ['productId' => $productId, 'quantity' => 1];
    }

    public static function getCartItems() {
        return self::$items;
    }
}

?>
