<?php


namespace App\helpers;


use DateTime;

class Calendar
{
    private $calendar;

    public function makeCalendar($month = '')
    {

        $date = new DateTime('first day of'.$month);
        $calendar = array();
        do {
            $calendar[$date->format('W')][$date->format('N')] = $date->format('j');
            $date->modify('+1 day');
        } while ($date->format('j') !== '1');

        $this->calendar = $calendar;
        return $this;
    }

    public function getCalendar()
    {
        return $this->calendar;
    }
}