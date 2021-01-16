<?php 

namespace Engine\Service;

use Engine\DI\DI;

use Engine\Core\Database\Connection;
use Engine\Core\Router\Router;
use Engine\Core\Template\View;
use Engine\Core\Config\Config;
use Engine\Core\HTTP\Request;
use Engine\Load;
use Engine\Core\Customize\Customize;
use Engine\Core\Plugin\Plugin;
use Engine\Core\Common\Parameters;

class Provider 
{
    private $di;
    private $depends = ['view'];


    public function __construct(DI $di)
    {
        $this->di = $di;
        $this->createObject();
        //start constructor
        $this->constructors();
        // end 
        $this->append( 'params', new Parameters($this->di) );
    }
    private function createObject()
    {
        $this->append('config', [
            'main' => Config::file('main'),
            'database' => Config::file('database')
            ]);
        $this->append('db',        new Connection());
        $this->append('router',    new Router('https://oren.ru'));
        $this->append('request',   new Request());  
        $this->append('load',      new Load($this->di));
        $this->append('customize', new Customize($this->di));
        $this->append('view',      new View($this->di));
        $this->append('plugin',    new Plugin($this->di));
        
    }

    private function append($keyDI, $objectDI)
    {
        $this->di->set($keyDI, $objectDI);
    }

    private function constructors()
    {
        foreach ($this->depends as $key) {
            $object = $this->di->get($key);
            $object->construct();
        }
    }

}