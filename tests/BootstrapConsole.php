<?php
/**
 * Created by PhpStorm.
 * User: P
 * Date: 2019/2/6
 * Time: 20:21
 */

class BootstrapConsole
{
    public function handCommand(){
        $argv = $_SERVER['argv'];
        foreach ($argv as $key => $arg){
            if((strpos($arg, 'moon') + 4) == strlen($arg) || $arg === 'moon'){
                break;
            }else{
                unset($argv[$key]);
            }
        }
        $console = new Console();
        //$this->add('BootstrapConsole', $console);
        //require $this->rootPath . '/routes/console.php';
        if(!isset($argv[1])){
            echo 'Moon Console v0.3.6'.PHP_EOL;
            echo '------------------------------------------------'.PHP_EOL;
            // command list
            ksort($console->commands);
            foreach ($console->commands as $command => $options){
                echo $command."\t\t".$options['description'].PHP_EOL;
            }
            return 0;
        }
        $command = $argv[1];
        unset($argv[0], $argv[1]);
        return $console->runCommand($command, $argv);
    }
}