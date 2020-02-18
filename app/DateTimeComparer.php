<?php


namespace App;


interface DateTimeComparer
{
    public function daysBetween();

    public function weekDaysBetween();

    public function completeWeeksBetween();
}
