<?php

namespace Tests\Unit;

use App\DateTimeComparer;
use PHPUnit\Framework\TestCase;

class DateTimeComparerTest extends TestCase
{

    /** @test */
    public function can_find_number_of_days_between_two_datetimes()
    {
        $startDateTime = '2020-01-01 09:00';
        $endDateTime = '2020-01-07 09:00';

        $comparer = new DateTimeComparer($startDateTime, $endDateTime);

        $this->assertEquals(6, $comparer->daysBetween());
    }

    /** @test */
    public function can_find_number_of_days_between_two_reversed_datetimes()
    {
        $startDateTime = '2020-01-01 09:00';
        $endDateTime = '2020-01-07 09:00';

        $comparer = new DateTimeComparer($startDateTime, $endDateTime);

        $this->assertEquals(6, $comparer->daysBetween());
    }

    /** @test */
    public function can_find_number_of_weekdays_between_two_datetimes()
    {
        $startDateTime = '2020-01-01 09:00';
        $endDateTime = '2020-01-07 09:00';

        $comparer = new DateTimeComparer($startDateTime, $endDateTime);

        $this->assertEquals(4, $comparer->weekDaysBetween());
    }

    /** @test */
    public function can_find_number_of_weekdays_between_two_reversed_datetimes()
    {
        $startDateTime = '2020-01-01 09:00';
        $endDateTime = '2020-01-07 09:00';

        $comparer = new DateTimeComparer($startDateTime, $endDateTime);

        $this->assertEquals(4, $comparer->weekDaysBetween());
    }

    /** @test */
    public function can_find_number_of_complete_weeks_between_two_datetimes()
    {
        $startDateTime = '2020-01-01 09:00';
        $endDateTime = '2020-01-22 09:00';

        $comparer = new DateTimeComparer($startDateTime, $endDateTime);

        $this->assertEquals(3, $comparer->completeWeeksBetween());
    }

    /** @test */
    public function can_find_number_of_complete_weeks_between_two_reversed_datetimes()
    {
        $startDateTime = '2020-01-01 09:00';
        $endDateTime = '2020-01-22 09:00';

        $comparer = new DateTimeComparer($startDateTime, $endDateTime);

        $this->assertEquals(3, $comparer->completeWeeksBetween());
    }

}
