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
 * RecurrenceType enumeration
 *
 * This enum indicates the type of recurrence that the payment represents.
 *
 * @see https://docs.barion.com/RecurrenceType
 * @see https://docs.barion.com/Payment-Start-v2
 */
abstract class RecurrenceType
{
    /**
     * Merchant-initiated transactions (MITs) with non-fixed value:
     *
     * The customer authorizes the merchant to charge her in the future. Subsequent payments are initiated by the
     * merchant and the customer is not present for these purchases.
     *
     * For subsequent payments no 3DS authentication (challenge) is required. This type of transaction is out of scope
     * of the SCA framework.
     *
     * The liability in case of fraud is on the merchant.
     */
    const MerchantInitiatedPayment = "MerchantInitiatedPayment";

    /**
     * Consumer-initiated transactions (CITs):
     *
     * The purchase is initiated by the customer on the merchant's website, but instead of redirecting the customer to
     * the Barion Smart Gateway the recurrence Id is used for a more convenient payment flow.
     *
     * In this case 3DS authentication is required on the merchant's site.
     *
     * More info: https://docs.barion.com/Token_payment_3D_Secure#Off-site_3DS_v2_authentication
     */
    const OneClickPayment = "OneClickPayment";

    /**
     * Merchant-initiated transactions (MITs) with fixed value:
     *
     * The customer authorizes the merchant to charge for the services/products periodically, typically in case of
     * subscriptions. Subsequent payments are initiated by the merchant and the customer is not present during these
     * payment. Subsequent charges can only be the same or lower as the initial amount.
     *
     * For subsequent payments no 3DS authentication (challenge) is required. This type of transaction can be exempted
     * from the SCA framework.
     *
     * The liability in case of fraud is on the card issuer.
     *
     * In case of this type the RecurringExpiry and RecurringFrequency subfields are mandatory in the PurchaseInformation
     * field.
     *
     * More info: https://docs.barion.com/PurchaseInformation
     */
    const RecurringPayment = "RecurringPayment";
}
