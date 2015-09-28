<?php
/**
 * Author: Klyachin Andrew <sfdiem5@gmail.com>
 */

namespace WordTransformer\Graph\RuleComparison;

interface RuleComparisonInterface
{
    /**
     * @param string $firstWord
     * @param string $secondWord
     * @return boolean
     */
    public function alike($firstWord, $secondWord);
}