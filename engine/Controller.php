<?php

namespace Engine;

use Engine\DI\DI;

abstract class Controller
{
    protected $di;

    protected $db;

    protected $view;

    protected $config;

    protected $request;

    protected $load;

    protected $model;

    protected $plugin;


    public function __construct(DI $di)
    {
        $this->di      = $di;
        $this->db      = $this->di->get('db');
        $this->view    = $this->di->get('view');
        $this->config  = $this->di->get('config');
        $this->request = $this->di->get('request');
        $this->load    = $this->di->get('load');
        $this->model   = $this->di->get('model');
        $this->plugin  = $this->di->get('plugin');
        
        $this->initVars();
    }

    public function __get($key)
    {
        return $this->di->get($key);
    }

    public function initVars()
    {
        $vars = array_keys(get_object_vars($this));

        foreach ($vars as $var) {
            if ($this->di->has($var)) {
                $this->{$var} = $this->di->get($var);
               // print_r($this->{$var});
            }
        }
        return $this;

    }

    public function getRequest()
    {
        return $this->request;
    }

    public function getPlugin()
    {
        return $this->plugin;
    }


}
















?>