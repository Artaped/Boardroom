<?php


namespace App\controllers;


use App\helpers\Messenger;
use App\models\Employee;
use App\models\Event;

class EventController extends Controller
{
    private $event;
    private $employee;

    public function __construct()
    {
        $this->event = new Event();
        $this->employee = new Employee();
    }

    public function create()
    {
        $employees = $this->employee->getEmployeeList();

        if (isset($_POST['submit'])) {
            $errors = false;
            $sanitized = $this->sanitizeArray($_POST);
            $room = (int)$sanitized['room'];
            $employee = $sanitized['employee'];
            $isLong = (int)$sanitized['long'];
            $description = $sanitized['description'];
            $eventDate = "20{$sanitized['year']}-{$sanitized['month']}-{$sanitized['day']}";
            //start
            $startHour = $sanitized['start_hour'];
            $markStart = $sanitized['start_pm'];
            $startHour = $markStart === "PM" ? $startHour + 12 : $startHour;
            $eventStart = "{$startHour}:{$sanitized['start_minute']}:00";
            //end
            $endHour = $sanitized['end_hour'];
            $markEnd = $sanitized['end_pm'];
            $endHour = $markEnd === "PM" ? $endHour + 12 : $endHour;
            $eventEnd = "{$endHour}:{$sanitized['end_minute']}:00";

            $start = "{$eventDate} {$eventStart}";
            $end = "{$eventDate} {$eventEnd}";
            $eventDay = $sanitized['day'];
            $howLong = $sanitized['week'];//неделя раз в две недели ежемесячно
            $howWeek = $sanitized['duration'];
            $startDateTime = strtotime("{$eventDate} {$eventStart}");
            $endDateTime = strtotime("{$eventDate} {$eventEnd}");
            $currentTime = strtotime(date("Y-m-d H:i:s"));
            $dateCreateEvent = date('Y-m-d H:i:s');


            if (empty($description)) {
                $errors[] = "Notes is empty";
            }

            if ($startDateTime < $currentTime) {
                $errors[] = "событие будет в прошлом";
            }
            if ($startDateTime === $endDateTime) {
                $errors[] = "Начало и окончание события совпадают";
            }

            $checkDateStart = $this->event->checkDate("{$eventDate} {$eventStart}", "start_event",$room);
            $checkDateEnd = $this->event->checkDate("{$eventDate} {$eventEnd}", "end_event", $room);
            if ($checkDateStart) {
                $errors[] = "время занято, прпробуйте другое";
            }
            if ($checkDateEnd) {
                $errors[] = "время занято, прпробуйте другое";
            }

            //проверяем продолжительность
            if ($isLong > 0 && $howLong === 'w') {
echo "указать сколько недель ".$howWeek;
                //если выбрано $isLong смотрим сколько в $howweek и сохраняем в стольких неделях
                //выбираем недели и плюсуем
            } elseif ($isLong > 0 && $howLong === "bw") {
                echo "раз в неделю".$howWeek;
                //если выбрано раз в две недели смотрим сколько в $howweek,
                // если нечётно то округляем и сохраняем в стольки неделях
            } elseif ($isLong > 0 && $howLong === 'm') {
                echo "указать сколько месяцев ".$howWeek;
                //если выбрано $isLong смотрим сколько в $howweek и сохраняем в стольких месяцах
            }

            $array = [$description, $employee, $start, $end, $isLong, $room, $dateCreateEvent, $eventDay, $isLong, $howLong, $howWeek];

            //var_dump($array);
            if ($errors == false) {
                $result = $this->event->addEvent($description, $employee, $start, $end, $isLong, $room, $dateCreateEvent, $eventDay);
                if ($result) {
                    $_SESSION['result'] = "Событие сохранено";
                }
            }
            $_SESSION['errors'] = $errors;
        }

        echo $this->render(DIR . "rooms/create.php",['employees'=>$employees, 'messenger'=>new Messenger()]);
    }

    public static function checkEvent()
    {
        //
    }

    public function changeEvent()
    {
        //$result = false;
        $employees = $this->employee->getEmployeeList();
        $event = $this->event->getEventById($_GET['id']);

        if (isset($_POST['delete'])) {
            $this->event->deleteEventById($_GET['id']);
            $_SESSION['result'] = "The Event <b>" . substr($event['start_event'], 11, 5) . "</b> - <b>" . substr($event['end_event'], 11, 5) .
                "</b> has been removed";
        }
        if (isset($_POST['update'])) {

var_dump($_POST);
        }

        echo $this->render(DIR . "rooms/change.php",['event'=>$event,"employees"=>$employees,'messenger'=>new Messenger()]);
    }

}