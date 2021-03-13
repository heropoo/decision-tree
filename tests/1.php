<?php

require_once __DIR__.'/../vendor/autoload.php';

use Moon\DecisionTree\DecisionTree;

// {'有自己的房子': {0: {'有工作': {0: 'no', 1: 'yes'}}, 1: 'yes'}}

$config = [];
$tree = new DecisionTree($config);


