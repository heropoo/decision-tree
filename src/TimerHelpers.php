<?php
/**
 * Created by PhpStorm.
 * User: ttt
 * Date: 2019/3/19
 * Time: 15:26
 */

namespace Moon\DecisionTree;


/**
 * Class Timer
 * @package Moon\DecisionTree
 */
class TimerHelpers
{
    /**
     * 计时器存放数组
     * @var array
     */
    public $timers = [];

    /**
     * 时间精度,即小数点后的位数
     * @var integer
     */
    protected $timePrecision = 3;

    public function setTimePrecision($precision)
    {
        $this->timePrecision = (int)$precision;
    }

    /**
     * 获取当前时间
     */
    public function getNowTime()
    {
        list($time1, $time2) = explode(' ', microtime());
        return sprintf("%." . $this->timePrecision . "f", $time1 + $time2);
    }

    /**
     * 埋点
     */
    public function setPoint()
    {
        $this->timers[] = $this->getNowTime();
    }

    /**
     * 开始计时器
     * @return string
     */
    public function startTimers()
    {
        $this->timers[] = $now_mtime = $this->getNowTime();
        return $now_mtime;
    }

    /**
     * 清除计时器
     */
    public function clearTimers()
    {
        $this->timers = [];
    }

    /**
     * 获取开始时间
     * @return float
     */
    public function getStartTime()
    {
        return $this->timers[0];
    }

    /**
     * 获取结束时间
     * @return float
     */
    public function getEndTime()
    {
        $i = count($this->timers) - 1;
        return $this->timers[$i];
    }

    /**
     * 比较时间
     * @param integer $time1 时间1
     * @param integer $time2 时间2
     * @return string
     */
    public function compareTime($time1, $time2)
    {
        $time3 = $time1 > $time2 ? ($time1 - $time2) : ($time2 - $time1);
        return sprintf("%." . $this->timePrecision . "f", $time3);
    }

    /**
     * 获取开始时间到结束时间之的所需的时间
     */
    public function getStartToEndTime()
    {
        return $this->compareTime($this->getStartTime(), $this->getEndTime());
    }

    /**
     * 获取所有前后比对时间
     */
    public function getAllBeforeAfterCompareTime()
    {
        if (empty($this->timers)) return [];

        $count = count($this->timers);
        if ($count == 1) exit('Error: getAllBeforeAfterCompareTime() Take at least two time');

        for ($i = 0; $i < $count - 1; $i++) {
            $arr[] = $this->compareTime($this->timers[$i + 1], $this->timers[$i]);
        }

        return $arr;
    }

    /**
     * 两个时间戳的相差点
     * @param $begin_time
     * @param $end_time
     * @return array
     */
    public static function timeDiff($begin_time, $end_time)
    {
        if ($begin_time < $end_time) {
            $starttime = $begin_time;
            $endtime = $end_time;
        } else {
            $starttime = $end_time;
            $endtime = $begin_time;
        }
        $timediff = $endtime - $starttime;
        $days = intval($timediff / 86400);
        $remain = $timediff % 86400;
        $hours = intval($remain / 3600);
        $remain = $remain % 3600;
        $mins = intval($remain / 60);
        $secs = $remain % 60;
        $res = array("day" => $days, "hour" => $hours, "min" => $mins, "sec" => $secs);
        return $res;
    }
}