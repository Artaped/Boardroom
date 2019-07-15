<?php


namespace App\models;


use App\helpers\Db;

class Model
{
    protected $db;

    public function __construct()
    {
        $this->db = DB::getInstance();
    }
}