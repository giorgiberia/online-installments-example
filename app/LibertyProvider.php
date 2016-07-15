<?php

require_once 'InstallmentContract.php';

class LibertyProvider implements InstallmentContract
{
    private $product;

    /**
     * Should be provided by bank
     *
     * @var string
     */
    private $merchant = 'TESTGE';

    /**
     * Should be provided by bank
     *
     * @var string
     */
    private $merchantKey = 'TEST123456';

    /**
     * Set this parameter to 0 in production mode
     *
     * @var int
     */
    private $testmode = 1;

    /**
     * User address
     *
     * @var string
     */
    private $address = 'address';

    /**
     * Order code - uniqid() is ok unless you want to integrate orders in your current system
     *
     * @var string
     */
    private $ordercode;

    /**
     * Call ID - this parameter is used to identify request after receiving response from bank
     * However, this is not implemented in this example, so uniqid() is also ok
     * See documentation provided by bank for further details
     *
     * @var string
     */
    private $callid;

    public function __construct($product)
    {
        $product['installmenttype'] = 1;

        $this->product = $product;
        $this->ordercode = uniqid();
        $this->callid = uniqid();
    }

    public function htmlForm()
    {
        $check = $this->calculateChecksum();

        return <<<HTML
<form action="http://onlineinstallment.lb.ge/installment/" method="post" style="display: none">
    <input type="text" name="merchant" value="{$this->merchant}">
    <input type="text" name="ordercode" value="{$this->ordercode}">
    <input type="text" name="callid" value="{$this->callid}">
    <input type="text" name="shipping_address" value="{$this->address}">
    <input type="text" name="testmode" value="{$this->testmode}">
    <input type="text" name="check" value="$check">
    <input type="text" name="products[0][id]" value="{$this->product['id']}">
    <input type="text" name="products[0][title]" value="{$this->product['name']}">
    <input type="text" name="products[0][amount]" value="{$this->product['amount']}">
    <input type="text" name="products[0][price]" value="{$this->product['price']}">
    <input type="text" name="products[0][type]" value="{$this->product['category']}">
    <input type="text" name="products[0][installmenttype]" value="{$this->product['installmenttype']}">
</form>
HTML;
    }

    private function calculateChecksum()
    {
        $strCheck = $this->merchantKey .
            $this->merchant .
            $this->ordercode .
            $this->callid .
            $this->address .
            $this->testmode .
            $this->product['id'] .
            $this->product['name'] .
            $this->product['amount'] .
            $this->product['price'] .
            $this->product['category'] .
            $this->product['installmenttype'];

        return strtoupper(hash('sha256', $strCheck));
    }
}