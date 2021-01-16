<?php

namespace Catalog;

class Route 
{

  public $router;

  public function __construct($routerObject)
  {
    $this->router = $routerObject;

    $this->loadRoutes();
  }

  public function loadRoutes()
  {
        //Добавление новых данных в роутер
        $this->router->add('home', '/', 'HomeController:index');
        $this->router->add('ajaxGetPageForModal', '/home/ajaxGetPage/(id:int)', 'HomeController:ajaxGetPage', 'POST');
        $this->router->add('ajaxGetLoadMorePage', '/home/ajaxGetLoadMorePage/', 'HomeController:ajaxGetLoadMorePage', 'POST');


        $this->router->add('page', '/page/(segment:any)', 'PageController:show');
        $this->router->add('page-ds', '/page/(segment:any)/', 'PageController:show');
  }

}


?>