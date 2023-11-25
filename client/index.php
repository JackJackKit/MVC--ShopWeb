<?php
session_start();

// 模擬從數據庫獲取商品數據
$products = [
    ['id' => 1, 'name' => '商品A', 'price' => 10, 'description' => '一個沒用的A'],
    ['id' => 2, 'name' => '商品B', 'price' => 20, 'description' => '一個有用的B'],
    ['id' => 3, 'name' => '商品C', 'price' => 30, 'description' => '一個很有用的C'],
];

// 初始化購物車數據（使用 session 保存）
if (!isset($_SESSION['cart'])) {
    $_SESSION['cart'] = [];
}

$cartItems = $_SESSION['cart'];

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['add_to_cart'])) {
        // 模擬添加商品到購物車
        $productId = $_POST['add_to_cart'];
        $product = array_filter($products, function ($item) use ($productId) {
            return $item['id'] == $productId;
        });

        if (!empty($product)) {
            $cartItems[] = reset($product);
            $_SESSION['cart'] = $cartItems; // 將更新後的購物車保存到 session 中
        }
    } elseif (isset($_POST['remove_from_cart'])) {
        // 移除購物車中的特定商品
        $removeProductId = $_POST['remove_from_cart'];
        $cartItems = array_filter($cartItems, function ($item) use ($removeProductId) {
            return $item['id'] != $removeProductId;
        });
        $_SESSION['cart'] = $cartItems; // 將更新後的購物車保存到 session 中
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Product List</title>
</head>
<body>

<h1>清單</h1>
<ul>
    <?php foreach ($products as $product): ?>
        <li>
            <?php echo "{$product['name']} - 價格: {$product['price']}"; ?>
            <form method="post" action="index.php">
                <input type="hidden" name="add_to_cart" value="<?php echo $product['id']; ?>">
                <button type="submit">加入購物車</button>
            </form>
            <p>商品描述: <?php echo $product['description']; ?></p>
        </li>
    <?php endforeach; ?>
</ul>

<a href="cart.php">查看購物車</a>

<ul id="selected-products-list"></ul>

<script>
    document.addEventListener('DOMContentLoaded', function () {
        const addToCartForms = document.querySelectorAll('.add-to-cart-form');

        addToCartForms.forEach(form => {
            form.addEventListener('submit', function (event) {
                event.preventDefault();
                const productId = this.querySelector('input[name="add_to_cart"]').value;
                addToCart(productId);
            });
        });

        function addToCart(productId) {
            const xhr = new XMLHttpRequest();
            xhr.open('POST', 'index.php', true);
            xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');

            xhr.onreadystatechange = function () {
                if (xhr.readyState === 4 && xhr.status === 200) {
                    const selectedProductsList = document.getElementById('selected-products-list');
                    selectedProductsList.innerHTML = xhr.responseText;
                }
            };

            xhr.send(`add_to_cart=${productId}`);
        }
    });
</script>

<ul id="selected-products-list">
    <?php foreach ($cartItems as $cartItem): ?>
        <li>
            <?php echo "{$cartItem['name']} - 價格: {$cartItem['price']}"; ?>
            <form method="post" action="index.php">
                <input type="hidden" name="remove_from_cart" value="<?php echo $cartItem['id']; ?>">
                <button type="submit">移除</button>
            </form>
        </li>
    <?php endforeach; ?>
</ul>



</body>
</html>
