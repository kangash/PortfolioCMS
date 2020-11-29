<?php

namespace Engine\Core\Template;

use Engine\DI\DI;
use Cms\Model\MenuItem\MenuItemRepository;


class Menu
{

    protected static $di;

    protected static $menuItemRepository;


    public function __construct($di)
    {
        self::$di = $di;
        self::$menuItemRepository = new MenuItemRepository(self::$di);

    }


    public static function show()
    {
        
    }

    public static function getItem()
    {
       return self::$menuItemRepository->getItems('1');
    }



}