<?php

require_once dirname(__FILE__) . '/DAOCreds.class.php';
require_once dirname(__FILE__) . '/../lib/Session.php';


class Autentication
{
    public static function login($username,$password)
    {
        $user = new DAOCreds();
        $userLogin = $user->getByLogin($username);

        if ((count($userLogin) == 1) && (isset($userLogin[0]))){
            if($userLogin[0]->username == $username && $userLogin[0]->password == $password)
            {
                $session = Session::getInstance();
                $session->set('id', $userLogin[0]->id);
                $session->set('username', $userLogin[0]->username);
                $session->set('password', $userLogin[0]->password);
                $session->set('login', true);
                return true;
            } else {
                return false;
            }
        } else{
            return false;
        }
    }
}