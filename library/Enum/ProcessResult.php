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
 * The result of the last card payment attempt.
 *
 * @see https://docs.barion.com/FundingInformation
 */
abstract class ProcessResult {
    /**
     * The card transaction was successful
     */
    const Successful = 'Successful';

    /**
     * The card transaction was unsuccessful: card number, CVC or/and expiry is wrong. The card may have been stolen,
     * deleted, disabled or disabled for online transactions
     */
    const ProblemWithCard = 'ProblemWithCard';

    /**
     * The card transaction was unsuccessful due to insufficient funds
     */
    const LowFunds = 'LowFunds';

    /**
     * The credit card has been reported lost or stolen
     */
    const LostOrStolenCard = 'LostOrStolenCard';

    /**
     * The payment card was declined by the acquirer
     */
    const Declined = 'Declined';

    /**
     * Potentially fraudulent transaction, the monitoring system declined the transaction
     */
    const FraudulentTransaction = 'FraudulentTransaction';

    /**
     * The card transaction failed due to the card system
     */
    const CardSystemError = 'CardSystemError';

    /**
     * The payment card did not support SCA at the time of the transaction
     */
    const SoftDeclined = 'SoftDeclined';

    /**
     * There was an error during the SCA process thus authentication failed. This may not be returned if
     * ChallengePreference was set to "NoChallengeNeeded"
     */
    const FailedDuringAuthentication = 'FailedDuringAuthentication';

    /**
     * The payment card is not supported at the time of the transaction - NOT AVAILABLE
     */
    const CardNotSupported = 'CardNotSupported';

    /**
     * System error, in this case we try to refund the transaction amount if we have enough information to initiate it - NOT AVAILABLE
     */
    const SystemError = 'SystemError';
}