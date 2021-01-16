<?php


namespace Catalog\Controller;
use Engine\Core\Classes\Page;

class_alias('\\Engine\\Core\\Classes\\Page', 'Page');

class HomeController extends CmsController
{
   
    public function index()
    {
        $this->load->model('Menu', false, 'Admin');
        $this->load->model('MenuItem', false, 'Admin');
        $this->load->model('Category', false, 'Admin');
        $this->load->model('CategoryItem', false, 'Admin');
        $this->load->model('Page', false, 'Admin');
        $this->model = $this->di->get('model');

        $menus = $this->model->menu->getList();
        foreach ($menus as $menu) {
            $this->data['menus'][$menu->name] = $this->model->menuItem->getItems($menu->id);
        }

        $categories = $this->model->category->getList();
        foreach ($categories as $object) {
            if($object->name == "Page") {
                $this->data['categoryPage'] = $this->model->categoryItem->getItems($object->id);
            }
        }
        $content = $this->model->page->getPagesType('content');
        $contentLim[] = $content[0];
        $contentLim[] = $content[1];
        $contentLim[] = $content[2];  
        
        Page::setProvider($contentLim);
        $this->data['projects'] = $this->model->page->getPagesType('project');
 
        $this->view->render('index', $this->data);

    }

    // View page in the modal 
    public function ajaxGetPage($id) 
    {
        $this->load->model('Page', false, 'Admin');
        $this->model = $this->di->get('model');
        

        $page = $this->model->page->getPageData($id);

        print_r( json_encode($page) );
        
    }

    // 
    public function ajaxGetLoadMorePage()
    {
        $this->load->model('Page', false, 'Admin');
        $this->model = $this->di->get('model');
        $content = $this->model->page->getPagesType('content');

        print_r( json_encode($content) );
        
    }
}














?>
