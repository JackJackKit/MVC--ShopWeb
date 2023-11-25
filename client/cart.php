<?php
session_start();

// 模擬購物車數據（假設商品信息存在 session 中）
$cartItems = [];
if (isset($_SESSION['cart']) && is_array($_SESSION['cart'])) {
    $cartItems = $_SESSION['cart'];
}

// 計算總價格
$totalPrice = array_sum(array_map(function ($item) {
    return $item['price'];
}, $cartItems));
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>購物車</title>
</head>
<body>

<h1>購物車</h1>

<?php if (!empty($cartItems)): ?>
    <table border="1">
        <tr>
            <th>ID</th>
            <th>商品名稱</th>
            <th>單價</th>

        </tr>
        <?php foreach ($cartItems as $item): ?>
            <tr>
                <td><?php echo $item['id']; ?></td>
                <td><?php echo $item['name']; ?></td>
                <td><?php echo $item['price']; ?></td>

            </tr>
        <?php endforeach; ?>
        <tr>
            <td colspan="4">總計</td>
            <td><?php echo $totalPrice; ?></td>
        </tr>
    </table>
<?php else: ?>
    <p>購物車是空的。</p>
<?php endif; ?>



<a href="index.php">返回商品列表</a>



</body>
</html>
