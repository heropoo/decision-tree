<?php

namespace Tests\Features;

use Moon\DecisionTree\FeatureAttribute;

class AppFeature
{
    #[FeatureAttribute('APP个数', 'int', -1)]
    public function getAppCount(array $data): int
    {
        return 10;
    }

    public function getMixAppCount(array $data): int
    {
        return 2;
    }

    public function getGameAppCount(array $data): int
    {
        return 9;
    }
}