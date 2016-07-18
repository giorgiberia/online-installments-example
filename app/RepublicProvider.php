<?php

require_once 'InstallmentContract.php';

class RepublicProvider implements InstallmentContract
{
    private $product;

    public function __construct($product)
    {
        $this->product = $product;
    }

    public function htmlForm()
    {
        return <<<HTML
<form action="/page/republic/start.php" method="post" style="display: none">
    <input type="text" name="name" value="{$this->product['name']}">
    <input type="text" name="price" value="{$this->product['price']}">
</form>
HTML;
    }
}