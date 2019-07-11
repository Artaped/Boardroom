<?php


namespace App\controllers;


use App\models\Employee;

class EventController extends Controller
{
    public function index()
    {
        $employees = Employee::getEmployeeList();
       require_once  DIR. "rooms/create.php";
    }
    public function create()
    {
        echo "<pre>";
        var_dump($_POST);
        echo "</pre>";
    }
}