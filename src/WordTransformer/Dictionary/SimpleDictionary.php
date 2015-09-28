<?php
/**
 * Author: Klyachin Andrew <sfdiem5@gmail.com>
 */

namespace WordTransformer\Dictionary;


class SimpleDictionary implements DictionaryInterface
{
    /**
     * @return array
     */
    public function getWords()
    {
        return [
            'муха',
            'пара',
            'тура',
            'тара',
            'паук',
            'фура',
            'плут',
            'мука',
            'слот',
            'паут',
            'фора',
            'мура',
            'плот',
            'рука',
            'кора',
            'руна',
            'парк',
            'слон',
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