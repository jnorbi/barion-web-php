<?php

namespace Helpers;

use PHPUnit\Framework\TestCase;

class BarionHelperTest extends TestCase
{
    /**
     * @covers \Bencurio\Barion\Helpers\BarionHelper::jget
     */
    public function testJget()
    {
        $this->assertEquals('value1', \Bencurio\Barion\Helpers\BarionHelper::jget(self::jsonProvider(), 'prop1'));
        $this->assertEquals('value2', \Bencurio\Barion\Helpers\BarionHelper::jget(self::jsonProvider(), 'prop2'));
        $this->assertEquals('value3', \Bencurio\Barion\Helpers\BarionHelper::jget(self::jsonProvider(), 'prop3'));
        $this->assertEquals(null, \Bencurio\Barion\Helpers\BarionHelper::jget(self::jsonProvider(), 'prop4'));
    }

    public function jsonProvider() {
        return array(
            'prop1' => 'value1',
            'prop2' => 'value2',
            'prop3' => 'value3',
        );
    }
}
