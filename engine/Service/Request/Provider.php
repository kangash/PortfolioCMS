<?php

namespace Engine\Service\Request;

use Engine\Service\AbstractProvider;
use Engine\Core\Request\Request;

class Provider extends AbstractProvider
{

    private $serviceName;
    private $request;

    public function key() {
       
        return  $serviceName = 'request';
    }

    //Должна иниацилизировать новый сервис в ДИ контейнер
    public function init() 
    {
         $request = new Request();
        return $request;

    }
}

?>
