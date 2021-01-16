<?php

namespace Admin\Controller;

use Engine\Core\Template\Theme;
use Catalog\Model\SettingMirror;

class SettingController extends AdminController
{

    public function general()
    {
        $this->load->model('Setting');
        $this->model = $this->di->get('model');
        $this->data['language'] = languages();
        $this->data['settings'] = $this->model->setting->getSetting();

        $this->view->render('setting/general', $this->data);
    }

    public function menus()
    {
        $this->load->model('Menu');
        $this->load->model('MenuItem');
        $this->model = $this->di->get('model');

        $this->data['menuId']   = $this->request->get['menu_id'];
        $this->data['menus']    = $this->model->menu->getList();
        $this->data['editMenu'] = $this->model->menuItem->getItems($this->data['menuId']);
        // print_r($_GET);
        $this->view->render('setting/menus', $this->data);

    }

    public function themes()
    {
        $this->data['themes'] = getThemes();
        $this->data['activeTheme'] = SettingMirror::get('active_theme');
        $this->view->render('setting/themes', $this->data);
    }


    public function ajaxMenuAdd()
    {
        $params = $this->request->post;
        $this->load->model('Menu');
        $this->model = $this->di->get('model');

        if (isset($params['name']) && strlen($params['name']) > 0) {
            $addMenu = $this->model->menu->add($params);

            echo $addMenu;
        }
    }


    public function ajaxMenuAddItem()
    {
        $params = $this->request->post;
        $this->load->model('MenuItem');
        $this->model = $this->di->get('model');

        if (isset($params['menu_id']) && strlen($params['menu_id']) > 0) {
            $id = $this->model->menuItem->add($params);

            $item = new \stdClass;
            $item->id   = $id;
            $item->name = \Admin\Model\MenuItem\MenuItemRepository::NEW_MENU_ITEM_NAME;
            $item->link = '#';

            Theme::block('setting/menu_item', [
                'item' => $item
            ]);

        }
    }

    public function ajaxMenuSortItems()
    {
        $params = $this->request->post;
        $this->load->model('MenuItem');
        $this->model = $this->di->get('model');

        if (isset($params['data']) && !empty($params['data'])) {
            $sortItem = $this->model->menuItem->sort($params);
        }

    }

    public function ajaxMenuUpdateItem()
    {
        $params = $this->request->post;
        $this->load->model('MenuItem');
        $this->model = $this->di->get('model');
        
        if (isset($params['item_id']) && strlen($params['item_id']) > 0) {
            $this->model->menuItem->update($params);
        }
          
    }



    public function ajaxMenuRemoveItem()
    {
        $params = $this->request->post;
        $this->load->model('MenuItem');
        $this->model = $this->di->get('model');

        if (isset($params['item_id']) && strlen($params['item_id']) > 0) {
            $removeItem = $this->model->menuItem->remove($params['item_id']);
            
            echo $removeItem;

        }
          
    }


    //end methods for MenuItem

    public function updateSetting()
    {
        $this->load->model('Setting');
        $this->model = $this->di->get('model');

        $params = $this->request->post;

        $this->model->setting->update($params);
    }

    public function activateTheme()
    {
        $params = $this->request->post;
        $this->load->model('Setting');

        $this->model = $this->di->get('model');
        $this->model->setting->updateActiveTheme($params['theme']);
    }


    // Categories

    public function categories()
    {
        $this->load->model('Category');
        $this->load->model('categoryItem');
        $this->model = $this->di->get('model');

        $this->data['categoryId']   = $this->request->get['category_id'];
        $this->data['categories']    = $this->model->category->getList();
        $this->data['editCategory'] = $this->model->categoryItem->getItems($this->data['categoryId']);
        // print_r($_GET);
        $this->view->render('setting/categories', $this->data);

    }

    public function ajaxCategoryAdd()
    {
        $params = $this->request->post;
        $this->load->model('Category');
        $this->model = $this->di->get('model');

        if (isset($params['name']) && strlen($params['name']) > 0) {
            $addCategory = $this->model->category->add($params);

            echo $addCategory;
        }
    }

    public function ajaxCategoryAddItem()
    {
        $params = $this->request->post;
        $this->load->model('CategoryItem');
        $this->model = $this->di->get('model');

        if (isset($params['category_id']) && strlen($params['category_id']) > 0) {
            $id = $this->model->categoryItem->add($params);

            $item = new \stdClass;
            $item->id   = $id;
            $item->name = \Admin\Model\CategoryItem\CategoryItemRepository::NEW_MENU_ITEM_NAME;

            Theme::block('setting/category_item', [
                'item' => $item
            ]);

        }
    }

    public function ajaxCategoryUpdateItem()
    {
        $params = $this->request->post;
        $this->load->model('CategoryItem');
        $this->model = $this->di->get('model');
        
        if (isset($params['item_id']) && strlen($params['item_id']) > 0) {
            $this->model->categoryItem->update($params);
        }
          
    }

    public function ajaxCategoryRemoveItem()
    {
        $params = $this->request->post;
        $this->load->model('CategoryItem');
        $this->model = $this->di->get('model');

        if (isset($params['item_id']) && strlen($params['item_id']) > 0) {
            $removeItem = $this->model->categoryItem->remove($params['item_id']);
            
            echo $removeItem;

        }
          
    }

    public function ajaxCategorySortItems()
    {
        $params = $this->request->post;
        $this->load->model('CategoryItem');
        $this->model = $this->di->get('model');

        if (isset($params['data']) && !empty($params['data'])) {
            $sortItem = $this->model->categoryItem->sort($params);
        }

    }
    
}
