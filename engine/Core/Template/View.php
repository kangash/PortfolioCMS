<?php
namespace Engine\Core\Template;

use Engine\Core\Template\Theme;
use Engine\Core\Template\Setting;

class View
{
    protected $di;
    protected $theme;
    protected $setting;
    protected $menuItem;

    public function __construct($di)
    {
        $this->di        = $di;
        $this->theme     = new Theme();
        $this->setting   = new Setting($this->di);
        $this->menuItem  = new Menu($this->di);

    }

    public function render($template, $vars = [])
    {
        $function = Theme::getThemePath() . '/function.php';
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
        // $vars['lang']
        $vars['lang'] = $this->di->get['language'];
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
        if($env == 'Cms') {
            $theme = Setting::activeTheme();

            return ROOT_DIR . '/content/themes/' . $theme->value . '/' . $template . '.php';
        }
            return path('view') . '/' . $template . '.php';

    }

    private function getThemePath()
    {
    return ROOT_DIR . '/content/themes/default/';
    } 


}