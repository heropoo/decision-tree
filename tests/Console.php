<?php
/**
 * Created by PhpStorm.
 * User: P
 * Date: 2019/2/6
 * Time: 20:24
 */

class Console
{
    public $namespace = 'Commands';
    public $commands = [];
    public function add($command, $action, $description = ''){
        if(!$action instanceof \Closure){
            $action = $this->namespace.'\\'.$action;
        }
        $this->commands[$command] = [
            'action'=>$action,
            'description'=>$description
        ];
    }
    public function runCommand($command, $params = []){
        if(!isset($this->commands[$command])){
            throw new Exception("Command '$command' is not defined");
        }
        $action = $this->commands[$command]['action'];
        if ($action instanceof \Closure) {
            return call_user_func_array($action, $params);
        } else {
            $actionArr = explode('::', $action);
            $controllerName = $actionArr[0];
            if (!class_exists($controllerName)) {
                throw new Exception("Command class '$controllerName' is not exists!");
            }
            $controller = new $controllerName;
            $methodName = $actionArr[1];
            if (!method_exists($controller, $methodName)) {
                throw new Exception("Command class method '$controllerName::$methodName' is not defined!");
            }
            return call_user_func_array([$controller, $methodName], $params);
        }
    }
}