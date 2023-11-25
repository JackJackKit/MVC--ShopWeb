<?php

require('ShoppingCartModel.php');

class ShoppingCartController {
    private $model;

    public function __construct() {
        $this->model = new ShoppingCartModel();
    }

    public function viewShoppingCart() {
        $shoppingCartItems = $this->model->getShoppingCartItems();
        include('shoppingCartView.php');
    }
}

?>
