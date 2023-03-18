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

class PurchaseInformationModel implements iBarionModel
{
    public $DeliveryTimeframe;
    public $DeliveryEmailAddress;
    public $PreOrderDate;
    public $AvailabilityIndicator;
    public $ReOrderIndicator;
    public $RecurringExpiry;
    public $RecurringFrequency;
    public $ShippingAddressIndicator;
    public $GiftCardPurchase;
    public $PurchaseType;
    public $PurchaseDate;

    function __construct()
    {
        $this->DeliveryTimeframe = "";
        $this->DeliveryEmailAddress = "";
        $this->PreOrderDate = "";
        $this->AvailabilityIndicator = "";
        $this->ReOrderIndicator = "";
        $this->RecurringExpiry = "";
        $this->RecurringFrequency = "";
        $this->ShippingAddressIndicator = "";
        $this->GiftCardPurchase = "";
        $this->PurchaseType = "";
        $this->PurchaseDate = "";
    }

    public function fromJson($json)
    {
        if (!empty($json)) {
            $this->DeliveryTimeframe = \Bencurio\Barion\Helpers\BarionHelper::jget($json, 'DeliveryTimeframe');
            $this->DeliveryEmailAddress = \Bencurio\Barion\Helpers\BarionHelper::jget($json, 'DeliveryEmailAddress');
            $this->PreOrderDate = \Bencurio\Barion\Helpers\BarionHelper::jget($json, 'PreOrderDate');
            $this->AvailabilityIndicator = \Bencurio\Barion\Helpers\BarionHelper::jget($json, 'AvailabilityIndicator');
            $this->ReOrderIndicator = \Bencurio\Barion\Helpers\BarionHelper::jget($json, 'ReOrderIndicator');
            $this->RecurringExpiry = \Bencurio\Barion\Helpers\BarionHelper::jget($json, 'RecurringExpiry');
            $this->RecurringFrequency = \Bencurio\Barion\Helpers\BarionHelper::jget($json, 'RecurringFrequency');
            $this->ShippingAddressIndicator = \Bencurio\Barion\Helpers\BarionHelper::jget($json, 'ShippingAddressIndicator');
            $this->GiftCardPurchase = \Bencurio\Barion\Helpers\BarionHelper::jget($json, 'GiftCardPurchase');
            $this->PurchaseType = \Bencurio\Barion\Helpers\BarionHelper::jget($json, 'PurchaseType');
            $this->PurchaseDate = \Bencurio\Barion\Helpers\BarionHelper::jget($json, 'PurchaseDate');
        }
    }
}