<?php

namespace Admin\Model\Page;

use Engine\Core\Database\ActiveRecord;

class Page
{
    use ActiveRecord;

    protected $table = 'page';

    public $id;

    public $title;

    public $content;

    public $segment;

    public $type;

    public $name_item_category;

    public $status;

    public $image;

    public $date;

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
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * @param mixed $title
     */
    public function setTitle($title)
    {
        $this->title = $title;
    }

    /**
     * @return mixed
     */
    public function getContent()
    {
        return $this->content;
    }

    /**
     * @param mixed $content
     */
    public function setContent($content)
    {
        $this->content = $content;
    }

    public function setSegment($segment)
    {
        $this->segment = $segment;
    }

        /**
     * @return mixed
     */
    public function getSegment()
    {
        return $this->segment;
    }

        /**
     * @return mixed
     */
    public function getType()
    {
        return $this->type;
    }
        /**
     * @param mixed $type
     */
    public function setType($type)
    {
        $this->type = $type;
    }


    /**
    * @return mixed
    */
   public function getNameItemCategory()
   {
       return $this->name_item_category;
   }
       /**
    * @param mixed $name_item_category
    */
   public function setNameItemCategory($name_item_category)
   {
       $this->name_item_category = $name_item_category;
   }


            /**
     * @return mixed
     */
    public function getImage()
    {
        return $this->image;
    }
        /**
     * @param mixed $image
     */
    public function setImage($image)
    {
        $this->image = $image;
    }

    /**
     * @return mixed
     */
    public function getDate()
    {
        return $this->date;
    }

    /**
     * @param mixed $date
     */
    public function setDate($date)
    {
        $this->date = $date;
    }

    /**
     * @return mixed
     */
    public function getStatus()
    {
        return $this->status;
    }

    /**
     * @param mixed $date
     */
    public function setStatus($status)
    {
        $this->status = $status;
    }
}