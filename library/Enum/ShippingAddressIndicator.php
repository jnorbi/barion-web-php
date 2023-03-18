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

namespace Bencurio\Barion\Enum;

/**
 * ShippingAddressIndicator enumeration
 *
 * This enum indicates what kind of shippping is used for a purchase.
 *
 * @see https://docs.barion.com/ShippingAddressIndicator
 */
abstract class ShippingAddressIndicator
{
    /**
     * Delivery is to the same address as the billing address
     */
    const ShipToCardholdersBillingAddress = "ShipToCardholdersBillingAddress";

    /**
     * Delivery is to another verified address
     */
    const ShipToAnotherVerifiedAddress = "ShipToAnotherVerifiedAddress";

    /**
     * Delivery is to another unverified address
     */
    const ShipToDifferentAddress = "ShipToDifferentAddress";

    /**
     * Delivery is drooped of at the store.
     */
    const ShipToStore = "ShipToStore";

    /**
     * These are digital goods can be downloaded.
     */
    const DigitalGoods = "DigitalGoods";

    /**
     * 	These are downloadable tickets.
     */
    const TravelAndEventTickets = "TravelAndEventTickets";

    /**
     * Other shipping method.
     */
    const Other = "Other";
}
