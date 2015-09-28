<?php
/**
 * Author: Klyachin Andrew <sfdiem5@gmail.com>
 */

namespace WordTransformer\Search;

use WordTransformer\Dictionary\DictionaryInterface;

class ArraySearchEngine implements SearchEngineInterface
{

    /**
     * @param callable $filter
     * @param DictionaryInterface $dictionary
     * @return mixed
     */
    public function search(callable $filter, DictionaryInterface $dictionary)
    {
        return array_filter($dictionary->getWords(), $filter);
    }

    /**
     * @param string $word
     * @param DictionaryInterface $dictionary
     * @return bool
     */
    public function exists($word, DictionaryInterface $dictionary)
    {
        return !!array_search($word, $dictionary->getWords(), true);
    }
}