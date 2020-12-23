<?php
namespace Engine\Core\Template;

use Engine\Core\Template\Setting;
// damp this class and file
class Component
{


    public static function load($name, $data = [])
    {
        $activeTheme = Setting::activeTheme()->value;

        $templateFile = ROOT_DIR . '/content/themes/'. $activeTheme .'/' . $name . '.php';

        if (ENV == 'Admin') {
            $templateFile = path('view') . '/' . $name . '.php';
        }

        if (is_file($templateFile)) {
            extract(array_merge($data, Theme::getData()));
            require($templateFile);
        } else {
            throw new \Exception(
                sprintf('View file %s does not exist!', $templateFile)
            );
        }
    }

}