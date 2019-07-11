<?php


namespace App\controllers;


use App\helpers\Validator;
use App\models\Employee;

class EmployeeController extends Controller
{
    public function create()
    {
        // Переменные для формы
        $name = false;
        $email = false;
        $result = false;
        // Обработка формы
        if (isset($_POST['submit'])) {
            // Если форма отправлена
            // Получаем данные из формы
            $name = $_POST['name'];
            $email = $_POST['email'];
            // Флаг ошибок
            $errors = false;
            // Валидация полей
            if (!Employee::checkName($name)) {
                $errors[] = 'Имя не должно быть короче 2-х символов';
            }
            if (!Employee::checkEmail($email)) {
                $errors[] = 'Неправильный email';
            }

            if (Employee::checkEmailExists($email)) {
                $errors[] = 'Такой email уже используется';
            }

            if ($errors == false) {

                $result = Employee::register($name, $email);
                header("Location: /employee");
            }
        }
        require_once DIR . 'employee/create.php';
        return true;
    }

    public function update($id)
    {
        $employee = Employee::getEmployeeById($id);
        // Обработка формы
        if (isset($_POST['submit'])) {
            // Если форма отправлена
            // Получаем данные из формы
            $name = $_POST['name'];
            $email = $_POST['email'];
            // Сохраняем изменения
            Employee::updateEmployee($id, $name, $email);
            //  Перенаправляем пользователя на страницу управлениями юзерами
            header("Location: /employee");
        }
        require_once DIR . 'employee/update.php';
    }


    public function delete($id)
    {
        Employee::deleteEmployeeById($id);
        header('Location: /employee');
    }
}