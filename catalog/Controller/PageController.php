<?php
namespace Catalog\Controller;

use Admin\Model\Page\PageRepository;
use Engine\Core\Classes\Page;

class_alias('\\Engine\\Core\\Classes\\Page', 'Page');

/**
 * Class PageController
 * @package Cms\Controller
 */
class PageController extends CmsController
{
    const TEMPLATE_PAGE_MASK = 'template\page-%s';

    /**
     * @param string|int $segment
     */
    public function show($segment)
    {
        $this->load->model('Menu', false, 'Admin');
        $this->load->model('MenuItem', false, 'Admin');
        $this->load->model('Page', false, 'Admin');
        $this->model = $this->di->get('model');
        
        /** @var PageRepository $pageModel */
        $pageModel = $this->model->page;

        $page = $pageModel->getPageBySegment($segment);

        $menus = $this->model->menu->getList();

        foreach ($menus as $menu) {
            $this->data['menus'][$menu->name] = $this->model->menuItem->getItems($menu->id);
        }

        $std = new \stdClass();
        $std->{'name'} = 'Админка';
        $std->{'link'} = '/admin//login//';

        $this->data['menus']['Header'] = [$std];
        
        if ($page === false) {
            header('Location: /');
            exit;
        }

        $template = 'template\page';

        if ($page->type !== 'page') {
            $template = sprintf(self::TEMPLATE_PAGE_MASK, $page->type);
        }
        
        Page::setStore($page);
        
        $this->view->render($template, $this->data);
    }
}