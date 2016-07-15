<?php

/**
 * Should be provided by bank
 */
$merchant = 'test';

$product = [
    'name' => isset($_POST['name'])
        ? htmlspecialchars($_POST['name']) : '',

    'price' => isset($_POST['price'])
        ? htmlspecialchars($_POST['price']) : ''
];

?>

<html>
<body style="margin: 0">
<iframe src="http://lsapps.me/tbc/13/tbcinst/?<?= $merchant ?>&name=<?= $product['name'] ?>&price=<?= $product['price']?>"
        width="100%"
        height="100%"
        frameborder="0"
>
</iframe>
</body>
</html>
