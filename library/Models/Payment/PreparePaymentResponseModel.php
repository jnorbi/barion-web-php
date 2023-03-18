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

class PreparePaymentResponseModel extends BaseResponseModel implements iBarionModel
{
    public $PaymentId;
    public $PaymentRequestId;
    public $Status;
    /**
     * @var \Bencurio\Barion\Models\Payment\TransactionResponseModel
     */
    public $Transactions;
    public $QRUrl;
    public $RecurrenceResult;
    public $PaymentRedirectUrl;
    public $ThreeDSAuthClientData;
    public $TraceId;

    function __construct()
    {
        parent::__construct();
        $this->PaymentId = "";
        $this->PaymentRequestId = "";
        $this->Status = "";
        $this->QRUrl = "";
        $this->RecurrenceResult = "";
        $this->PaymentRedirectUrl = "";
        $this->ThreeDSAuthClientData = "";
        $this->TraceId = "";
        $this->Transactions = array();
    }

    public function fromJson($json)
    {
        if (!empty($json)) {
            parent::fromJson($json);
            $this->PaymentId = \Bencurio\Barion\Helpers\BarionHelper::jget($json, 'PaymentId');
            $this->PaymentRequestId = \Bencurio\Barion\Helpers\BarionHelper::jget($json, 'PaymentRequestId');
            $this->Status = \Bencurio\Barion\Helpers\BarionHelper::jget($json, 'Status');
            $this->QRUrl = \Bencurio\Barion\Helpers\BarionHelper::jget($json, 'QRUrl');
            $this->RecurrenceResult = \Bencurio\Barion\Helpers\BarionHelper::jget($json, 'RecurrenceResult');
            $this->ThreeDSAuthClientData = \Bencurio\Barion\Helpers\BarionHelper::jget($json, 'ThreeDSAuthClientData');
            $this->TraceId = \Bencurio\Barion\Helpers\BarionHelper::jget($json, 'TraceId');
            $this->Transactions = array();

            if (!empty($json['Transactions'])) {
                foreach ($json['Transactions'] as $key => $value) {
                    $tr = new TransactionResponseModel();
                    $tr->fromJson($value);
                    \array_push($this->Transactions, $tr);
                }
            }

        }
    }
}