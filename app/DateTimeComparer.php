<?php

namespace App;

use Carbon\CarbonInterval;
use Illuminate\Support\Carbon;

class DateTimeComparer
{
    protected $startDateTime;

    protected $endDateTime;

    protected $resultFormat;

    public function __construct($startDateTime, $endDateTime, $startDateTimeZone = null, $endDateTimeZone = null, $resultFormat = null)
    {
        $this->startDateTime = Carbon::parse($startDateTime, $startDateTimeZone);

        $this->endDateTime = Carbon::parse($endDateTime, $endDateTimeZone);

        $this->resultFormat = $resultFormat;
    }

    private function convertDaysToResultFormat($days)
    {
        return CarbonInterval::days($days)->total($this->resultFormat);
    }

    public function daysBetween()
    {
        $daysBetween = $this->startDateTime->diffInDays($this->endDateTime);

        if ($this->resultFormat) {
            return $this->convertDaysToResultFormat($daysBetween);
        }

        return $daysBetween;
    }

    public function weekDaysBetween()
    {
        $weekDaysBetween = $this->startDateTime->diffInDaysFiltered(function (Carbon $day) {
            return $day->isWeekday();
        }, $this->endDateTime);

        if ($this->resultFormat) {
            return $this->convertDaysToResultFormat($weekDaysBetween);
        }

        return $weekDaysBetween;
    }

    public function completeWeeksBetween()
    {
        $completeWeeks = $this->startDateTime->diffInWeeks($this->endDateTime);

        if ($this->resultFormat) {
            return $this->convertDaysToResultFormat($completeWeeks * 7);
        }

        return $completeWeeks;
    }

}
