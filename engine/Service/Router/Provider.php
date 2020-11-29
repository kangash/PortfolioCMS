<?php

namespace Engine\Service\Router;

use Engine\Service\AbstractProvider;
use Engine\Core\Router\Router;

class Provider extends AbstractProvider
{

    private $serviceName;
    private $router;

    public function key() {
       
        return  $serviceName = 'router';
    }

    //Должна иниацилизировать новый сервис в ДИ контейнер
    public function init() 
    {
         $router = new Router('https://robot.ru');
        return $router;

    }
}

?>
