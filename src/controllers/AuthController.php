<?php


namespace App\controllers;

class AuthController extends Controller
{
    public function login()
    {

        if (isset($_POST['submit'])) {

            $login = $_POST['login'];
            $password = $_POST['password'];

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

        echo $this->render(DIR .  "main.php",['errors'=>$errors]);
    }

    public function logout()
    {
        unset($_SESSION['name']);
        header("Location: /");
    }
    public static function checkAuth()
    {
        if (!isset($_SESSION['name'])) {
            return false;
        }
        return true;
    }
}