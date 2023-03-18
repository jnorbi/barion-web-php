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
 * ChallengePreference enumeration
 *
 * This enum indicates the merchant's 3DS authentication preference.
 *
 * @see https://docs.barion.com/ChallengePreference
 * @see https://docs.barion.com/Payment-Start-v2
 */
abstract class ChallengePreference
{
    /**
     * The merchant does not have any preference about how the 3DS authentication should be used for this payment.
     * Liability is on the card issuer.
     *
     * In this case Barion decides about the usage of 3DS authentication
     */
    const NoPreference = "NoPreference";

    /**
     * The customer should be challenged during the payment process for additional security. Liability is on the
     * card issuer.
     *
     * In this case 3DS authentication will be performed even if the transaction would be eligible for frictionless flow.
     */
    const ChallengeRequired = "ChallengeRequired";

    /**
     * Transaction Risk Analysis (TRA) will be performed on this payment (for more information see Barion Fraud Buster[1]),
     * if it is enabled. If the score is below 30, an exemption will be sent to the payment processor, indicating that
     * the payment underwent TRA, and no 3DS authentication should be performed. Payment with a fraud score over 30 will
     * be sent requesting 3DS Challenge. The advantage of applying this option is higher conversion (since no additional
     * user interaction is needed when all prerequisites are met), however the liability is on the merchant.
     *
     * [1] https://www.barion.com/en/payment-gateway/features/anti-fraud-solution/
     */
    const NoChallengeNeeded = "NoChallengeNeeded";
}