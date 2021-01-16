<?php
namespace Catalog\Model;

use \Engine\Core\Config\Config;
use Admin\Model\Setting\SettingRepository;
use Engine\DI\DI;

class SettingMirror
{

    protected static $di;
    protected static $settingRepository;


    public function __construct(DI $di)
    {
        self::$di = $di;
        self::$settingRepository = new SettingRepository(self::$di);
    }

    public static function get($keyField)
    {
        return self::$settingRepository->getSettingValue($keyField);
    }

    public static function activeTheme()
    {
        $theme = self::get('active_theme');

        if ($theme->value == '') {
            $theme = Config::item('defaultTheme');
        }

        return $theme;
    }


}