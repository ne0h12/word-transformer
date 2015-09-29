<?php

/**
 * Author: Klyachin Andrew <sfdiem5@gmail.com>
 */

namespace PHPUnit;

use WordTransformer\Dictionary\SimpleDictionary;
use WordTransformer\WordTransformer;

class WordTransformerTest extends \PHPUnit_Framework_TestCase
{
    public function testTypicalUsage()
    {
        $transformer = new WordTransformer(new SimpleDictionary());
        $transitions = $transformer->transform('миг', 'эра');

        $this->assertEquals([
            'миг',
            'мир',
            'мор',
            'бор',
            'боа',
            'бра',
            'эра'
        ], $transitions);
    }
}
