<?php

namespace App\helpers;

class Calendar
{
    /**
     * @param $str
     * @param $day_count
     * @param $ym  string year months
     * @param $today
     * @param $events
     * @return array calendar view with day events
     */
    public static function makeCalendar($str, $day_count, $ym, $today, $events)
    {
        // Array for calendar
        $weeks = [];
        $week = '';
        $time = [];
        $dayEvents = '';
        // Add empty cell(s)
        $week .= str_repeat('<td></td>', $str - 1);
        for ($day = 1; $day <= $day_count; $day++, $str++) {
            $date = $ym . '-' . $day;
            if ($today == $date) {
                $week .= '<td class="today">';
            } else {
                $week .= '<td>';
            }
            //add events in dey use field - mark.and make pop-up page in teg <a>
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
                $dayEvents = implode(',', $time[$day]);
            }
            $week .= $day . str_replace(',', '', $dayEvents) . "</td>";
            //and make events

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

}