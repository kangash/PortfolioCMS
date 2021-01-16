<?php 

namespace Engine;

use Engine\Core\Router\Router;
use Engine\Helper\Common;
use Cms\Controller\HomeController;
use Engine\Core\Router\DispatchedRoute;


class Cms {

  private $di;
  private $router;
  private $pluginService;

   public function __construct($di)
  {
    $this->di = $di;
    /** @var \Engine\Core\Plugin\Plugin $pluginService */
    $this->pluginService = $this->di->get('plugin');
    $this->router = $this->di->get('router');
    $namespaceRoute = ENV . DS . 'Route';
    $route  = new $namespaceRoute($this->router);
  }   
    
    //Выводит данные        
  public function run() 
  {
    try 
    {
      $this->plugin();  
      $this->router();
    }
    catch (\Exception $e) {

      echo $e->getMessage();
      exit;
    }
  }

  private function router()
  {
    // Доуступ к суперглобальной переменной, а именно доступ к методу передачи данных
    $routerDispatcher = $this->router->dispatch(Common::getMethod(), Common::getPathUrl());
    if ($routerDispatcher == null)
    {
      $routerDispatcher = new DispatchedRoute('ErrorController:page404');
    }
    list($class, $action) = explode(':', $routerDispatcher->getController(), 2);
    //explode из строки создат масив 
    $controller = '\\' . ENV . '\\Controller\\'.$class;
    $parameters = $routerDispatcher->getParameters();

    call_user_func_array([new $controller($this->di), $action], $parameters);
  }

  private function plugin()
  {
    $plugins = $this->pluginService->getActivePlugins();
    
    /** @var \Admin\Model\Plugin\Plugin $plugin */
    foreach ($plugins as $plugin) {
      $pluginClass  = 'Catalog\\View\\plugins\\' . $plugin->directory . '\\Plugin';
      $pluginObject = new $pluginClass($this->di);
      
      if (method_exists($pluginClass, 'init')) {
        $pluginObject->init();
      }
    }
    
  }
}





?>