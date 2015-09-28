<?php

/**
 * Author: Klyachin Andrew <sfdiem5@gmail.com>
 */
namespace WordTransformer;

use WordTransformer\Dictionary\DictionaryInterface;
use WordTransformer\Exception\InvalidArgumentException;
use WordTransformer\Graph\GraphTraversal\BreadthFirstSearchAlgorithm;
use WordTransformer\Graph\RuleComparison\DifferenceSingleLetter;
use WordTransformer\Search\SearchEngineInterface;
use WordTransformer\Validator\WordTransformValidator;

class WordTransformer
{
    private $dictionary;
    private $searchEngine;

    /**
     * @param DictionaryInterface $dictionary
     * @param SearchEngineInterface $searchEngine
     */
    public function __construct(DictionaryInterface $dictionary, SearchEngineInterface $searchEngine)
    {
        $this->dictionary = $dictionary;
        $this->searchEngine = $searchEngine; // Maybe Elastic, Lucene, Sphinx, etc..
    }

    public function transform($from, $to)
    {
        if (WordTransformValidator::isInvalid($from, $to)) {
            throw new InvalidArgumentException('Invalid the input arguments');
        }

        $graph = $this->buildGraph();

        return (new BreadthFirstSearchAlgorithm())->traversal($graph, $from, $to);
    }

    private function buildGraph()
    {
        $builder = new Graph\GraphBuilder($this->dictionary, $this->searchEngine);

        return $builder->build(new DifferenceSingleLetter());
    }
}