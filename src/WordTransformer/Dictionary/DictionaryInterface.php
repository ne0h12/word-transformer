<?php
/**
 * Author: Klyachin Andrew <sfdiem5@gmail.com>
 */

namespace WordTransformer\Dictionary;


interface DictionaryInterface
{
    /**
     * @return mixed
     */
    public function getWords();

    /**
     * @return Alphabet\AlphabetInterface
     */
    public function getAlphabet();
}