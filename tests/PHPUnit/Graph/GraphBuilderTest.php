<?php
/**
 * @author Klyachin Andrey <andrey_k@taximaster.ru>
 */

namespace PHPUnit\Graph;


use WordTransformer\Dictionary\Alphabet;
use WordTransformer\Dictionary\DictionaryInterface;
use WordTransformer\Graph\GraphBuilder;
use WordTransformer\Graph\RuleComparison\DifferenceSingleLetter;

class GraphBuilderTest extends \PHPUnit_Framework_TestCase
{
    public function testTypicalGraphBuild()
    {
        $builder = new GraphBuilder(new MockedSimpleDictionary());
        $graph = $builder->build(new DifferenceSingleLetter());

        $this->assertInstanceOf('WordTransformer\Graph\Graph', $graph);
        $this->assertEquals([
            'год' => ['гид'],
            'гид' => ['год', 'вид'],
            'вид' => ['гид']
        ], $graph->getNodes());
    }
}

class MockedSimpleDictionary implements DictionaryInterface
{
    /**
     * @return mixed
     */
    public function getWords()
    {
        return [
            'год', 'гид', 'вид'
        ];
    }

    /**
     * @return Alphabet\AlphabetInterface
     */
    public function getAlphabet()
    {
        return new Alphabet\RussianAlphabet();
    }
}
