<?php
/**
 * Класс Db
 * Компонент для работы с базой данных
 */
namespace App\helpers;
use PDO;

class Db
{
    private static $instance = NULL;

    private function __construct()
    {

    }
    private function __clone()
    {

    }
    public static function getInstance()
    {
        $paramsPath =  'db_params.php';
        $params = include($paramsPath);

        $dsn = "mysql:host={$params['host']};dbname={$params['dbname']}";

        if (!self::$instance)
        {
            self::$instance = new PDO($dsn, $params['user'], $params['password']);
            self::$instance-> setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        }
        return self::$instance;
    }
}