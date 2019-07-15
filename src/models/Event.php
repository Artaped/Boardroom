<?php


namespace App\models;

use PDO;

class Event extends Model
{
    /**
     * @param $date event time
     * @param $field "start_event or end_event"
     * @param $room 1/2/3
     * @return bool free time in this room or not
     */
    public function checkDate(String $date,String $field,int $room)
    {

        $sql = "SELECT COUNT(*) FROM appointmens WHERE {$field} = :date AND room_event = :room ";
        $result = $this->db->prepare($sql);
        $result->bindParam(':date', $date, PDO::PARAM_STR);
        $result->bindParam(':room', $room, PDO::PARAM_STR);
        $result->execute();
        if ($result->fetchColumn()) {
            return true;
        } else {
            return false;
        }
    }

    /**
     * @return array
     */
    public function getAllEvent()
    {

        $result = $this->db->query('SELECT * FROM appointmens ORDER BY start_event ASC');
        $res = $result->fetchAll(PDO::FETCH_ASSOC);

        return $res;
    }

    /**
     * @param $date
     * @param $room
     * @return array
     */
    public function getAllEventByDate($date, $room)
    {
        $sql = "SELECT * FROM appointmens WHERE  start_event LIKE '{$date}-%' AND room_event = '{$room}' ORDER BY start_event ASC";
        $result = $this->db->query($sql);
        $res = $result->fetchAll(PDO::FETCH_ASSOC);

        return $res;
    }

    /**
     * @param $id
     * @return mixed
     */
    public function getEventById($id)
    {
        $sql = "SELECT * FROM appointmens WHERE id = :id";
        $result = $this->db->prepare($sql);
        $result->bindParam(':id', $id, PDO::PARAM_INT);
        $result->setFetchMode(PDO::FETCH_ASSOC);
        $result->execute();
        return $result->fetch();

    }

    /**
     * @param $id
     * @return bool
     */
    public function deleteEventById($id)
    {
        $sql = 'DELETE FROM appointmens WHERE id = :id';
        $result = $this->db->prepare($sql);
        $result->bindParam(':id', $id, PDO::PARAM_INT);
        return $result->execute();
    }

    /**
     * @param $description
     * @param $employee
     * @param $start
     * @param $end
     * @param $isLong
     * @param $room
     * @param $dates
     * @param $day
     * @return false PDOStatement
     */
    public function addEvent($description, $employee, $start, $end, $isLong, $room, $dates, $day)
    {
        $query = "INSERT INTO appointmens
                    (
                       notes_event , employee , start_event , end_event ,long_event,room_event , create_date ,mark
                    ) 
                    VALUES 
                    (
                       '{$description}', '{$employee}', '{$start}', '{$end}', '{ $isLong}', '{$room}', '{$dates}', '{$day}'
                    )";
        $result = $this->db->query($query);
        return $result;
    }
}