```php
<?php

/*
*  Barion PHP library usage example
*  
*  Refunding a Payment partially (refunding 100 Ft from a Payment)
*  
*  � 2015 Barion Payment Inc.
*/

use Bencurio\Barion\BarionClient;
use Bencurio\Barion\Enum\BarionEnvironment;
use Bencurio\Barion\Models\Payment\TransactionToRefundModel;
use Bencurio\Barion\Models\Refund\RefundRequestModel;

$myPosKey = "11111111-1111-1111-1111-111111111111"; // <-- Replace this with your POSKey!
$paymentId = "22222222-2222-2222-2222-222222222222"; // <-- Replace this with the ID of the Payment!

// Barion Client that connects to the TEST environment
$BC = new BarionClient($myPosKey, 2, BarionEnvironment::Test);

// create the refund transaction model
$trans = new TransactionToRefundModel();
$trans->TransactionId = "33333333-3333-3333-3333-333333333333"; // <-- Replace this with the original transaction ID!
$trans->POSTransactionId = "TRANS-04"; // <-- Replace this with the original POS transaction ID!
$trans->AmountToRefund = 100;
$trans->Comment = "Refund because of complaint"; // no more than 640 characters

$rr = new RefundRequestModel($paymentId);
$rr->AddTransaction($trans);

$refundResult = $BC->RefundPayment($rr);

if ($refundResult->RequestSuccessful) {
    // TODO: process the information contained in $refundResult
}
```