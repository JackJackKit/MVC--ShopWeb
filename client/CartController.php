<?php

class CartController
{
    private $cartModel;

    public function __construct(CartModel $cartModel)
    {
        $this->cartModel = $cartModel;
    }

    public function displayCart()
    {
        $cartItems = $this->cartModel->getCartItems();
        $totalPrice = $this->cartModel->getTotalPrice($cartItems);
        include 'views/cart.php';
    }
}
