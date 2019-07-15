<?php


namespace App\controllers;


use App\helpers\Calendar;
use App\helpers\Messenger;
use App\models\Employee;
use App\models\Event;

class HomeController extends Controller
{
    private $event;
    private $employee;

    public function __construct()
    {
        $this->event = new Event();
        $this->employee = new Employee();
    }

    public function employeeList()
    {

        $employees = $this->employee->getEmployeeList();
        echo $this->render(DIR ."/employee/employeeList.php",['employees'=>$employees,'messenger'=>new Messenger()]);
        return true;
    }

    public function rooms()
    {
        if (isset($_GET['ym'])) {
            $ym = $_GET['ym'];
        } else {
            $ym = date('Y-m');
        }
        if (isset($_GET['room'])) {
            $room = $_GET['room'];
        } else {
            $room = '1';
        }

        $timestamp = strtotime($ym . '-01');  // the first day of the month
        if ($timestamp === false) {
            $ym = date('Y-m');
            $timestamp = strtotime($ym . '-01');
        }
        $today = date('Y-m-j');

        $title = date('F, Y', $timestamp);
        $month = date('Y-m', $timestamp);
        $events = $this->event->getAllEventByDate($month, $room);

        $prev = date('Y-m', strtotime('-1 month', $timestamp));
        $next = date('Y-m', strtotime('+1 month', $timestamp));

        $day_count = date('t', $timestamp);

        $str = date('N', $timestamp);
        $weeks = Calendar::makeCalendar($str, $day_count, $ym, $today, $events);
        $array = ['weeks'=>$weeks,'title'=>$title,'prev'=>$prev,'next'=>$next];
        echo $this->render(DIR . "rooms/index.php",$array);
        return true;
    }
}