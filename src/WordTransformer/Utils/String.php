<?php
/**
 * Author: Klyachin Andrew <sfdiem5@gmail.com>
 */

namespace WordTransformer\Utils;

class String
{
    /**
     * @param string $string
     * @return array
     */
    public static function asArray($string)
    {
        return preg_split('/(?<!^)(?!$)/u', $string);
    }

    /**
     * @param string $string
     * @return int
     */
    public static function length($string)
    {
        return mb_strlen($string, 'utf8');
    }
}