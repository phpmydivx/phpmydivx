<?php

namespace PhpMyDivx\Engine;

use \PDO as PDO;
use \PDOException as PDOException;

class Db extends PDO
{
    const FETCH_ASSOC = PDO::FETCH_ASSOC;
    const FETCH_NUM = PDO::FETCH_NUM;
    const FETCH_OBJ = PDO::FETCH_OBJ;
    const FETCH_BOTH = PDO::FETCH_BOTH;

    const PARAM_INT = PDO::PARAM_INT;
    const PARAM_STR = PDO::PARAM_STR;

    private static $instance;

    public function __construct()
    {
        if (!isset(self::$instance)) {
            try {
                self::$instance = new PDO('mysql:host='.DB_SERVER.';dbname='.DB_NAME, DB_USER, DB_PASS,
                    array(PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_OBJ, PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES '.DB_ENCODING, PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
            } catch (PDOException $e) {
                die('Connection error: '.$e->getMessage());
            }
        }

        return self::$instance;
    }

    public static function getInstance()
    {
        if (!isset(self::$instance)) {
            new Db();
        }

        return self::$instance;
    }
}