<?php
require_once dirname(__FILE__).'/../ConfigBd.php';
class Db{
    /* @var $conexao_pdo PDO */
    private static $conexao_pdo;
    private static $connectUsers;

    public static function query($sql,$params=null,$class=null)
    {
        $pst=self::$conexao_pdo->prepare($sql);
        if ($params) {
            foreach ($params as $param => $value) {
                $valor = $value[0];
                $dataType = $value[1];
                $pst->bindValue($param, $valor, $dataType);
            }
        }
        $pst->execute();
        if (isset($class))
        {
            return $pst->fetchAll(PDO::FETCH_CLASS,$class);

        } else{

            return $pst->fetchAll(PDO::FETCH_OBJ);
        }

    }

    public static function setConexaoPdo($conexao_pdo)
    {
        self::$conexao_pdo = $conexao_pdo;
    }

    public static function execute($sql,$params=null)
    {
        try {
            $pst=self::$conexao_pdo->prepare($sql);
            if ($params) {
                foreach ($params as $param => $value) {
                    $valor = $value[0];
                    $dataType = $value[1];
                    $pst->bindValue($param, $valor, $dataType);
                }

            }

            $pst->execute();
        }
        catch (PDOException $e)
        {
            die("Erro na execução da rotina. Visualize os detalhes do erro abaixo:<br>" . $e->getMessage());
        }
    }

    public static function transaction($sql)
    {
        self::$conexao_pdo->beginTransaction();
        $pst=self::$conexao_pdo->prepare($sql);
    }

    public static function getLastId()
    {
        return self::$conexao_pdo->lastInsertId();
    }

    public static function getInstance($host, $base, $usuario, $senha)
    {
        if(!isset(self::$conexao_pdo)){
            try {
                $parametrosConexao = 'mysql:host=' . $host . ';dbname='. $base;
                $opcoes = array(PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES UTF8');
                self::$conexao_pdo = new PDO($parametrosConexao,$usuario,$senha, $opcoes);
                self::$conexao_pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                self::$conexao_pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_OBJ);

            } catch (PDOException $e) {
                print "Erro ao conectar com o banco de dados. Verifique os Detalhes do erro abaixo:<br>" . $e->getMessage();
            }
        }
        return self::$conexao_pdo;
    }

    public static function connectUsers($host, $base, $usuario, $senha)
    {
        if(!isset(self::$connectUsers)){
            try {
                $parametrosConexao = 'mysql:host=' . $host . ';dbname='. $base;
                $opcoes = array(PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES UTF8');
                self::$connectUsers = new PDO($parametrosConexao,$usuario,$senha, $opcoes);
                self::$connectUsers->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                self::$connectUsers->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_OBJ);

            } catch (PDOException $e) {
                print "Erro ao conectar com o banco de dados. Verifique os Detalhes do erro abaixo:<br>" . $e->getMessage();
            }
        }
        return self::$connectUsers;
    }
}