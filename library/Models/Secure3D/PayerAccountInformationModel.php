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

namespace Bencurio\Barion\Models\Secure3D;

use Bencurio\Barion\Helpers\iBarionModel;

class PayerAccountInformationModel implements iBarionModel
{
    public $AccountId;
    public $AccountCreated;
    public $AccountCreationIndicator;
    public $AccountLastChanged;
    public $AccountChangeIndicator;
    public $PasswordLastChanged;
    public $PasswordChangeIndicator;
    public $PurchasesInTheLastSixMonths;
    public $ShippingAddressAdded;
    public $ShippingAddressUsageIndicator;
    public $PaymentMethodAdded;
    public $PaymentMethodIndicator;
    public $ProvisionAttempts;
    public $TransactionalActivityPerDay;
    public $TransactionalActivityPerYear;
    public $SuspiciousActivityIndicator;

    function __construct()
    {
        $this->AccountId = "";
        $this->AccountCreated = "";
        $this->AccountCreationIndicator = "";
        $this->AccountLastChanged = "";
        $this->AccountChangeIndicator = "";
        $this->PasswordLastChanged = "";
        $this->PasswordChangeIndicator = "";
        $this->PurchasesInTheLastSixMonths = "";
        $this->ShippingAddressAdded = "";
        $this->ShippingAddressUsageIndicator = "";
        $this->PaymentMethodAdded = "";
        $this->PaymentMethodIndicator = "";
        $this->ProvisionAttempts = "";
        $this->TransactionalActivityPerDay = "";
        $this->TransactionalActivityPerYear = "";
        $this->SuspiciousActivityIndicator = "";
    }

    public function fromJson($json)
    {
        if (!empty($json)) {
            $this->AccountId = \Bencurio\Barion\Helpers\BarionHelper::jget($json, 'AccountId');
            $this->AccountCreated = \Bencurio\Barion\Helpers\BarionHelper::jget($json, 'AccountCreated');
            $this->AccountCreationIndicator = \Bencurio\Barion\Helpers\BarionHelper::jget($json, 'AccountCreationIndicator');
            $this->AccountLastChanged = \Bencurio\Barion\Helpers\BarionHelper::jget($json, 'AccountLastChanged');
            $this->AccountChangeIndicator = \Bencurio\Barion\Helpers\BarionHelper::jget($json, 'AccountChangeIndicator');
            $this->PasswordLastChanged = \Bencurio\Barion\Helpers\BarionHelper::jget($json, 'PasswordLastChanged');
            $this->PasswordChangeIndicator = \Bencurio\Barion\Helpers\BarionHelper::jget($json, 'PasswordChangeIndicator');
            $this->PurchasesInTheLastSixMonths = \Bencurio\Barion\Helpers\BarionHelper::jget($json, 'PurchasesInTheLastSixMonths');
            $this->ShippingAddressAdded = \Bencurio\Barion\Helpers\BarionHelper::jget($json, 'ShippingAddressAdded');
            $this->ShippingAddressUsageIndicator = \Bencurio\Barion\Helpers\BarionHelper::jget($json, 'ShippingAddressUsageIndicator');
            $this->PaymentMethodAdded = \Bencurio\Barion\Helpers\BarionHelper::jget($json, 'PaymentMethodAdded');
            $this->PaymentMethodIndicator = \Bencurio\Barion\Helpers\BarionHelper::jget($json, 'PaymentMethodIndicator');
            $this->ProvisionAttempts = \Bencurio\Barion\Helpers\BarionHelper::jget($json, 'ProvisionAttempts');
            $this->TransactionalActivityPerDay = \Bencurio\Barion\Helpers\BarionHelper::jget($json, 'TransactionalActivityPerDay');
            $this->TransactionalActivityPerYear = \Bencurio\Barion\Helpers\BarionHelper::jget($json, 'TransactionalActivityPerYear');
            $this->SuspiciousActivityIndicator = \Bencurio\Barion\Helpers\BarionHelper::jget($json, 'SuspiciousActivityIndicator');
        }
    }
}