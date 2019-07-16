<?php


namespace App\helpers;

/**
 * Class Messenger
 *
 * @package App\helpers
 */
class Messenger
{
    /**
     * Print session field result
     *
     * @return void
     */
    public function printResult()
    {
        if (isset($_SESSION['result'])) {
            echo $_SESSION['result'];
            unset($_SESSION['result']);
        }
    }

    /**
     * Print sesion field errors
     *
     * @return void
     */
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