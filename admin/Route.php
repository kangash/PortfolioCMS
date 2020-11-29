<?php

  //Добавление новых данных в роутер
  $router->add('login', '/admin/login/', 'LoginController:form');
  $router->add('auth-admin', '/admin/auth/', 'LoginController:authAdmin', 'POST');
  $router->add('dashboard', '/admin/', 'DashboardController:index');
  $router->add('dashboard-user', '/admin/user/', 'DashboardController:addUser');
  $router->add('logout', '/admin/logout/', 'AdminController:logout');
  
  //Pages Routes ($GET)
  $router->add('pages', '/admin/pages/', 'PageController:listing');
  $router->add('page-create', '/admin/pages/create/', 'PageController:create');
  $router->add('page-edit', '/admin/pages/edit/(id:int)', 'PageController:edit');
  //Pages Routes ($POST)
  $router->add('page-add', '/admin/page/add/', 'PageController:add', 'POST');
  $router->add('page-update', '/admin/page/update/', 'PageController:update', 'POST');

  //Post Routes ($GET)
  $router->add('post', '/admin/posts/', 'PostController:listing');
  $router->add('post-create', '/admin/posts/create/', 'PostController:create');
  $router->add('post-edit', '/admin/posts/edit/(id:int)', 'PostController:edit');
  
  //Post Routes ($POST)
  $router->add('post-add', '/admin/post/add/', 'PostController:add', 'POST');
  $router->add('post-update', '/admin/post/update/', 'PostController:update', 'POST');

  
  
  //Setting Rourer GET 
  $router->add('settings-general', '/admin/settings/general/', 'SettingController:general');
  $router->add('settings-menus', '/admin/settings/appearance/menus/', 'SettingController:menus');
  $router->add('settings-theme', '/admin/settings/appearance/themes/', 'SettingController:themes');
    //Setting Rourer POST
  $router->add('settings-update', '/admin/settings/update/', 'SettingController:updateSetting', 'POST');
  $router->add('settings-add-menu', '/admin/settings/ajaxMenuAdd/', 'SettingController:ajaxMenuAdd', 'POST');
  $router->add('settings-add-menu-item', '/admin/settings/ajaxMenuAddItem/', 'SettingController:ajaxMenuAddItem', 'POST');
  $router->add('settings-sort-menu-item', '/admin/settings/ajaxMenuSortItems/', 'SettingController:ajaxMenuSortItems', 'POST');
  $router->add('settings-remove-menu-item', '/admin/settings/ajaxMenuRemoveItem/', 'SettingController:ajaxMenuRemoveItem', 'POST');
  $router->add('settings-update-menu-item', '/admin/settings/ajaxMenuUpdateItem/', 'SettingController:ajaxMenuUpdateItem', 'POST');
  $router->add('settings-update-theme', '/admin/settings/activeTheme/', 'SettingController:activateTheme', 'POST');
 

?>