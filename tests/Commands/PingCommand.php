<?php
/**
 * Created by PhpStorm.
 * User: P
 * Date: 2019/2/6
 * Time: 22:00
 */
namespace Commands;

class PingCommand
{
    public function ping($string = null){
        return $string ?? 'pong';
    }
}