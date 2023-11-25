<!-- <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Product List</title>
</head>
<body>

<h1>清單</h1>
<ul>
    <?php foreach ($data as $product): ?>
        <li>
            <?php echo "{$product['name']} - 價格: {$product['price']}"; ?>
            <button class="add-to-cart-btn" data-product-id="<?php echo $product['id']; ?>">加入購物車</button>
            <button class="custom-btn" data-product-id="<?php echo $product['id']; ?>">自訂按鈕</button>
            <p>商品描述: <?php echo $product['description']; ?></p>
        </li>
    <?php endforeach; ?>
</ul>

<h2>商品：A </h2> <h2>商品說明:一個沒用的A    價格:10</h2> 

<button type="button" onClick="postForm()">加入購物車</button>

<h2>商品：B</h2>  <h2>商品說明:一個沒用的B    價格:20</h2>

<button type="button" onClick="postForm()">加入購物車</button>

<h2>商品：C</h2>  <h2>商品說明:一個沒用的C    價格:30</h2>

<button type="button" onClick="postForm()">加入購物車</button>

<ul id="selected-products-list"></ul>

<script>
    document.addEventListener('DOMContentLoaded', function () {
        const addToCartBtns = document.querySelectorAll('.add-to-cart-btn');
        const customBtns = document.querySelectorAll('.custom-btn');

        addToCartBtns.forEach(btn => {
            btn.addEventListener('click', function () {
                const productId = this.getAttribute('data-product-id');
                addToCart(productId);
            });
        });

        customBtns.forEach(btn => {
            btn.addEventListener('click', function () {
                const productId = this.getAttribute('data-product-id');
                // 在這裡放置你想要執行的 "自訂按鈕" 的代碼
                console.log(`自訂按鈕被點擊了！ 商品ID: ${productId}`);
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

                    // 在這裡加入跳轉到購物車頁面的代碼
                    window.location.href = 'cart.php';
                }
            };

            xhr.send(`add_to_cart=${productId}`);
        }
    });
</script>

</body>
</html> -->





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

</body>
</html>
