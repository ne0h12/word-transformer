<?php
/**
 * Author: Klyachin Andrew <sfdiem5@gmail.com>
 */


namespace WordTransformer\Dictionary\Alphabet;


interface AlphabetInterface
{
    /**
     * @return array
     */
    public function getLowerCaseLetters();

    /**
     * @return array
     */
    public function getUpperCaseLetters();
}