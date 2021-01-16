<?php


namespace Catalog\Controller;

use Engine\Controller;
use Engine\Core\Auth\Auth;

class CmsController extends Controller
{
    public $data = [];

    public function __construct($di)
    {
        parent::__construct($di);
        
        $this->auth = new Auth();
        // Если логаут равно 1 то мы разлогиним пользователя 
        if ($this->auth->hashUser() !== null) {
            $this->data['auth_admin_status'] = true;
        }

    } // end construct


}

