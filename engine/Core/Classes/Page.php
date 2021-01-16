<?php
namespace Engine\Core\Classes;

/**
 * Class Page
 * @package Cms\Classes
 */
class Page
{
    /**
     * @var object
     */
    protected static $store;

    protected static $provider;


        /**
     * @param object $store
     */
    public static function setProvider($provider)
    {
        self::$provider = $provider;
    }

    /**
     * @return object
     */
    public static function getProvider()
    {
        return self::$provider;
    }

    /**
     * @param object $store
     */
    public static function setStore($store)
    {
        self::$store = $store;
    }

    /**
     * @return object
     */
    public static function getStore()
    {
        return self::$store;
    }

    public static function id()
    {
        return static::$store->id;
    }
    public static function title()
    {
        return static::$store->title;
    }

    public static function content()
    {
        return static::$store->content;
    }

    public static function image()
    {
        return static::$store->image;
    }

    public static function segment()
    {
        return static::$store->segment;
    }

    public static function category()
    {
        return static::$store->name_item_category;
    }

    public static function type()
    {
        return static::$store->type;
    }
}