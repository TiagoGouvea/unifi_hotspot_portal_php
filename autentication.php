<?php
require_once dirname(__FILE__) . '/class/Autentication.class.php';

$auth = new Autentication();

$username = $_POST['nlogin'];
$pass = $_POST['nsenha'];

$login = $auth->login($username,$pass);

if ($login == true)
{
    echo 'Você pode Entrar';
}
else{
    echo 'Você não pode entrar';
}