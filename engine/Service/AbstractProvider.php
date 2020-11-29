<?php

namespace Engine\Service;

abstract class AbstractProvider
{
    //Будет хратить экземляра класса ДИ
     protected $di;

    public function __construct(\Engine\DI\DI $di)
    {
        $this->di = $di;
    }
    abstract function key();
    abstract function init();



}












?>