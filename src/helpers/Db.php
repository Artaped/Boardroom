<?php
/**
 * Класс Db
 * Компонент для работы с базой данных
 */
namespace App\helpers;
use PDO;

/**
 * Class Db
 *
 * @package App\helpers
 */
class Db
{
    private static $instance = null;

    /**
     * Db constructor.
     */
    private function __construct()
    {

    }

    /**
     * **
     */
    private function __clone()
    {

    }

    /**
     * @return PDO|null
     */
    public static function getInstance()
    {
        $paramsPath =  "db_params.php";
        $params = include($paramsPath);

        $dsn = "mysql:host={$params['host']};dbname={$params['dbname']}";

        if (!self::$instance) {
            self::$instance = new PDO($dsn, $params['user'], $params['password']);
            self::$instance->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        }
        return self::$instance;
    }
}