<?php


namespace App\controllers;


use App\helpers\Db;
use App\models\Employee;
use App\models\Event;
use DateTime;

class EventController
{
    public function index()
    {
        if (isset($_POST['submit'])) {
            $errors = false;
            $room = (int)$_POST['room'];
            //who made
            $employee = $_POST['employee'];
            //Продолжительность неделя или больше
            $isLong = (int)$_POST['long'] === 0 ? 0 : 1;
            //Описание события
            $description = $_POST['description'];  // ------ must be not empty
            if (empty($description)) {
                $errors[] = "Notes is empty";
            }
            //Дата события формат day/month/year
            $eventDate = "20{$_POST['year']}-{$_POST['month']}-{$_POST['day']}";
            //Время начала события hour/minute/format{PM/AM}
            $startHour = $_POST['start_hour'];
            $markStart = $_POST['start_pm'];
            $startHour = $markStart === "PM" ? $startHour +12 : $startHour;
            $eventStart = "{$startHour}:{$_POST['start_minute']}:00";
            //Время окончания события hour/minute/format{PM/AM}
            $endHour = $_POST['end_hour'];
            $markEnd = $_POST['end_pm'];
            $endHour = $markEnd === "PM" ? $endHour +12 : $endHour;
            $eventEnd = "{$endHour}:{$_POST['end_minute']}:00";

            $start = "{$eventDate} {$eventStart}";
            $end = "{$eventDate} {$eventEnd}";
            $day = $_POST['day'];

            $startDateTime = strtotime("{$eventDate} {$eventStart}");
            $endDateTime = strtotime("{$eventDate} {$eventEnd}");
            $currentTime = strtotime(date("Y-m-d H:i:s"));

//date made
            $dates = date('Y-m-d H:i:s');
            if ($errors == false) {
                $query = "INSERT INTO appointmens(notes_event , employee , start_event , end_event ,long_event,room_event , create_date ,mark) 
            VALUES ('{$description}', '{$employee}', '{$start}', '{$end}', '{ $isLong}', '{$room}', '{$dates}', '{$day}')";
                $db = Db::getConnection();
                $result = $db->query($query);
                if ($result) {
                    echo "event save in db";
                }
            }
        }

        $employees = Employee::getEmployeeList();
        require_once DIR . "rooms/create.php";
    }

    public static function checkEvent()
    {
        //
    }
    public static function changeEvent()
    {
        $employees = Employee::getEmployeeList();
        $event = Event::getEventById($_GET['id']);
        if($_POST['delete']) {

            Event::deleteEventById($_GET['id']);
            $result = "The Event ".substr($event['start_event'],11)." - ". substr($event['end_event'],11).
            "has been removed";
        }
if ($result) {
    echo $result;
}
        require_once DIR."rooms/change.php";
    }

    public function delete($id)
    {
        $startDate = $ym = date('Y-m');
        Event::deleteEventById($id);
        header("Location: /rooms?ym=$startDate");
    }

}