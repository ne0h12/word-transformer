<?php
/**
 * @author Klyachin Andrey <andrey_k@taximaster.ru>
 */

namespace PHPUnit\Validator;

use WordTransformer\Validator\WordTransformValidator;

class WordTransformValidatorTest extends \PHPUnit_Framework_TestCase
{
    public function testValidWords()
    {
        $this->assertFalse(WordTransformValidator::isInvalid('муха', 'слон'));
        $this->assertFalse(WordTransformValidator::isInvalid('миг', 'эра'));
        $this->assertFalse(WordTransformValidator::isInvalid('строка', 'логика'));
    }

    public function testInvalidWords()
    {
        $this->assertTrue(WordTransformValidator::isInvalid('гид', 777));
        $this->assertTrue(WordTransformValidator::isInvalid('роман', 'рассказ'));
    }
}
