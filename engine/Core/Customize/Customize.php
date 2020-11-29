<?php
namespace Engine\Core\Customize;

use Engine\Core\Customize\Config;

/**
 * Class Customize
 * @package Flexi\Customize
 */
class Customize
{

    protected $config;

    public static $di;

    //pattern singilton
    private static $instance = null;

    /**
     * Customize constructor.
     */
    public function __construct($di)
    {
        static::$di = $di;
        $this->config = new Config();
    }

    /**
     * @return Config
     */
    public function getConfig()
    {
        return $this->config;
    }

    protected function __clone()
    {
    }

    /**
     * @return Customize|null
     */
    static public function getInstance()
    {
        if (is_null(self::$instance)) {
            self::$instance = new self(static::$di);
        }

        return self::$instance;
    }

    /**
     * @return mixed|null
     */
    public function getAdminMenuItems()
    {
        return $this->getConfig()->get('dashboardMenu');
    }

    /**
     * @return mixed|null
     */
    public function getAdminSettingItems()
    {
        return $this->getConfig()->get('settingMenu');
    }
}
