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

        $this->data['category'] = $this->getPageCategory();
        $this->data['baseUrl'] = \Engine\Core\Config\Config::item('baseUrl');
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
        $this->model = $this->load->model('Page');
    
        $params = $this->request->post;
        $file = $this->request->files[0];
        $uploaddir = path_content('uploads') . DS .  $params['page_id'] . DS;

        if (is_array($file) && isset($file) && $file['size'] < 500000) {
            
            if(!is_dir($uploaddir)) mkdir($uploaddir, 0777);

            $file_name = \Engine\Helper\Text::cyrillic_translit( $file['name'] );

            if ( move_uploaded_file($file['tmp_name'], $uploaddir.$file_name) ) {
                $params['image'] = $file_name;
            }
            $done_files[] = '<h2>Успех!</h2><p>Данные страницы отправлены!</p> <p>Обновленное изображение: '. $file_name . '</p>';
        } else {
            $done_files[] = '<h2>Успех!</h2><p>Данные страницы отправлены!</p> <p>Активное изображение: ' . $params['image'] . '</p>';
        }
       
        $data = ($file['size'] < 500000) ? 
                            array('files' => $done_files ) : 
                                    die( json_encode( array('error' => 'Ошибка загрузки данных. Изображение больше чем 500 кБ.') ) );

        // print_r($data);
        // print_r($done_files);
        print_r(json_encode( $data ));

        if (isset($params['title'])) {
            $this->model->page->updatePage($params);
        }
    }
    

    // =========================================================== the method no route

    public function getPageCategory()
    {
        $this->load->model('Category');
        $this->load->model('CategoryItem');
        $this->model = $this->di->get('model');

        $category = $this->model->category->getList();
        foreach ($category as $object) {
            if($object->name == "Page") {
                $idPageCategory = $object->id;
            }
        }
        $itemCategory = $this->model->categoryItem->getItems($idPageCategory);
        return $itemCategory;
    }




}