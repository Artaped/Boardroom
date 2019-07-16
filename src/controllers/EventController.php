<?php


namespace App\controllers;


use App\helpers\Messenger;
use App\models\Employee;
use App\models\Event;
use DateTime;

/**
 * Class EventController
 *
 * @package App\controllers
 */
class EventController extends Controller
{
    private $event;
    private $employee;

    /**
     * EventController constructor.
     */
    public function __construct()
    {
        $this->event = new Event();
        $this->employee = new Employee();
        if (!AuthController::checkAuth()) {
            header("Location: /");
        }

    }

    /**
     * @param $_POST
     *
     * @return $errors or true
     */
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
                $errors[] = "past date indicated";
            }
            if ($startDateTime === $endDateTime) {
                $errors[] = "The beginning and end of the event are the same.";
            }

            $checkDateStart = $this->event->checkDate("{$eventDate} {$eventStart}", "start_event", $room);
            $checkDateEnd = $this->event->checkDate("{$eventDate} {$eventEnd}", "end_event", $room);
            if ($checkDateStart || $checkDateEnd) {
                $errors[] = "time is busy, try another";
            }

            //проверяем продолжительность
            if ($isLong > 0 && $howLong === 'w' && $howWeek < 5) {
                //echo "указать сколько недель " . $howWeek;
                $a = $eventDate;
                $finalstart = "(
                    '{$description}', '{$employee}', '{$start}', '{$end}',
                    '{$isLong}', '{$room}', '{$dateCreateEvent}','{$eventDay}'
                    ,'$dateCreateEvent $description'
                )";
                for($i = 1; $i < $howWeek; $i++) {
                    $a = date('Y-m-d',strtotime("+7 day", strtotime($a)));
                    $d = date('d',strtotime("+7 day", strtotime($a)));
                    $finalstart .= ','."(
                        '{$description}', '{$employee}', '$a $eventStart',
                        '$a $eventEnd', '{$isLong}', '{$room}', '{$dateCreateEvent}
                        ', '{$d}','$dateCreateEvent $description'
                    )";
                }

            } elseif ($isLong > 0 && $howLong === "bw") {
                echo "раз в неделю" . $howWeek;
                //если выбрано раз в две недели смотрим сколько в $howweek,
                // если нечётно то округляем и сохраняем в стольки неделях
            } elseif ($isLong > 0 && $howLong === 'm' && $howWeek < 5) {
                $a = $eventDate;
                $finalstart = "(
                    '{$description}', '{$employee}', '{$start}',
                    '{$end}', '{$isLong}', '{$room}', '{$dateCreateEvent}',
                    '{$eventDay}','$dateCreateEvent $description'
                 )";

                for($i = 1; $i < $howWeek; $i++) {
                    $a = date('Y-m-d',strtotime("+1 month", strtotime($a)));
                    $d = date('d',strtotime("+1 month", strtotime($a)));
                    $finalstart .= ','."(
                        '{$description}', '{$employee}', '$a $eventStart',
                        '$a $eventEnd', '{$isLong}', '{$room}', '{$dateCreateEvent}',
                        '{$d}','$dateCreateEvent $description'
                    )";
                }

            }
            if ($errors == false && $isLong === 1) {
                $this->event->addLongEvent($finalstart);
                $_SESSION['result'] = "The long Event has been added<br>
                            The text for this event is :  <i>{$description}</i>";
            }

            if ($errors == false && $isLong != 1) {
                $result = $this->event->addEvent(
                    $description, $employee, $start, $end, $isLong,
                    $room, $dateCreateEvent, $eventDay
                );
                if ($result) {
                    $_SESSION['result'] = "The Event<b>{$startHour}:{$sanitized['start_minute']}
                            </b> - <b>{$endHour}:{$sanitized['end_minute']}</b> has been added<br>
                            The text for this event is :  <i>{$description}</i>";
                    return true;
                }
            }
            $_SESSION['errors'] = $errors;
        }

        echo $this->render(DIR . "rooms/create.php", [
            'employees' => $employees, 'messenger' => new Messenger()
        ]);
    }

    public static function checkEvent($start, $end, $room)
    {
        //
    }

    /**
     * Change event
     */
    public function changeEvent()
    {
        //$result = false;
        $employees = $this->employee->getEmployeeList();
        $event = $this->event->getEventById($_GET['id']);

        if (isset($_POST['delete'])) {
            if($_POST['mark_long']) {
                $markLong = $_POST['mark_long'];
                $this->event->deleteLongEvent($markLong);
                $_SESSION['result'] = "The long Event has been added<br>";
            } else {
                $this->event->deleteEventById($_GET['id']);
                $_SESSION['result'] =
                    "The Event <b>" . substr($event['start_event'], 11, 5) . "</b> - <b>"
                    . substr($event['end_event'], 11, 5) . "</b> has been removed";
            }

        }
        if (isset($_POST['update'])) {

            var_dump($_POST);
        }

        echo $this->render(DIR . "rooms/change.php", [
            'event' => $event, "employees" => $employees, 'messenger' => new Messenger()
        ]);
    }

}