<?php
/**
 * Created by PhpStorm.
 * User: Heropoo
 * Date: 2019/3/19
 * Time: 15:10
 */

namespace App\Commands;

use Moon\DecisionTree\TimerHelpers;

/**
 * Class RiskReviewCommand
 * @package Commands
 */
class RiskReviewCommand
{
    protected $rules_value = [];    //缓存已经校验过的规则值, 以rule_id为索引
    protected $rules_calculating = []; //缓存正在校验的规则值, 以rule_id为索引, 避免环出现
    protected $root_rule_id;
    protected $data_source = [];
    protected $basic_rules = [];

    /**
     * @param int $root_rule_id
     * @param string $order_id
     * @param int $snapshot 0.NO 1.Yes -1.COVER
     */
    public function run($root_rule_id, $order_id, $snapshot = 0){
        $timer = new TimerHelpers();
        $timer->startTimers();

        $this->root_rule_id = $root_rule_id;

        echo "Run rule $root_rule_id to review order $order_id with snapshot ".$snapshot.PHP_EOL;
        echo "Start time ".$timer->getStartTime().PHP_EOL;
    }
}