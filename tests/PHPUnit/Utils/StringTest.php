<?php
/**
 * @author Klyachin Andrey <andrey_k@taximaster.ru>
 */

namespace PHPUnit\Utils;


use WordTransformer\Utils\String;

class StringTest extends \PHPUnit_Framework_TestCase
{
    public function testToArrayString()
    {
        $this->assertEquals([
            'с',
            'т',
            'р',
            'о',
            'к',
            'а',
        ], String::asArray('строка'));

        $this->assertEquals([
            's',
            't',
            'r',
            'i',
            'n',
            'g',
        ], String::asArray('string'));
    }

    public function testLengthString()
    {
        $this->assertEquals(6, String::length('строка'));
        $this->assertEquals(6, String::length('string'));
    }
}
