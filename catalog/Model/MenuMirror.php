<?php

namespace Catalog\Model;

use Engine\DI\DI;
use Admin\Model\MenuItem\MenuItemRepository;


class MenuMirror
{

    protected static $di;

    protected static $menuItemRepository;


    public function __construct(DI $di)
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