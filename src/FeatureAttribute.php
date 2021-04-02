<?php
namespace Moon\DecisionTree;

#[\Attribute(\Attribute::TARGET_METHOD)]
class FeatureAttribute{
    public function __construct($name, $format, $default)
    {
        var_dump($name, $format, $default);
    }
}