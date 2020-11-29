<?php

namespace Admin\Controller;

class PageController extends AdminController 
{

    public function listing()
    {
        $this->load->model('Page');
        $this->model = $this->di->get('model');

        $data['pages'] = $this->model->page->getPages();

        $this->view->render('pages/list', $data);
    }

    public function create()
    {
        $this->view->render('pages/create', $this->data);
    }

    public function edit($id)
    {
        $this->load->model('Page');
        $this->model = $this->di->get('model');

        $this->data['page'] = $this->model->page->getPageData($id);

        $this->view->render('pages/edit', $this->data);
    }



    public function add()
    {
        // Loading new model in DI container
        $this->load->model('Page');
        $this->model = $this->di->get('model');
        
        $params = $this->request->post;

        if (isset($params['title'])) {
            $pageId = $this->model->page->createPage($params);
            echo $pageId;
        }
    }


    public function update()
    {
        $this->load->model('Page');
        $this->model = $this->di->get('model');
    
        $params = $this->request->post;

        echo $params;
  
        if (isset($params['title'])) {
            $pageId = $this->model->page->updatePage($params);
            echo $pageId;
        }
    }
    
}