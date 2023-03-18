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
 * ShippingAddresUsageIndicator enumeration
 *
 * This enum indicates when the payer added the shipping address to it's account.
 *
 * @see https://docs.barion.com/ShippingAddressUsageIndicator
 * @see https://docs.barion.com/PayerAccountInformation
 */
abstract class ShippingAddressUsageIndicator
{
    /**
     * The shipping address was added during this payment.
     */
    const ThisTransaction = "ThisTransaction";

    /**
     * The shipping address was added less than 30 days ago.
     */
    const LessThan30Days = "LessThan30Days";

    /**
     * The shipping address was added between 30 and 60 days ago.
     */
    const Between30And60Days = "Between30And60Days";

    /**
     * The shipping address was added more than 60 days ago.
     */
    const MoreThan60Days = "MoreThan60Days";
}