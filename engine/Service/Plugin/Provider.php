<?php

namespace Engine\Service\Plugin;

use Engine\Service\AbstractProvider;
use Engine\Core\Plugin\Plugin;

class Provider extends AbstractProvider
{

    private $serviceName;
    private $plugin;

    public function key() {
       
        return  $serviceName = 'plugin';
    }

    //Должна иниацилизировать новый сервис в ДИ контейнер
    public function init() 
    {
         $plugin = new Plugin($this->di);
        return $plugin;

    }
}

?>
