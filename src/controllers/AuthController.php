<?php


namespace App\controllers;

class AuthController
{
    public function login()
    {

        $name = false;
        $email = false;
        $result = false;
        // Обработка формы
        if (isset($_POST['submit'])) {
            // Если форма отправлена
            // Получаем данные из формы
            $login = $_POST['login'];
            $password = $_POST['password'];
            // Флаг ошибок
            $errors = false;

            if (strlen($login) < 2 || strlen($login) > 20) {
                $errors[] = "Login should not be shorter than 2 characters or longer than 20";
            }

            if (strlen($password) < 2 || strlen($password) > 8) {
                $errors[] = "Password should not be shorter than 2 characters or longer than 8";
            }
            if ($login !== "admin" ) {
                $errors[] = "no valid login";
            }
            if ($password !== "123") {
                $errors[] = "no valid password";
            }
            if ($errors == false) {
                $_SESSION["name"] = $login;
                $startDate = $ym = date('Y-m');
                header("Location: /rooms?ym=$startDate");
            }
        }

        require_once DIR . "main.php";
    }

    public function logout()
    {
        unset($_SESSION['name']);
        header("Location: /");
    }
}