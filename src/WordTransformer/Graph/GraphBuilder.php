<?php
/**
 * Author: Klyachin Andrew <sfdiem5@gmail.com>
 */

namespace WordTransformer\Graph;

use WordTransformer\Dictionary\DictionaryInterface;
use WordTransformer\Graph\RuleComparison\RuleComparisonInterface;

class GraphBuilder
{
    private $dictionary;

    /**
     * @param DictionaryInterface $dictionary
     */
    public function __construct(DictionaryInterface $dictionary)
    {
        $this->dictionary = $dictionary;
    }

    /**
     * @param RuleComparisonInterface $rule
     * @return Graph
     */
    public function build(RuleComparisonInterface $rule)
    {
        $words = $this->dictionary->getWords();
        $graph = new Graph();

        foreach ($words as $firstWord) {
            foreach($words as $secondWord) {
                if ($rule->alike($firstWord, $secondWord)) {
                    $graph->addRib($firstWord, $secondWord);
                }
            }
        }

        return $graph;
    }
}