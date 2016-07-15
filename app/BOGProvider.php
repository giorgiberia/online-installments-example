<?php

require_once 'InstallmentContract.php';

class BOGProvider implements InstallmentContract
{
    private $product;

    /**
     * Should be provided by bank
     *
     * @var string
     */
    private $merchantId = 'TRAINING';

    /**
     * Should be provided by bank
     *
     * @var string
     */
    private $merchantAccount = 'TRAINING';

    /**
     * Should be provided by bank
     *
     * @var string
     */
    private $merchantKey = '123456';

    /**
     * User ID
     *
     * @var string
     */
    private $userId;

    /**
     * Order code - uniqid() is ok unless you want to integrate orders in your current system
     *
     * @var string
     */
    private $ordercode;

    public function __construct($product)
    {
        $this->product = $product;
        $this->userId = 'user';
        $this->ordercode = uniqid();
    }

    public function htmlForm()
    {
        $merchantJson = json_encode([
            'merchant' => $this->merchantId,
            'account' => $this->merchantAccount,
            'user' => $this->userId,
            'amount' => $this->product['price'],
            'order' => $this->ordercode,
            'auth' => $this->calculateAuthKey(),
            'ahash' => $this->calculateHash()
        ]);

        $productJson = json_encode([
            'product' => $this->product['name'],
            'price' => $this->product['price'],
            'type' => $this->product['category'],
            'description' => ''
        ]);

        return <<<HTML
<form action="https://ganvadeba.bog.ge/start_order" method="post" style="display: none">
    <textarea name="merchant">{$merchantJson}</textarea>
    <textarea name="item[]">{$productJson}</textarea>
</form>
HTML;
    }

    private function calculateAuthKey()
    {
        return md5($this->merchantId . $this->userId . $this->merchantKey);
    }

    private function calculateHash()
    {
        return md5($this->product['price'] . $this->merchantKey);
    }
}