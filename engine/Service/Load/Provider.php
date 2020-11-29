<?php

namespace Engine\Service\Load;

use Engine\Service\AbstractProvider;
use Engine\Load;

class Provider extends AbstractProvider
{

    private $serviceName;
    private $load;

    public function key() {
       
        return  $serviceName = 'load';
    }

    //Должна иниацилизировать новый сервис в ДИ контейнер
    public function init() 
    {
        $load = new Load($this->di);
        return $load;

    }
}

?>
