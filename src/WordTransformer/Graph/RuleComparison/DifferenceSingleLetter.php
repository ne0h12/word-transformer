<?php
/**
 * Author: Klyachin Andrew <sfdiem5@gmail.com>
 */

namespace WordTransformer\Graph\RuleComparison;

use WordTransformer\Utils\String;

class DifferenceSingleLetter implements RuleComparisonInterface
{
    const MATCHED_COUNT_LETTERS = 1;

    /**
     * @param string $firstWord
     * @param string $secondWord
     * @return boolean
     */
    public function alike($firstWord, $secondWord)
    {
        $varianceLetters = count(
            array_diff_assoc(
                String::asArray($firstWord),
                String::asArray($secondWord)
            ));

        return $varianceLetters == self::MATCHED_COUNT_LETTERS;
    }
}