<?php
require_once __DIR__ . '/../vendor/autoload.php';

use Engine\Cms;
use Engine\DI\DI;
use Engine\Service\Provider;
// Mirror model
class_alias('Catalog\\Model\\SettingMirror', 'SettingMirror');
class_alias('Catalog\\Model\\MenuMirror', 'MenuMirror');

class_alias('Engine\\Core\\Template\\Asset', 'Asset');
class_alias('Engine\\Core\\Template\\Theme', 'Theme');
class_alias('Engine\\Core\\Customize\\Customize', 'Customize');




try{
    //Dependency injection
    $di = new DI();
    $serviceObject = new Provider($di);
   
    //print_r($di);
    
    $cms = new Cms($di);
    $cms->run();
    //debug_print_backtrace();
    //print_r(debug_backtrace());
}
catch(\ErrorException $e){
    echo $e->getMessage();

}







?>