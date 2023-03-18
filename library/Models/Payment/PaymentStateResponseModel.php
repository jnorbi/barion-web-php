<?php

/**
 * Copyright 2016 Barion Payment Inc. All Rights Reserved.
 * <p/>
 * Licensed under the Apache License, Version 2.0 (the "License");
 * you may not use this file except in compliance with the License.
 * You may obtain a copy of the License at
 * <p/>
 * http://www.apache.org/licenses/LICENSE-2.0
 * <p/>
 * Unless required by applicable law or agreed to in writing, software
 * distributed under the License is distributed on an "AS IS" BASIS,
 * WITHOUT WARRANTIES OR CONDITIONS OF ANY KIND, either express or implied.
 * See the License for the specific language governing permissions and
 * limitations under the License.
 */

namespace Bencurio\Barion\Models\Payment;

use Bencurio\Barion\Helpers\iBarionModel;
use Bencurio\Barion\Models\BaseResponseModel;
use Bencurio\Barion\Models\Common\FundingInformationModel;

class PaymentStateResponseModel extends BaseResponseModel implements iBarionModel
{
    public $PaymentId;
    public $PaymentRequestId;
    public $OrderNumber;
    public $POSId;
    public $POSName;
    public $POSOwnerEmail;
    public $POSOwnerCountry;
    public $Status;
    public $PaymentType;
    public $FundingSource;
    public $FundingInformation;
    public $AllowedFundingSources;
    public $GuestCheckout;
    public $CreatedAt;
    public $ValidUntil;
    public $CompletedAt;
    public $ReservedUntil;
    public $DelayedCaptureUntil;
    public $Total;
    public $Currency;
    public $Transactions;
    public $RecurrenceResult;
    public $SuggestedLocale;
    public $FraudRiskScore;
    public $RedirectUrl;
    public $CallbackUrl;
    public $RecurrenceType;
    public $TraceId;

    function __construct()
    {
        parent::__construct();
        $this->PaymentId = "";
        $this->PaymentRequestId = "";
        $this->OrderNumber = "";
        $this->POSId = "";
        $this->POSName = "";
        $this->POSOwnerEmail = "";
        $this->POSOwnerCountry = "";
        $this->Status = "";
        $this->PaymentType = "";
        $this->FundingSource = "";
        $this->FundingInformation = new FundingInformationModel();
        $this->AllowedFundingSources = "";
        $this->GuestCheckout = "";
        $this->CreatedAt = "";
        $this->ValidUntil = "";
        $this->CompletedAt = "";
        $this->ReservedUntil = "";
        $this->DelayedCaptureUntil = "";
        $this->Total = 0;
        $this->Currency = "";
        $this->Transactions = array();
        $this->RecurrenceResult = "";
        $this->SuggestedLocale ="";
        $this->FraudRiskScore = 0;
        $this->RedirectUrl = "";
        $this->CallbackUrl = "";
        $this->TraceId = "";
        $this->RecurrenceType = "";
    }

    public function fromJson($json)
    {
        if (!empty($json)) {
            parent::fromJson($json);

            $this->PaymentId = \Bencurio\Barion\Helpers\BarionHelper::jget($json, 'PaymentId');
            $this->PaymentRequestId = \Bencurio\Barion\Helpers\BarionHelper::jget($json, 'PaymentRequestId');
            $this->OrderNumber = \Bencurio\Barion\Helpers\BarionHelper::jget($json, 'OrderNumber');
            $this->POSId = \Bencurio\Barion\Helpers\BarionHelper::jget($json, 'POSId');
            $this->POSName = \Bencurio\Barion\Helpers\BarionHelper::jget($json, 'POSName');
            $this->POSOwnerEmail = \Bencurio\Barion\Helpers\BarionHelper::jget($json, 'POSOwnerEmail');
            $this->POSOwnerCountry = \Bencurio\Barion\Helpers\BarionHelper::jget($json, 'POSOwnerCountry');
            $this->Status = \Bencurio\Barion\Helpers\BarionHelper::jget($json, 'Status');
            $this->PaymentType = \Bencurio\Barion\Helpers\BarionHelper::jget($json, 'PaymentType');
            $this->FundingSource = \Bencurio\Barion\Helpers\BarionHelper::jget($json, 'FundingSource');
            if(!empty($json['FundingInformation'])) {
                $this->FundingInformation = new FundingInformationModel();
                $this->FundingInformation->fromJson(\Bencurio\Barion\Helpers\BarionHelper::jget($json, 'FundingInformation'));
            }
            $this->AllowedFundingSources = \Bencurio\Barion\Helpers\BarionHelper::jget($json, 'AllowedFundingSources');
            $this->GuestCheckout = \Bencurio\Barion\Helpers\BarionHelper::jget($json, 'GuestCheckout');
            $this->CreatedAt = \Bencurio\Barion\Helpers\BarionHelper::jget($json, 'CreatedAt');
            $this->ValidUntil = \Bencurio\Barion\Helpers\BarionHelper::jget($json, 'ValidUntil');
            $this->CompletedAt = \Bencurio\Barion\Helpers\BarionHelper::jget($json, 'CompletedAt');
            $this->ReservedUntil = \Bencurio\Barion\Helpers\BarionHelper::jget($json, 'ReservedUntil');
            $this->DelayedCaptureUntil = \Bencurio\Barion\Helpers\BarionHelper::jget($json, 'DelayedCaptureUntil');
            $this->Total = \Bencurio\Barion\Helpers\BarionHelper::jget($json, 'Total');
            $this->Currency = \Bencurio\Barion\Helpers\BarionHelper::jget($json, 'Currency');
            $this->RecurrenceResult = \Bencurio\Barion\Helpers\BarionHelper::jget($json, 'RecurrenceResult');
            $this->SuggestedLocale = \Bencurio\Barion\Helpers\BarionHelper::jget($json, 'SuggestedLocale');
            $this->FraudRiskScore = \Bencurio\Barion\Helpers\BarionHelper::jget($json, 'FraudRiskScore');
            $this->RedirectUrl = \Bencurio\Barion\Helpers\BarionHelper::jget($json, 'RedirectUrl');
            $this->CallbackUrl = \Bencurio\Barion\Helpers\BarionHelper::jget($json, 'CallbackUrl');
            $this->TraceId = \Bencurio\Barion\Helpers\BarionHelper::jget($json, 'TraceId');
            $this->RecurrenceType = \Bencurio\Barion\Helpers\BarionHelper::jget($json, 'RecurrenceType');

            $this->Transactions = array();

            if (!empty($json['Transactions'])) {
                foreach ($json['Transactions'] as $key => $value) {
                    $tr = new TransactionDetailModel();
                    $tr->fromJson($value);
                    \array_push($this->Transactions, $tr);
                }
            }

        }
    }
}
