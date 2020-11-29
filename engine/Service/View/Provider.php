<?php

namespace Engine\Service\View;

use Engine\Service\AbstractProvider;
use Engine\Core\Template\View;

class Provider extends AbstractProvider
{

    private $serviceName;
    private $view;

    public function key() {
       
        return  $serviceName = 'view';
    }

    //Должна иниацилизировать новый сервис в ДИ контейнер
    public function init() 
    {
         $view = new View($this->di);
        return $view;

    }
}

?>
