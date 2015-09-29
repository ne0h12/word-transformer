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
            'муха', 'пара', 'тура', 'бор', 'тара', 'паук', 'фура', 'плут', 'мука', 'мир',
            'слот', 'паут', 'фора', 'мура', 'плот', 'рука', 'кора', 'руна', 'бра',
            'парк', 'слон', 'мор', 'эра', 'боа', 'миг',
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