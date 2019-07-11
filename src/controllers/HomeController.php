<?php


namespace App\controllers;


use App\helpers\Calendar;
use App\models\Employee;
use DateTime;

class HomeController extends Controller
{
    public function index()
    {
        echo $this->render(DIR . "main.php", []);
    }

    public function employeeList()
    {

        $employees = Employee::getEmployeeList();
        require_once DIR. "/employee/employeeList.php";
        return true;
    }

    public function rooms($id)
    {
        $calendar = new Calendar();
        $date = new DateTime("first day of");
        $currentMonth = date('F', strtotime("2000-$id-01"));
        $currentMonthNumber = date("n");
        $month = $calendar->makeCalendar(date('F', strtotime("2000-$id-01")))->getCalendar();

       require_once  DIR. "rooms/index.php";
       return true;
    }
}