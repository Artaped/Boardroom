<?php


namespace App\controllers;


class Controller
{
    /**
     * @param  String $input
     * @return string after clean
     */
    public function sanitizeOne($input)
    {
        return htmlspecialchars(trim($input));
    }

    /**
     * @param array $array
     * @return array after clean
     */
    public function sanitizeArray($array)
    {
       $result = array_map(function ($input){
            return htmlspecialchars(trim($input));
        }, $array);
       return $result;
    }

    /**
     * @param $template
     * @param $variables
     * @return false|string view
     */
    public function render($template, $variables)
    {
        extract($variables);
        ob_start();
        require $template;
        return ob_get_clean();
    }
}