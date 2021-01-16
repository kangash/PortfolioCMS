<?php
namespace Engine\Core\Template;

use Catalog\Model\SettingMirror;
use Catalog\Model\MenuMirror;

class View
{
    protected $di;
    protected $theme;
    protected $setting;
    protected $menuItem;

    private $activeTheme;

    public function __construct($di)
    {
        $this->di = $di;
    }

    public function construct()
    {
        $this->theme = new Theme();
        $this->setting   = new SettingMirror($this->di);
        $this->menuItem  = new MenuMirror($this->di);
        $this->activeTheme = SettingMirror::activeTheme()->value;

    }

    public function render($template, $vars = [])
    {
        
        $function = $this->theme->getThemePath() . '/function.php';
        if (file_exists($function)) {
            require $function;
        }

        $templatePath = $this->getTemplatePath($template, ENV); // Если 2 аргументом ничего не передавать, то константа подхватиться глобальнО

        if(!is_file($templatePath))
        {
            throw new \InvalidArgumentException (
                sprintf('Tempate "%s"not found %s', $template, $templatePath)
            );
        }
        
        $vars['lang'] = $this->di->get['language'];
        $vars['active_theme'] = $this->activeTheme;
        $this->theme->setData($vars);
        extract($vars); //из всех ключей масива создаст переменные 


        ob_start(); // используется при rendere
        ob_implicit_flush(0); // отключает неявную отчистку

        try{
            require $templatePath;
        } catch (\Exception $e) {
            ob_end_clean();
            throw $e;
        }
        echo ob_get_clean();
    }

 
    private function getTemplatePath($template, $env = null)
    {
        if($env == 'Catalog') {
            return ROOT_DIR . '/Catalog/View/themes/' . $this->activeTheme . '/' . $template . '.php';
        }
            return path('view') . '/' . $template . '.php';

    }


}