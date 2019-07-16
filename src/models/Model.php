<?php


namespace App\models;


use App\helpers\Db;

/**
 * Class Model
 *
 * @package App\models
 */
class Model
{
    protected $db;

    /**
     * Model constructor.
     */
    public function __construct()
    {
        $this->db = DB::getInstance();
    }
}