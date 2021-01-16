<?php

namespace Admin\Model\CategoryItem;

use Engine\Model;

/**
 * Class MenuItemRepository
 * @package Cms\Model\MenuItem
 */
class CategoryItemRepository extends Model
{
    const NEW_MENU_ITEM_NAME = 'New item category';
    const FIELD_NAME = 'name';
    const FIELD_LINK = 'link';

    // public function getItems($menuId, $params = [])
    // {
    //     $sql = $this->queryBuilder
    //         ->select()
    //         ->from('menu_item')
    //         ->where('menu_id', $menuId)
    //         ->orderBy('id', 'ASC')
    //         ->sql();

    //     return $this->db->query($sql, $this->queryBuilder->values);
    // }

    /**
     * @param int $menuId
     * @param array $params
     * @return mixed
     */
    public function getItems($categoryId, $params = [])
    {
        $sql = $this->queryBuilder
            ->select()
            ->from('category_item')
            ->where('category_id', $categoryId)
            ->orderBy('position', 'ASC')
            ->sql();

        return $this->db->query($sql, $this->queryBuilder->values);
    }

    /**
     * @param array $params
     * @return int
     */
    public function add($params = [])
    {
        if (empty($params)) {
            return 0;
        }

        $categoryItem = new CategoryItem;
        $categoryItem->setCategoryId($params['category_id']);
        $categoryItem->setName(self::NEW_MENU_ITEM_NAME);
        $categoryItemId = $categoryItem->save();

        return $categoryItemId;
    }
    public function update($params = [])
    {
        if (empty($params)) {
            return 0;
        }

        $categoryItem = new CategoryItem($params['item_id']);

        if ($params['field'] == self::FIELD_NAME) {
            $categoryItem->setName($params['value']);
        }
        return $categoryItem->save();

    }






    /**
     * @param int $itemId
     * @return mixed
     */
    public function remove($itemId)
    {
        $sql = $this->queryBuilder
            ->delete()
            ->from('category_item')
            ->where('id', $itemId)
            ->sql();
        print_r($sql);
        return $this->db->query($sql, $this->queryBuilder->values);
    }

    /**
     * @param array $params
     */
    public function sort($params = [])
    {
        $items = isset($params['data']) ? json_decode($params['data']) : [];

        if (!empty($items) and isset($items[0])) {
            print_r($items);
            foreach ($items[0] as $position => $item) {
                $this->db->execute(
                    $this->queryBuilder
                        ->update('category_item')
                        ->set(['position' => $position])
                        ->where('id', $item->id)
                        ->sql(),
                    $this->queryBuilder->values
                );
            }
        }
    }
}
