<?php


namespace App\controllers;


class Controller
{
    /**
     * @param $template
     * @param $variables
     * @return false|string
     */
    public function render($template, $variables)
    {
        extract($variables);
        ob_start();
        include $template;
        return ob_get_clean();
    }
}