<?php

use Bencurio\Barion\BarionClient;
use Bencurio\Barion\Enum\Currency;
use Bencurio\Barion\Enum\FundingSourceType;
use Bencurio\Barion\Enum\PaymentType;
use Bencurio\Barion\Enum\UILocale;
use Bencurio\Barion\Models\Common\ItemModel;
use Bencurio\Barion\Models\Payment\CaptureRequestModel;
use Bencurio\Barion\Models\Payment\PaymentTransactionModel;
use Bencurio\Barion\Models\Payment\PreparePaymentRequestModel;
use Bencurio\Barion\Models\Payment\TransactionToCaptureModel;
use Bencurio\Barion\Models\Secure3D\ShippingAddressModel;
use PHPUnit\Framework\TestCase;

class BarionClientE2ETest extends TestCase
{
    public function barionClient(): BarionClient {
        $barion = new BarionClient(
            getenv('BARION_TEST_POSKEY'),
            2,
            \Bencurio\Barion\Enum\BarionEnvironment::Test,
            true,
        );
        return $barion;
    }

    public function testPrechecks()
    {
        // --stop-on-failure
        $this->assertNotEmpty(getenv('BARION_TEST_POSKEY'), 'The BARION_TEST_POSKEY environment variable must be defined for the E2E tests.');
        $this->assertNotEmpty(getenv('BARION_TEST_EMAIL'), 'The BARION_TEST_EMAIL environment variable must be defined for the E2E tests.');
    }

//    public function testCapture()
//    {
//        // TODO
//    }
//
//    public function testCancelAuthorization()
//    {
//        // TODO
//    }

    public function testPreparePayment()
    {
        $BC = $this->barionClient();
        $item = $this->mockItemModel();
        $trans = $this->mockPaymentTransactionModel();
        $trans->AddItem($item);
        $psr = $this->mockPreparePaymentRequestModel();
        $psr->AddTransaction($trans);
        $myPayment = $BC->PreparePayment($psr);

        $this->assertEquals("1", $myPayment->RequestSuccessful);
        $this->assertEquals("Prepared", $myPayment->Status);

        foreach ($myPayment->Transactions as $transaction) {
            $this->assertEquals("Prepared", $transaction->Status);
        }
    }

    public function testGetPaymentState()
    {
        $BC = $this->barionClient();
        $item = $this->mockItemModel();
        $trans = $this->mockPaymentTransactionModel();
        $trans->AddItem($item);
        $psr = $this->mockPreparePaymentRequestModel();
        $psr->AddTransaction($trans);
        $myPayment = $BC->PreparePayment($psr);

        $this->assertNotEmpty($myPayment->PaymentId);

        $paymentDetails = $BC->GetPaymentState($myPayment->PaymentId);

        $this->assertEquals($myPayment->PaymentId, $paymentDetails->PaymentId);
        $this->assertEquals(getenv('BARION_TEST_EMAIL'), $paymentDetails->POSOwnerEmail);
        $this->assertEquals("1", $paymentDetails->RequestSuccessful);
        $this->assertEquals("Prepared", $paymentDetails->Status);
    }

//    public function testRefundPayment()
//    {
//        // TODO
//    }
//
//    public function testFinishReservation()
//    {
//        // TODO
//    }
//
//    public function testComplete3DSPayment()
//    {
//        // TODO
//    }
//
//    public function testGetPaymentQRImage()
//    {
//        // TODO
//    }

    public function mockCaptureRequestModel(): CaptureRequestModel {
        return new CaptureRequestModel('22222222-2222-2222-2222-222222222222');
    }

    public function mockPaymentTransactionModel(): PaymentTransactionModel {
        $trans = new PaymentTransactionModel();
        $trans->POSTransactionId = "TRANS-02";
        $trans->Payee = getenv('BARION_TEST_EMAIL'); // no more than 256 characters
        $trans->Total = 1500;
        $trans->Comment = "Test Transaction"; // no more than 640 characters
        return $trans;
    }

    public function mockShippingAddressModel(): ShippingAddressModel {
        $shippingAddress = new ShippingAddressModel();
        $shippingAddress->Country = "HU";
        $shippingAddress->Region = null;
        $shippingAddress->City = "Budapest";
        $shippingAddress->Zip = "1111";
        $shippingAddress->Street = "Teszt utca 1.";
        $shippingAddress->Street2 = "1. emelet 1. ajto";
        $shippingAddress->Street3 = "";
        $shippingAddress->FullName = "Teszt Tibor";
        return $shippingAddress;
    }

    public function mockPreparePaymentRequestModel(): PreparePaymentRequestModel {
        $psr = new PreparePaymentRequestModel();
        $psr->GuestCheckout = true; // we allow guest checkout
        $psr->PaymentType = PaymentType::Reservation; // we want an immediate Payment
        $psr->ReservationPeriod = "00:00:01:00"; // money is reserved for 1 minute
        $psr->PaymentWindow = "00:01:00"; // the Payment must be completed in 1 minute
        $psr->FundingSources = array(FundingSourceType::All); // both Barion wallet and bank card accepted
        $psr->PaymentRequestId = "TESTPAY-02"; // no more than 100 characters
        $psr->PayerHint = "user@example.com"; // no more than 256 characters
        $psr->Locale = UILocale::HU; // the UI language will be English
        $psr->Currency = Currency::HUF;
        $psr->OrderNumber = "ORDER-0002"; // no more than 100 characters
        $psr->ShippingAddress = $this->mockShippingAddressModel();
        $psr->RedirectUrl = 'https://github.com/bencurio/barion-web-php#test-payment';
        return $psr;
    }

    public function mockItemModel(): ItemModel {
        $item = new ItemModel();
        $item->Name = "TestItem"; // no more than 250 characters
        $item->Description = "A test item for delayed capture Payment"; // no more than 500 characters
        $item->Quantity = 1;
        $item->Unit = "piece"; // no more than 50 characters
        $item->UnitPrice = 1000;
        $item->ItemTotal = 1000;
        $item->SKU = "ITEM-01"; // no more than 100 characters
        return $item;
    }

    public function mockTransactionToCaptureModel(): TransactionToCaptureModel {
        $trans = new TransactionToCaptureModel();
        $trans->TransactionId = "33333333-3333-3333-3333-333333333333"; // <-- Replace this with the original transaction ID!
        $trans->Total = 1000;
        $trans->Comment = "Transaction completed"; // no more than 640 characters
        return $trans;
    }
}
