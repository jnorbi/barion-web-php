```php
<?php

/*
*  Barion PHP library usage example
*  
*  Completing a previously 3DSecure-authenticated Payment
*  
*  � 2020 Barion Payment Inc.
*/

use Bencurio\Barion\BarionClient;
use Bencurio\Barion\Enum\BarionEnvironment;
use Bencurio\Barion\Models\Payment\Complete3DSPaymentRequestModel;

require_once '../library/BarionClient.php';

$myPosKey = "11111111-1111-1111-1111-111111111111"; // <-- Replace this with your POSKey!
$paymentId = "22222222-2222-2222-2222-222222222222"; // <-- Replace this with the ID of the Payment!

// Barion Client that connects to the TEST environment
$BC = new BarionClient($myPosKey, 2, BarionEnvironment::Test);

// create the complete Payment request model
$completeRequest = new Complete3DSPaymentRequestModel($paymentId);

// call the Barion API
$completeResult = $BC->Complete3DSPayment($completeRequest);

if ($completeResult->RequestSuccessful) {
    // TODO: process the information contained in $completeResult
}
```