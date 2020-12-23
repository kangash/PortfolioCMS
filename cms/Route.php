<?php

        //Добавление новых данных в роутер
        $router->add('home', '/', 'HomeController:index');

        $router->add('page', '/page/(segment:any)', 'PageController:show');
        $router->add('page-ds', '/page/(segment:any)/', 'PageController:show');





?>