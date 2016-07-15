<?php

$product = [
    'id' => 1,
    'name' => 'Test',
    'price' => 100,
    'category' => 'category'
];

?>

<html>
<head>
    <link rel="stylesheet" href="css/main.css">
</head>
<body>
<div class="container">
    <div class="shop-item">
        <div class="title">Product: <?= $product['name'] ?></div>

        <div class="description">Price: <?= $product['price'] ?>$</div>

        <div class="footer">
            <button data-company="tbc" class="btn-installment">TBC</button>
            <button data-company="bog" class="btn-installment">BOG</button>
            <button data-company="liberty" class="btn-installment">LIBERTY</button>
            <button data-company="republic" class="btn-installment">REPUBLIC</button>
        </div>
    </div>
</div>
<script>
    var store = {
        product: JSON.parse('<?= json_encode($product) ?>')
    };
</script>
<script src="js/jquery.min.js"></script>
<script src="js/main.js"></script>
</body>
</html>
