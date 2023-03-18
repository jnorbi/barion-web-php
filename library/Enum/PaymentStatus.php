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
 * Payment status enumeration
 *
 * This enum indicates the current status of a payment.
 *
 * @see https://docs.barion.com/PaymentStatus
 * @see https://docs.barion.com/Payment-Start-v2
 * @see https://docs.barion.com/Payment-GetPaymentState-v2
 */
abstract class PaymentStatus
{
    /**
     * The payment is prepared. This means it can be completed unless the payment time window expires.
     */
    const Prepared = "Prepared";

    /**
     * The payment process has been started. This means the payer started the execution of the payment with a funding
     * source.
     */
    const Started = "Started";

    /**
     * The payment process is currently in progress. This means that the communication between Barion and the bank card
     * processing system is currently taking place. No alterations can be made to the payment in this status.
     */
    const InProgress = "InProgress";

    /**
     * The payment was paid with bank transfer and the result of the bank transfer is not known yet. Used in
     * Payment_Buttons [1] scenarios.
     *
     * [1] https://docs.barion.com/Bank_Transfer_Payment
     */
    const Waiting = "Waiting";

    /**
     * The payment was completed by the payer, but the amount is still reserved. This means that the payment should be
     * finished (finalized) unless the reservation period expires.
     */
    const Reserved = "Reserved";


    /**
     * The payment was completed by the payer, but the amount is not charged yet on the bankcard. The payment must be
     * finished before the authorization period expires.
     */
    const Authorized = "Authorized";

    /**
     * The payment has been explicitly cancelled (rejected) by the payer. This is a final status, the payment can
     * no longer be completed.
     */
    const Canceled = "Canceled";

    /**
     * The payment has been fully completed. This is a final status, the payment can no longer be altered.
     */
    const Succeeded = "Succeeded";

    /**
     * The payment has failed because of unknown reasons. Used in payment scenarios that were paid with bank transfer.
     */
    const Failed = "Failed";

    /**
     * This can occur if a complex reservation payment contains multiple transactions, and only some of them are
     * finished. If all transactions are finished, the payment status will change to Succeeded.
     */
    const PartiallySucceeded = "PartiallySucceeded";

    /**
     * The payment was expired. This can occur due to numerous reasons:
     *   - The payment time window has passed and the payer did not complete the payment.
     *   - A reserved payment was not finished during the reservation period. In this case, the money is refunded
     *     to the payer.
     * This is a final status, the payment can no longer be completed.
     */
    const Expired = "Expired";
}