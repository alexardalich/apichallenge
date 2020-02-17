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
    public function number_of_days_between_two_datetimes_as_seconds()
    {
        $startDateTime = '2020-01-01 09:00';
        $endDateTime = '2020-01-07 09:00';

        $comparer = new DateTimeComparer($startDateTime, $endDateTime, null, null, 'seconds');
        $this->assertEquals(518400, $comparer->daysBetween());
    }

    /** @test */
    public function number_of_days_between_two_datetimes_as_minutes()
    {
        $startDateTime = '2020-01-01 09:00';
        $endDateTime = '2020-01-07 09:00';

        $comparer = new DateTimeComparer($startDateTime, $endDateTime, null, null, 'minutes');
        $this->assertEquals(8640, $comparer->daysBetween());
    }

    /** @test */
    public function number_of_days_between_two_datetimes_as_hours()
    {
        $startDateTime = '2020-01-01 09:00';
        $endDateTime = '2020-01-07 09:00';

        $comparer = new DateTimeComparer($startDateTime, $endDateTime, null, null, 'hours');
        $this->assertEquals(144, $comparer->daysBetween());
    }

    /** @test */
    public function number_of_days_between_two_datetimes_as_years()
    {
        $startDateTime = '2020-01-01 09:00';
        $endDateTime = '2020-01-07 09:00';

        $comparer = new DateTimeComparer($startDateTime, $endDateTime, null, null, 'years');
        $this->assertEquals(0.017857142857142856, $comparer->daysBetween());
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
    public function number_of_weekdays_between_two_datetimes_as_seconds()
    {
        $startDateTime = '2020-01-01 09:00';
        $endDateTime = '2020-01-07 09:00';

        $comparer = new DateTimeComparer($startDateTime, $endDateTime, null, null, 'seconds');

        $this->assertEquals(345600, $comparer->weekDaysBetween());
    }

    /** @test */
    public function number_of_weekdays_between_two_datetimes_as_minutes()
    {
        $startDateTime = '2020-01-01 09:00';
        $endDateTime = '2020-01-07 09:00';

        $comparer = new DateTimeComparer($startDateTime, $endDateTime, null, null, 'minutes');

        $this->assertEquals(5760, $comparer->weekDaysBetween());
    }

    /** @test */
    public function number_of_weekdays_between_two_datetimes_as_hours()
    {
        $startDateTime = '2020-01-01 09:00';
        $endDateTime = '2020-01-07 09:00';

        $comparer = new DateTimeComparer($startDateTime, $endDateTime, null, null, 'hours');

        $this->assertEquals(96, $comparer->weekDaysBetween());
    }

    /** @test */
    public function number_of_weekdays_between_two_datetimes_as_years()
    {
        $startDateTime = '2020-01-01 09:00';
        $endDateTime = '2020-01-07 09:00';

        $comparer = new DateTimeComparer($startDateTime, $endDateTime, null, null, 'years');

        $this->assertEquals(0.011904761904761904, $comparer->weekDaysBetween());
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

    /** @test */
    public function number_of_complete_weeks_between_two_datetimes_as_seconds()
    {
        $startDateTime = '2020-01-01 09:00';
        $endDateTime = '2020-01-22 09:00';

        $comparer = new DateTimeComparer($startDateTime, $endDateTime, null, null, 'seconds');

        $this->assertEquals(1814400, $comparer->completeWeeksBetween());
    }

    /** @test */
    public function number_of_complete_weeks_between_two_datetimes_as_minutes()
    {
        $startDateTime = '2020-01-01 09:00';
        $endDateTime = '2020-01-22 09:00';

        $comparer = new DateTimeComparer($startDateTime, $endDateTime, null, null, 'minutes');

        $this->assertEquals(30240, $comparer->completeWeeksBetween());
    }

    /** @test */
    public function number_of_complete_weeks_between_two_datetimes_as_hours()
    {
        $startDateTime = '2020-01-01 09:00';
        $endDateTime = '2020-01-22 09:00';

        $comparer = new DateTimeComparer($startDateTime, $endDateTime, null, null, 'hours');

        $this->assertEquals(504, $comparer->completeWeeksBetween());
    }

    /** @test */
    public function number_of_complete_weeks_between_two_datetimes_as_years()
    {
        $startDateTime = '2020-01-01 09:00';
        $endDateTime = '2020-01-22 09:00';

        $comparer = new DateTimeComparer($startDateTime, $endDateTime, null, null, 'years');

        $this->assertEquals(0.0625, $comparer->completeWeeksBetween());
    }

    /** @test */
    public function can_find_number_of_days_between_two_datetimes_with_timezones()
    {
        $startDateTime = '2020-01-01 09:00';
        $startDateTimeZone = 'Australia/Adelaide';
        $endDateTime = '2020-01-02 06:00';
        $endDateTimeZone = 'Australia/Perth';

        $comparer = new DateTimeComparer($startDateTime, $endDateTime, $startDateTimeZone, $endDateTimeZone);

        $this->assertEquals(0, $comparer->daysBetween());

        $endDateTime = '2020-01-02 06:30';
        $endDateTimeZone = 'Australia/Perth';

        $comparer = new DateTimeComparer($startDateTime, $endDateTime, $startDateTimeZone, $endDateTimeZone);

        $this->assertEquals(1, $comparer->daysBetween());
    }
}
