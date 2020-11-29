<?php 

namespace Engine;

use Engine\Core\Router\Router;
use Engine\Helper\Common;
use Cms\Controller\HomeController;
use Engine\Core\Router\DispatchedRoute;


class Cms {

  private $di;
  public $router;

   public function __construct($di)
  {
           $this->di = $di;
  }   
    
    //Выводит данные        
  public function run() 
  {
    try {
        // Екстракция экцепляра класса из ДИ контейнера
        $router = $this->di->get('router');

        require_once __DIR__ . '/../' . mb_strtolower(ENV) . '/Route.php';

        // Доуступ к суперглобальной переменной, а именно доступ к методу передачи данных
        $routerDispatcher = $router->dispatch(Common::getMethod(), Common::getPathUrl());
        if ($routerDispatcher == null)
        {
          $routerDispatcher = new DispatchedRoute('ErrorController:page404');
        }
        list($class, $action) = explode(':', $routerDispatcher->getController(), 2);
          //explode из строки создат масив 
          $controller = '\\' . ENV . '\\Controller\\'.$class;
          $parameters = $routerDispatcher->getParameters();

          call_user_func_array([new $controller($this->di), $action], $parameters);







        // $getDI = $this->di->get('config');
        // print_r($getDI);

          
        // print_r($this->di);


        }catch (\Exception $e){

          echo $e->getMessage();
          exit;
        }


  }
}





?>