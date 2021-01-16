<?php

namespace Admin\Model\Category;

use Engine\Core\Database\ActiveRecord;

class Category
{
    use ActiveRecord;

    protected $table = 'category';

    public $id;

     public $name;

     public $status;


    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param mixed $id
     */
    public function setId($id)
    {
        $this->id = $id;
    }

    /**
     * @return mixed
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @param mixed $name
     */
    public function setName($name)
    {
        $this->name = $name;
    }

        /**
     * @return mixed
     */
    public function getStatus()
    {
        return $this->status;
    }

    /**
     * @param mixed $name
     */
    public function setStatus($status)
    {
        $this->status = $status;
    }
}