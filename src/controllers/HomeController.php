<?php


namespace App\controllers;


use App\helpers\Calendar;
use App\models\Employee;
use App\models\Event;
use DateTime;

class HomeController
{


    public function employeeList()
    {

        $employees = Employee::getEmployeeList();
        require_once DIR. "/employee/employeeList.php";
        return true;
    }

    public function rooms()
    {
        //$events = Event::getAllEvent();

// Get prev & next month
        if (isset($_GET['ym'])) {
            $ym = $_GET['ym'];
        } else {
            // This month
            $ym = date('Y-m');
        }
// Check format
        $timestamp = strtotime($ym . '-01');  // the first day of the month
        if ($timestamp === false) {
            $ym = date('Y-m');
            $timestamp = strtotime($ym . '-01');
        }
// Today (Format:2018-08-8)
        $today = date('Y-m-j');
// Title (Format:August, 2018)
        $title = date('F, Y', $timestamp);
        $month = date('Y-m', $timestamp);
       echo "<pre>";
$events = \App\models\Event::getAllEventByDate($month);

       echo "</pre>";
// Create prev & next month link
        $prev = date('Y-m', strtotime('-1 month', $timestamp));
        $next = date('Y-m', strtotime('+1 month', $timestamp));
// Number of days in the month
        $day_count = date('t', $timestamp);
// 1:Mon 2:Tue 3: Wed ... 7:Sun
        $str = date('N', $timestamp);
        $weeks = Calendar::makeCalendar($str, $day_count, $ym, $today, $events);
        require_once  DIR. "rooms/index.php";
       return true;
    }
}