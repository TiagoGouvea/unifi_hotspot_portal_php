<?php
require_once dirname(__FILE__).'/../lib/Db.php';

Class DAOCreds
{

    public function __construct()
    {
        Db::getInstance(DB_HOST, DB_NAME, DB_USER, DB_PASS);
    }

    public function selectAll()
    {
        $sql = "SELECT * from creds ORDER BY nome ASC";
        $data = Db::query($sql, null,null);

        return $data;
    }

    public function getByLogin($username)
    {
        $sql = "SELECT * FROM creds WHERE username = :username";
        $data = Db::query($sql, array(
            'username' => array($username, \PDO::PARAM_STR)
        ),null);

        return $data;
    }

}