<?php

namespace Engine\Service\Customize;

use Engine\Service\AbstractProvider;
use Engine\Core\Customize\Customize;

class Provider extends AbstractProvider
{


    public function key() {
       
        return  $serviceName = 'customize';
    }

    //Должна иниацилизировать новый сервис в ДИ контейнер
    public function init() 
    {
        $customize = new Customize($this->di);
        return $customize;

    }
}

?>
