<?php

require_once __DIR__ . '/vendor/autoload.php';

use WordTransformer\WordTransformer;
use WordTransformer\Dictionary\SimpleDictionary;

$transformer = new WordTransformer(new SimpleDictionary());
$transitions = $transformer->transform('муха', 'слон');

echo join('->', $transitions);


