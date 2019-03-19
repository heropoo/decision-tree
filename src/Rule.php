<?php
/**
 * Created by PhpStorm.
 * User: ttt
 * Date: 2019/3/19
 * Time: 15:50
 */

namespace Moon\DecisionTree;


/**
 * 规则
 * Class Rule
 * @package Moon\DecisionTree
 */
class Rule
{
    const TYPE_BASIC = 0;
    const TYPE_EXTEND = 1;

    const EXTEND_TYPE_EXPRESSION = 0;
    const EXTEND_TYPE_MAPPING = 1;

    const P_TYPE_SECTION = 'section';
    const P_TYPE_ARRAY = 'array';

    const TREE_ROOT_NO = 0;
    const TREE_ROOT_YES = 1;

    const GROUP_TYPE_ENUM = 1;
    const GROUP_TYPE_AREA = 2;

    static $LABEL_TYPE = [
        self::TYPE_BASIC  => '基础',
        self::TYPE_EXTEND => '扩展'
    ];

    static $LABEL_EXTEND_TYPE = [
        self::EXTEND_TYPE_EXPRESSION => '表达式',
        self::EXTEND_TYPE_MAPPING    => '映射'
    ];

    static $LABEL_TREE_ROOT = [
        self::TREE_ROOT_NO  => '否',
        self::TREE_ROOT_YES => '是'
    ];

    static $GROUP_TYPE = [
        self::GROUP_TYPE_AREA => '区间范围',
        self::GROUP_TYPE_ENUM => '枚举类型',
    ];
}