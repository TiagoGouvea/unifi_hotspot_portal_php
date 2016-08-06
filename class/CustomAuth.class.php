<?php

require_once dirname(__FILE__) . '/DAOCreds.class.php';
require_once dirname(__FILE__) . '/../lib/Session.php';


class CustomAuth
{
    public $url;
    public $assets; //css and js files directory without the final '/'

    function __construct($url, $assets)
    {
        $this->url = $url;
        $this->assets = $assets;
    }

    function addCss($css)
    {
        print '<link href="'.$this->assets.'/'.$css.'.css" type="text/css" media="screen, projection" rel="stylesheet" />';print '</head>';
    }

    function addJS($js)
    {
        print '<script src="'.$this->assets.'/'.$js.'.js" type="text/javascript"></script>';
    }

    static function authBox($page)
    {
        print '<form class="form-inline" action="'.$page.'" method="post">';
        print '<legend class="lead">Usuário:</legend>';
        print '<span class="add-on" rel="tooltip" title="Username" data-placement="top"><i class="icon-envelope"></i></span>';
        print '<input class="chosen" id="ilogin" type="text" name="nlogin" value="" size="20" maxlength="" placeholder="Digite o Usuário" required>';
        print '<legend class="lead">Senha:</legend>';
        print '<input class="chosen" id="isenha" type="password" name="nsenha" value="" size="20" maxlength="" placeholder="Digite a Senha" required>';
        print '<div class="box-footer">';
        print '<button class="btn btn-primary" type="submit" name="nsubmit" id="isubmit">';
        print '<i class="fa fa-check"></i>';
        print 'Entrar';
        print '</button>';
        print '<button class="btn btn-primary" type="reset">';
        print '<i class="fa fa-times"></i>';
        print 'Limpar';
        print '</button>';
        print '</div>';
        print '</form>';
    }

    public static function authCheck($username, $password)
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