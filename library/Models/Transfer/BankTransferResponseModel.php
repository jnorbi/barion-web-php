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

namespace Bencurio\Barion\Models\Transfer;

use Bencurio\Barion\Helpers\iBarionModel;
use Bencurio\Barion\Helpers\BarionHelper;
use Bencurio\Barion\Models\BaseResponseModel;
use Bencurio\Barion\Models\Common\BankAccountModel;
use Bencurio\Barion\Models\Common\RecipientModel;

class BankTransferResponseModel extends BaseResponseModel implements iBarionModel
{
    public $TransactionId;
    public $Currency;
    public $Amount;
    public $Recipient;
    public $Comment;
    public $BankAccount;

    function __construct()
    {
        parent::__construct();
        $this->TransactionId = "";
        $this->Currency = "EUR";
        $this->Amount = 0;
        $this->Recipient = "";
        $this->Comment = "";
        $this->BankAccount = new BankAccountModel();
    }

    public function fromJson($json)
    {
        if (!empty($json)) {
            parent::fromJson($json);
            $this->TransactionId = BarionHelper::jget($json, 'TransactionId');
            $this->Currency = BarionHelper::jget($json, 'Currency');
            $this->Amount = BarionHelper::jget($json, 'Amount');
            $this->Recipient = new RecipientModel();
            $this->Recipient->fromJson(BarionHelper::jget($json, 'Recipient'));
            $this->Comment = BarionHelper::jget($json, 'Comment');
            $this->BankAccount = new BankAccountModel();
            $this->BankAccount->fromJson(BarionHelper::jget($json, 'BankAccount'));
        }
    }
}
