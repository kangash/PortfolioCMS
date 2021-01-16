<?php
namespace Engine\Core\Customize;

/**
 * Class Config
 * @package Flexi\Customize
 */
class MenuAdmin
{
    //icon-pencil icons
    /**
     * @var array
     */
    protected $config = [
        'dashboardMenu' => [
            'home' => [
                'classIcon' => 'icon-speedometer icons',
                'urlPath'   => '/admin/',
                'title'     => 'Home'
            ],
            'pages' => [
                'classIcon' => 'icon-doc icons',
                'urlPath'   => '/admin/pages/',
                'title'     => 'Pages'
            ],
            'plugins' => [
                'classIcon' => 'icon-wrench icons',
                'urlPath'   => '/admin/plugins/',
                'title'     => 'Plugins'
            ],
            'settings' => [
                'classIcon' => 'icon-equalizer icons',
                'urlPath'   => '/admin/settings/general/',
                'title'     => 'Settings'
            ]
        ],
        'settingMenu' => [
            'general' => [
                'urlPath'   => '/admin/settings/general/',
                'title'     => 'General'
            ],
            'themes' => [
                'urlPath'   => '/admin/settings/appearance/themes/',
                'title'     => 'Themes'
            ],
            'menus' => [
                'urlPath'   => '/admin/settings/appearance/menus/',
                'title'     => 'Menus'
            ],
            'categories' => [
                'urlPath'   => '/admin/settings/appearance/categories/',
                'title'     => 'Categories'
            ]
        ]
    ];// Выводит меню в админ

    /**
     * @param string $key
     * @return bool
     */
    public function has($key)
    {
        return isset($this->config[$key]);
    }

    /**
     * @param string $key
     * @return mixed|null
     */
    public function get($key)
    {
        return $this->has($key) ? $this->config[$key] : null;
    }

    /**
     * @param string $key
     * @param mixed $value
     */
    public function set($key, $value)
    {
        $this->config[$key] = $value;
    }
}
