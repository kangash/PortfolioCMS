<?php

namespace Admin;

class Route 
{

  public $router;

  public function __construct($routerObject)
  {
    $this->router = $routerObject;

    $this->loadRoutes();
  }

  public function loadRoutes()
  {
      //Добавление новых данных в роутер
    $this->router->add('login', '/admin/login/', 'LoginController:form');
    $this->router->add('auth-admin', '/admin/auth/', 'LoginController:authAdmin', 'POST');
    $this->router->add('dashboard', '/admin/', 'DashboardController:index');
    $this->router->add('dashboard-user', '/admin/user/', 'DashboardController:addUser');
    $this->router->add('logout', '/admin/logout/', 'AdminController:logout');
    
    //Pages Routes ($GET)
    $this->router->add('pages', '/admin/pages/', 'PageController:listing');
    $this->router->add('page-create', '/admin/pages/create/', 'PageController:create');
    $this->router->add('page-edit', '/admin/pages/edit/(id:int)', 'PageController:edit');
    //Pages Routes ($POST)
    $this->router->add('page-add', '/admin/page/add/', 'PageController:add', 'POST');
    $this->router->add('page-update', '/admin/page/update/', 'PageController:update', 'POST');

    // //Post Routes ($GET)
    // $this->router->add('post', '/admin/posts/', 'PostController:listing');
    // $this->router->add('post-create', '/admin/posts/create/', 'PostController:create');
    // $this->router->add('post-edit', '/admin/posts/edit/(id:int)', 'PostController:edit');
    // //Post Routes ($POST)
    // $this->router->add('post-add', '/admin/post/add/', 'PostController:add', 'POST');
    // $this->router->add('post-update', '/admin/post/update/', 'PostController:update', 'POST');

    //Plugin Routes ($GET)
    $this->router->add('list-plugins', '/admin/plugins/', 'PluginController:listPlugins');
    //Plugin Routes ($POST)
    $this->router->add('install-plugin', '/admin/plugins/ajaxInstall/', 'PluginController:ajaxInstall', 'POST');
    $this->router->add('activate-plugin', '/admin/plugins/ajaxActivate/', 'PluginController:ajaxActivate', 'POST');
    
    
    //Setting Rourer GET 
    $this->router->add('settings-general', '/admin/settings/general/', 'SettingController:general');
    $this->router->add('settings-menus', '/admin/settings/appearance/menus/', 'SettingController:menus');
    $this->router->add('settings-theme', '/admin/settings/appearance/themes/', 'SettingController:themes');
    //Setting Rourer POST
    $this->router->add('settings-update', '/admin/settings/update/', 'SettingController:updateSetting', 'POST');
    $this->router->add('settings-add-menu', '/admin/settings/ajaxMenuAdd/', 'SettingController:ajaxMenuAdd', 'POST');
    $this->router->add('settings-add-menu-item', '/admin/settings/ajaxMenuAddItem/', 'SettingController:ajaxMenuAddItem', 'POST');
    $this->router->add('settings-sort-menu-item', '/admin/settings/ajaxMenuSortItems/', 'SettingController:ajaxMenuSortItems', 'POST');
    $this->router->add('settings-remove-menu-item', '/admin/settings/ajaxMenuRemoveItem/', 'SettingController:ajaxMenuRemoveItem', 'POST');
    $this->router->add('settings-update-menu-item', '/admin/settings/ajaxMenuUpdateItem/', 'SettingController:ajaxMenuUpdateItem', 'POST');
    $this->router->add('settings-update-theme', '/admin/settings/activeTheme/', 'SettingController:activateTheme', 'POST');

    $this->settingCategory();


    $this->router->add('ajaxDefaultDataBase', '/admin/database/ajaxDefaultDataBase/', 'DashboardController:ajaxDefaultDataBase');
  }


  public function settingCategory()
  {
    //Setting Rourer GET
    $this->router->add('settings-categories', '/admin/settings/appearance/categories/', 'SettingController:categories');

    //Setting Rourer POST
    $this->router->add('settings-add-category', '/admin/settings/ajaxCategoryAdd/', 'SettingController:ajaxCategoryAdd', 'POST');

    $this->router->add('settings-add-category-item', '/admin/settings/ajaxCategoryAddItem/', 'SettingController:ajaxCategoryAddItem', 'POST');
    $this->router->add('settings-sort-category-item', '/admin/settings/ajaxCategorySortItems/', 'SettingController:ajaxCategorySortItems', 'POST');
    $this->router->add('settings-remove-category-item', '/admin/settings/ajaxCategoryRemoveItem/', 'SettingController:ajaxCategoryRemoveItem', 'POST');
    $this->router->add('settings-update-category-item', '/admin/settings/ajaxCategoryUpdateItem/', 'SettingController:ajaxCategoryUpdateItem', 'POST');


  }



}
  
 

?>