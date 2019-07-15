<?php


namespace App\controllers;



use App\helpers\Messenger;
use App\models\Employee;

class EmployeeController extends Controller
{
    private $employee;
    public function __construct()
    {
        $this->employee = new Employee();
    }

    public function create()
    {
        if (isset($_POST['submit'])) {
            $name = $_POST['name'];
            $email = $_POST['email'];

            if (!Employee::checkName($name)) {
                $errors[] = 'Имя не должно быть короче 2-х символов';
            }
            if (!Employee::checkEmail($email)) {
                $errors[] = 'Неправильный email';
            }

            if ($this->employee->checkEmailExists($email)) {
                $errors[] = 'Такой email уже используется';
            }

            if (!$errors) {

                $this->employee->register($name, $email);
                $_SESSION['result'] = "Поьзователь сохранен";
                header("Location: /employee");
            }

            $_SESSION['errors'] = $errors;
        }

        echo $this->render(DIR .  'employee/create.php',['messenger'=>new Messenger()]);
        return true;
    }

    public function update($id)
    {

        $employee = $this->employee->getEmployeeById($id);

        if (isset($_POST['submit'])) {
            $name = $_POST['name'];
            $email = $_POST['email'];
            $this->employee->updateEmployee($id, $name, $email);
            $_SESSION['result'] = "пользователь изменен";
            header("Location: /employee");
        }
        echo $this->render(DIR . 'employee/update.php',['employee'=>$employee,'messenger'=>new Messenger()]);
    }


    public function delete($id)
    {
        $this->employee->deleteEmployeeById($id);
        $_SESSION['result'] = "пользователь удален";
        header('Location: /employee');
    }
}