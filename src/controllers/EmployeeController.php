<?php


namespace App\controllers;


use App\helpers\Messenger;
use App\models\Employee;

/**
 * Class EmployeeController
 *
 * @package App\controllers
 */
class EmployeeController extends Controller
{
    private $employee;

    /**
     * EmployeeController constructor.
     */
    public function __construct()
    {
        $this->employee = new Employee();
        if (!AuthController::checkAuth()) {
            header("Location: /");
        }
    }

    /**
     * create new Employee
     * @return bool
     */
    public function create()
    {
        if (isset($_POST['submit'])) {
            $errors = false;
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

            if ($errors == false) {

                $this->employee->register($name, $email);
                $_SESSION['result'] = "Поьзователь сохранен";
                header("Location: /employee");
            }

            $_SESSION['errors'] = $errors;
        }

        echo $this->render(DIR . 'employee/create.php', [
            'messenger' => new Messenger()
        ]);
        return true;
    }

    /**
     * Change Employee name or email
     *
     * @param $id
     */
    public function update($id)
    {

        $employee = $this->employee->getEmployeeById($id);

        if (isset($_POST['submit'])) {
            $name = $_POST['name'];
            $email = $_POST['email'];

            if (!Employee::checkName($name)) {
                $errors[] = 'Имя не должно быть короче 2-х символов';
            }
            if (!Employee::checkEmail($email)) {
                $errors[] = 'Неправильный email';
            }
            if (empty($errors)) {
                $this->employee->updateEmployee($id, $name, $email);
                $_SESSION['result'] = "пользователь изменен";
                header("Location: /employee");
            }
            $_SESSION['errors'] = $errors;
        }
        echo $this->render(DIR . 'employee/update.php', [
            'employee' => $employee,
            'messenger' => new Messenger()
        ]);
    }


    /**
     * Delete Employee
     *
     * @param $id
     */
    public function delete($id)
    {
        $this->employee->deleteEmployeeById($id);
        $_SESSION['result'] = "пользователь удален";
        header('Location: /employee');
    }
}