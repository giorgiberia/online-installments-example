<?php

require_once 'app/TBCProvider.php';
require_once 'app/BOGProvider.php';
require_once 'app/LibertyProvider.php';
require_once 'app/RepublicProvider.php';

$company = $_GET['company'];
$product = [
    'id' => $_GET['id'],
    'name' => $_GET['name'],
    'amount' => 1,
    'price' => $_GET['price'],
    'category' => $_GET['category']
];

switch ($company) {
    case 'tbc':
        $provider = new TBCProvider($product);
        break;
    case 'bog':
        $provider = new BOGProvider($product);
        break;
    case 'liberty':
        $provider = new LibertyProvider($product);
        break;
    case 'republic':
        $provider = new RepublicProvider($product);
        break;
    default:
        http_response_code(400);
        die();
}

echo $provider->htmlForm();