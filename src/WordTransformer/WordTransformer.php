<?php

/**
 * Author: Klyachin Andrew <sfdiem5@gmail.com>
 */
namespace WordTransformer;

use WordTransformer\Dictionary\DictionaryInterface;
use WordTransformer\Exception\InvalidArgumentException;
use WordTransformer\Graph\GraphTraversal\BreadthFirstSearchAlgorithm;
use WordTransformer\Graph\RuleComparison\DifferenceSingleLetter;
use WordTransformer\Validator\WordTransformValidator;

class WordTransformer
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
     * @param string $from
     * @param string $to
     * @return array
     * @throws InvalidArgumentException
     */
    public function transform($from, $to)
    {
        if (WordTransformValidator::isInvalid($from, $to)) {
            throw new InvalidArgumentException('Invalid the input arguments');
        }

        $graph = $this->buildGraph();

        return (new BreadthFirstSearchAlgorithm())->traversal($graph, $from, $to);
    }

    /**
     * @return Graph\Graph
     */
    private function buildGraph()
    {
        $builder = new Graph\GraphBuilder($this->dictionary);

        return $builder->build(new DifferenceSingleLetter());
    }
}