<?php

namespace App;

use Carbon\CarbonInterval;
use Illuminate\Support\Carbon;

class DiffDateTimeComparer implements DateTimeComparer
{
    protected $startDateTime;

    protected $endDateTime;

    protected $resultFormat;

    public function __construct($startDateTime, $endDateTime, $startDateTimeZone = null, $endDateTimeZone = null, $resultFormat = null)
    {
        if ($startDateTime > $endDateTime) {
            $this->startDateTime = new \DateTime($endDateTime, $endDateTimeZone ? new \DateTimeZone($endDateTimeZone) : null);

            $this->endDateTime = new \DateTime($startDateTime, $startDateTime ? new \DateTimeZone($startDateTimeZone) : null);
        } else {
            $this->startDateTime = new \DateTime($startDateTime, $startDateTimeZone ? new \DateTimeZone($startDateTimeZone) : null);

            $this->endDateTime = new \DateTime($endDateTime, $endDateTimeZone ? new \DateTimeZone($endDateTimeZone) : null);
        }

        $this->resultFormat = $resultFormat;
    }

    private function convertDaysToResultFormat($days)
    {
        switch ($this->resultFormat) {
            case 'seconds':
                return $days * 24 * 60 * 60;
            case 'minutes':
                return $days * 24 * 60;
            case 'hours':
                return $days * 24;
            case 'years':
                return $days / 365.24;
        }
    }

    public function daysBetween()
    {
        $daysBetween = $this->startDateTime->diff($this->endDateTime)->days;

        if ($this->resultFormat) {
            return $this->convertDaysToResultFormat($daysBetween);
        }

        return $daysBetween;
    }

    public function weekDaysBetween()
    {
        $weekDaysBetween = 0;
        $weekDays = [1, 2, 3, 4, 5];
        $periods = new \DatePeriod($this->startDateTime, new \DateInterval('P1D'), $this->endDateTime);

        foreach ($periods as $period) {
            if (in_array($period->format('N'), $weekDays)) {
                $weekDaysBetween++;
            }
        }

        if ($this->resultFormat) {
            return $this->convertDaysToResultFormat($weekDaysBetween);
        }

        return $weekDaysBetween;
    }

    public function completeWeeksBetween()
    {
        $completeWeeks = (int) ($this->startDateTime->diff($this->endDateTime)->days / 7);

        if ($this->resultFormat) {
            return $this->convertDaysToResultFormat($completeWeeks * 7);
        }

        return $completeWeeks;
    }

}
