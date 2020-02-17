<?php

namespace App;

use Illuminate\Support\Carbon;

class DateTimeComparer
{
    protected $startDateTime;

    protected $endDateTime;

    public function __construct($startDateTime, $endDateTime)
    {
        $this->startDateTime = Carbon::parse($startDateTime);

        $this->endDateTime = Carbon::parse($endDateTime);
    }

    public function daysBetween()
    {
        return $this->startDateTime->diffInDays($this->endDateTime);
    }

    public function weekDaysBetween()
    {
        return $this->startDateTime->diffInDaysFiltered(function (Carbon $day) {
            return $day->isWeekday();
        }, $this->endDateTime);
    }

    public function completeWeeksBetween()
    {
        return $this->startDateTime->diffInWeeks($this->endDateTime);
    }

}
