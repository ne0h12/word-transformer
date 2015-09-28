<?php
/**
 * Author: Klyachin Andrew <sfdiem5@gmail.com>
 */

namespace WordTransformer\Validator;

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
            return true;
        }

        if (strlen($from) != strlen($to)) {
            return true;
        }

        return $invalid;
    }
}