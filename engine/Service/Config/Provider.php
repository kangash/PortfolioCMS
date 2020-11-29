<?php

namespace Engine\Service\Config;

use Engine\Service\AbstractProvider;
use Engine\Core\Config\Config;

class Provider extends AbstractProvider
{

    private $serviceName;
    private $config;

    public function key() {
       
        return  $serviceName = 'config';
    }

    //Должна иниацилизировать новый сервис в ДИ контейнер
    public function init() 
    {

        $config['main'] = Config::file('main');
        $config['database'] = Config::file('database');

        // $this->di->set($this->serviceName, $config);
       return $config;

    }
}

?>
