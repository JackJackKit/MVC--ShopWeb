<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Shopping Cart</title>
</head>
<body>

<h1>購物車</h1>
<ul>
    <?php foreach ($data as $item): ?>
        <li>
            商品編號: <?php echo $item['productId']; ?>,
            數量: <?php echo $item['quantity']; ?>
            <form method="post" action="">
                <input type="hidden" name="remove_from_cart" value="<?php echo $item['productId']; ?>">
                <input type="submit" value="移出購物車">
            </form>
        </li>
    <?php endforeach; ?>
</ul>

</body>
</html>
