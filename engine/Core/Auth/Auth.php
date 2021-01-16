<?php

namespace Engine\Core\Auth;

use Engine\Core\HTTP\Cookie;
// implements AuthInterface
class Auth 
{
    protected $authorized = false;

    protected $hash_user;

    // возврашает значение свойства
    public function authorized()
    {
        return $this->authorized;
    }

    public function setAuthorized()
    {
        $this->authorized = true;
    }
   // возврашает значение свойства
    public function hashUser()
    {
        return Cookie::get('auth_user');
       //return true;
    }
    //создание авторизации 
    public function authorize($user)
    {
        Cookie::set('auth_authorized', true);
        Cookie::set('auth_user', $user);

    }
    //выход из админки(удаление всех куки)
    public function unAuthorize()
    {
        Cookie::delete('auth_authorized');
        Cookie::delete('auth_user');
    }
// Для безопасности87\.ю 
    public static function salt()
    {
        return (string) rand(10000000, 99999999);
    }
 // создание хеша пароля
    public static function encryptPassword($password, $salt = '')
    {
        return hash('sha256', $password . $salt);
    }


}





?>