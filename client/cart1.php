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
            <th>數量</th>
            <th>小計</th>
        </tr>
        <?php foreach ($cartItems as $item): ?>
            <tr>
                <td><?php echo $item['id']; ?></td>
                <td><?php echo $item['name']; ?></td>
                <td><?php echo $item['price']; ?></td>
                <td><?php echo $item['quantity']; ?></td>
                <td><?php echo $item['price'] * $item['quantity']; ?></td>
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
