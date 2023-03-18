<?php

namespace Enum;

use Bencurio\Barion\Enum\Currency;
use PHPUnit\Framework\TestCase;

class CurrencyTest extends TestCase
{

    const InvalidCURRENCY = "___";

    /**
     * @covers \Bencurio\Barion\Enum\Currency::isValid
     */
    public function testIsValid()
    {
        $this->assertTrue(Currency::isValid("HUF"));
        $this->assertTrue(Currency::isValid(Currency::HUF));

        $this->assertFalse(Currency::isValid("___"));
        $this->assertFalse(Currency::isValid(self::InvalidCURRENCY));
    }
}
