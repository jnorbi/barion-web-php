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

use Bencurio\Barion\Models\BaseRequestModel;
use Bencurio\Barion\Models\Common\BankAccountModel;
use Bencurio\Barion\Models\Common\RecipientModel;

class BankTransferRequestModel extends BaseRequestModel
{
    public $UserName;
    public $Password;
    public $Currency;
    public $Amount;
    public $Recipient;
    public $Comment;
    public $BankAccount;

    function __construct()
    {
        $this->UserName = "";
        $this->Password = "";
        $this->Currency = "";
        $this->Amount = 0;
        $this->Recipient = new RecipientModel();
        $this->Comment = "";
        $this->BankAccount = new BankAccountModel();
    }
}