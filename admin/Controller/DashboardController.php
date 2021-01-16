<?php

namespace Admin\Controller;


class DashboardController extends AdminController
{
    public function index()
    {

        $this->load->model('User');

        //Load local language
        $this->load->language('dashboard/main');

        $this->view->render('dashboard');
    }


    public function addUser()
    {

        $userModel = $this->load->model('User');

        $userModel->repository->addUser();
        

       // print_r($userModel->repository->getUsers());

        $this->view->render('dashboard');


    }

    

    public function ajaxDefaultDataBase()
    {

        $this->view->render('dashboard');

        echo 'Если в админ панели Вы удалите что-то очень важное. То данная кнопка должна помочь. Но увы...Логика не реализованна.';


    }
}




?>