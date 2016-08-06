<?php

class Session
{

    private static $instancia = array();

    /**
     *
     * @return Session
     */
    public static function getInstance()
    {

        if (self::$instancia = !null) {
            self::$instancia = new Session();
        }

        return self::$instancia;
    }

    public function set($chave, $valor)
    {
        $_SESSION[$chave] = $valor;
    }

    public function get($chave)
    {
        $value = $_SESSION[$chave];
        return $value;
    }

    public function verify($chave)
    {
        if (isset($_SESSION[$chave]) && (!empty($_SESSION[$chave]))) {

            return true;
        } else {

            return false;
        }
    }

    public function destroy()
    {
        unset($_SESSION);
        session_destroy();
    }
}

