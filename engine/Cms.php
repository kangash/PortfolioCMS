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

        //$this->plugin();
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
          
        // print_r($this->di);


        }catch (\Exception $e){

          echo $e->getMessage();
          exit;
        }
  }

  private function plugin()
  {
    /** @var \Engine\Core\Plugin\Plugin $pluginService */
    $pluginService = $this->di->get('plugin');
    $plugins = $pluginService->getActivePlugins();
    
    /** @var \Admin\Model\Plugin\Plugin $plugin */
    foreach ($plugins as $plugin) {
      $pluginClass  = 'Content\\plugins\\' . $plugin->directory . '\\Plugin';
    $pluginObject = new $pluginClass($this->di);
    
    if (method_exists($pluginClass, 'init')) {
      $pluginObject->init();
    }
  }
    
  }
}





?>