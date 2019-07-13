<?php


namespace App\helpers;


use DateTime;

class Calendar
{
    public static function makeCalendar($str, $day_count, $ym, $today, $events)
    {
        // Array for calendar
        $weeks = [];
        $week = '';
        $time = [];
        $dayEvents = '';
        // Add empty cell(s)
        $week .= str_repeat('<td></td>', $str - 1);
        for ($day = 1, $j = 1; $day <= $day_count; $day++, $str++) {
            $date = $ym . '-' . $day;
            if ($today == $date) {
                $week .= '<td class="today">';
            } else {
                $week .= '<td>';
            }
            foreach ($events as $event) {
                if ($event['mark'] == $day) {
                    $time[$day][] = "<br>
                       <a href=\"/book/change?id={$event['id']}\" 
                           onclick=\"basicPopup(this.href);return false\">"
                           . substr($event['start_event'], 11) .
                           " - " . substr($event['end_event'], 11) .
                       "</a>";
                } else {
                    $time[$day][] = "";
                }
            }
            if (!empty($time[$day])) {
                foreach ($time[$day] as $it) {
                    $dayEvents = implode(',', $time[$day]);
                }
            }
            $week .= $day . str_replace(',', '', $dayEvents) . "</td>";
            // Sunday OR last day of the month
            if ($str % 7 == 0 || $day == $day_count) {
                // last day of the month
                if ($day == $day_count && $str % 7 != 0) {
                    // Add empty cell(s)
                    $week .= str_repeat('<td></td>', 7 - $str % 7);
                }
                $weeks[] = '<tr>' . $week . '</tr>';
                $week = '';
            }
        }
        return $weeks;
    }

    public static function getCalendarDate()
    {
        // Get prev & next month
        if (isset($_GET['ym'])) {
            $ym = $_GET['ym'];
        } else {
            $ym = date('Y-m');
        }

        $timestamp = strtotime($ym . '-01');  // the first day of the month
        if ($timestamp === false) {
            $ym = date('Y-m');
            $timestamp = strtotime($ym . '-01');
        }

        $today = date('Y-m-j');
        $title = date('F, Y', $timestamp);
        $month = date('Y-m', $timestamp);
        $prev = date('Y-m', strtotime('-1 month', $timestamp));
        $next = date('Y-m', strtotime('+1 month', $timestamp));
        $day_count = date('t', $timestamp);
        $str = date('N', $timestamp);

        return array($timestamp, $ym, $today, $title, $month, $prev, $next, $day_count, $str);
    }
}