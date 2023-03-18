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
 * Card type enumeration
 *
 * This enum indicates the type of a bank card.
 *
 * @see https://docs.barion.com/BankCard
 * @see https://docs.barion.com/FundingInformation
 */
abstract class CardType
{
    /**
     * The card type is unknown.
     */
    const Unknown = "Unknown";

    /**
     * Standard MasterCard bank cards.
     */
    const Mastercard = "Mastercard";

    /**
     * Standard Visa bank cards.
     */
    const Visa = "Visa";

    /**
     * All kinds of American Express cards.
     */
    const AmericanExpress = "AmericanExpress";

    /**
     * VISA Electron bank cards.
     */
    const Electron = "Electron";

    /**
     * 16 or 19 digit Maestro cards.
     */
    const Maestro = "Maestro";

    /**
     * Diners Club cards
     */
    const DinersClub = "DinersClub";

    /**
     * Discover cards
     */
    const Discover = "Discover";

}