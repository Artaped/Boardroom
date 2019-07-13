<?php


namespace App\models;


use App\helpers\Db;
use PDO;

class Event
{
    public static function checkData($date)
    {
        // Соединение с БД
        $db = Db::getConnection();
        // Текст запроса к БД
        $sql = 'SELECT COUNT(*) FROM event WHERE date = :date';
        // Получение результатов. Используется подготовленный запрос
        $result = $db->prepare($sql);
        $result->bindParam(':email', $date, PDO::PARAM_STR);
        $result->execute();
        if ($result->fetchColumn()) {
            return true;
        } else {
            return false;
        }
    }
    public static function getAllEvent()
    {

        // Соединение с БД
        $db = Db::getConnection();

        // Запрос к БД
        $result = $db->query('SELECT * FROM appointmens ORDER BY start_event ASC');

        // Получение и возврат результатов
        $res = $result->fetchAll(\PDO::FETCH_ASSOC);

        return $res;
    }
    public static function getAllEventByDate($date)
    {

        // Соединение с БД
        $db = Db::getConnection();

        // Запрос к БД
        $sql = "SELECT * FROM appointmens WHERE start_event LIKE '{$date}-%' ORDER BY start_event ASC";
        $result = $db->query($sql);

        // Получение и возврат результатов
        $res = $result->fetchAll(\PDO::FETCH_ASSOC);

        return $res;
    }
    public static function getEventById($id)
    {
        $db = Db::getConnection();

        $sql = "SELECT * FROM appointmens WHERE id ='{$id}'";
        $result = $db->query($sql);
        $event = $result->fetch(\PDO::FETCH_ASSOC);
        return $event;

    }
    public static function deleteEventById($id)
    {
        // Соединение с БД
        $db = Db::getConnection();
        // Текст запроса к БД
        $sql = 'DELETE FROM appointmens WHERE id = :id';
        // Получение и возврат результатов. Используется подготовленный запрос
        $result = $db->prepare($sql);
        $result->bindParam(':id', $id, PDO::PARAM_INT);
        return $result->execute();
    }
}