<?php

namespace Engine;

use Engine\DI\DI;

abstract class Plugin
{
    protected $di;
    protected $db;
    protected $router;
    protected $customize;

    public function __construct(DI $di)
    {
        $this->di = $di;
        $this->db = $this->di->get('db');
        $this->router = $this->di->get('router');
        $this->customize = $this->di->get('customize');
    }

    public abstract function details();

    public function getDi()
    {
        return $this->di;
    }

    public function getDb()
    {
        return $this->db;
    }

    public function getRouter()
    {
        return $this->router;
    }
}