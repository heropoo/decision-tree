<?php

require_once __DIR__.'/../vendor/autoload.php';

use Moon\DecisionTree\DecisionTree;

// {'有自己的房子': {0: {'有工作': {0: 'no', 1: 'yes'}}, 1: 'yes'}}

//$config = [];
//$tree = new DecisionTree($config);

//var_dump($tree);

$ref = new ReflectionClass(\Tests\Features\AppFeature::class);
//var_dump($ref);
$methods = $ref->getMethods();
foreach ($methods as $method){
    //var_dump($method);
    $methodName = $method->getName();
    if(str_starts_with($methodName, 'get')){
        //var_dump());
        $m = lcfirst(substr($methodName, 3));
        var_dump($m);

        $attributes = $method->getAttributes(\Moon\DecisionTree\FeatureAttribute::class);
        foreach ($attributes as $attribute){
            $attribute->newInstance();
        }
    }


}