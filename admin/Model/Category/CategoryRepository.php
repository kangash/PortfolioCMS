<?php

namespace Admin\Model\Category;

use Engine\Model;
use Admin\Model\Category\Category;

class CategoryRepository extends Model
{
    /**
     * @param array $params
     * @return int
     */
    public function add($params = [])
    {
        if (empty($params)) {
            return 0;
        }
        $menu = new Category();

        $menu->setName($params['name']);
        $menuId = $menu->save();

        return $menuId;
    }

    public function getList()
    {
        $query = $this->db->query(
            $this->queryBuilder
                ->select()
                ->from('category')
                ->orderBy('id', 'DESC')
                ->sql()
        );

        return $query;
    }
}