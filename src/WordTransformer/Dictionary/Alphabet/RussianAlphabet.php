<?php
/**
 * Author: Klyachin Andrew <sfdiem5@gmail.com>
 */


namespace WordTransformer\Dictionary\Alphabet;


class RussianAlphabet implements AlphabetInterface
{

    public function getLowerCaseLetters()
    {
        return [
            'а', 'б', 'в', 'г', 'д', 'е',
            'ё', 'ж', 'з', 'и', 'й', 'к',
            'л', 'м', 'н', 'о', 'п', 'р',
            'с', 'т', 'у', 'ф', 'х', 'ц',
            'ч', 'ш', 'щ', 'ъ', 'ы', 'ь',
            'э', 'ю', 'я'
        ];
    }

    public function getUpperCaseLetters()
    {
        return [
            'А', 'Б', 'В', 'Г', 'Д', 'Е',
            'Ё', 'Ж', 'З', 'И', 'Й', 'К',
            'Л', 'М', 'Н', 'О', 'П', 'Р',
            'С', 'Т', 'У', 'Ф', 'Ц', 'Ц',
            'Ч', 'Ш', 'Щ', 'Ъ', 'Ы', 'Ь',
            'Э', 'Ю', 'Я'
        ];
    }
}