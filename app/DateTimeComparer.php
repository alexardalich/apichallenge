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

}
