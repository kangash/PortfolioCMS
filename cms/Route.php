<?php

        //Добавление новых данных в роутер
        $router->add('home', '/', 'HomeController:index');
        $router->add('news', '/news/', 'HomeController:news', 'POSTs');
        $router->add('news_single', '/news/(id:int)', 'HomeController:news');
        $router->add('product', '/user/12', 'ProductController:index');










?>