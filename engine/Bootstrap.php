<?php
require_once __DIR__ . '/../vendor/autoload.php';
require_once __DIR__ . '/function.php';

use Engine\Cms;
use Engine\DI\DI;

class_alias('Engine\\Core\\Template\\Asset', 'Asset');
class_alias('Engine\\Core\\Template\\Theme', 'Theme');
class_alias('Engine\\Core\\Template\\Setting', 'Setting');
class_alias('Engine\\Core\\Template\\Menu', 'Menu');
class_alias('Engine\\Core\\Customize\\Customize', 'Customize');




try{
    //Dependency injectionы
    $di = new DI();

    $serv = require __DIR__ . '/Config/Service.php';

    //init services
    foreach($serv as $service)
    {
        $provider = new $service($di);
        $di->set($provider->key(), $provider->init());
    }

    
    $cms = new Cms($di);
    $cms->run();
}
catch(\ErrorException $e){
    echo $e->getMessage();

}







?>