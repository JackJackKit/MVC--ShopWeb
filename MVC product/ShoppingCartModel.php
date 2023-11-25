<?php

require('dbconfig.php');

class ShoppingCartModel {
    public function getShoppingCartItems() {
        global $db;
        $sql = "SELECT sc.id, p.name, p.price, sc.quantity, (p.price * sc.quantity) as total_price
                FROM shopping_cart sc
                JOIN products p ON sc.product_id = p.id";
        $result = mysqli_query($db, $sql);

        $items = [];
        while ($row = mysqli_fetch_assoc($result)) {
            $items[] = $row;
        }

        return $items;
    }
}

?>
