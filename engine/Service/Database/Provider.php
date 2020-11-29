<?php

namespace Engine\Service\Database;

use Engine\Service\AbstractProvider;
use Engine\Core\Database\Connection;

class Provider extends AbstractProvider
{

    public $serviceName = 'db';
    public $db;
    public $di;

    public function key() {
        $serviceName = 'db';
        return $serviceName;
    }

    //Должна иниацилизировать новый сервис в ДИ контейнер
    public function init() 
    {
         $db = new Connection();
         //$di->set('db', $db);
        return $db;

    }
}




























?>