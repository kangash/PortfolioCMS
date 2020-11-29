<?php

namespace Admin\Model\User;

use Engine\Core\Database\ActiveRecord;

class User
{

    use ActiveRecord;

    protected $table = 'user';

    public $id;

    public $email;

    public $password;

    public $role;

    public $hash;

    public $data_reg;


    // begin id
    public function getId()
    {
        return $this->id;
    }

    public function setId($id)
    {
        $this->id = $id;
    }
    // end

    
    // begin email
    public function getEmail()
    {
        return $this->email;
    }

    public function setEmail($email)
    {
        $this->email = $email;
    }
    // end

    
    // begin password
    public function getPassword()
    {
        return $this->password;
    }

    public function setPassword($password)
    {
        $this->password = $password;
    }
    // end

    
    // begin role
    public function getRole()
    {
        return $this->role;
    }

    public function setRole($role)
    {
        $this->role = $role;
    }
    // end


    // begin hash
    public function getHash()
    {
        return $this->hash;
    }

    public function setHash($hash)
    {
        $this->hash = $hash;
    }
    // end

    
    // begin data_reg
    public function getData_reg()
    {
        return $this->data_reg;
    }

    public function setData_reg($data_reg)
    {
        $this->data_reg = $data_reg;
    }
    // end




}