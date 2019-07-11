<?php


namespace App\controllers;

class AuthController
{
    public function login()
    {
        if ($_POST["login"] === "admin" && $_POST["password"] === "123") {
            $_SESSION["name"] = $_POST["login"];
            header("Location: /");
        } else {
            header("Location: /?error=1");
        }
    }

    public function logout()
    {
        unset($_SESSION['name']);
        header("Location: /");
    }
}