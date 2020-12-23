<?php


namespace Cms\Controller;

class HomeController extends CmsController
{
   
    public function index()
    {
        $this->load->model('Page', false, 'Admin');
        $this->model = $this->di->get('model');

        $data['pages'] = $this->model->page->getPages();

        $this->view->render('index', $data);

    }


}














?>
