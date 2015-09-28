<?php

require_once __DIR__ . '/vendor/autoload.php';

use WordTransformer\WordTransformer;
use WordTransformer\Dictionary\SimpleDictionary;
use WordTransformer\Search\ArraySearchEngine;

$transformer = new WordTransformer(new SimpleDictionary(), new ArraySearchEngine());
$transitions = $transformer->transform('муха', 'слон');

echo join('->', $transitions);


