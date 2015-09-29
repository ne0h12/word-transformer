<?php
/**
 * @author Klyachin Andrey <andrey_k@taximaster.ru>
 */

namespace PHPUnit\Graph;


use WordTransformer\Graph\RuleComparison\DifferenceSingleLetter;

class DifferenceSingleLetterTest extends \PHPUnit_Framework_TestCase
{
    public function testAlikeWords()
    {
        $this->assertTrue((new DifferenceSingleLetter())->alike('мор', 'тор'));
    }

    public function testNotAlikeWords()
    {
        $this->assertFalse((new DifferenceSingleLetter())->alike('муха', 'рука'));
        $this->assertFalse((new DifferenceSingleLetter())->alike('парк', 'рука'));
    }
}
