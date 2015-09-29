<?php
/**
 * Author: Klyachin Andrew <sfdiem5@gmail.com>
 */

namespace WordTransformer\Validator;

use WordTransformer\Utils\String;

class WordTransformValidator
{
    /**
     * @param mixed $from
     * @param mixed $to
     * @return boolean
     */
    public static function isInvalid($from, $to)
    {
        $invalid = false;

        if (!is_string($from) || !is_string($to)) {
            return $invalid = true;
        }

        if (String::length($from) != String::length($to)) {
            return $invalid = true;
        }

        return $invalid;
    }
}