<?php
/**
 * Created by PhpStorm.
 * User: Heropoo
 * Date: 2019/2/6
 * Time: 19:42
 */


require_once __DIR__.'/../vendor/autoload.php';


$console = new BootstrapConsole();
$status = $console->handCommand();
exit($status);