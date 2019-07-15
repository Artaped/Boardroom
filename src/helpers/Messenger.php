<?php


namespace App\helpers;


class Messenger
{
    public function printResult()
    {
        if (isset($_SESSION['result'])) {
            echo $_SESSION['result'];
            unset($_SESSION['result']);
        }
    }

    public function printError()
    {
        if (isset($_SESSION['errors']) && $_SESSION['errors'] != false) {
            echo "<ul>";
            foreach ($_SESSION['errors'] as $error) {
                echo "<li>$error</li>";
            }
            echo "</ul>";
            unset($_SESSION['errors']);
        }
    }


}