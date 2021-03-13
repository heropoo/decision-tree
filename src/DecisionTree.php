<?php


namespace Moon\DecisionTree;


class DecisionTree
{
//    protected $id;
//    protected $name;

    public function __construct(array $attributes)
    {
        foreach ($attributes as $attribute => $value){
            $this->$attributes = $value;
        }
    }

    //todo 规则

    public function __toString()
    {
        // TODO: Implement __toString() method.
    }
}