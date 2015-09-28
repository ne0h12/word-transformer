<?php
/**
 * Author: Klyachin Andrew <sfdiem5@gmail.com>
 */

namespace WordTransformer\Search;

use WordTransformer\Dictionary\DictionaryInterface;

interface SearchEngineInterface
{
    /**
     * @param callable $filter
     * @param DictionaryInterface $dictionary
     * @return mixed
     */
    public function search(callable $filter, DictionaryInterface $dictionary);

    /**
     * @param string $word
     * @param DictionaryInterface $dictionary
     * @return bool
     */
    public function exists($word, DictionaryInterface $dictionary);
}