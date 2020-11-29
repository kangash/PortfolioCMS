<?php

namespace Admin\Controller;

class PostController extends AdminController 
{

    public function listing()
    {
        $this->load->model('Post');
        $this->model = $this->di->get('model');

        $this->data['posts'] = $this->model->post->getPosts();

        $this->view->render('posts/list', $this->data);
    }

    public function create()
    {
        $this->view->render('posts/create', $this->data);
    }

    public function edit($id)
    {
        $this->load->model('Post');
        $this->model = $this->di->get('model');

        $this->data['post'] = $this->model->post->getPostData($id);

        $this->view->render('posts/edit', $this->data);
    }



    public function add()
    {
        // Loading new model in DI container
        $this->load->model('Post');
        $this->model = $this->di->get('model');
        
        $params = $this->request->post;

        if (isset($params['title'])) {
            $pageId = $this->model->post->createPost($params);
            echo $pageId;
        }
    }


    public function update()
    {
        $this->load->model('Post');
        $this->model = $this->di->get('model');
    
        $params = $this->request->post;

        echo $params;
  
        if (isset($params['title'])) {
            $pageId = $this->model->post->updatePost($params);
            echo $pageId;
        }
    }
    
}