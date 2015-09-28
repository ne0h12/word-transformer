<?php
/**
 * Author: Klyachin Andrew <sfdiem5@gmail.com>
 */

namespace WordTransformer\Graph;

use WordTransformer\Dictionary\DictionaryInterface;
use WordTransformer\Graph\RuleComparison\RuleComparisonInterface;
use WordTransformer\Search\SearchEngineInterface;
use WordTransformer\Utils\String;

class GraphBuilder
{
    const DEFAULT_WORD_LENGTH = 4;

    private $dictionary;
    private $searchEngine;

    /**
     * @param DictionaryInterface $dictionary
     * @param SearchEngineInterface $searchEngine
     */
    public function __construct(DictionaryInterface $dictionary, SearchEngineInterface $searchEngine)
    {
        $this->dictionary = $dictionary;
        $this->searchEngine = $searchEngine;
    }

    public function build(RuleComparisonInterface $ruleComparison, $wordLength = self::DEFAULT_WORD_LENGTH)
    {
        $words = $this->fetchWords($wordLength);
        $graph = new Graph();

        foreach ($words as $firstWord) {
            foreach($words as $secondWord) {
                if ($ruleComparison->alike($firstWord, $secondWord)) {
                    $graph->addRib($firstWord, $secondWord);
                }
            }
        }

        return $graph;
    }

    /**
     * @param int $requiredWordLength
     * @return mixed
     */
    public function fetchWords($requiredWordLength)
    {
        return $this->searchEngine->search(function ($word) use ($requiredWordLength) {
            $wordLength = String::length($word);
            return $wordLength == $requiredWordLength;
        }, $this->dictionary);
    }
}